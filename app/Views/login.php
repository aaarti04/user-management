<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #ffffffff, #e5e5e5ff);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            width: 360px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .login-box h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .login-box label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        .login-box input:focus {
            border-color: #667eea;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #667eea;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-box button:hover {
            background: #5a67d8;
        }

        .error {
            background: #ffe6e6;
            color: #d8000c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?= esc($error) ?></div>
        <?php endif; ?>

        <form action="/login" method="post">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>

        <div class="footer-text">
            © <?= date('Y') ?> Your Company
        </div>
    </div>

</body>
</html>
