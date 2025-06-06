<?php
session_start();
$is_logged_in = isset($_SESSION['username']);

// Redirect if user is not logged in
if (!$is_logged_in) {
    header('Location: login.html');
    exit();
}

$usernamess = $_SESSION['username'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ACluxShop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch order details for the logged-in user
$query = "SELECT * FROM orders WHERE customer_name = '" . mysqli_real_escape_string($conn, $usernamess) . "'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Aclux Ordering Website</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Additional inline styles can be added here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navigation a:hover {
            background-color: #555;
        }
        .navigation {
            display: flex;
            justify-content: center;
            background-color: #300303;
            color: #fff;
            padding: 10px 0;
        }
        .navigation a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .container {
            max-width: 600px;
            margin: 80px auto 20px; /* Adjusted margin for navbar */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .order-details {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .order-details h3 {
            margin-top: 0;
        }
        .cancel-button {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<nav class="navigation">
    <a href="index.php">Home</a>
    <a href="menue.php">Category</a>
    <?php if ($is_logged_in): ?>
        <a href="logout.php">Logout</a>
        <a href="myorders.php">My Orders</a>
    <?php else: ?>
        <a href="login.html">Login</a>
        <a href="signup.html">Sign Up</a>
    <?php endif; ?>
</nav>

<header class="header">
    <div class="container">
        <h1>My Orders</h1>
    </div>
</header>

<div class="container">
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($order = mysqli_fetch_assoc($result)) {
            // Check if order_time exists and calculate time difference
            $orderTime = isset($order['order_time']) ? strtotime($order['order_time']) : null;
            $currentTime = time();
            $minutesDifference = $orderTime ? floor(($currentTime - $orderTime) / 60) : null;

            echo '<div class="order-details">';
            echo '<h3>Order Details</h3>';
            echo '<p><strong>Product Name:</strong> ' . htmlspecialchars($order['product_name']) . '</p>';
            echo '<p><strong>Customer Name:</strong> ' . htmlspecialchars($order['customer_name']) . '</p>';
            echo '<p><strong>Delivery Address:</strong> ' . nl2br(htmlspecialchars($order['addresss'] ?? '')) . '</p>';
            echo '<p><strong>Phone Number:</strong> ' . htmlspecialchars($order['phone'] ?? '') . '</p>';
            echo '<p><strong>Quantity:</strong> ' . htmlspecialchars($order['quantity'] ?? '') . '</p>';
            echo '<p><strong>Total Price:</strong> ₹' . htmlspecialchars($order['total_price'] ?? '') . '</p>';
            echo '<form method="post" action="cancel.php">';
            echo '<input type="hidden" name="customer_name" value="' . htmlspecialchars($order['customer_name']) . '">';
            echo '<input type="hidden" name="product_name" value="' . htmlspecialchars($order['product_name']) . '">';
            echo '<button type="submit" class="cancel-button" name="cancel_order">Cancel Order</button>';
            echo '</form>';
            echo '</div>';
            }
        }  
    else {
        echo '<p>No orders placed yet.</p>';
    }

    // Close connection
    mysqli_close($conn);
    ?>
</div>

</body>

</html>
