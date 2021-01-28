<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending(){
        $order= ProductOrder::where('status','pending')->with('user','product')->paginate(10);
        return view('admin.order.index',['orders'=>$order]);
    }

    public function complete(Request $request){
        $start_date=$request->startdate;
        $end_date=$request->enddate;
        if(isset($request->startdate)){
            $order=ProductOrder::where('status','complete')
            ->whereBetween('created_at',[$start_date,$end_date])
            ->paginate(1);
        $order->appends($request->all());
        }else{
            $order= ProductOrder::where('status','complete')->with('user','product')->paginate(10);
        }
        return view('admin.order.complete',['orders'=>$order]);
    }

    public function confirm($id){
        ProductOrder::where('id',$id)->update([
            'status'=>'complete'
        ]);
        return redirect()->back()->with('success','Confrim Successfully');
    }
}
