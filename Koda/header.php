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
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <style>
        .user{
            font-weight: bold;
            left: 80%;
           position: absolute;
        }
        .imagen{
            left: 83%;
           position: absolute;
            bottom: 92%;
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
            
            <?php
            // Check if the logged-in user is "Extry" and display additional links
            if (isset($_SESSION["useruid"]) && $_SESSION["useruid"] == "Extry") {
                echo "<li><a href='/Koda/admin_insert.php'>Add Product</a></li>"; // Assuming you have add_product.php
                echo "<li><a href='/includes/logout.inc.php'>Log Out</a></li>";
                echo "<li class='user'>" . htmlspecialchars($_SESSION["useruid"]) . "</li> <img src = 'https://th.bing.com/th/id/OIP.xBG38EXAjPmXq81y-sFqRAAAAA?rs=1&pid=ImgDetMain' width = '30px' height = '30px' class = 'imagen'>";

            } elseif (isset($_SESSION["useruid"])) {
                echo "<li><a href='/includes/logout.inc.php'>Log Out</a></li>";
                echo "<li class='user'>" . htmlspecialchars($_SESSION["useruid"]) . "</li> <img src = 'https://th.bing.com/th/id/OIP.xBG38EXAjPmXq81y-sFqRAAAAA?rs=1&pid=ImgDetMain' width = '30px' height = '30px' class = 'imagen'>";
            } else {
                echo "<li><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Registration</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>
