@extends('layouts.master')
@section('title')
    register page
@endsection
@section('content')
    <h1>Student register </h1>
    <form action="{{ route('auth.store') }}" method="POST">
        @csrf
        <div class=" mb-3">
            <label for="" class=" form-label">Name</label>
            <input type="text" class=" form-control  @error('name') is-invalid @enderror" name="name" value="{{old("name")}}">
            @error('name')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Email</label>
            <input type="text" class=" form-control  @error('email') is-invalid @enderror" name="email" value="{{old("email")}}">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Password</label>
            <input type="text" class=" form-control  @error('password') is-invalid @enderror" name="password" value="{{old("password")}}">
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Confirm Password</label>
            <input type="text" class=" form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            @error('password_confirmation')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button class=" btn btn-primary"> Register Student</button>
    </form>
@endsection
