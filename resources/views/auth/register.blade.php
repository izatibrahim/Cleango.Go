<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - CleanGo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --dark: #2d3436;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        body {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            transition: 0.3s;
        }

        .register-header {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .register-header i { font-size: 40px; margin-bottom: 10px; }

        .register-body { padding: 30px 40px; }

        .form-row { display: flex; gap: 15px; } /* Untuk layout menyamping jika perlu */

        .form-group { margin-bottom: 15px; position: relative; }

        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: var(--dark); font-size: 14px; }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 38px;
            color: var(--primary);
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px 10px 40px;
            border: 2px solid #eee;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
            font-size: 14px;
        }

        .form-group input:focus { border-color: var(--primary); box-shadow: 0 0 10px rgba(102, 126, 234, 0.1); }

        .register-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .register-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5); }

        .login-link { text-align: center; margin-top: 20px; font-size: 13px; color: #666; }
        .login-link a { color: var(--primary); text-decoration: none; font-weight: bold; }

        .alert-danger {
            background: #ff7675;
            color: white;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="register-card">
        <div class="register-header">
            <i class="fas fa-user-plus"></i>
            <h1>Join CleanGo</h1>
            <p>Daftar akun pengelola laundry</p>
        </div>

        <div class="register-body">
            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label>Email Resmi</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@laundry.com" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <i class="fas fa-check-double"></i>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <button type="submit" class="register-btn">DAFTAR SEKARANG</button>
            </form>

            <div class="login-link">
                Sudah punya akun admin? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

</body>
</html>