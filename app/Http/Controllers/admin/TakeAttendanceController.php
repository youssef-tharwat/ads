<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use Illuminate\Support\Facades\DB;


class TakeAttendanceController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin', 'two_factor']);
    }

    public function index(){


        $examsForToday = Exam::whereDate('start_date', '=', Carbon::now()->timezone('Asia/Singapore'))->get();

        activity()->log(Auth::user()->name.' accessed exam attendance');

        return view('dashboard.admin.take_attendance', compact('examsForToday'));

    }

    public function show($id){

        $checkboxStatus = [];

        $exam = Exam::find($id);
        $students = $exam->user;

        activity()->log(Auth::user()->name.' viewed '.$exam->name.' exam attendance');

        foreach ($students as $student){

            $studentExam = DB::table('user_exams')->where('user_id', '=', $student['id'])->
            where('exam_id', '=', $exam->id)->first();

            array_push($checkboxStatus, [
                'id' => $student['id'],
                'name' => $student['name'],
                'tp' => $student['tp'],
                'course' => $student['course'],
                'intake' => $student['intake'],
               'docket' =>$studentExam->docket,
               'user_id' => $studentExam->user_id,
               'exam_id' => $studentExam->exam_id,
               'checkbox' => $studentExam->attended,
            ]);
        }

        return view('dashboard.admin.view_take_attendance', compact( 'exam', 'checkboxStatus'));
    }

    public function edit(Request $request){

        $exam = Exam::find($request->data['exam_id']);

        activity()->log(Auth::user()->name.' edited '.$exam->name.' exam attendance');


        if ($request->data['checkbox'] == 'true'){

             DB::table('user_exams')->where('user_id', '=', $request->data['student_id'])->
            where('exam_id', '=', $request->data['exam_id'])->update([
                'attended' => 1,
            ]);

        } else {

            DB::table('user_exams')->where('user_id', '=', $request->data['student_id'])->
            where('exam_id', '=', $request->data['exam_id'])->update([
                'attended' => 0,
            ]);

        }

    }

}
