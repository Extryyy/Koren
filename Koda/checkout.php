<?php
session_start();
// Simulate checking out
if (!empty($_SESSION['cart'])) {
    // Process the payment and clear the cart
    $_SESSION['cart'] = [];
    echo "<p>Thank you for your purchase!</p>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
