<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Orders Management</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0e295c;
            margin-bottom: 30px;
            text-align: center;
        }

        .filter-section {
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-section input,
        .filter-section select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-section button {
            padding: 10px 20px;
            background: #2658b6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .filter-section button:hover {
            background: #1e4589;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background: #0e295c;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:hover {
            background: #f9f9f9;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .status-failed {
            background: #f8d7da;
            color: #721c24;
        }

        .view-btn {
            background: #17a2b8;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .view-btn:hover {
            background: #138496;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .order-detail-item {
            display: grid;
            grid-template-columns: 200px 1fr;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .order-detail-item strong {
            color: #0e295c;
        }

        .message {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
        }

        .message-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border-left: 4px solid #0e295c;
        }

        .stat-card h3 {
            color: #0e295c;
            margin-bottom: 10px;
        }

        .stat-card .value {
            font-size: 28px;
            font-weight: bold;
            color: #2658b6;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📦 Orders Management Dashboard</h1>

        <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "electromart");

        // Check connection
        if ($conn->connect_error) {
            echo '<div class="message message-error">Connection failed: ' . $conn->connect_error . '</div>';
            exit;
        }

        // Get filter parameters
        $filter_status = isset($_GET['status']) ? $_GET['status'] : '';
        $filter_date = isset($_GET['date']) ? $_GET['date'] : '';
        $search_query = isset($_GET['search']) ? $_GET['search'] : '';

        // Build query
        $sql = "SELECT o.id as order_id, o.order_id, o.customer_name, o.shipping_address, 
                       o.total_amount, o.payment_status, o.created_at, o.payment_method,
                       oi.product_id, oi.quantity, oi.price, oi.subtotal
                FROM orders o
                LEFT JOIN order_items oi ON o.id = oi.order_id
                WHERE 1=1";

        if ($filter_status) {
            $sql .= " AND o.payment_status = '" . $conn->real_escape_string($filter_status) . "'";
        }

        if ($filter_date) {
            $sql .= " AND DATE(o.created_at) = '" . $conn->real_escape_string($filter_date) . "'";
        }

        if ($search_query) {
            $search = $conn->real_escape_string($search_query);
            $sql .= " AND (o.order_id LIKE '%$search%' OR o.customer_name LIKE '%$search%')";
        }

        $sql .= " ORDER BY o.created_at DESC";

        $result = $conn->query($sql);

        if (!$result) {
            echo '<div class="message message-error">Query Error: ' . $conn->error . '</div>';
            exit;
        }

        // Get statistics
        $stats_sql = "SELECT 
                      COUNT(DISTINCT o.id) as total_orders,
                      SUM(o.total_amount) as total_revenue,
                      COUNT(CASE WHEN o.payment_status = 'completed' THEN 1 END) as completed_orders,
                      COUNT(CASE WHEN o.payment_status = 'pending' THEN 1 END) as pending_orders
                      FROM orders o";
        $stats = $conn->query($stats_sql)->fetch_assoc();
        ?>

        <!-- Statistics Section -->
        <div class="stats">
            <div class="stat-card">
                <h3>Total Orders</h3>
                <div class="value"><?php echo $stats['total_orders']; ?></div>
            </div>
            <div class="stat-card">
                <h3>Total Revenue</h3>
                <div class="value">₹<?php echo number_format($stats['total_revenue'] ?? 0, 0); ?></div>
            </div>
            <div class="stat-card">
                <h3>Completed</h3>
                <div class="value"><?php echo $stats['completed_orders']; ?></div>
            </div>
            <div class="stat-card">
                <h3>Pending</h3>
                <div class="value"><?php echo $stats['pending_orders']; ?></div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" style="display:flex; gap: 10px; flex-wrap: wrap; width: 100%;">
                <input type="text" name="search" placeholder="Search by Order ID or Customer Name" value="<?php echo htmlspecialchars($search_query); ?>">
                <select name="status">
                    <option value="">All Status</option>
                    <option value="pending" <?php echo $filter_status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="completed" <?php echo $filter_status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="failed" <?php echo $filter_status == 'failed' ? 'selected' : ''; ?>>Failed</option>
                </select>
                <input type="date" name="date" value="<?php echo htmlspecialchars($filter_date); ?>">
                <button type="submit">🔍 Filter</button>
                <a href="orders_view.php" style="padding: 10px 20px; background: #6c757d; color: white; border-radius: 5px; text-decoration: none;">Clear</a>
            </form>
        </div>

        <!-- Orders Table -->
        <?php
        if ($result->num_rows > 0) {
            // Group orders by order_id
            $orders = array();
            while ($row = $result->fetch_assoc()) {
                $oid = $row['order_id'];
                if (!isset($orders[$oid])) {
                    $orders[$oid] = array(
                        'id' => $row['order_id'],
                        'customer_name' => $row['customer_name'],
                        'address' => $row['shipping_address'],
                        'total_amount' => $row['total_amount'],
                        'payment_status' => $row['payment_status'],
                        'payment_method' => $row['payment_method'],
                        'created_at' => $row['created_at'],
                        'items' => array()
                    );
                }
                if ($row['product_id']) {
                    $orders[$oid]['items'][] = array(
                        'product_id' => $row['product_id'],
                        'quantity' => $row['quantity'],
                        'price' => $row['price'],
                        'subtotal' => $row['subtotal']
                    );
                }
            }
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Amount (₹)</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><strong><?php echo $order['id']; ?></strong></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><strong>₹<?php echo number_format($order['total_amount'], 2); ?></strong></td>
                            <td><?php echo count($order['items']); ?> product(s)</td>
                            <td>
                                <span class="status-badge status-<?php echo strtolower($order['payment_status']); ?>">
                                    <?php echo ucfirst($order['payment_status']); ?>
                                </span>
                            </td>
                            <td><?php echo date('d-M-Y H:i', strtotime($order['created_at'])); ?></td>
                            <td>
                                <button class="view-btn" onclick="viewOrder('<?php echo htmlspecialchars(json_encode($order)); ?>')">View</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php
        } else {
            echo '<div class="no-data">📭 No orders found</div>';
        }

        $conn->close();
        ?>
    </div>

    <!-- Order Detail Modal -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeOrder()">&times;</span>
            <h2 id="modalTitle">Order Details</h2>
            <div id="modalBody"></div>
        </div>
    </div>

    <script>
        function viewOrder(orderJson) {
            const order = JSON.parse(orderJson);
            const modal = document.getElementById('orderModal');

            let itemsHTML = '<h3>📦 Products Ordered:</h3>';
            if (order.items && order.items.length > 0) {
                itemsHTML += '<ul style="list-style: none; padding: 0;">';
                order.items.forEach((item, idx) => {
                    itemsHTML += `
                        <li style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-radius: 5px;">
                            <strong>Product ID:</strong> ${item.product_id}<br>
                            <strong>Quantity:</strong> ${item.quantity}<br>
                            <strong>Unit Price:</strong> ₹${parseFloat(item.price).toFixed(2)}<br>
                            <strong>Subtotal:</strong> ₹${parseFloat(item.subtotal).toFixed(2)}
                        </li>
                    `;
                });
                itemsHTML += '</ul>';
            }

            const html = `
                <div class="order-detail-item"><strong>Order ID:</strong> <span>${order.id}</span></div>
                <div class="order-detail-item"><strong>Customer Name:</strong> <span>${order.customer_name}</span></div>
                <div class="order-detail-item"><strong>Delivery Address:</strong> <span>${order.address}</span></div>
                <div class="order-detail-item"><strong>Payment Method:</strong> <span>${order.payment_method}</span></div>
                <div class="order-detail-item"><strong>Payment Status:</strong> <span><span class="status-badge status-${order.payment_status.toLowerCase()}">${order.payment_status}</span></span></div>
                <div class="order-detail-item"><strong>Total Amount:</strong> <span style="color: #2658b6; font-weight: bold;">₹${parseFloat(order.total_amount).toFixed(2)}</span></div>
                <div class="order-detail-item"><strong>Order Date:</strong> <span>${new Date(order.created_at).toLocaleString()}</span></div>
                <hr>
                ${itemsHTML}
            `;

            document.getElementById('modalTitle').textContent = 'Order #' + order.id;
            document.getElementById('modalBody').innerHTML = html;
            modal.style.display = 'block';
        }

        function closeOrder() {
            document.getElementById('orderModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('orderModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>
