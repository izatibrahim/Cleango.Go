<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CleanGo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-dark: #7C3AED;
            --secondary: #EC4899;
            --dark: #1F2937;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        body {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .login-header i { font-size: 50px; margin-bottom: 10px; }
        .login-header h1 { font-size: 28px; margin: 10px 0 5px; }

        .login-body { padding: 40px; }

        .form-group { margin-bottom: 18px; position: relative; }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 42px;
            color: var(--primary);
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 2px solid #eee;
            border-radius: 10px;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .daftar-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .daftar-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .alert-danger {
            background: #ff7675;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <i class="fas fa-user-plus"></i>
        <h1>Daftar Akun</h1>
    </div>

    <div class="login-body">

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM REGISTER --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <i class="fas fa-user"></i>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="login-btn">
                <i class="fas fa-user-check"></i> Daftar
            </button>
        </form>

        <div class="daftar-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>

    </div>
</div>

</body>
</html>
