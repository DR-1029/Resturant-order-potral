<?php
session_start();
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #d4fc79, #96e6a1);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-container {
            background: white;
            padding: 60px 40px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 500px;
            width: 90%;
            animation: fadeIn 0.5s ease-in-out;
        }

        .confirmation-container h2 {
            font-size: 2.2em;
            color: #2f855a;
            margin-bottom: 20px;
        }

        .confirmation-container p {
            font-size: 1.1em;
            color: #4a5568;
            margin-bottom: 30px;
        }

        a {
            text-decoration: none;
            background: linear-gradient(to right, #38b2ac, #3182ce);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1em;
            transition: 0.3s ease;
            display: inline-block;
        }

        a:hover {
            background: linear-gradient(to right, #3182ce, #2b6cb0);
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h2>Thank You for Your Order!</h2>
        <p>Your delicious meal is on its way. We hope you enjoy it!</p>
        <a href="menu.php">Back to Menu</a>
    </div>
</body>
</html>