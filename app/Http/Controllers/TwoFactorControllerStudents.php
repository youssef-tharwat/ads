<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorControllerStudents extends Controller
{

    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            '2fa-s' => 'required',
        ]);

        if($request->input('2fa-s') == Auth::user()->token_2fa){
            $user = Auth::user();
            $user->token_2fa_expiry = \Carbon\Carbon::now()->timezone('Asia/Singapore')->addMinutes(config('session.lifetime'));
            $user->save();
            return redirect()->route('view.exams.view');
        } else {
            return redirect('/dashboard')->with('message', 'Incorrect code.');
        }
    }
}
