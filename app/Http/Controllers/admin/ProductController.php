<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::OrderBy('id','DESC')->latest()->paginate(5);
        return view('admin.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'category'=>'required',
            'image'=>'required',
        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$file_path,
            'view_count'=>0
        ]);

        return redirect(route('admin.product.index'))->with('success','Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('id',$id)->with('category')->first();
        return view('admin.product.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('admin.product.edit',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        if($request->file('image')){
            $img_arr=explode('/',$product->image);
            Storage::disk('image')->delete($img_arr[0]);
            $file=$request->file('image');
            $file_name=uniqid(time()).$file->getClientOriginalName();
            $file_path="image/".$file_name;
            $file->StoreAS('image',$file_name);
        }
        else{
            $file_path=$product->image;
        }

        Product::where('id',$id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$file_path
        ]);
        return redirect(route('admin.product.index'))->with('success','Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::where('id',$id);
        $image_arr=explode('/',$product->first()->image);
        Storage::disk('image')->delete($image_arr[1]);
        $product->delete();
        return redirect(route('admin.product.index'))->with('success','Delete Success!');
    }
}
