<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Ensuring the full height of the page is covered */
        html, body {
            height: 100%;
            width: 100%;
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
            margin: 0;
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

        /* Fullscreen background image setup */
        body {
            background-image: url("");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Main content styles */
        main {
            position: relative; /* Allows content to be properly layered on the background */
            min-height: 100%; /* Ensures the main content area is at least as tall as the viewport */
            padding: 2rem;
            box-sizing: border-box; /* Includes padding in height calculation */
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

<main>
    <!-- Main content -->
</main>
<?php
include_once 'footer.php';
?>
</body>
</html>
