<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/inbound.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        /* Styling untuk tombol logout */
        .btn-logout {
            background-color: #f1f1f1;
            border: none;
            padding: 10px;
            cursor: pointer;
            text-decoration: none;
            color: black;
        }

        .btn-logout:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>
</body>
</html>
