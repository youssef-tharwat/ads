<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFactorControllerButton extends Controller
{
    public function __construct()
    {
        $this->middleware('two_factor_button');
    }

    public function index(){
        return true;
    }
}
