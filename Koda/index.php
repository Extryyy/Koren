<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Computers for Sale</title>
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
        }

        .naslov {
            font-size: 2rem;
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

        .featured-products {
        }

        .cta {
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        
        .h1slika{
            margin-top: 50px;
            margin-left: 510px;
            font-size: 60px;
            font-family: 'Karla', sans-serif;
            font-weight: lighter;
        }
        .slider-frame{
            overflow:hidden;
            height: 800px;
            width: 1200px;
            margin-left:360px;
            margin-top:20px
        }
        @-webkit-keyframes slide_animation{
             0% {left:0px;}
            10% {left:0px;}
            20% {left:1200px;}
            30% {left:1200px;}
            40% {left:2400px;}
            50% {left:2400px;}
            60% {left:1200px;}
            70% {left:1200px;}
            80% {left:0px;}
            90% {left:0px;}
            100%{left:0px;}




        }
        
        .slide-images{
            width: 3600px;
            height: 800px;
            margin: 0 0 0 -2400px;
            position: relative;
            -webkit-animation-name: slide_animation;
            -webkit-animation-duration: 33s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-direction: alternate;
            -webkit-animation-play-state: running;
        }

        .img-container{
            height: 800px;
            width: 1200px;
            position: relative;
            float: left;
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

    <main>
<div>
    Our offers:
    
</div>
    <div class = "slider-frame">
        <div class = "slide-images">
            <div class = "img-container">
                <img src = "/Slike/mainslika.jfif">
            </div>
            <div class = "img-container">
            <img src = "/Slike/mainslika.jfif">
            </div>
            <div class = "img-container">
            <img src = "/Slike/mainslika.jfif">
            </div>
            <div class = "img-container">
            <img src = "/Slike/mainslika.jfif">

            </div>
        </div>
    </div>

       
    </main>

    <footer>
        <p>© 2024 TechGadgets. All rights reserved.</p>
    </footer>
</body>

</html>
