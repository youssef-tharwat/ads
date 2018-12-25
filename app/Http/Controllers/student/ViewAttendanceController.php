<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewAttendanceController extends Controller
{


    public function index(){
        return view('dashboard.student.view_attendance');
    }
}
