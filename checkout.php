<?php
include 'db.php';

// Get the incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);

$user_id = $data['user_id'];
$cart = $data['cart'];

if (!$user_id || !is_array($cart)) {
    http_response_code(400);
    echo "Invalid request data";
    exit;
}

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert into orders table
$orderStmt = $conn->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
$orderStmt->bind_param("id", $user_id, $total);
$orderStmt->execute();
$order_id = $conn->insert_id;

// Insert each item into order_items table
$itemStmt = $conn->prepare("INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES (?, ?, ?)");

foreach ($cart as $item) {
    $menu_item_id = $item['id'];
    $quantity = $item['quantity'];
    $itemStmt->bind_param("iii", $order_id, $menu_item_id, $quantity);
    $itemStmt->execute();
}

$orderStmt->close();
$itemStmt->close();
$conn->close();

echo "Order placed successfully!";
?>