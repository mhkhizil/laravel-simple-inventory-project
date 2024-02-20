@extends('layouts.master')
@section('title')
    login page
@endsection
@section('content')
    <h1>Student login </h1>
    @if (session("message"))
    <div class=" alert alert-success">
        {{session("message")}}
    </div>


    @endif
    @extends('layouts.master')
@section('title')
    register page
@endsection
@section('content')
    <h1>Student register </h1>
    <form action="{{ route('auth.check') }}" method="POST">
        @csrf

        <div class=" mb-3">
            <label for="" class=" form-label">Email</label>
            <input type="text" class=" form-control  @error('email') is-invalid @enderror" name="email" value="{{old("email")}}">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Password</label>
            <input type="password" class=" form-control  @error('password') is-invalid @enderror" name="password" >
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <button class=" btn btn-primary">  Log in</button>
    </form>
@endsection


@endsection
