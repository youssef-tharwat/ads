<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{

    public function index(){

        $courses = Course::all();

        return view('dashboard.admin.user_management', compact('courses'));

    }


    public function store(Request $request) {

        if($request->role == 'Admin'){

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'IDC' => ['required', 'integer', 'unique:users'],
            ]);


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => 'default.jpg',
                'birthday'=> $request->birthday,
                'IDC'=> $request->IDC,
                'phone_number' => $request->phone,
                'department'=> $request->department,
            ]);

            $user->attachRole('admin');

            return redirect()->back()->with('message', 'Admin User Successfully Registered');

        } else if ($request->role == 'Student'){

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'IDC' => ['required', 'integer', 'unique:users'],
                'tp' => ['required', 'string', 'unique:users'],
            ]);

           $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'avatar' => 'default.jpg',
                'birthday'=> $request->birthday,
                'IDC'=> $request->IDC,
                'phone_number' => $request->phone,
                'tp' => $request->tp,
                'course' => $request->course,
                'intake'=> $request->intake,
            ]);

            $user->attachRole('student');

            $course = Course::wherename($request->course)->first();

            $user = User::whereemail($request->email)->first();

            foreach ($course->subjects as $subject){

                DB::table('user_subjects')->insert([
                    'subject_id' => $subject['id'],
                    'user_id' => $user->id,
                    'attendance' => 0,
                ]);
            }

            return redirect()->back()->with('message', 'Student User Successfully Registered');

        }

    }
}
