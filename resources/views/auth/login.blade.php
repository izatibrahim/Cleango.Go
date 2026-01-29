<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - CleanGo</title>
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
            transition: 0.3s;
        }

        .login-header {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .login-header i { font-size: 50px; margin-bottom: 10px; }

        .login-body { padding: 40px; }

        .form-group { margin-bottom: 20px; position: relative; }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 42px;
            color: var(--primary);
        }

        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: var(--dark); }

        .form-group input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 2px solid #eee;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus { border-color: var(--primary); box-shadow: 0 0 10px rgba(102, 126, 234, 0.2); }

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
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .login-btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(102, 126, 234, 0.6); }
        .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--dark);
        }
        .login-link a {
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
            <i class="fas fa-soap"></i>
            <h1>CleanGo</h1>
            <p>Laundry Management System</p>
        </div>

        <div class="login-body">
            @if ($errors->any())
                <div class="alert-danger">
                    @foreach ($errors->all() as $error)
                        <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@cleango.com" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="login-btn">MASUK SEKARANG</button>
            </form>

            <div class="login-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>

</body>
</html>