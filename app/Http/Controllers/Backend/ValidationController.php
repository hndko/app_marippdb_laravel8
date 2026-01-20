<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ValidationController extends Controller
{
    public function index()
    {
        $data['students'] = Student::where('status', 'pending')
            ->latest()
            ->paginate(9);

        return view('backend.verification.index', $data);
    }
}
