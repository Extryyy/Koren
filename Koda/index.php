<?php include_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Home</title>
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            font-family: Arial, sans-serif;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Prevent body overflow to hide scrollbars */
            background-image: url('background.jpg'); /* Replace 'background.jpg' with your image URL */
            background-size: cover;
            background-position: center;
        }

        .background-container {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1; /* Place it behind other content */
            background-image: url('https://wallpaperaccess.com/full/2449593.jpg');
        }

        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 1rem;
            text-align: center;
            position: absolute;
            width: 100%;
            z-index: 2;
        }

        header h1 {
            font-size: 2rem;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
            margin-top: 1rem;
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

        .slideshow-container {
            width: 100%;
            height: calc(100% - 200px); /* Adjust height to accommodate header and footer */
            position: fixed;
            top: 100px; /* Adjust top position based on header height */
            left: 0;
            z-index: 1;
             /* Add horizontal scrollbar */
        }

        .slideshow {
            display: flex;
            animation: slide 120s linear infinite;
        }

        .category-link {
            flex: 0 0 25%; /* Adjust width of each slide */
            position: relative;
            margin: 0 5px; /* Add margin to create space between slides */
        }

        .category-link img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain aspect ratio */
        }

        .category-link .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            font-size: 1.5rem;
            text-align: center;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 1rem;
            width: 100%;
            bottom: 0;
            z-index: 2;
            position: absolute;
        }

        /* Center the button */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px; /* Adjust height as needed */
            margin-top: 10%; /* Adjust top margin as needed */
        }

        /* Style for the button */
        .cool-button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 20px 40px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition-duration: 0.4s;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .cool-button:hover {
            background-color: #45a049;
        }

        .cool-button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        @keyframes slide {
            0% { transform: translateX(0%); }
            16.67% { transform: translateX(-100%); }
            33.33% { transform: translateX(-200%); }
            50% { transform: translateX(-300%); }
            66.67% { transform: translateX(-400%); }
            83.33% { transform: translateX(-500%); }
            100% { transform: translateX(-500%); }
        }
    </style>
</head>
<body>
   
    <div class="background-container"></div> <!-- Background image container -->
   
    <div class="slideshow-container">
        <div class="slideshow">
            <a href="products.php?category=GAMING COMPUTERS" class="category-link">
                <img src="https://i5.walmartimages.com/asr/0d14e5a2-19b1-42c6-9ed4-85aa43d2539b_1.a6dfae869c3032643af2522650394d86.jpeg" alt="Gaming Computers">
                <div class="overlay">Gaming Computers</div>
            </a>
            <a href="products.php?category=DESKTOP COMPUTERS" class="category-link">
                <img src="https://i5.walmartimages.com/asr/b45a6a16-b910-432e-bb14-b7cfb8716bfc_1.05bafaadb030f5f1e40a050002a83a8e.jpeg" alt="Desktop Computers">
                <div class="overlay">Desktop Computers</div>
            </a>
            <a href="products.php?category=LAPTOPS" class="category-link">
                <img src="https://kopen.blob.core.windows.net/products/134008_1_xl.jpg" alt="Laptops">
                <div class="overlay">Laptops</div>
            </a>
            <a href="products.php?category=PHONES" class="category-link">
                <img src="https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6009/6009718_sd.jpg" alt="Phones">
                <div class="overlay">Phones</div>
            </a>
            <a href="products.php?category=KEYBOARDS" class="category-link">
                <img src="https://s.neofiliac.com/P/97/40/1618046270.jpg" alt="Keyboards">
                <div class="overlay">Keyboards</div>
            </a>
            <a href="products.php?category=MOUSES" class="category-link">
                <img src="https://th.bing.com/th/id/OIP.lFWBJE25Q9VcFovfxVD4_AHaHa?rs=1&pid=ImgDetMain" alt="Mouses">
                <div class="overlay">Mouses</div>
            </a>
        </div>
    </div>

    <div class="button-container">

       <p style = 'color: white'> Welcome to TechGadgets, your number one source for all things tech. We're dedicated to giving you the very best of electronics, with a focus on quality, customer service, and uniqueness.</p>
    </div>
    <footer>
        <p>© 2024 TechGadgets. All rights reserved.</p>
    </footer>
</body>
</html>

