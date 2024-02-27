<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <section class=" container">
        <div class=" row">
            <div class=" col-12">
                @include('layouts.header')
            </div>
            <div class=" col-12 col-md-3">
                @include('layouts.navbar')
            </div>
            <div class=" col-12 col-md-9">
                @user
                 @if (is_null(session("auth")->email_verified_at))
                 <div class=" alert alert-info">
                    Verify account <a href="{{route("auth.verifyUI")}}" class=" alert alert-link">Here</a>
                </div>
                 @endif
                @enduser
                @yield('content')
            </div>
        </div>
    </section>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
