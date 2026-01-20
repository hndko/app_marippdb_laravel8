<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $data['total_students'] = 0;
        $data['verified_students'] = 0;
        $data['pending_students'] = 0;

        return view('backend.dashboard', $data);
    }
}
