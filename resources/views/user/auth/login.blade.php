@extends('user.layout.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('user.login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="mail" class="form-control" name="mail">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
