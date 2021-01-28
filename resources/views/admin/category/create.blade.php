@extends('admin.layout.master')

@section('content')
<h1>Create The Category</h1>
<form action="{{route('admin.category.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Register!" class="btn btn-dark">
    </div>
</form>
@endsection
