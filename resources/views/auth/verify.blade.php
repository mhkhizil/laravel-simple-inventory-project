@extends('layouts.master')
@section('title')
    Verify
@endsection
@section('content')
    <h1> Verify</h1>

    <form action="{{ route("auth.verify") }}" method="POST">
        @csrf


        <div class=" mb-3">
            <label for="" class=" form-label">Verification code</label>
            <input type="password" class=" form-control  @error('verify_code') is-invalid @enderror"
                name="verify_code">
            @error('verify_code')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>





        <button class=" btn btn-primary"> Verify </button>
    </form>
@endsection
