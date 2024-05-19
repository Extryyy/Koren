<?php include_once 'header.php'; ?>

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

        /* Fullscreen background image */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://static.vecteezy.com/system/resources/previews/000/533/557/original/abstract-black-technology-lines-art-background-and-space-vector.jpg'); /* Replace 'your_background_image.jpg' with the URL of your background image */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Set the height of the body to 100% of the viewport height */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            color: white;
        }

        /* Header styles */
        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 1rem;
            text-align: center;
            width: 100%;
            z-index: 2;
        }

        h1 {
            font-size: 2rem;
        }

        .naslov {
            align-content: center;
            font-weight: bold;
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

        /* Footer styles */
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 1rem;
            width: 100%;
            z-index: 2;
        }
        form {
            margin: 1% 0 0 40%;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    
    <h1 class="naslov">Add New Product</h1>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <?php include_once 'footer.php'; ?>

</body>
</html>
