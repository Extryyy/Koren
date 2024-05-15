<?php
include_once 'header.php';

// Check if the cart already exists in the session, if not create one
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if product ID and quantity are provided
if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $product_id = $_GET['product_id'];
    $quantity = intval($_GET['quantity']);  // Convert quantity to an integer

    // Add or update the product in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Product exists, update the quantity
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        // Product does not exist, add to the cart
        $_SESSION['cart'][$product_id] = $quantity;
    }

    // Optionally redirect back to a page (e.g., product listing or cart page)
    header('Location: products.php');
    exit;
} else {
    // Product ID or quantity missing
    echo "Required information is missing.";
}
?>
