@extends('admin.layout.master')

@section('content')

<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Product</th>
            <th>User</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
        <tr>
            <td>{{$item->product->name}}</td>
            <td>{{$item->user->name}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->qty * $item->product->price}}</td>
            <td>{{$item->status}}</td>
            <td>
                <a href="{{route('admin.order.confirm',$item->id)}}" class="badge badge-danger">Confirm</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
