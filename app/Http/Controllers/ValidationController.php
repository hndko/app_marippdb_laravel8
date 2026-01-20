<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ValidationController extends Controller
{
    public function index()
    {
        $students = Student::where('status', 'pending')
            ->latest()
            ->paginate(9);

        return view('backend.verification.index', compact('students'));
    }
}
