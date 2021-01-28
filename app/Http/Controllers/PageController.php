<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $products=Product::OrderBy('id','DESC')->latest()->paginate(9);
        return view('user.index',['products'=>$products]);
    }

    public function productDetail(Request $request,$slug){
        $product=Product::where('slug',$slug);

        $product->update([
            'view_count'=>DB::raw("view_count+1")
        ]);
        $product=$product->with('category')->first();

        return view('user.productDetail',compact('product'));
    }

    public function addToCard($slug){
        $userId=Auth()->user()->id;
        $productId=Product::where('slug',$slug)->first()->id;
        $qty=1;

        ProductCart::create([
            'qty'=>$qty,
            'user_id'=>$userId,
            'product_id'=>$productId
        ]);

        return redirect()->back();
    }

    public function cart(){
        $cart=ProductCart::with('product')->where('user_id',Auth::user()->id)->get();
        return view('user.cart',compact('cart'));
    }

    public function makeOrder(){
            $userId=Auth::user()->id;
            $cart=ProductCart::where('user_id',$userId)->get();
            foreach($cart as $c){
                ProductOrder::create([
                    'user_id'=>$userId,
                    'product_id'=>$c->product_id,
                    'qty'=>$c->qty,
                    'status'=>'pending',
                ]);
                ProductCart::where('id',$c->id)->delete();
            }
        return redirect()->back()->with('success','Order Success');
    }

    public function pendingOrder(){
        $order=ProductOrder::where('user_id',Auth::user()->id)->with('product')->where('status','pending')->get();
        $status="pending";
        return view('user.order',compact('order','status'));
    }

    public function confirmOrder(){
        $order=ProductOrder::where('user_id',Auth::user()->id)->with('product')->where('status','complete')->get();
        $status="confirm";
        return view('user.order',compact('order','status'));
    }

    public function info(){
        $user=Auth()->user();
        return view('user.auth.info',compact('user'));
    }

    public function infoChange(Request $request){

        $user=User::where('id',Auth::user()->id)->first();

        if($request->file('image')){
            $file=$request->file('image');
            $file_name=uniqid(time()).$file->getClientOriginalName();
            $file_path='image/'.$file_name;
            $file->storeAs('image',$file_name);
        }
        else{
            $file_path=$user->image;
        }

        $user->update([
            'name'=>$request->name,
            'email'=>$request->mail,
            'image'=>$file_path,
        ]);
        return redirect()->back()->with('success','Change Successful');
    }

    public function byCategory($slug){
        $cat_id=Category::where('slug',$slug)->first()->id;
        $products=Product::where('category_id',$cat_id)->paginate(10);
        return view('user.index',compact('products'));
    }

    public function search(Request $request){
        $search=$request->search;
        $products=Product::where('name','Like',"%{$search}%")->with('category')->paginate(10);
        return view('user.index',compact('products'));
    }
}
