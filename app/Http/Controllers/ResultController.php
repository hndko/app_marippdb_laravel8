<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display the graduation result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // Ensure user has role 'student'
        if ($user->role !== 'student') {
            return redirect()->route('home')->with('error', 'Hanya siswa yang dapat melihat hasil kelulusan.');
        }

        $student = $user->student;

        // If student data not found yet
        if (!$student) {
            return redirect()->route('registration.index')->with('error', 'Silakan lengkapi pendaftaran terlebih dahulu.');
        }

        return view('backend.announcement.index', compact('student'));
    }
}
