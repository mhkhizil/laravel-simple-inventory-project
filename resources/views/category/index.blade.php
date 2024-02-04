@extends('layouts.master')
@section('title')
Category list
@endsection
 @section('content')
<h1>Category list </h1>
<table class=" table table-borderless">
    <thead>
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Description</td>

            <td>Control</td>

        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>

            <td>{{Str::limit($category->description,20)}}</td>
            <td>
                <a  class=" btn btn-sm  btn-outline-info" href="{{route("category.show",$category->id)}}"> detail</a>
                <a href="{{route("category.edit",$category->id)}}" class=" btn btn-sm  btn-outline-success">edit</a>
                <form method="post" class=" d-inline-block" action="{{route("category.destroy",$category->id)}}">
                    @method('delete')
                    @csrf
                    <button class=" btn btn-sm btn-outline-danger">delete</button>
                    </form>
            </td>

        </tr>
        @empty
        <tr>
            <td colspan="5" class=" text-center  mt-5">
              <p>  There is no record</p> <br>
                <a class=" btn btn-sm btn-primary" href="{{route('category.create')}}">Create Category</a>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

 @endsection


