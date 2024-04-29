<!-- login.html -->
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava - TechGadgets</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
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
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .login-form p {
            text-align: center;
            margin-top: 10px;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
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

        main {
            padding: 2rem;
        }
    </style>
</head>
<body>
<header>
        <h1 class = "naslov">TechGadgets</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Registracija</a></li>



            </ul>
        </nav>
    </header>
    <div class="login-form">
        <h2>Prijava</h2>
        <form action="login.php" method="post">
            <label for="username">Uporabniško ime:</label>
            <input type="text" id="username" name="name" placeholder="mail/username">

            <label for="password">Geslo:</label>
            <input type="password" id="password" name="pwd">

            <button type="submit" name = "submit">Prijava</button>

            <p>Še nimate računa? <a href="register.html">Registrirajte se</a></p>
        </form>
    </div>
    <footer>
        <p>© 2024 TechGadgets. All rights reserved.</p>
    </footer>
</body>
</html>
