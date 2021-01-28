@extends('admin.layout.master')

@section('content')

<a href="{{route('admin.product.create')}}" class="btn btn-sm btn-primary">Create Product</a>
<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <img src="{{asset($item->image)}}" alt="Image" width="100" height="100">
            </td>
            <td>
                {{$item->category->name}}
            </td>
            <td>
                <a href="{{route('admin.product.edit',$item->id)}}" class="badge badge-primary">Edit</a>
                <a href="{{route('admin.product.show',$item->id)}}" class="badge badge-dark text-white">Detail</a>
                <form action="{{route('admin.product.destroy',$item->id)}}" class="d-inline" method="post" id="delete{{$item->id}}">
                    @csrf
                    @method('delete')
                    <a href="#" class="badge badge-danger" onclick="confirm('Delete?') ? document.getElementById('delete{{$item->id}}').submit():false;">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}
@endsection
