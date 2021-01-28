@extends('admin.layout.master')

@section('content')

<a href="{{route('admin.product.index')}}" class="btn btn-sm btn-primary">All Product</a>
<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Fees</th>
            <th>View Count</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{asset($product->image)}}" alt="Image" width="100" height="100">
            </td>
            <td>
                {{$product->category->name}}
            </td>
            <td>
                {{$product->price}}
            </td>
            <td>
                {{$product->view_count}}
            </td>
        </tr>
    </tbody>
</table>
<span><h1>Descripiton</h1></span>
<p>
    {{$product->description}}
</p>
@endsection
