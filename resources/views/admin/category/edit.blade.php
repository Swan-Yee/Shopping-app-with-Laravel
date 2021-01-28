@extends('admin.layout.master')

@section('content')
<h1>Edit The Category</h1>
<form action="{{route('admin.category.update',$category->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
    </div>
    <div class="form-group">
        <input type="submit" value="Update!" class="btn btn-dark">
    </div>
</form>
@endsection
