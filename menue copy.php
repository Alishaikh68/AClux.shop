<?php
session_start();

$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AClux.Shop - Category</title>
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
        .container {
            max-width: 1450px;
            margin: auto;
            padding: 5px;
            
        }
        .containere {
            
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            display: inline-block;
        } 
        .header {
            text-align: center;
            padding:none;
        }
        
        .NavLog {
            display: flex;
            justify-content: right;
            background-color: #300303;
            color: #fff;
            padding: 10px 0;
        }
        .NavLog a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .NavLog a:hover {
            background-color: #555;
        }  
        #Shoop {
            margin-left: 35%;
            padding: 0%;
            float: center;
            width: 25%;
        } 
        .logsin {
            float: right;
        }
        .navigation {
           
            justify-content: left;
            background-color: #300303;
            color: #fff;
            padding: 10px 0;
        }
        .navigation a {
            color: #fff;
            text-decoration: none;
            padding: 20px 20px;
            transition: all 0.3s ease;
        }
        .navigation a:hover {
            background-color: #555;
        } 
    
         .feature-section .feature {
            text-align: center;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            flex: 1 1 300px;
        }
        .feature-section .feature img {
            max-width: 100%;
            border-radius: 5px;
        }
        .feature-section .feature h3 {
            margin-bottom: 10px;
        }
        .feature-section .feature p {
            font-size: 0.9rem;
            color: #666;
        }
        .footer {
            text-align: left;
            padding: 20px 0;
            background-color:#300303;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .fooption{
            align:right;
            font-size:12px;
           
            bottom:5%;
        }
        .footer a {
           
            color: #fff;
            text-decoration: none;
            padding: 30px 20px;
            transition: all 0.3s ease;
        }
        
        .Cate img {
            max-width:180px;
            border-radius: 5px;
        }
        .Cate .viewmore {
            float: right;
            background-color: rgb(160, 108, 12);
            color: white;
            border-color: white;
            border:8px solid;
            padding: 10px 20px;
            font-size: 1rem;
            display: none;
            cursor: pointer;
            border-radius: 10px;
            transition: opacity 0.3s ease;
            text-decoration: none; /* Ensure anchor tags do not have underline */
      
        }
        .Cate:hover .viewmore {
            display: block;
        }
        .Cate {
            
            text-align: left;
            margin:10%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            transition: transform 0.3s ease;
        }
        .Cate:hover {
            transform: translateY(-10px);
        }
        .menu-section {
            background-image: url('image/backmain.jpg');
            
        }
        
    </style>
</head>

<body>
   

    <div class="navigation">
        <a href="index.php" id = "home" >Home</a>
        <a href="menue.php">Category</a>
        <div class="logsin">
        <?php if ($is_logged_in): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.html">Login</a>
            <a href="signup.html">Sign Up</a>
        <?php endif; ?>
        </div>
    </div>
    <nav class="NavLog">
           
            <div>
                <img src="image\Welcome.png" id="Shoop" alt="LOgo"
            </div>
            
    </nav>

    <header class="header">
        <div class="containere">
            <h3> Category </h3>
            <p>Available Category's </p>
        </div>
    </header>

    
    <section class="menu-section">
        <div class="container">

            <div class="Cate">
                <img src="image/tech.jpg" alt="TECH">
                <h3>Technical Products</h3>
                <p>Technical Products is here.</p>
                <a href="TechnicalProducts.html" class="viewmore">View more</a>
            </div>

            <div class="Cate">
                <img src="image\fit.jpg" alt="FIT">
                <h3>Fitness Products</h3>
                <p>Fitness Products is here.</p>
                <a href="FitnessProducts.html" class="viewmore">View more</a>
            </div>

            <div class="Cate">
                <img src="image\fashi.png" alt="Fashi">
                <h3>Fashion Products</h3>
                <p>Fashion Products is here.</p>
                <a href="FashionProducts.html" class="viewmore">View more</a>
            </div>
            
            <div class="Cate">
                <img src="image\FASTFOODLOGO.png" alt="Food">
                <h3>AClux.Foodies</h3>
                <p>Fast Food is here.</p>
                <a href="ACluxFood.php" class="viewmore">View more</a>
            </div>

            <div class="Cate">
                <img src="image\VEGlogo.png" alt="Food">
                <h3>AClux.Vegitables</h3>
                <p>All Type Vegitables is here.</p>
                <a href="ACluxVegi.php" class="viewmore">View more</a>
            </div>

            <div class="Cate">
                <img src="image\INDLOGO.png" alt="Food">
                <h3>AClux.Indianfoodes</h3>
                <p>All Type Indian Foodes is here.</p>
                <a href="ACluxIND.php" class="viewmore">View more</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
        
            <p>&copy; 2024 AClux.shop</p>
            <p>MADE BY &#x2764; Ali Shaikh</p>
            
        </div>
        <div class="fooption">
        <a href="index.php">Home</a>
        <a href="menue.php">Category</a>
        <?php if ($is_logged_in): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.html">Login</a>
            <a href="signup.html">Sign Up</a>
        <?php endif; ?>
        </div>

    </footer>

</body>

</html>
