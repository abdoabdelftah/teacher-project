<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class StudentAuth extends Controller
{
    //




    public function checkStudentLogin(Request $request)
    {


        $date = Carbon::now();

   $check = User::where('phone_number', $request->phone_number)->first();

   if(isset($check)){
   if($check->last_login_date >= $date){

    return redirect()->back()->withErrors(['errors' => ' لقد قمت بتسجيل الدخول  باستخدام جهاز اخر اذا كنت ترغب فى تسجيل الدخول الرجاء التواصل مع الاستاذ']);


   }
    }


        if (Auth::attempt(['phone_number' => $request->phone_number, 'password' => $request->password],  $remember = true)) {


            $user = Auth::user();

            $user->update([
                "last_login_date" => now(),
            ]);
            return redirect()->intended('/grades');
    //    }


    }else{

        return redirect()->back()->withErrors(['errors' => ' كود الدخول غير صحيح او كلمة المرور غير صحيحة']);
    }

}

    public function test()
    {


return view('student.grades');



/*
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        Auth::guard('web')->logout();

        $user->session()->invalidate();

        $user->session()->regenerateToken();

       return redirect()->intended('/login');
*/
    }


}
