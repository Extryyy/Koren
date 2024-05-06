<?php
include_once 'header.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Products</title>
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
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        /* Footer styles (similar to other pages) */
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
    </style>
</head>
    <main>
        <section class="featured-products">
            <!-- Featured product cards -->
        </section>

        <section class="cta">
            <h2>Explore Our Latest Computers</h2>
            <a href="products.html" class="btn-primary">Shop Now</a>
        </section>
    </main>
    <div class="card" style = "float:left; margin-left: 50px">
  <img src="/Slike/OIP.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div>

<div class="card" style = "float:left; margin-left: 50px">
  <img src="/Slike/OIP.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div>
<div class="card" style = "float:left; margin-left: 50px">
  <img src="/Slike/OIP.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div>

<div class="card" style = "float:left; margin-left: 50px">
  <img src="/Slike/OIP.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div>
<div class="card" style = "float:left; margin-left: 50px">
  <img src="/Slike/OIP.jpg" alt="Denim Jeans" style="width:100%">
  <h1>Tailored Jeans</h1>
  <p class="price">$19.99</p>
  <p>Some text about the jeans..</p>
  <p><button>Add to Cart</button></p>
</div>



    <?php
include_once 'footer.php';
?>
</body>
</html>
