<?php

namespace App\Http\Controllers\Auth;

use App\Course;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user =  User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => 'default.jpg',
            'birthday'=> $data['birthday'],
            'IDC'=> $data['IDC'],
            'phone_number' => $data['country_code'].$data['phone'],
            'tp' => $data['tp'],
            'course' => $data['course'],
            'intake'=> $data['intake'],
        ]);

        $user->attachRole('student');


        $course = Course::wherename($data['course'])->first();

        $user = User::whereemail($data['email'])->first();

        foreach ($course->subjects as $subject){

            DB::table('user_subjects')->insert([
                'subject_id' => $subject['id'],
                'user_id' => $user->id,
                'attendance' => 0,
            ]);
        }

        return $user;
    }
}