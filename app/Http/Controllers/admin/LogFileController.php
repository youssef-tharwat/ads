<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogFileController extends Controller
{
    public function index(){
        return view('dashboard.admin.log_file');
    }
}
