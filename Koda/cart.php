<?php
include_once 'header.php';
include_once '../includes/dbh.inc.php'; // Adjust the path as necessary to include your database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - TechGadgets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        main {
            padding: 20px;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        .product-img img {
            width: 100px;
            height: auto;
        }
        .remove-link {
            color: red;
            text-decoration: none;
        }
        .remove-link:hover {
            text-decoration: underline;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .checkout-button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin: 20px 0;
        }
        .checkout-button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
            clear: both;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<main>
    <h2>Your Shopping Cart</h2>
    <?php
    if (!empty($_SESSION['cart'])) {
        echo "<table>";
        echo "<tr><th>Product</th><th>Quantity</th><th>Unit Price</th><th>Total Price</th><th>Action</th></tr>";

        $total = 0;
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $stmt = mysqli_prepare($conn, "SELECT name, price, image_url FROM products WHERE product_id = ?");
            mysqli_stmt_bind_param($stmt, "i", $product_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $product = mysqli_fetch_assoc($result);

            if ($product) {
                $subtotal = $product['price'] * $quantity;
                $total += $subtotal;
                echo "<tr>";
                echo "<td><div class='product-img'><img src='" . htmlspecialchars($product['image_url']) . "' alt=''></div>" . htmlspecialchars($product['name']) . "</td>";
                echo "<td>" . $quantity . "</td>";
                echo "<td>$" . number_format($product['price'], 2) . "</td>";
                echo "<td>$" . number_format($subtotal, 2) . "</td>";
                echo "<td><a href='update_cart.php?action=remove&product_id=" . $product_id . "' class='remove-link'>Remove</a></td>";
                echo "</tr>";
            }
        }
        echo "<tr><td colspan='3' class='total'>Total</td><td>$" . number_format($total, 2) . "</td><td></td></tr>";
        echo "</table>";
        echo "<button class='checkout-button' onclick='window.location.href=\"checkout.php\"'>Proceed to Checkout</button>";
    } else {
        echo "Your cart is empty.";
    }
    ?>
</main>
<?php include_once 'footer.php'; ?>
</body>
</html>
