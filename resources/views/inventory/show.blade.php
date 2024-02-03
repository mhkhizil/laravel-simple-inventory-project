@extends('layouts.master')
@section('title')
Item list
@endsection
 @section('content')
<h1>Item detail </h1>

    <table class=" table table-bordered">
        <tr>
            <td>Name</td>
            <td>{{$item->name}}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>{{$item->price}}</td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>{{$item->stock}}</td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>{{$item->created_at}}</td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>{{$item->updated_at}}</td>
        </tr>
    </table>
 @endsection


