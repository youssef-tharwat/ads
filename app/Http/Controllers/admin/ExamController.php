<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(){

        $subjects = Subject::all();

        return view('dashboard.admin.course management.assign_exam', compact('subjects'));
    }

    public function store(Request $request){

        $subject = Subject::wherename($request->subject)->first();


        Exam::create([
            'name' => $request->exam_name,
            'start_date' =>  $request->exam_date,
            'duration' =>  $request->exam_duration,
            'subject_id' =>  $subject->id,
        ]);

        activity()->log(Auth::user()->name.' created '.$request->exam_name.' exam');


        $students = DB::table('user_subjects')->where('subject_id', '=', $subject->id)->get();


        $exam = Exam::wherename($request->exam_name)->first();


        foreach($students as $student){

            DB::table('user_exams')->insert([
                'user_id' => $student->user_id,
                'exam_id' => $exam->id,
                'attended'=> 0,
                'score' => 0,
            ]);
        }

        return redirect()->back()->with('message', 'Exam Successfully Created & Assigned');
    }
}
