@extends('layouts.master')
@section('title')
Item list
@endsection
 @section('content')
<h1>Item list </h1>
<table class=" table table-borderless">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Price</td>
            <td>Stock</td>

        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->stock}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class=" text-center  mt-5">
                There is no record <br>
                <a class=" btn btn-sm btn-primary" href="{{route('item.create')}}">Create Item</a>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

 @endsection


