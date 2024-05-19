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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
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

        main {
            color:white;
            padding: 20px;
            max-width: 1200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1; /* Ensure content appears above the background image */
            padding-bottom: 25%; /* Adjust padding-bottom to create space for the footer */
        }

        .about-section {
            text-align: center;
            margin-top: 200px; /* Adjust margin-top to move the about section down */
            margin-bottom: 20px;
            margin-left: 60%;
        }

        .about-section h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .team-section {
            text-align: center;
        }

        .team-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .team {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            text-align: center;
            margin-left: 60%;
        }

        .team-member {
            width: 30%;
            margin-bottom: 20px;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            color:black;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 1rem;
            color: #666;
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
        .background-container {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1; /* Place it behind other content */
            background-image: url('https://wallpapercave.com/wp/wp8117176.jpg');;
            background-size: cover;
            background-position: center;
        }
        .premakn{
            margin-left: 60%;
        }

    </style>
</head>
<body>
   
    <div class="background-container"></div> <!-- Background image container -->

    

    <main>
        <section class="about-section">
            <h2>About TechGadgets</h2>
            <p>Welcome to TechGadgets, your number one source for all things tech. We're dedicated to giving you the very best of electronics, with a focus on quality, customer service, and uniqueness.</p>
            <p>Founded in 2024, TechGadgets has come a long way from its beginnings. When we first started out, our passion for cutting-edge technology drove us to start our own business.</p>
        </section>

        <section class="team-section">
            <h2 class = 'premakn'>Meet Our Team</h2>
            <div class="team">
                <div class="team-member">
                <img src="/Kvalitetna-Slika/Screenshot 2024-05-18 130504.png" alt="Jan Šešerko">
                <h3>Jan Šešerko</h3>
                <p>Made everything</p>
            </div>
        </div>
    </section>
</main>

<?php include_once 'footer.php'; ?>

</body>
</html>