<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

        $data['student'] = $user->student;

        // If student data not found yet
        if (!$data['student']) {
            return redirect()->route('registration.index')->with('error', 'Silakan lengkapi pendaftaran terlebih dahulu.');
        }

        return view('backend.announcement.index', $data);
    }
}
