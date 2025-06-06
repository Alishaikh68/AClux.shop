<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}
// Function to handle order placement
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture order details
    $productName = $_POST['product-name'];
    $customerName = $_POST['customer-name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];
    $totalPrice = $_POST['total-price'];
    $paymentMethod = $_POST['payment-method'];

    // Save order details to session (or database)
    $_SESSION['order'] = [
        'product-name' => $productName,
        'customer-name' => $customerName,
        'address' => $address,
        'phone' => $phone,
        'quantity' => $quantity,
        'total-price' => $totalPrice,
        'payment-method' => $paymentMethod
    ];

    // Redirect to myorders.php
    echo "<script>alert('Order placed successfully! Redirecting to My Orders...');
          window.location.href = 'myorders.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - AClux.Shop</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Additional inline styles can be added here */
        body {
            background-color:black;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .header {

            text-align: center;
            padding: 20px 0;
        }
        .header div{
            border: 2px solid;
            background-color:yellow;
        }
        .order-form {
            display: flex;
            flex-direction: column;
        }
        .order-form label {
            margin: 10px 0 5px;
        }
        .order-form input, .order-form textarea, .order-form select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .order-form button {
            padding: 10px 20px;
            background-color: #f44336;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .order-form button:hover {
            background-color: rgb(160, 108, 12);
        }
        .price-box {
            padding: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
    <script>
        // Function to get URL parameter
        function getParameterByName(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        function updatePrice() {
        const quantity = parseInt(document.getElementById('quantity').value, 10);
        const pricePerUnit = parseFloat(getParameterByName('Price')); // Assuming 'Price' is the parameter name
        if (!isNaN(quantity) && !isNaN(pricePerUnit)) {
            const totalPrice = quantity * pricePerUnit;
            document.getElementById('total-price').value = totalPrice.toFixed(2); // Display total price with two decimal places
            }
            else {
            // If quantity or price is not valid, set total price to 0 or display an error
            document.getElementById('total-price').value = '0.00';
            }
         }

         

        // Function to auto-fill the product name
        function autofillProductName() {
            const productName = getParameterByName('product');
            if (productName) {
                document.getElementById('product-name').value = productName;
            }
        }

        function autofillPrice() {
            const totalprice = getParameterByName('Price');
            if (totalprice) {
                document.getElementById('total-price').value = totalprice;
            }
        }


        // Function to calculate and display the price
     
        // Function to validate the phone number
        function validatePhoneNumber() {
            const phone = document.getElementById('phone').value;
            const phoneError = document.getElementById('phone-error');
            const phoneRegex = /^[0-9]{10}$/;
            
            if (!phoneRegex.test(phone)) {
                phoneError.textContent = 'Please enter a valid 10-digit phone number.';
                return false;
            } else {
                phoneError.textContent = '';
                return true;
            }
        }

        // Function to handle form submission
        function handleSubmit(event) {
            if (!validatePhoneNumber()) {
                event.preventDefault();
            }
        }

        // Call the functions on page load
        window.onload = () => {
            autofillProductName();
            autofillPrice();
            updatePrice();
            document.getElementById('quantity').addEventListener('input', updatePrice);
        };
    </script>
</head>

<body>

    

    <div class="container">
    <header class="header">
        <div class="container">
            <h1>Order Form</h1>
            <p>Fill out the all Details</p>
        </div>
    </header>
        <form id="order-form" class="order-form" method="post" onsubmit="handleSubmit(event)" action="orderdetsav.php">
            <label for="product-name">Product Name</label>
            <input type="text" id="product-name" name="product-name" readonly>

            <label for="customer-name">User Name</label>
            <input type="text" id="customer-name" name="customer-name" placeholder="Enter your login username only" required>

            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required oninput="validatePhoneNumber()">
            <div id="phone-error" class="error"></div>

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity">

            <label for="total-price">Total Price</label>
            <input type="text" id="total-price" name="total-price" readonly>
            

            <label for="payment-method">Payment Method</label>
            <select id="payment-method" name="payment-method" required>
                <option value="COD">Cash on Delivery</option>
            </select>

            <button type="submit">Place Order</button>
        </form>
    </div>

</body>

</html>
