<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(){

        $courses = Course::all();

        return view('dashboard.admin.course management.assign_subject', compact('courses'));

    }

    public function store(Request $request){

        $course = Course::wherename($request->course)->first();

        Subject::create([
           'name' => $request->subject_name,
           'course_id' =>  $course->id,
        ]);

        $students = User::wherecourse($request->course)->get();

        $subject = Subject::wherename($request->subject_name)->first();

        foreach ($students as $student){

            DB::table('user_subjects')->insert([
                'subject_id' => $subject->id,
                'user_id' => $student->id,
                'attendance' => 0,
            ]);
        }

        return redirect()->back()->with('message', 'Subject Successfully Created & Assigned');

    }
}
