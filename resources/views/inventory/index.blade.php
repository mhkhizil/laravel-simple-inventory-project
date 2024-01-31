@extends('layouts.master')
@section('title')
Item list
@endsection
 @section('content')
<h1>Item list </h1>
<form action="">
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
</form>

 @endsection


