<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija - TechGadgets</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles with background image */
        body {
            font-family: Arial, sans-serif;
            background: url('https://th.bing.com/th/id/R.37670159cb7a433f574a02d27b940aee?rik=qXqwN5T3MhInWQ&riu=http%3a%2f%2fres-3.cloudinary.com%2ffieldfisher%2fimage%2fupload%2ff_jpg%2cq_auto%2fv1%2fsectors%2ftechnology%2ftech_neoncircuitboard_857021704_medium_lc5h05&ehk=nISAWBDhFyyZ%2bAydAC2uE2%2bcZiYyVp5BvMgXY5JCFFk%3d&risl=&pid=ImgRaw&r=0') no-repeat center center fixed;
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
            font-family: Arial, sans-serif;
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
        }

        .register-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            border-radius: 5px;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-form label {
            display: block;
            margin-bottom: 10px;
        }

        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .register-form button {
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
    <?php include_once 'header.php'; ?>
    <main>
        <div class="register-form">
            <h2>Registration</h2>
            <form action="/includes/signup.inc.php" method="post">
                <label for="FullN">Full Name:</label>
                <input type="text" id="FullN" name="name">
                <label for="username">Username:</label>
                <input type="text" id="username" name="uid">
                <label for="password">Password:</label>
                <input type="password" id="password" name="pwd">
                <label for="pwdr">Password Repeat:</label>
                <input type="password" id="pwdr" name="pwdrepeat">
                <label for="email">E-Mail:</label>
                <input type="text" id="email" name="email">
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyfields"){
                    echo "<p style='text-align: center; color: red;'>Fill in all fields!</p>";
                }else if($_GET["error"] == "invaliduid"){
                    echo "<p style='text-align: center; color: red;'>Choose a proper username!</p>";
                }else if($_GET["error"] == "invalidemail"){
                    echo "<p style='text-align: center; color: red;'>Choose a proper email!</p>";
                }else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p style='text-align: center; color: red;'>Passwords don't match!</p>";
                }else if($_GET["error"] == "stmtfailed"){
                    echo "<p style='text-align: center; color: red;'>Something went wrong, try again!</p>";
                }else if($_GET["error"] == "usernametaken"){
                    echo "<p style='text-align: center; color: red;'>Username already taken!</p>";
                }else if($_GET["error"] == "none"){
                    echo "<p style='text-align: center; color: green;'>You have signed up!</p>";
                    echo "<p style='text-align: center;'><a href='http://localhost:3000/Koda/login.php'>Log in here</a></p>";
                }
            }
            ?>
        </div>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>
