@extends('layouts.master')
@section('title')
Edit Item
@endsection
 @section('content')
<h1>Edit Item </h1>
<form action="{{route('item.update',$item->id)}}" method="POST">
    @method('put')
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Item name</label>
        <input value="{{$item->name}}" type="text" class=" form-control" name="name">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Item price</label>
        <input value="{{$item->price}}" type="number" class=" form-control" name="price">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Item stock</label>
        <input value="{{$item->stock}}" type="number" class=" form-control" name="stock">
    </div>
    <button class=" btn btn-primary"> Update Item</button>
</form>
 @endsection

