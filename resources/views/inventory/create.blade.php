@extends('layouts.master')
@section('title')
Create Item
@endsection
 @section('content')
<h1>Create Item </h1>
<form action="{{route('item.store')}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Item name</label>
        <input type="text" class=" form-control" name="name">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Item price</label>
        <input type="number" class=" form-control" name="price">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Item stock</label>
        <input type="number" class=" form-control" name="stock">
    </div>
    <button class=" btn btn-primary"> Create Item</button>
</form>
 @endsection

