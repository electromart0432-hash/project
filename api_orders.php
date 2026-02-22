<?php
header('Content-Type: application/json');
include 'db.php';

$action = $_GET['action'] ?? 'list';

if ($action === 'list') {
    $sql = "SELECT id, full_name, address, city, payment_method, total_amount, order_date FROM orders ORDER BY order_date DESC";
    $result = $conn->query($sql);
    $orders = [];
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }
    
    echo json_encode([
        'success' => true,
        'count' => count($orders),
        'data' => $orders
    ]);
} else if ($action === 'stats') {
    // Get order count
    $result = $conn->query("SELECT COUNT(*) as count FROM orders");
    $order_count = $result ? $result->fetch_assoc()['count'] : 0;
    
    // Get total revenue
    $result = $conn->query("SELECT SUM(total_amount) as total FROM orders");
    $row = $result ? $result->fetch_assoc() : ['total' => 0];
    $total_revenue = $row['total'] ?? 0;
    
    // Get cities count
    $result = $conn->query("SELECT COUNT(DISTINCT city) as count FROM orders");
    $cities_count = $result ? $result->fetch_assoc()['count'] : 0;
    
    echo json_encode([
        'success' => true,
        'order_count' => intval($order_count),
        'total_revenue' => number_format(floatval($total_revenue), 2),
        'cities_count' => intval($cities_count)
    ]);
} else if ($action === 'add') {
    $name = $_POST['name'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $payment = $_POST['payment'] ?? 'COD';
    $amount = $_POST['amount'] ?? 0;
    $order_date = date('Y-m-d H:i:s');
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (full_name, address, city, payment_method, total_amount, order_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds", $name, $address, $city, $payment, $amount, $order_date);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Order added successfully']);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }
    $stmt->close();
}

$conn->close();
?>
