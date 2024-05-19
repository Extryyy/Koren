<?php
session_start();
include_once '../includes/dbh.inc.php';

if (!isset($_SESSION["userid"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $user_id = $_SESSION["userid"];
    $product_id = intval($_GET['product_id']);

    // Fetch the cart ID
    $cart_query = "SELECT cart_id FROM cart WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $cart_query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cart_id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($cart_id) {
        // Remove the item from the cart
        $remove_query = "DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?";
        $stmt = mysqli_prepare($conn, $remove_query);
        mysqli_stmt_bind_param($stmt, "ii", $cart_id, $product_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

header("Location: cart.php");
exit;
