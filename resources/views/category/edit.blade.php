@extends('layouts.master')
@section('title')
Edit Category
@endsection
 @section('content')
<h1>Edit Category </h1>
<form action="{{route('category.update',$category->id)}}" method="POST">
    @method('put')
    @csrf
    <div class=" mb-3">
        <label for="" class=" form-label">Category title</label>
        <input type="text" class=" form-control" name="title" value="{{$category->title}}">
    </div>
    <div class=" mb-3">
        <label for="" class=" form-label">Category description</label>
        <textarea   rows="10" class=" form-control" name="description" >{{$category->description}}</textarea>
    </div>


    <button class=" btn btn-primary"> Edit Category</button>
</form>
 @endsection

