<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Products</title>
    <style>
/* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Header styles */
header {
    background-color: #333;
    color: #fff;
    padding: 1rem;
    text-align: center;
    font-family: Arial, sans-serif;
}

h1 {
    font-size: 2rem;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

/* Main content styles */
main {
    padding: 20px;
    background-color: #f4f4f4;
    overflow: auto; /* Ensures the container extends with the floating elements */
}

.card {
    float: left; /* Makes cards float to the left */
    width: 300px;
    margin: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    overflow: hidden;
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-content {
    padding: 15px;
}

.card-title {
    font-size: 20px;
    color: #333;
    margin-bottom: 5px;
}

.card-text {
    font-size: 16px;
    color: #666;
    margin-bottom: 10px;
    height: 60px; /* Ensures uniform text height */
}

.price {
    font-weight: bold;
    color: #007BFF;
    font-size: 18px;
    margin-bottom: 10px;
}

.card button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%; /* Ensures the button stretches to container width */
}

.card button:hover {
    background-color: #0056b3;
}

/* Footer styles */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1rem;
    clear: both; /* Clears the floating effects above, making footer visible */
}

    </style>
</head>
<body>

<main>
    <section id="products">
        <h2>Products</h2>
        <?php
        include_once '../includes/dbh.inc.php';
        $result = mysqli_query($conn, "SELECT * FROM products");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>";
            echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Product Image'>";
            echo "<div class='card-content'>";
            echo "<h3 class='card-title'>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='card-text'>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p class='price'>Price: $" . number_format($row['price'], 2) . "</p>";
            echo "<button onclick=\"addToCart(" . $row['product_id'] . ")\">Add to Cart</button>";
            echo "</div></div>";
        }
        ?>
    </section>
</main>
<?php include_once 'footer.php'; ?>
</body>
</html>
