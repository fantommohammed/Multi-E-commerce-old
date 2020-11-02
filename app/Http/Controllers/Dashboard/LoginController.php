<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }
    public function postLogin(AdminLoginRequest $request)
    {
        //validation

        //check , store , update
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request -> input("email"),'password'=>$request->input("password")],$remember_me))
        {
            //notify()->success('تم الدخول بنجاح');
            return redirect() -> route('admin.dashboard');
        }
           //notify()->error('خطاء فى البينات برجاء المحاولة مجدادا');
           return redirect()->back()->with(['error'=>'هناك خطاء بالبيانات']);
    }
}
