<?php include_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - TechGadgets</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background: url('https://th.bing.com/th/id/R.69faea6b6461e6d6dea2d35da1335f90?rik=drhCMYSxGmUasA&pid=ImgRaw&r=0') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header styles */
        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 1rem;
            text-align: center;
            width: 100%;
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
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.5); /* Adding a semi-transparent overlay */
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
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
            width: 100%;
            border-radius: 3px;
        }

        /* Footer styles */
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 1rem;
            width: 100%;
        }
    </style>
</head>
<body>
   
    <main>
        <div class="login-form">
            <h2>Log In</h2>
            <form action="/includes/login.inc.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="uid" placeholder="mail/username">

                <label for="password">Passowrd:</label>
                <input type="password" id="password" name="pwd">

                <button type="submit" name="submit">Prijava</button>
            </form>
        </div>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyfields"){
                    echo "<p style='text-align: center; margin-top: 20px; color: red;'>Fill in all fields!</p>";
                }else if($_GET["error"] == "wronglogin"){
                    echo "<p style='text-align: center; margin-top: 20px; color: red;'>Incorrect login information!</p>";
                }
            }
        ?>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>
