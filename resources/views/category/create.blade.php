@extends('layouts.master')
@section('title')
Create Category
@endsection
 @section('content')
<h1>Create Category </h1>
<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Category title</label>
        <input type="text" class=" form-control" name="title">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Category description</label>
        <textarea   rows="10" class=" form-control" name="description"></textarea>
    </div>


    <button class=" btn btn-primary"> Create Category</button>
</form>
 @endsection

