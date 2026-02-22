<?php
header('Content-Type: application/json');
include 'db.php';

// Test database connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed: ' . $conn->connect_error]));
}

// Show database status
$result = $conn->query("SELECT COUNT(*) as count FROM orders");
$orders_count = $result->fetch_assoc()['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM users");
$users_count = $result->fetch_assoc()['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM products");
$products_count = $result->fetch_assoc()['count'];

echo json_encode([
    'success' => true,
    'database' => 'electromart',
    'tables' => [
        'orders' => intval($orders_count),
        'users' => intval($users_count),
        'products' => intval($products_count)
    ]
]);

$conn->close();
?>
