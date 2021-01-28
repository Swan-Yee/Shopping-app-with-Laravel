<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users= User::Where('role','user')->withCount('order')->latest()->paginate(10);
        return view('admin.user.index',['users'=>$users]);
    }

    public function dashboard(){
        $date = date('Y-m-d');
        $user_count=User::count();
        $pending_count=ProductOrder::where('status','pending')->whereDate('created_at',$date)->count();
        $confirm_count=ProductOrder::where('status','confirm')->whereDate('created_at',$date)->count();
        $order=ProductOrder::with('user','product')->whereDate('created_at',$date)->latest()->get();
        return view('admin.dashborad.index',compact('user_count','pending_count','confirm_count','order'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
