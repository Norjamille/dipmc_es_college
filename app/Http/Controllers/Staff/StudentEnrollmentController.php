<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentEnrollmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Staff/Enrollment/Index');
    }
}
