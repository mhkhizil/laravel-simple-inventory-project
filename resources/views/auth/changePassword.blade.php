@extends('layouts.master')
@section('title')
    Change password
@endsection
@section('content')
    <h1> Change password </h1>

    <form action="{{ route('auth.passwordChange') }}" method="POST">
        @csrf


        <div class=" mb-3">
            <label for="" class=" form-label">Current Password</label>
            <input type="password" class=" form-control  @error('current_password') is-invalid @enderror"
                name="current_password">
            @error('current_password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">New Password</label>
            <input type="password" class=" form-control  @error('password') is-invalid @enderror" name="password">
            @error('password')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="" class=" form-label">Confirm Password</label>
            <input type="password" class=" form-control  @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation">
            @error('password_confirmation')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <button class=" btn btn-primary"> Change </button>
    </form>
@endsection
