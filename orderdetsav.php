<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
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

    // Capture order details
    $productName = mysqli_real_escape_string($conn, $_POST['product-name']);
    $customerName = mysqli_real_escape_string($conn, $_POST['customer-name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = (int)$_POST['phone'];
    $quantity = (int)$_POST['quantity'];
    $totalPrice = mysqli_real_escape_string($conn, $_POST['total-price']);;
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment-method']);
    
    // SQL query
    $qry = "INSERT INTO orders (product_name, customer_name, addresss, phone, quantity, total_price, payment_method) VALUES ('$productName', '$customerName', '$address', '$phone', '$quantity', '$totalPrice', '$paymentMethod')";

    // Execute the query
    if(mysqli_query($conn,$qry))
     {
        echo "<script>
                      alert('Order placed successfully!');
                      window.location.href = 'myorders.php';
              </script>";
    } else {
        echo "<script>alert('Error:fail to save data in data base ');</script>";
    }

    // Close the connection
    mysqli_close($conn);
    exit();
}
?>
