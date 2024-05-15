<?php
session_start();

// Checking if the "remove" link was clicked
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Remove the product from the cart
    unset($_SESSION['cart'][$product_id]);

    // Redirect back to the cart page
    header('Location: cart.php');
    exit;
}
?>
