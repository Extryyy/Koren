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

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        main {
    padding: 20px;
    background-color: #f4f4f4;
    overflow: auto; /* Ensures the container extends with the floating elements */
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
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        .register-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
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
            margin-left: 38%;
            
        }
     
   
        #intro{
            background-image: url("");
      height: 100vh;
      padding-top: 200px;
        }
       
    </style>
   
</head>
<body>
<main>
    <div id="intro" class="bg-image shadow-2-strong">
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


            <button type="submit" name = "submit">Sign Up</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyfields"){
                echo "<p style = 'margin-left: 33%; margin-top: 10%;'>Fill in all fields!";
            }else if($_GET["error"] == "invaliduid"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'> Choose a proper username!";
            }else if($_GET["error"] == "invalidemail"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'> Choose a proper email!";
            }else if($_GET["error"] == "passwordsdontmatch"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'> Passwords don't match!";
            }else if($_GET["error"] == "stmtfailed"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'> Something went wrong, try again!";
            }else if($_GET["error"] == "usernametaken"){
                echo "<p  style = 'margin-left: 33%; margin-top: 10%;'> Username already taken!";
            }else if($_GET["error"] == "none"){
                echo "<p style = 'margin-left: 28%; margin-top: 8%;'> You have signed up!";
                echo "<p style = 'margin-left: 38%; margin-top: 6%;'> <a href='http://localhost:3000/Koda/login.php'>Log in here</a>";
            }
        }
    ?>
    </div>
    </div>

    <?php
include_once 'footer.php';
?>
</main>
</body>
</html>
