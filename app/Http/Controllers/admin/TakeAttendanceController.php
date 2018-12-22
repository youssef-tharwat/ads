<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TakeAttendanceController extends Controller
{
    public function index(){
        return view('dashboard.admin.take_attendance');
    }
}
