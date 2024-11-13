<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/inbound.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif; /* Mengubah font menjadi Poppins */
        background-color: #f5f7fa; /* Latar belakang yang lebih lembut */
        color: #333;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(90deg, #4a90e2, #9013fe); /* Gradien tetap */
        padding: 15px 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Memperhalus bayangan */
        border-radius: 0 0 15px 15px; /* Menambahkan border radius pada bagian bawah */
    }

    .logo {
        color: #fff;
        font-size: 28px; /* Ukuran font yang lebih besar */
        font-weight: bold;
        font-family: 'Poppins', sans-serif;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    nav ul li {
        position: relative;
        margin-left: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 50px; /* Mengubah bentuk tombol menjadi lebih bulat */
        transition: background 0.4s ease, transform 0.2s; /* Menambahkan transisi halus */
    }

    nav ul li a:hover {
        background-color: rgba(255, 255, 255, 0.3);
        transform: scale(1.05); /* Menambahkan efek zoom sedikit pada hover */
    }

    .dropdown {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: #4a90e2;
        padding: 10px 0;
        border-radius: 10px; /* Border-radius lebih lembut */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk dropdown */
        z-index: 10;
    }

    nav ul li:hover .dropdown {
        display: block;
    }

    .dropdown li a {
        padding: 10px 20px;
        color: #fff;
    }

    .btn-logout {
        background-color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        color: #4a90e2;
        border-radius: 50px; /* Tombol bulat */
        transition: background 0.3s ease, transform 0.2s; /* Transisi halus */
    }

    .btn-logout:hover {
        background-color: #ddd;
        transform: scale(1.05); /* Efek zoom pada hover */
    }

    .language-switcher a {
        text-decoration: none;
        color: #4a90e2;
        padding: 10px;
        border-radius: 50px; /* Menambahkan border radius */
        transition: background 0.3s ease, transform 0.2s; /* Transisi halus */
    }

    .language-switcher a:hover {
        background-color: rgba(74, 144, 226, 0.1);
        transform: scale(1.05); /* Efek zoom pada hover */
    }

    main {
        padding: 30px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 15px; /* Sudut membulat */
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05); /* Bayangan lembut */
        max-width: 1200px; /* Maksimal lebar untuk konten agar lebih elegan */
    }

    /* Animasi Fade-In */
    body {
        opacity: 0;
        animation: fadeIn 1s ease-in forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
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
