@extends('user.layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{url('/info')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                    <img src="{{asset($user->image)}}" alt="" srcset="" width="100">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="mail" class="form-control" name="mail" value="{{$user->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
