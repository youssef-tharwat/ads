<?php

namespace App\Http\Middleware;

use App\Notifications\AdminAttendanceCode;
use App\Notifications\StudentExamViewCode;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

            if (Auth::user()->hasRole('admin')){

                $user = Auth::user();

                if( $user->token_2fa_expiry >  Carbon::now()->timezone('Asia/Singapore')){
                    return $next($request);
                }

                $user->token_2fa = mt_rand(10000,99999);
                $user->save();

                Notification::route('mail', $user->email)
                    ->notify(new AdminAttendanceCode($user->token_2fa));

                return redirect()->route('home');

            }  else if (Auth::user()->hasRole('student')){

                $user = Auth::user();

                if( $user->token_2fa_expiry >  Carbon::now()->timezone('Asia/Singapore')){
                    return $next($request);
                }

                $user->token_2fa = mt_rand(10000,99999);
                $user->save();

                Notification::route('mail', $user->email)
                    ->notify(new StudentExamViewCode($user->token_2fa));

                return redirect()->route('home');

            }

    }
}
