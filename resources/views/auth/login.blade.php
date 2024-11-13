<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif; /* Mengganti font ke Poppins */
        background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradasi warna latar belakang */
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Pusatkan konten secara vertikal */
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih transparan */
        border-radius: 15px; /* Sudut membulat */
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
        padding: 20px;
        max-width: 900px; /* Lebar maksimal */
        width: 100%;
    }

    .left-image {
        flex: 1;
        background: url('{{asset('images/inventory_image.jpg')}}') no-repeat center center;
        background-size: cover;
        border-radius: 15px 0 0 15px; /* Sudut membulat hanya di sisi kiri */
        min-width: 400px;
        margin-bottom: 20px;
    }

    .login-form {
        flex: 1;
        background-color: #fff;
        border-radius: 0 15px 15px 0; /* Sudut membulat hanya di sisi kanan */
        padding: 40px;
        box-shadow: none;
        max-width: 400px;
    }

    .logo img {
        display: block;
        margin: 0 auto 20px;
        max-width: 120px; /* Mengubah ukuran logo agar lebih kecil */
    }

    h2 {
        text-align: center;
        color: #2575fc; /* Warna judul */
        font-weight: 600;
    }

    p {
        text-align: center;
        color: #666;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: 500;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Transisi untuk input */
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #2575fc;
        box-shadow: 0 0 8px rgba(37, 117, 252, 0.2); /* Efek glow saat fokus */
        outline: none;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .form-check-input {
        margin-right: 10px;
    }

    button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradasi warna untuk tombol */
        color: #fff;
        border: none;
        border-radius: 50px; /* Membulatkan tombol */
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.3s ease, transform 0.2s; /* Transisi animasi */
    }

    button:hover {
        background: linear-gradient(135deg, #5b0ea3, #1f5dc9); /* Warna lebih gelap saat hover */
        transform: scale(1.05); /* Sedikit zoom saat hover */
    }

    .forgot-password {
        display: block;
        text-align: center;
        margin: 10px 0;
        color: #2575fc;
        text-decoration: none;
        font-weight: 500;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .form-group p {
        text-align: center;
    }

    .form-group a {
        color: #2575fc;
        text-decoration: none;
    }

    .form-group a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .left-image {
            height: 200px;
            border-radius: 15px 15px 0 0; /* Sudut membulat di bagian atas */
        }

        .login-form {
            border-radius: 0 0 15px 15px; /* Sudut membulat di bagian bawah */
            padding: 30px;
        }
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
    <div class="container">
        <div class="left-image">
            <img src="{{asset('images/inventory_image.jpg')}}" alt="Inventory Illustration">
        </div>
        <div class="login-form">
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="Logo">
            </div>
            <h2>Inventory Management Application</h2>
            <p>Please Login</p>

            <!-- Tampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tampilkan pesan error jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                
                <button type="submit">Login</button>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                <div class="form-group">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
