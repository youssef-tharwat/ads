<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nexmo\User\User;

class ViewAttendanceController extends Controller
{

    public function index(){

        $attendancesArray = [];

        $attendances = DB::table('user_subjects')->where('user_id', '=', Auth::user()->id)->get();

        foreach ($attendances  as $attendance){
            array_push($attendancesArray, $attendanceArray= [
                'subject' => Subject::find($attendance->subject_id)->name,
                'attendance'=> $attendance->attendance,
            ]);
        }

        return view('dashboard.student.view_attendance', compact('attendancesArray'));
    }
}
