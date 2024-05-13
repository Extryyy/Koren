<?php
include_once 'header.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - TechGadgets</title>
    <style>
        /* Resetiranje privzetih oblikovanj */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Oblikovanje obrazca za prijavo */
        body {
            font-family: Arial, sans-serif;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            margin-bottom: 10px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .login-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
               /* Reset default margin and padding */
               * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
        main {
    padding: 20px;
    background-color: #f4f4f4;
    overflow: auto; /* Ensures the container extends with the floating elements */
}
    </style>
   <main>
   <div class="login-form">
        <h2>Prijava</h2>
        <form action="/includes/login.inc.php" method="post">
            <label for="username">Uporabniško ime:</label>
            <input type="text" id="username" name="uid" placeholder="mail/username">

            <label for="password">Geslo:</label>
            <input type="password" id="password" name="pwd">

            <button type="submit" name = "submit">Prijava</button>

        </form>
    </div>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyfields"){
                echo "<p style = 'margin-left: 33%; margin-top: 10%;'>Fill in all fields!";
            }else if($_GET["error"] == "wronglogin"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'>Incorrect login information!";
            }
        }
    ?>
   <?php
include_once 'footer.php';
?>
</main>
</body>
</html>
