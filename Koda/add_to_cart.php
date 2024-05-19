<?php
            include_once '../includes/dbh.inc.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION["userid"])) {
    header("Location: login.php");
    exit;
}

// Check if product ID and quantity are provided
if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $product_id = intval($_GET['product_id']);
    $quantity = intval($_GET['quantity']);
    $user_id = $_SESSION["userid"];

    // Check if the user has an existing cart
    $cart_query = "SELECT cart_id FROM cart WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $cart_query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cart_id);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (!$cart_id) {
        // Create a new cart for the user
        $insert_cart_query = "INSERT INTO cart (user_id) VALUES (?)";
        $stmt = mysqli_prepare($conn, $insert_cart_query);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $cart_id = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
    }

    // Check if the product is already in the cart
    $cart_item_query = "SELECT item_id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?";
    $stmt = mysqli_prepare($conn, $cart_item_query);
    mysqli_stmt_bind_param($stmt, "ii", $cart_id, $product_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $item_id, $existing_quantity);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($item_id) {
        // Update the quantity of the existing item
        $new_quantity = $existing_quantity + $quantity;
        $update_item_query = "UPDATE cart_items SET quantity = ? WHERE item_id = ?";
        $stmt = mysqli_prepare($conn, $update_item_query);
        mysqli_stmt_bind_param($stmt, "ii", $new_quantity, $item_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // Add a new item to the cart
        $insert_item_query = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_item_query);
        mysqli_stmt_bind_param($stmt, "iii", $cart_id, $product_id, $quantity);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Redirect back to a page (e.g., product listing or cart page)
    header('Location: products.php');
    exit;
} else {
    echo "Required information is missing.";
}
?>
