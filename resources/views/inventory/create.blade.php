@extends('layouts.master')
@section('title')
    Create Item
@endsection
@section('content')
    <h1>Create Item </h1>
    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label for="" class=" form-label">Item name</label>
            <input type="text" class=" form-control @error('name') is-invalid @enderror" name="name"
                value={{ old('name') }}>
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item price</label>
            <input type="number" class=" form-control @error('price') is-invalid @enderror" name="price"
                value={{ old('price') }}>
            @error('price')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Item stock</label>
            <input type="number" class=" form-control @error('stock') is-invalid @enderror" name="stock"
                value={{ old('stock') }}>
            @error('stock')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class=" btn btn-primary"> Create Item</button>
    </form>
@endsection
