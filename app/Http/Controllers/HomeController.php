<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $total_students = \App\Models\Student::count();
        // $verified_students = \App\Models\Student::where('status', 'verified')->count();
        // $pending_students = \App\Models\Student::where('status', 'pending')->count();

        // Using 0 for now until migration runs
        $total_students = 0;
        $verified_students = 0;
        $pending_students = 0;

        return view('backend.dashboard', compact('total_students', 'verified_students', 'pending_students'));
    }
}
