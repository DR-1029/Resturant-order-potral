<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f7fafc, #edf2f7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-box {
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 0.4s ease;
        }

        .register-box h2 {
            margin-bottom: 25px;
            color: #2d3748;
        }

        input {
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
            background: linear-gradient(to right, #68d391, #48bb78);
            border: none;
            color: white;
            font-size: 1em;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(to right, #48bb78, #38a169);
        }

        .message {
            margin-top: 20px;
            font-weight: bold;
        }

        .success {
            color: #38a169;
        }

        .error {
            color: #e53e3e;
        }

        a {
            color: #3182ce;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST">
            <input name="name" required placeholder="Name">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <button type="submit">Register</button>
        </form>

        <?php
        if ($_POST) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // Check if email already exists
            $check = $conn->query("SELECT * FROM users WHERE email='$email'");
            if ($check->num_rows > 0) {
                echo "<div class='message error'>Email already registered.</div>";
            } else {
                $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
                echo "<div class='message success'>Registered! <a href='login.php'>Login now</a></div>";
            }
        }
        ?>
    </div>
</body>
</html>