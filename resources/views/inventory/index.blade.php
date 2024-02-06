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
            <td>Control</td>

        </tr>
    </thead>
    <tbody>
        @forelse ($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->stock}}</td>
            <td>
                <a  class=" btn btn-sm  btn-outline-info" href="{{route("item.show",$item->id)}}"> detail</a>
                <a href="{{route("item.edit",$item->id)}}" class=" btn btn-sm  btn-outline-success">edit</a>
                <form method="post" class=" d-inline-block" action="{{route("item.destroy",$item->id)}}">
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
                <a class=" btn btn-sm btn-primary" href="{{route('item.create')}}">Create Item</a>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$items->onEachSide(1)->links()}}
 @endsection


