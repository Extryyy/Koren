<!DOCTYPE html>
<?php include_once 'header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Products</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
            font-family: Arial, sans-serif;
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
        main {
            padding: 20px;
            background-color: #f4f4f4;
            overflow: auto;
        }
        .card {
            display: inline-block;
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
            height: 60px;
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
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
            clear: both;
            margin-bottom: 50px;
        }
        .filter {
            position: fixed;
            top: 100px;
            right: 5px;
            background-color: #2c2f33;
            border: none;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 225px;
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .filter h2 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 18px;
            color: #007BFF;
        }
        .filter form {
            display: flex;
            flex-direction: column;
        }
        .filter label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .filter input[type="number"],
        .filter select,
        .filter input[type="checkbox"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 2px solid #007BFF;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }
        .filter input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .filter input[type="submit"]:hover {
            background-color: #0056b3;
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
            $sort = $_GET['sort'] ?? '';

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
            if (!empty($sort)) {
                if ($sort === 'low_high') {
                    $sql .= " ORDER BY price ASC";
                } elseif ($sort === 'high_low') {
                    $sql .= " ORDER BY price DESC";
                }
            }

            $stmt = mysqli_prepare($conn, $sql);
            if (!empty($params)) {
                mysqli_stmt_bind_param($stmt, $types, ...$params);
            }
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='Product Image'>";
                echo "<div class='card-content'>";
                echo "<h3 class='card-title'>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p class='card-text'>" . htmlspecialchars($row['description']) . "</p>";
                echo "<p class='price'>Price: $" . number_format($row['price'], 2) . "</p>";
                echo "<button onclick=\"window.location.href='product_details.php?product_id=" . $row['product_id'] . "'\">Check it out</button>";
                echo "<br><br>";
                echo "<button onclick=\"window.location.href='add_to_cart.php?product_id=" . $row['product_id'] . "&quantity=1';\">Add to Cart</button>";
                echo "</div></div>";
            }
            mysqli_stmt_close($stmt);
            ?>
        </section>
        <div class="filter">
            <h2>Filter:</h2>
            <form method="get">
                <label for="minPrice">Min Price:</label>
                <input type="number" name="minPrice" id="minPrice" value="<?=$minPrice;?>" min="0">
                <label for="maxPrice">Max Price:</label>
                <input type="number" name="maxPrice" id="maxPrice" value="<?=$maxPrice;?>" min="0">
                <label for="brand">Brand:</label>
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
                <select id="category" name="category">
                    <option value="" disabled selected>Select your option</option>
                    <option value="GAMING COMPUTERS">GAMING COMPUTERS</option>
                    <option value="DESKTOP COMPUTERS">DESKTOP COMPUTERS</option>
                    <option value="LAPTOPS">LAPTOPS</option>
                    <option value="PHONES">PHONES</option>
                    <option value="KEYBOARDS">KEYBOARDS</option>
                    <option value="MOUSES">MOUSES</option>
                </select>
                <!-- Price sorting options -->
                <div>
                    <label><input type="radio" name="sort" value="low_high"> Price: Low to High</label>
                    <br>
                    <br>
                    <label><input type="radio" name="sort" value="high_low"> Price: High to Low</label>
                </div>
                <br>
                <input type="submit" value="Filter">
            </form>
        </div>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>
