<?php
include_once 'dbh.inc.php';  // Ensure the database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image_url = trim($_POST['image_url']);

    // Prepare a statement for insert to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssds", $name, $description, $price, $image_url);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
