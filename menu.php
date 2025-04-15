<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f2f2f2, #e6e6e6);
            color: #333;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            font-size: 3em;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        #menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: auto;
        }

        #menu > div {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #menu > div:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        #menu img {
            width: 50%;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        #menu h3 {
            font-size: 1.5em;
            color: #34495e;
            margin-bottom: 10px;
        }

        #menu p {
            font-size: 1em;
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
            font-size: 1.1em;
            margin-bottom: 15px;
        }

        button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            align-self: flex-start;
        }

        button:hover {
            background-color: #219150;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 50px;
            font-size: 1.2em;
            font-weight: bold;
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Menu</h1>
    <div id="menu">
        <?php
        $result = $conn->query("SELECT * FROM menu_items");
        while($row = $result->fetch_assoc()) {
            echo "<div>
                    <img src='{$row['image']}' alt='{$row['name']}'>
                    <h3>{$row['name']}</h3>
                    <p>{$row['description']}</p>
                    <p class='price'>Price: ₹{$row['price']}</p>
                    <button onclick='addToCart(".json_encode($row).")'>Add to Cart</button>
                  </div>";
        }
        ?>
    </div>
    <a href='cart.html'>Go to Cart</a>

    <script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    function addToCart(item) {
        item.quantity = 1;
        cart.push(item);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert("Item added!");
    }
    </script>
</body>
</html>