@extends('admin.layout.master')

@section('content')

<table class="table table-striped mt-2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Order Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <img src="{{asset($item->image)}}" alt="" srcset="" width="100">
            </td>
            <td>
                {{$item->order_count}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
