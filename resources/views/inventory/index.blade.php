@extends('layouts.master')
@section('title')
    Item list
@endsection
@section('content')
    <h1>Item list </h1>
    @if (request()->has('keyword'))
        Search result by "<span class="  fw-bold  fst-italic">{{ request()->keyword }}</span>"
    @endif
    @if (session('status'))
        <div class=" alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="  row justify-content-between mb-3">
        <div class=" col-md-3">
            <a href="{{ route('item.create') }}" class=" btn btn-outline-primary">Create</a>
        </div>
        <div class="  col-md-5">
            <form action="{{ route('item.index') }}" method="GET">
                <div class=" input-group ">
                    <input type="text" class=" form-control" name="keyword"
                        @if (request()->has('keyword')) {
                        value="{{ request()->keyword }}"
                    } @endif>
                    @if (request()->has('keyword'))
                        <a href="{{ route('item.index') }}" class=" btn btn-danger">Clear</a>
                    @endif
                    <button class=" btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class=" table table-borderless">
        <thead>
            <tr>
                <td>#</td>
                <td>Name
                    <a class=" btn btn-outline-primary" href="{{ route('item.index',['name'=>'asc']) }}">ASC</a>
                    <a class=" btn btn-outline-primary" href="{{ route('item.index',['name'=>'desc']) }}">DESC</a>
                    <a class=" btn btn-outline-primary" href="{{ route('item.index') }}">Clear</a>
                </td>
                <td>Price</td>
                <td>Stock</td>
                <td>Control</td>

            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a class=" btn btn-sm  btn-outline-info" href="{{ route('item.show', $item->id) }}"> detail</a>
                        <a href="{{ route('item.edit', $item->id) }}" class=" btn btn-sm  btn-outline-success">edit</a>
                        <form method="post" class=" d-inline-block" action="{{ route('item.destroy', $item->id) }}">
                            @method('delete')
                            @csrf
                            <button class=" btn btn-sm btn-outline-danger">delete</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class=" text-center  mt-5">
                        <p> There is no record</p> <br>
                        <a class=" btn btn-sm btn-primary" href="{{ route('item.create') }}">Create Item</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $items->onEachSide(1)->links() }}
@endsection
