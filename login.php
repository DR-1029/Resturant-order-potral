<?php include 'db.php'; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #cbd5e0, #edf2f7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease;
        }

        .login-box h2 {
            margin-bottom: 30px;
            color: #2d3748;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            font-size: 1em;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: linear-gradient(to right, #4299e1, #3182ce);
            border: none;
            color: white;
            border-radius: 10px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #3182ce, #2b6cb0);
        }

        .error {
            margin-top: 15px;
            color: #e53e3e;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Customer Login</h2>
        <form method="POST">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <button type="submit">Login</button>
        </form>

        <?php
        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $res = $conn->query("SELECT * FROM users WHERE email='$email'");
            $user = $res->fetch_assoc();
            if ($user && password_verify($password, $user['password'])) {
                echo "<script>localStorage.setItem('user_id', '{$user['id']}'); window.location.href='menu.php';</script>";
            } else {
                echo "<div class='error'>Login failed! Invalid credentials.</div>";
            }
        }
        ?>
    </div>
</body>
</html>