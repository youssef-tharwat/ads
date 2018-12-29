<?php

namespace App\Http\Controllers\student;

use App\Exam;
use App\Http\Controllers\Controller;

use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewExamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('two_factor');
    }

    public function index(){

        $examsArray = [];

        $user = User::find(Auth::user()->id); // Get user

        $exams = $user->exams;

        foreach ($exams  as $exam){

            array_push($examsArray, $examArray = [
                'examName' => Exam::find($exam->id)->name,
                'subjectAttendance'=> DB::table('user_subjects')->where('user_id', '=', $user->id)
                    ->where('subject_id', '=', $exam->subject_id)->first(),
                'startDate' => $exam->start_date,
                'duration'=>$exam->duration,
                'examDocket' =>  DB::table('user_exams')->where('user_id', '=', $user->id)
                ->where('exam_id', '=', $exam->id)->first(),
            ]);
        }

        return view('dashboard.student.view_exams' , compact('examsArray'));
    }
}
