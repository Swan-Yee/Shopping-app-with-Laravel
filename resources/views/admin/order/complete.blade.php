@extends('admin.layout.master')

@section('content')
<div class="card">
    <div class="card-header">
        Complete Order
    </div>
    <div class="card-body">
        <div class="card">
            <di class="card-body">
                    <form action="{{route('admin.order.complete')}}" method="get" class="row">
                        <div class="col-5">
                            <input type="date" name="startdate" id="" class="form-control">
                        </div>
                        <div class="col-5">
                            <input type="date" name="enddate" id="" class="form-control">
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Search" class="btn btn-lg btn-primary">
                        </div>
                    </form>
            </div>
        </div>
        @if (isset(request()->startdate))
        <div class="container-fluid text-center">
            <h3 class="text text-warning">
                From <b>{{request()->startdate}}</b> To <b>{{request()->enddate}}</b>
            <a href="{{route('admin.order.complete')}}" class="badge badge-primary">Show All!</a>
            </h3>
        </div>
        @endif
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>User</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Status</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $orders->links() }}
@endsection
