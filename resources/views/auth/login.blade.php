<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
                    <!-- Tambahkan link register di sini -->
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
