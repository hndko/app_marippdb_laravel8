<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Student::query();

        // Eager load relationships to prevent N+1
        $query->with(['user', 'parents']);

        // Search by Name or NISN
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%")
                    ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        // Filter by Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $data['students'] = $query->latest()->get();

        return view('backend.students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'required|string|unique:students,nisn|max:20',
            'nik' => 'required|string|unique:students,nik|max:20',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'school_origin' => 'required|string|max:255',
            'graduation_year' => 'required|integer',
            'jalur_pendaftaran' => 'required|string',
            'father_name' => 'required|string|max:255',
            'father_nik' => 'required|string|max:20',
            'father_job' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_nik' => 'required|string|max:20',
            'mother_job' => 'required|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'akta' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->nisn . '@student.com', // Dummy email based on NISN
            'password' => bcrypt('password'), // Default password
            'role' => 'student',
        ]);

        // Create Student
        $student = Student::create([
            'user_id' => $user->id,
            'registration_number' => 'REG-' . time() . '-' . rand(1000, 9999),
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'phone' => $request->phone,
            'address' => $request->address,
            'school_origin' => $request->school_origin,
            'graduation_year' => $request->graduation_year,
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            'status' => 'pending',
        ]);

        // Create Parent
        $student->parents()->create([
            'father_name' => $request->father_name,
            'father_nik' => $request->father_nik,
            'father_job' => $request->father_job,
            'father_phone' => $request->father_phone,
            'mother_name' => $request->mother_name,
            'mother_nik' => $request->mother_nik,
            'mother_job' => $request->mother_job,
            'mother_phone' => $request->mother_phone,
            'guardian_name' => $request->guardian_name,
        ]);

        // Handle File Uploads
        $fileTypes = ['foto', 'kk', 'akta', 'ijazah'];
        $disk = Storage::disk('public');

        foreach ($fileTypes as $type) {
            if ($request->hasFile($type)) {
                $file = $request->file($type);
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . $type . '.' . $file->getClientOriginalExtension();

                // Use Storage facade
                $path = 'uploads/' . $student->id . '/' . $filename;
                $disk->put($path, file_get_contents($file));

                if ($disk->exists($path)) {
                    $student->files()->create([
                        'file_type' => $type,
                        'file_path' => $path,
                        'original_name' => $originalName,
                    ]);
                }
            }
        }

        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data['student'] = $student->load(['user', 'parents', 'files']);
        return view('backend.students.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // Eager load for edit view if needed
        $data['student'] = $student->load(['parents']);
        return view('backend.students.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:students,nisn,' . $student->id,
            'nik' => 'required|string|max:20|unique:students,nik,' . $student->id,
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'school_origin' => 'required|string|max:255',
            'graduation_year' => 'required|integer',
            'jalur_pendaftaran' => 'required|string',
            'father_name' => 'required|string|max:255',
            'father_nik' => 'required|string|max:20',
            'father_job' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_nik' => 'required|string|max:20',
            'mother_job' => 'required|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'akta' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Update Student
        $student->update([
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'phone' => $request->phone,
            'address' => $request->address,
            'school_origin' => $request->school_origin,
            'graduation_year' => $request->graduation_year,
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            'status' => $request->status ?? $student->status,
        ]);

        // Update User Name
        if ($student->user) {
            $student->user->update(['name' => $request->full_name]);
        }

        // Update Parent
        $student->parents()->updateOrCreate(
            ['student_id' => $student->id],
            [
                'father_name' => $request->father_name,
                'father_nik' => $request->father_nik,
                'father_job' => $request->father_job,
                'father_phone' => $request->father_phone,
                'mother_name' => $request->mother_name,
                'mother_nik' => $request->mother_nik,
                'mother_job' => $request->mother_job,
                'mother_phone' => $request->mother_phone,
                'guardian_name' => $request->guardian_name,
            ]
        );

        // Handle File Uploads
        $fileTypes = ['foto', 'kk', 'akta', 'ijazah'];
        $disk = Storage::disk('public');

        foreach ($fileTypes as $type) {
            if ($request->hasFile($type)) {
                $file = $request->file($type);
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . $type . '.' . $file->getClientOriginalExtension();

                // Use Storage facade
                $path = 'uploads/' . $student->id . '/' . $filename;
                $disk->put($path, file_get_contents($file));

                if ($disk->exists($path)) {
                    $student->files()->updateOrCreate(
                        ['file_type' => $type],
                        [
                            'file_path' => $path,
                            'original_name' => $originalName,
                        ]
                    );
                }
            }
        }

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // Ideally we should delete files too here using Storage::delete()
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    /**
     * Verify the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, Student $student)
    {
        $request->validate([
            'status' => 'required|in:verified,rejected,accepted,pending',
        ]);

        $student->update([
            'status' => $request->status,
        ]);

        $message = 'Status siswa berhasil diperbarui menjadi ' . ucfirst($request->status) . '.';

        return redirect()->back()->with('success', $message);
    }
}
