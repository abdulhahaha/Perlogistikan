<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management Register</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="container">
        <!-- Bagian Gambar -->
        <div class="left-image">
            <img src="{{asset('images/inventory_image.jpg')}}" alt="Inventory Illustration" class="responsive-image">
        </div>
        
        <!-- Bagian Form -->
        <div class="login-form">
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="Logo" class="logo-image">
            </div>
            <h2>Inventory Management Application</h2>
            <h3>Register</h3>

            <!-- Notifikasi Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>

            <!-- Link ke Login -->
            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
