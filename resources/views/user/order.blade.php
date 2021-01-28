@extends('user.layout.master')

@section('content')
<div class="card">
    <div class="card-body">
        @if ($status=='pending')
            <h2>Your Pending Order List</h2>
        @else
            <h2>Your Confirm Order List</h2>
        @endif
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
                        @foreach ($order as $o)
                        <tr>
                            <td>{{$o->product->name}}</td>
                            <td>
                                    <img src="{{asset($o->product->image)}}"
                                            style="width:50px;border-radius:30%"
                                            alt="">
                            </td>
                            <td>{{$o->qty}}</td>
                            <td>
                                {{$o->product->price}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>
@endsection
