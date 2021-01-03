<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function  getLogin(){

        return view('Admin.auth.login');
    }


    public function login(LoginRequest $request){


        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admins')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('Admin');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['danger' => 'هناك خطا بالبيانات']);
    }
}

?>
