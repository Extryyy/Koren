<?php
session_start();

// Save the cart to a cookie before logging out, if it exists
if (isset($_SESSION['cart'])) {
    // Encode the cart array as JSON and save it to a cookie for 30 days
    setcookie('cart', json_encode($_SESSION['cart']), time() + 86400 * 30, "/", "", false, true);
}

// Unset all of the session variables.
session_unset();

// Finally, destroy the session.
session_destroy();

// Redirect to the home page after logout
header("Location: ../Koda/index.php");
exit();

