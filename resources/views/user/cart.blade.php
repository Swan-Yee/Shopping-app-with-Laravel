@extends('user.layout.master')

@section('content')
<div class="card">
    <div class="card-body">
            <h2>Your Cart List</h2>
            <table class="table table-striped">
                    <thead>
                            <tr>
                                <th>Name</th>
                                    <th>Image</th>
                                    <th>qty</th>
                                    <th>Price</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $cart)
                        <tr>
                            <td>{{$cart->product->name}}</td>
                            <td>
                                    <img src="{{asset($cart->product->image)}}"
                                            style="width:50px;border-radius:30%"
                                            alt="">
                            </td>
                            <td>{{$cart->qty}}</td>
                            <td>
                                {{$cart->product->price}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <a href="{{route('user.makeorder')}}" class="btn btn-primary">Make Order</a>
    </div>
</div>
@endsection
