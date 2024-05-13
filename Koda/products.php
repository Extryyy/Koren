<!DOCTYPE html>
<?php include_once 'header.php'; ?>
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
            float: left;
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
            width: 100%;
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
            clear: both;
            margin-bottom: 50px;
        }

        /* Filter styles */
        .filter {
            position: fixed;
            top: 100px; /* Adjust based on your header height */
            right: 5px; /* Space from the right edge */
            background-color: #2c2f33; /* A slightly lighter shade than the header for contrast */
            border: none;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 225px; /* Slightly wider for better layout */
            color: #fff;
            font-family: Arial, sans-serif; /* Ensure font consistency */
            font-size: 14px; /* Smaller font size for form elements */
        }

        .filter h2 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 18px; /* Larger font size for the heading */
            color: #007BFF; /* Highlight color for the filter header */
        }

        .filter form {
            display: flex;
            flex-direction: column;
        }

        .filter label {
            margin-bottom: 5px;
            font-weight: bold; /* Bold labels for clarity */
        }

        .filter input[type="number"],
        .filter select {
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #007BFF; /* Stylish blue border */
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }

        .filter input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF; /* Button color matches the theme */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filter input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

main {
    padding: 20px;
    background-color: #f4f4f4;
    overflow: auto; /* Ensures the container extends with the floating elements */
}
    .products{
        margin-left: 1%;
    }

    

    </style>
</head>
<body>
   

    <main>
        <section id="products">
            <h2 class="products">Products:</h2>
            <?php
            include_once '../includes/dbh.inc.php';

            $minPrice = $_GET['minPrice'] ?? '';
            $maxPrice = $_GET['maxPrice'] ?? '';
            $brand = $_GET['brand'] ?? '';
            $category = $_GET['category'] ?? '';

            $sql = "SELECT * FROM products WHERE 1=1";
            $params = [];
            $types = '';

            if (!empty($minPrice)) {
                $sql .= " AND price >= ?";
                $params[] = $minPrice;
                $types .= 'd';
            }
            if (!empty($maxPrice)) {
                $sql .= " AND price <= ?";
                $params[] = $maxPrice;
                $types .= 'd';
            }
            if (!empty($brand)) {
                $sql .= " AND brand = ?";
                $params[] = $brand;
                $types .= 's';
            }
            if (!empty($category)) {
                $sql .= " AND category = ?";
                $params[] = $category;
                $types .= 's';
            }

            $stmt = mysqli_prepare($conn, $sql);
            if (!empty($params)) {
                mysqli_stmt_bind_param($stmt, $types, ...$params);
            }
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<div class='parent'>";
                echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Product Image' class='image'>";
                echo "</div>";
                echo "<div class='card-content'>";
                echo "<h3 class='card-title'>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p class='card-text'>Short description: " . htmlspecialchars($row['description']) . "</p>";
                echo "<p class='card-text'>Category: " . htmlspecialchars($row['category']) . "</p>";
                echo "<p class='card-text'>Brand: " . htmlspecialchars($row['brand']) . "</p>";
                echo "<p class='price'>Price: $" . number_format($row['price'], 2) . "</p>";
                echo "<button onclick=\"window.location.href='product_details.php?product_id=" . $row['product_id'] . "'\">Check it out</button>";
                echo "<br><br>";
                echo "<button onclick='addToCart(" . $row['product_id'] . ")'>Add to Cart</button>";
                echo "</div></div>";
            }
            
            ?>
        </section>
        <div class="filter">
            <h2>Filter:</h2>
            <form method="get">
                <label for = "minPrice">Min Price:</label>
                <input type="number" name="minPrice" id = "minPrice" value="<?=$minPrice; ?>" min="0">
                <label for = "maxPrice">Max Price:</label>
                <input type="number" name="maxPrice" id = "maxPrice" value="<?=$maxPrice; ?>" min="0">
                <label for = "brand">Brand:</label>
            <select id="brand" name="brand">
            <option value="" disabled selected>Select your option</option>
            <option value="APPLE">Apple</option>
            <option value="DELL">Dell</option>
            <option value="HP">HP</option>
            <option value="LENOVO">Lenovo</option>
            <option value="ASUS">ASUS</option>
            <option value="ACER">Acer</option>
            <option value="SAMSUNG">Samsung</option>
            <option value="MICROSOFT">Microsoft</option>
            <option value="LOGITECH">Logitech</option>
            <option value="RAZER">Razer</option>
            <option value="CORSAIR">Corsair</option>
            </select>
            <label for="category">Category:</label>
            <select name="category" id="category">
<option value="" disabled selected>Select your option</option>
  <option value="GAMING COMPUTERS">GAMING COMPUTERS</option>
  <option value="DESKTOP COMPUTERS">DESKTOP COMPUTERS</option>
  <option value="LAPTOPS">LAPTOPS</option>
  <option value="PHONES">PHONES</option>
  <option value="KEYBOARDS">KEYBOARDS</option>
  <option value="MOUSES">MOUSES</option>
</select>
                <input type="submit" value="Filter">
            </form>
        </div>
        <?php
include_once 'footer.php';
?>
    </main>

    
</body>
</html>
