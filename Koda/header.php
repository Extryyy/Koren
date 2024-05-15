<?php
// Set the lifetime of the session to 30 minutes (1800 seconds)
$lifetime = 1800;

// Adjust session settings before starting the session
ini_set('session.gc_maxlifetime', $lifetime);
session_set_cookie_params([
    'lifetime' => $lifetime,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'  // Adjust based on your requirements
]);

// Now start the session
session_start();

// Check if the user is "logged in" and handle activity timeout
if (isset($_SESSION["useruid"])) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $lifetime)) {
        // Session timed out
        session_unset();  // Unset $_SESSION variable for the run-time 
        session_destroy();  // Destroy session data in storage
        header("Location: login.php");  // Redirect to login page
        exit;
    }
    // Update last activity time stamp
    $_SESSION['last_activity'] = time();
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
            position: relative;
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
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php if (isset($_SESSION["useruid"])): ?>
            <!-- Check if the logged-in user is 'Extry', then display the 'Add Product' option -->
            <?php if ($_SESSION["useruid"] == "Extry"): ?>
                <li><a href='/Koda/admin_insert.php'>Add Product</a></li>
            <?php endif; ?>
            <li><a href='/includes/logout.inc.php'>Log Out</a></li>
            <span class='user'><?= htmlspecialchars($_SESSION["useruid"]); ?></span>
            <img src='https://th.bing.com/th/id/OIP.xBG38EXAjPmXq81y-sFqRAAAAA?w=250&h=181&c=7&r=0&o=5&pid=1.7' class='imagen'>
            <div class="shopping-cart">
                <a href="cart.php">
                    <i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart-count"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
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
