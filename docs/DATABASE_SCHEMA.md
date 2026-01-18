# Database Schema - Aplikasi PPDB

## 1. Tabel: `users`

Menyimpan data akun untuk login (Admin & Calon Siswa).

- `id` (BigInt, PK)
- `name` (String)
- `email` (String, Unique)
- `password` (String)
- `role` (Enum: 'admin', 'operator', 'student') - Default: 'student'
- `remember_token`
- `created_at`, `updated_at`

## 2. Tabel: `students`

Menyimpan data diri siswa dan status pendaftaran.

- `id` (BigInt, PK)
- `user_id` (BigInt, FK -> users.id)
- `registration_number` (String, Unique) - No. Pendaftaran (Generated)
- `nisn` (String, Unique, Nullable)
- `nik` (String, Unique, Nullable)
- `full_name` (String)
- `gender` (Enum: 'L', 'P')
- `birth_place` (String)
- `birth_date` (Date)
- `religion` (String)
- `phone` (String)
- `address` (Text)
- `school_origin` (String) - Sekolah Asal
- `graduation_year` (Year)
- `jalur_pendaftaran` (String) - e.g., Zonasi, Prestasi, Afirmasi.
- `status` (Enum: 'pending', 'verified', 'rejected', 'accepted', 'not_accepted') - Default: 'pending' (Status Seleksi)
- `is_finalized` (Boolean) - Default: 0 (Jika 1, siswa tidak bisa edit lagi)
- `created_at`, `updated_at`

## 3. Tabel: `student_parents`

Data orang tua atau wali.

- `id` (BigInt, PK)
- `student_id` (BigInt, FK -> students.id)
- `father_name` (String)
- `father_nik` (String, Nullable)
- `father_job` (String, Nullable)
- `father_phone` (String, Nullable)
- `mother_name` (String)
- `mother_nik` (String, Nullable)
- `mother_job` (String, Nullable)
- `mother_phone` (String, Nullable)
- `guardian_name` (String, Nullable)
- `created_at`, `updated_at`

## 4. Tabel: `student_scores` (Optional/Kondisional)

Nilai rapor atau ujian untuk jalur prestasi.

- `id` (BigInt, PK)
- `student_id` (BigInt, FK -> students.id)
- `subject_name` (String) - misal: Matematika, B.Indonesia
- `score` (Decimal 5,2)
- `semester` (Int) - Optional jika butuh per semester
- `created_at`, `updated_at`

## 5. Tabel: `student_files`

Menyimpan path file upload.

- `id` (BigInt, PK)
- `student_id` (BigInt, FK -> students.id)
- `file_type` (String) - e.g., 'kk', 'akta', 'ijazah', 'foto'
- `file_path` (String)
- `original_name` (String)
- `created_at`, `updated_at`

## 6. Tabel: `settings`

Konfigurasi dinamis aplikasi.

- `id` (BigInt, PK)
- `key` (String, Unique) - e.g., 'school_name', 'ppdb_open_date'
- `value` (Text)
- `created_at`, `updated_at`
