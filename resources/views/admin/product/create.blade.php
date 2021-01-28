@extends('admin.layout.master')

@section('content')
<h1>Create The Product</h1>
<form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Categroy</label>
        <select class="browser-default custom-select" name="category">
            <option selected value="">Open this select menu</option>
            @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="image">Choose Product Image</label>
        <input type="file" class="form-control" id="image" name="image"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Register!" class="btn btn-dark">
    </div>
</form>
@endsection
