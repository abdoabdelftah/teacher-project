<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;

class CheckStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();


        if(!$user){



            Auth::guard('web')->logout();




           return redirect('/login')->withErrors(['errors' => ' لقد تم ازالة حسابك بسبب عدم دفعك للاشتراك. يجب عليك التواصل مع الاستاذ']);
        }



        $date = Carbon::now()->subDay(7);

        if($date > $user->last_login_date){


            $user->remember_token = null;
            $user->save();

            Auth::guard('web')->logout();




           return redirect('/login')->withErrors(['errors' => ' الرجاء اعادة تسجيل الدخول']);
        }

//       $now = Carbon::now();



        return $next($request);
       }
}
