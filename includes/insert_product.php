<?php
include_once 'dbh.inc.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $image_url = trim($_POST['image_url']);
    $brand = trim($_POST['brand']);
    $longDescription = trim($_POST['longDescription']);

    $stmt = mysqli_prepare($conn, "INSERT INTO products (name, description, price, image_url, category, brand, longDescription) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssdssss', $name, $description, $price, $image_url, $category, $brand, $longDescription);
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
