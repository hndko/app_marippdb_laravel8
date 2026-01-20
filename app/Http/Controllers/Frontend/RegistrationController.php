<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Ensure user has role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('home')->with('error', 'Acces Denied. Only students can access this page.');
        }

        $data['student'] = $user->student;

        return view('backend.registration.index', $data);
    }

    /**
     * Store the registration data.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validation
        $request->validate([
            // Student Data
            'nisn' => 'required|string|max:20|unique:students,nisn,' . ($user->student->id ?? 'NULL'),
            'nik' => 'required|string|max:20|unique:students,nik,' . ($user->student->id ?? 'NULL'),
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string',
            'school_origin' => 'required|string|max:255',
            'graduation_year' => 'required|integer',
            'jalur_pendaftaran' => 'required|string',

            // Parent Data
            'father_name' => 'required|string|max:255',
            'father_nik' => 'required|string|max:20',
            'father_job' => 'required|string|max:255',
            'father_phone' => 'nullable|string|max:20',
            'mother_name' => 'required|string|max:255',
            'mother_nik' => 'required|string|max:20',
            'mother_job' => 'required|string|max:255',
            'mother_phone' => 'nullable|string|max:20',
            'guardian_name' => 'nullable|string|max:255',

            // Files (Max 2MB, Images or PDF)
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'akta' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'ijazah' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Create or Update Student
        $studentData = [
            'user_id' => $user->id,
            'full_name' => $user->name, // Sync with User Name
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'phone' => $request->phone,
            'address' => $request->address,
            'school_origin' => $request->school_origin,
            'graduation_year' => $request->graduation_year,
            'jalur_pendaftaran' => $request->jalur_pendaftaran,
            // Status is NOT updated here
        ];

        // If creating new, generate registration number
        if (!$user->student) {
            $studentData['registration_number'] = 'REG-' . time() . '-' . rand(1000, 9999);
            $studentData['status'] = 'pending';
        }

        $student = Student::updateOrCreate(
            ['user_id' => $user->id],
            $studentData
        );

        // Create or Update Parents
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

                // Use Storage facade to put file
                $path = 'uploads/' . $student->id . '/' . $filename;
                $disk->put($path, file_get_contents($file));

                // Check if file exists to avoid db null reference (though put should succeed)
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

        return redirect()->route('registration.index')->with('success', 'Data pendaftaran berhasil disimpan.');
    }
}
