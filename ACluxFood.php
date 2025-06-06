<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}
?>
<style>
        /* Additional inline styles can be added here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #333; 
            color: #fff;
        }

        .section {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            padding: 50px 0;
        }
        .item {
            text-align: center;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 250px;
            transition: transform 0.3s ease;
        }
        .item:hover {
            transform: translateY(-10px);
        }
        .item img {
            max-width: 100%;
            border-radius: 5px;
        }
        .item .order-button {
            display: none;
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: opacity 0.3s ease;
        }
        .item:hover .order-button {
            display: block;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <h1>AClux.Foodies Opning Page </h1>
            <p>Click on OPEN Button For Opning AClux.Foodies</p>
        </div>
    </header>

    <section class="section">
        <div class="container">
            <div class="item">
                <img src="image\FASTFOODLOGO.png" alt="Logo">
                <h3>AClux.Foodies</h3>
                <p>Fresh Fast Food....</p>
                <a href="shopping cart\products.php" class="order-button">OPEN NOW</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 AClux.Foodies : All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
