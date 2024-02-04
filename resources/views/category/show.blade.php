@extends('layouts.master')
@section('title')
Category detail
@endsection
 @section('content')
<h1>Category detail </h1>

    <table class=" table table-bordered">
        <tr>
            <td>Title</td>
            <td>{{$category->title}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{$category->description}}</td>
        </tr>

        <tr>
            <td>Created at</td>
            <td>{{$category->created_at}}</td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>{{$category->updated_at}}</td>
        </tr>
    </table>
 @endsection


