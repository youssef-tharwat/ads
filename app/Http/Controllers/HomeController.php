<?php

namespace App\Http\Controllers;

use App\Course;
use App\Exam;
use App\Subject;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        //Admin Section

        $studentsNumber = count(DB::table('role_user')->where('role_id','=', '2')->get()); //Student Count
        $coursesNumber = count(Course::all());
        $examsNumber = count(Exam::all());
        $subjectsNumber = count(Subject::all());

        //Student Section


        if(Auth::user()->hasRole('student')){

            $student = User::find(Auth::user()->id); // Logged in student

            $studentExams = count($student->exams);  // Exam Count
            $lowAttendanceSubjects = $student->subjects; //Todo Low Attendance Subject's Count
        }

        return view('dashboard.dashboard', compact('studentExams', 'studentsNumber','coursesNumber','examsNumber','subjectsNumber'));
    }
}
