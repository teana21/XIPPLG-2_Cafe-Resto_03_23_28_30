<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin - RTS Cafe and Resto</title>
    <link rel="stylesheet" href="{{ asset('RTS/asset/css/auth.css') }}"> <!-- Menghubungkan ke file CSS -->
</head>

<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <form id="loginForm" method="POST" action="{{ route('admin.login.auth') }}">
            @csrf
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                @error('email')
                    <p class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                @error('password')
                    <p class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>
    </div>
</body>

</html>
