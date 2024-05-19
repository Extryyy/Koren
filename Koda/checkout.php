<?php
session_start();
include_once '../includes/dbh.inc.php';

if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["userid"];

// Fetch the user's cart ID
$cart_query = "SELECT cart_id FROM cart WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $cart_query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $cart_id);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($cart_id) {
    // Fetch cart items
    $cart_items_query = "
        SELECT products.product_id, products.name, products.price, cart_items.quantity
        FROM cart_items
        JOIN products ON cart_items.product_id = products.product_id
        WHERE cart_items.cart_id = ?
    ";
    $stmt = mysqli_prepare($conn, $cart_items_query);
    mysqli_stmt_bind_param($stmt, "i", $cart_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Simulate processing the payment
        echo "<p>Thank you for your purchase!</p>";

        // Clear the cart items
        $clear_cart_query = "DELETE FROM cart_items WHERE cart_id = ?";
        $stmt = mysqli_prepare($conn, $clear_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        // Optionally, you can also delete the cart itself
        $delete_cart_query = "DELETE FROM cart WHERE cart_id = ?";
        $stmt = mysqli_prepare($conn, $delete_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    } else {
        echo "<p>Your cart is empty.</p>";
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
