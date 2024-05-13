<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
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
        }

        h1 {
            font-size: 2rem;
           
        }
        .naslov {
            align-content: center;
           
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 1rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Main content styles */
        main {
            padding: 2rem;
        }

        .featured-products {
            /* Add specific styles for featured products section */
        }

        .cta {
            /* Add specific styles for call-to-action section */
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        form{
            margin: 1% 0 0 40%;
        }
        
  

    </style>
</head>
<body>
    <h1 class = "naslov">Add New Product</h1>
    <form action="/includes/insert_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="longDescription">Longer description (product page):</label>
        <br>
        <textarea id="longDescription" name="longDescription" rows="12" cols="75" required></textarea><br><br>
        
        <label for="category">Choose a proper category:</label>

<select name="category" id="category">
  <option value="GAMING COMPUTERS">GAMING COMPUTERS</option>
  <option value="DESKTOP COMPUTERS">DESKTOP COMPUTERS</option>
  <option value="LAPTOPS">LAPTOPS</option>
  <option value="PHONES">PHONES</option>
  <option value="KEYBOARDS">KEYBOARDS</option>
  <option value="MOUSES">MOUSES</option>
</select>

<br><br>
<label for="brand">Brand:</label>
        <select id="brand" name="brand">
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
        </select><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>
        
        <label for="image_url">Image URL:</label>
        <input type="text" id="image_url" name="image_url"><br><br>
        
        <button type="submit">Add Product</button>
    </form>
    <?php
include_once 'footer.php';
?>
</body>
</html>
