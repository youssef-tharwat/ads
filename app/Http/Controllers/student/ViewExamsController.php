<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ViewExamsController extends Controller
{
    public function index(){
        return view('dashboard.student.view_exams');
    }
}
