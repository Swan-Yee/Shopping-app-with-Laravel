<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('user.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'mail'=>'required',
            'password'=>'required',
        ]);

        if(User::where('email',$request->mail)->first()){
            if(Auth::attempt(['email' => $request->mail, 'password' => $request->password])){
                return redirect(url('/'))->with('success','Successful Login');
            }
            else{
                return redirect()->back()->with('danger',"Password doesn't match");
            }
        }else{
            return redirect()->back()->with('danger','Mail does not exist');
        }
    }

    public function getRegister(){
        return view('user.auth.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'mail'=>'required',
            'password'=>'required|min:5',
            'image'=>'required',
        ]);
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        User::create([
            'name'=>$request->name,
            'email'=>$request->mail,
            'password'=>$request->password,
            'image'=>$file_path,
        ]);
        return redirect(url('/login'))->with('success','Successful Register!');
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }
}
