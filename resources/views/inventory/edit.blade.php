@extends('layouts.master')
@section('title')
    Edit Item
@endsection
@section('content')
    <h1>Edit Item </h1>
    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @method('put')
        @csrf
        <div class=" mb-3">
            <label for="" class=" form-label">Item name</label>
            <input value="{{ old("name",$item->name)  }}" type="text" class=" form-control @error('name') is-invalid @enderror"
                name="name">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item price</label>
            <input value="{{ old("price",$item->price)  }}" type="number" class=" form-control @error('price') is-invalid @enderror"
                name="price">
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item stock</label>
            <input value="{{ old("stock",$item->stock ) }}" type="number" class=" form-control @error('stock') is-invalid @enderror"
                name="stock">
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class=" btn btn-primary"> Update Item</button>
    </form>
@endsection
