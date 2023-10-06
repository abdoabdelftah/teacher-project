<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class AdminAuth extends Controller
{
    //

    public function checkAdminLogin(Request $request)
    {
        

        if (Auth::guard('admin')->attempt(['phone_number' => $request->phone_number, 'password' => $request->password])) {

            return redirect()->intended('/admin/students');
        }
       
        return redirect()->back()->withErrors(['errors' => ' رقم الهاتف غير صحيح او كلمة المرور غير صحيحة']);
    }
}
