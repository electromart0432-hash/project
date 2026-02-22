<?php
// Set JSON response header
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "electromart");

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Get POST data
$order_id       = isset($_POST['order_id']) ? $_POST['order_id'] : '';
$customer_name  = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
$address        = isset($_POST['address']) ? $_POST['address'] : '';
$product_id     = isset($_POST['product_id']) ? $_POST['product_id'] : '';
$product_name   = isset($_POST['product_name']) ? $_POST['product_name'] : '';
$quantity       = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$payment_status = isset($_POST['payment_status']) ? $_POST['payment_status'] : '';
$total_amount   = isset($_POST['total_amount']) ? $_POST['total_amount'] : '';

// Validate input
if (empty($order_id) || empty($customer_name) || empty($address) || empty($product_id) || empty($payment_method) || empty($payment_status) || empty($total_amount)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'All fields are required!']);
    exit;
}

// Start transaction
$conn->begin_transaction();

try {
    // Calculate unit price from total_amount / quantity
    $unit_price = floatval($total_amount) / intval($quantity);
    $total_amount_float = floatval($total_amount);
    $quantity_int = intval($quantity);
    $product_id_int = intval($product_id);

    // Insert into orders table
    $stmt_order = $conn->prepare("INSERT INTO orders 
    (order_id, customer_name, shipping_address, total_amount, payment_status, payment_method, created_at) 
    VALUES (?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt_order) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    $stmt_order->bind_param("sssdss", $order_id, $customer_name, $address, $total_amount_float, $payment_status, $payment_method);

    if (!$stmt_order->execute()) {
        throw new Exception('Order insert failed: ' . $stmt_order->error);
    }

    $order_db_id = $conn->insert_id;
    $stmt_order->close();

    // Insert into order_items table (to track product in the order)
    $stmt_item = $conn->prepare("INSERT INTO order_items 
    (order_id, product_id, quantity, price, subtotal, created_at) 
    VALUES (?, ?, ?, ?, ?, NOW())");

    if (!$stmt_item) {
        throw new Exception('Item prepare failed: ' . $conn->error);
    }

    $subtotal = $total_amount_float;
    $stmt_item->bind_param("iidid", $order_db_id, $product_id_int, $quantity_int, $unit_price, $subtotal);

    if (!$stmt_item->execute()) {
        throw new Exception('Order item insert failed: ' . $stmt_item->error);
    }

    $stmt_item->close();

    // Insert into payments table
    $stmt_payment = $conn->prepare("INSERT INTO payments 
    (order_id, payment_method, amount, status, created_at) 
    VALUES (?, ?, ?, ?, NOW())");

    if (!$stmt_payment) {
        throw new Exception('Payment prepare failed: ' . $conn->error);
    }

    $stmt_payment->bind_param("isds", $order_db_id, $payment_method, $total_amount_float, $payment_status);

    if (!$stmt_payment->execute()) {
        throw new Exception('Payment insert failed: ' . $stmt_payment->error);
    }

    $stmt_payment->close();

    // Commit transaction
    $conn->commit();

    http_response_code(200);
    echo json_encode([
        'success' => true, 
        'message' => 'Order placed successfully! Order ID: ' . $order_id,
        'order_db_id' => $order_db_id
    ]);

} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$conn->close();
?>