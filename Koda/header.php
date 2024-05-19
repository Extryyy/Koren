<?php
// Start session
session_start();

// Include database connection
include_once '../includes/dbh.inc.php';

// Initialize cart count
$cart_count = 0;

// Check if the user is logged in
if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION["userid"];

    // Get the user's cart ID
    $cart_query = "SELECT cart_id FROM cart WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $cart_query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cart_id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($cart_id) {
        // Get the total number of items in the cart
        $count_query = "SELECT SUM(quantity) AS total_quantity FROM cart_items WHERE cart_id = ?";
        $stmt = mysqli_prepare($conn, $count_query);
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $total_quantity);
        mysqli_stmt_fetch($stmt);
        $cart_count = $total_quantity ? $total_quantity : 0;
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TechGadgets</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
            position: sticky;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .user {
            position: absolute;
            right: 150px;
            top: 12px;
            font-weight: bold;
        }
        .imagen {
            position: absolute;
            right: 75px;
            top: 10px;
            height: 50px;
        }
        .shopping-cart {
            position: absolute;
            right: 20px;
            top: 10px;
            color: white;
        }
        .shopping-cart a {
            color: #FFF;
            text-decoration: none;
        }
        .cart-icon {
            font-size: 24px;
        }
        .cart-count {
            background-color: red;
            border-radius: 50%;
            padding: 2px 5px;
            position: relative;
            left: -10px;
            top: -10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
<header>
    <h1 class="naslov">TechGadgets</h1>
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="about.php">About us</a></li>
        <?php if (isset($_SESSION["useruid"])): ?>
            <?php if ($_SESSION["useruid"] == "Extry"): ?>
                <li><a href='/Koda/admin_insert.php'>Add Product</a></li>
            <?php endif; ?>
            <li><a href='/includes/logout.inc.php'>Log Out</a></li>
            <span class='user'><?= htmlspecialchars($_SESSION["useruid"]); ?></span>
            <img src='https://th.bing.com/th/id/OIP.xBG38EXAjPmXq81y-sFqRAAAAA?w=250&h=181&c=7&r=0&o=5&pid=1.7' class='imagen'>
            <div class="shopping-cart">
                <a href="cart.php">
                    <i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart-count"><?= $cart_count ?></span>
                </a>
            </div>
        <?php else: ?>
            <li><a href='login.php'>Login</a></li>
            <li><a href='register.php'>Registration</a></li>
        <?php endif; ?>
    </ul>
</nav>
</header>
</body>
</html>
