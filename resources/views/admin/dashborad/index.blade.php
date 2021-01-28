@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header d-flex">
                <div class="bg-primary mr-3 rounded d-flex align-items-center justify-content-center flex-column" style="width:200px; height:150px">
                    <h1 class="text-white">Total User</h1>
                    <h3 class="badge badge-dark text-white rounded-circle p-2">{{$user_count}}</h3>
                </div>
                <div class="bg-danger mr-3 rounded d-flex align-items-center justify-content-center flex-column" style="width:200px; height:150px">
                    <h1 class="text-white">Pending Order</h1>
                    <h3 class="badge badge-dark text-white rounded-circle p-2">{{$pending_count}}</h3>
                </div>
                <div class="bg-warning mr-3 rounded d-flex align-items-center justify-content-center flex-column" style="width:200px; height:150px">
                    <h1 class="text-white">Complete Order</h1>
                    <h3 class="badge badge-dark text-white rounded-circle p-2">{{$confirm_count}}</h3>
                </div>
            </div>
            <div class="card-body">
                <h1>Latest Order</h1>
                <table class="table table-striped">
                    <thead>
                        <th>User</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            @foreach ($order as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->product->name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->qty * $order->product->price}}</td>
                                <td>
                                    @if ($order->status=='pending')
                                        <span href="" class="badge badge-warning">Pending</span>
                                    @else
                                        <span class="badge badge-primary">confirm</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
