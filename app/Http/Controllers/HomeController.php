<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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

        $studentsNumber = count(Auth::user()->hasRole('student')); //Student Count

        if(Auth::user()->hasRole('student')){

            $student = User::find(Auth::user()->id); // Logged in student

            $studentExams = count($student->exams);  // Exam Count
            $lowAttendanceSubjects = $student->subjects; //Todo Low Attendance Subject's Count
        }

        return view('dashboard.dashboard', compact('studentExams', 'studentsNumber'));
    }
}
