<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables
$order_success = false;
$order_id = 0;
$method = '';
$message = '';
$name = '';
$total = 0;

$conn = mysqli_connect("localhost","root","","electromart");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_POST['shipping_name'])){

    $full_name = isset($_POST['shipping_name']) ? $_POST['shipping_name'] : '';
    $address = isset($_POST['shipping_address']) ? $_POST['shipping_address'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : 'Not Specified';
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : 'Order';
    $product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    $total_amount = isset($_POST['total_amount']) ? floatval($_POST['total_amount']) : 0;
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    

    // Validate required fields
    if(empty($full_name) || empty($address) || empty($payment_method) || $total_amount <= 0){
        $message = "Error: Please fill all required fields (Name, Address, Payment Method)";
    } else {
        // Use correct column names for the orders table
        $stmt = $conn->prepare("INSERT INTO orders 
        (full_name, address, city, payment_method, total_amount) 
        VALUES (?, ?, ?, ?, ?)");

        if(!$stmt){
            $message = "Database Error: " . $conn->error;
        } else {
            $stmt->bind_param("ssssd", 
            $full_name, 
            $address, 
            $city, 
            $payment_method,
            $total_amount
            );

            if($stmt->execute()){
                $order_success = true;
                $order_id = $stmt->insert_id;
                $method = $payment_method;
                $name = $full_name;
                $total = $total_amount;
                
                // Set message based on payment method
                if($payment_method == 'cod'){
                    $message = 'Your order has been confirmed! Pay when the product arrives at your doorstep.';
                } else {
                    $message = 'Your order has been confirmed! Payment received successfully.';
                }
            } else {
                $message = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $order_success ? 'Order Confirmed' : 'Order Error'; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2658b6, #0e295c, #2658b6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
            animation: popIn 0.5s;
        }
        @keyframes popIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
            margin: 0 0 10px;
        }
        p {
            color: #666;
            line-height: 1.5;
        }
        .details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
        .details p {
            margin: 8px 0;
        }
        .btn {
            background: #2ecc71;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.4);
        }
        .error-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
            border-left: 5px solid #e74c3c;
        }
        .error-card h1 {
            color: #e74c3c;
        }
        .btn-error {
            background: #e74c3c;
        }
        .btn-error:hover {
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
    </style>
</head>
<body>

    <?php if($order_success): ?>
        <div class="card">
            <div class="icon">
                <?php echo ($method == 'cod') ? '🚚' : '✅'; ?>
            </div>
            <h1>Order Confirmed!</h1>
            <p><?php echo htmlspecialchars($message); ?></p>
            
            <div class="details">
                <p><strong>Order ID:</strong> #EM<?php echo $order_id; ?></p>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                <p><strong>Amount:</strong> ₹<?php echo number_format($total, 2); ?></p>
                <p><strong>Payment Mode:</strong> <?php echo strtoupper(str_replace('_', ' ', $method)); ?></p>
            </div>

            <a href="contact.html" class="btn" onclick="clearCart()">Continue Shopping</a>
        </div>
    <?php else: ?>
        <div class="error-card">
            <div class="icon">❌</div>
            <h1>Order Error</h1>
            <p>There was an issue processing your order. Please try again.</p>
            <p style="color: #e74c3c; font-size: 12px;"><?php echo htmlspecialchars($message); ?></p>
            <a href="payment.html" class="btn btn-error">Go Back</a>
        </div>
    <?php endif; ?>

    <script>
        // Clear the cart on successful order
        function clearCart() {
            localStorage.removeItem('cart');
            localStorage.removeItem('checkoutTotal');
            window.location.href = 'index.html';
        }
    </script>
</body>
</html>
