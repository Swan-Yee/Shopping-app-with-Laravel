<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function doLogin(Request $request){
        if(Auth::attempt(['email' => $request->mail, 'password' => $request->password])){
            return redirect(url('/admin'))->with('success','Successful Login');
        }
        else{
            return "error";
        }
    }
}
