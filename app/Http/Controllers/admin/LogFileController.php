<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Activity;

class LogFileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(){

        $logsDb = Activity::all();

        $logs = [];

        $user = null;

        foreach ($logsDb as $logDb){

           $user = User::find($logDb->causer_id);
           $log = [
               'username' => $user->name,
               'description' =>$logDb->description,
               'created_at' =>$logDb->created_at,
           ];

           array_push($logs, $log);
        }

        return view('dashboard.admin.log_file', compact('logs'));
    }
}
