@extends('admin.layout.master')

@section('content')

<a href="{{route('admin.category.create')}}" class="btn btn-sm btn-primary">Create Category</a>
<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Title</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{route('admin.category.edit',$item->id)}}" class="badge badge-primary">Edit</a>
                <form action="{{route('admin.category.destroy',$item->id)}}" class="d-inline" method="post" id="delete">
                    @csrf
                    @method('delete')
                    <a href="#" class="badge badge-danger" onclick="confirm('Delete?') ? document.getElementById('delete').submit():false;">Delete</a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}
@endsection
