<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Show the application dashboard.
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

        $student = $user->student; // Assuming hasOne relationship in User model

        return view('backend.registration.index', compact('student'));
    }

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
            'mother_name' => 'required|string|max:255',
            'guardian_name' => 'nullable|string|max:255',
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
            // Status is NOT updated here, logic kept default (pending) or existing status
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
                'mother_name' => $request->mother_name,
                'guardian_name' => $request->guardian_name,
            ]
        );

        return redirect()->route('registration.index')->with('success', 'Data pendaftaran berhasil disimpan.');
    }
}
