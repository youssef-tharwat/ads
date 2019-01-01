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

            $attendancePercentageCounter = 0;

            $student = User::find(Auth::user()->id); // Logged in student

            $attendances = DB::table('user_subjects')->where('user_id', '=', Auth::user()->id)->get();

            foreach ($attendances as $attendance){
                $attendancePercentageCounter += $attendance->attendance;
            }

            $totalAttendance = $attendancePercentageCounter / count($attendances);

            $totalLowAttendanceSubjects = count(DB::table('user_subjects')->where('user_id', '=', Auth::user()->id)
                ->where('attendance', '<', 80)->get());
            $studentExams = count($student->exams);
            $studentSubjects = count($student->subjects);

        }

        return view('dashboard.dashboard', compact('studentExams', 'studentSubjects' , 'totalLowAttendanceSubjects', 'totalAttendance' ,'studentsNumber','coursesNumber','examsNumber','subjectsNumber'));
    }

    public function upload(Request $request){

        $avatarName = $request->file('avatar')->getClientOriginalName();
        $request->file('avatar')->move(public_path('storage/avatars'), $avatarName);

        $user = Auth::user();
        $user->avatar = $avatarName;
        $user->save();

        return redirect()->route('home');
    }
}
