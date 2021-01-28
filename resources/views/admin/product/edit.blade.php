@extends('admin.layout.master')

@section('content')
<h1>Edit The Product</h1>
<form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="">{{$product->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label for="name">Categroy</label>
        <select class="browser-default custom-select" name="category">
            @foreach ($categories as $item)
                <option value="{{$item->id}}" @if ($product->category_id==$item->id) selected  @endif >{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="image">Choose Product Image</label>
        <input type="file" class="form-control" id="image" name="image"/>
    </div>
    <div class="form-group">
        <img src="{{asset($product->image)}}" alt="" srcset="" width="100">
    </div>
    <div class="form-group">
        <input type="submit" value="Update!" class="btn btn-dark">
    </div>
</form>
@endsection
