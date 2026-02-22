<?php
header('Content-Type: application/json');
include 'db.php';

$action = $_GET['action'] ?? 'list';

if ($action === 'list') {
    $sql = "SELECT id, product_name, price, stock_quantity FROM products ORDER BY id DESC";
    $result = $conn->query($sql);
    $products = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    
    echo json_encode([
        'success' => true,
        'count' => count($products),
        'data' => $products
    ]);
} else if ($action === 'stats') {
    // Get product count
    $result = $conn->query("SELECT COUNT(*) as count FROM products");
    $product_count = $result ? $result->fetch_assoc()['count'] : 0;
    
    echo json_encode([
        'success' => true,
        'product_count' => intval($product_count),
        'categories' => []
    ]);
}

$conn->close();
?>
