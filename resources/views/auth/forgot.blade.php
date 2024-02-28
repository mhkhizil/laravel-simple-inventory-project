@extends('layouts.master')
@section('title')
    Forgot password
@endsection
@section('content')
    <h1> Forgot password</h1>

    <form action="{{ route('auth.checkEmail') }}" method="POST">
        @csrf


        <div class=" mb-3">
            <label for="" class=" form-label">Enter your email</label>
            <input type="email" class=" form-control  @error('email') is-invalid @enderror" name="email">
            @error('email')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>





        <button class=" btn btn-primary"> Reset </button>
    </form>
@endsection
