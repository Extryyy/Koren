<!DOCTYPE html>
<?php include_once 'header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGadgets - Product Details</title>
    <style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
html {
    scroll-behavior: smooth;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: white;
}
main {
    padding: 20px;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    min-height: 100vh;
    position: relative;
    background-size: cover;
    background-position: center;
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}
.content {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    width: 100%;  /* Ensures that the content uses all available space */
}
.product-card {
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    max-width: 600px;
    width: 100%;  /* Ensures that the card adjusts according to the container size */
    margin: 20px;
    color: #333;
}
.product-card img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
}
.product-card h2, .product-card p {
    margin-bottom: 10px;
}
.product-card button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
    margin-top: 20px;
}
.product-card button:hover {
    background-color: #0056b3;
}
header, footer {
    background-color: #333;
    color: #fff;
    padding: 1rem;
    text-align: center;
    font-family: Arial, sans-serif;
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
.product-description {
    max-width: 600px;
    margin: 20px;
}
.brand-logo {
    position: absolute;
    top: 20px;
    right: 50px;
    max-width: 150px;
    height: auto;
    margin-right: 7%;
}
.brand-about {
    text-align: right;
    max-width: 400px; /* Increased from 300px for better text layout */
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 8px;
    position: absolute;
    top: 180px;
    right: 50px;
}

    </style>
</head>
<body>
<main>
<?php
include_once '../includes/dbh.inc.php';
$product_id = $_GET['product_id'] ?? '';
if (!empty($product_id)) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE product_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        $categoryBackgrounds = [
            'GAMING COMPUTERS' => 'https://i.pinimg.com/originals/be/80/4a/be804a809cd57a7c81ced5230b58e791.jpg',
            'DESKTOP COMPUTERS' => 'path/to/desktop_computers_background.jpg',
            'LAPTOPS' => 'https://cdn.mos.cms.futurecdn.net/QUfvj9WVe9wa4XgfxonxiM.jpg',
            'PHONES' => 'https://fscl01.fonpit.de/userfiles/7715851/image/Apple_Samsung_B.jpg',
            'KEYBOARDS' => 'https://cdn.mos.cms.futurecdn.net/iCQ5jwCc3m7a7HYwn5myWR.jpg',
            'MOUSES' => 'https://www.hollywoodreporter.com/wp-content/uploads/2021/04/6333841cv13d-1619816927.jpeg',
        ];
        if (isset($categoryBackgrounds[$product['category']])) {
            echo "<style>main { background-image: url('{$categoryBackgrounds[$product['category']]}'); }</style>";
        }

        $brandLogos = [
            'APPLE' => 'https://th.bing.com/th/id/R.fa5e67376018e06bd8ffb06b3129a717?rik=7G91umXpvhJBjg&riu=http%3a%2f%2f1000logos.net%2fwp-content%2fuploads%2f2016%2f10%2fapple-emblem.jpg&ehk=oZn9asOkaHE7jnq1KK2bsdCC3PpQvx52gN9eXh7e294%3d&risl=&pid=ImgRaw&r=0',
            'DELL' => 'https://mma.prnewswire.com/media/454748/Dell_Logo.jpg',
            'HP' => 'https://cdn.wallpapersafari.com/94/66/cOY51d.jpg',
            'LENOVO' => 'https://s3.amazonaws.com/freebiesupply/large/2x/lenovo-logo-white.png',
            'ASUS' => 'https://www.logolynx.com/images/logolynx/30/30eb0968858a10e2ff4ceeaf93a8b407.png',
            'ACER' => 'https://angelyytech.files.wordpress.com/2023/06/acer-logo.jpg',
            'SAMSUNG' => 'https://static.vecteezy.com/system/resources/previews/020/336/289/original/samsung-logo-samsung-icon-free-free-vector.jpg ',
            'MICROSOFT' => 'https://th.bing.com/th/id/OIP.HTfJhXdRTPPkbhKYpjLfugHaEK?rs=1&pid=ImgDetMain',
            'LOGITECH' => 'https://connectoffice.pe/wp-content/uploads/2020/01/Logitech-logo.png',
            'RAZER' => 'https://logos-world.net/wp-content/uploads/2020/11/Razer-Symbol.jpg',
            'CORSAIR' => 'https://surveymonkey-assets.s3.amazonaws.com/survey/176340745/4fe9e5ad-7f7c-4464-a345-903250267a13.PNG',
        ];
        $brandDescriptions = [
            'APPLE' => 'Apple Inc. is an American multinational technology company that specializes in consumer electronics, software, and online services. Known for its innovative products such as the iPhone, iPad, and Mac computers.',
            'DELL' => 'Dell Technologies Inc. is an American multinational technology company that develops, sells, repairs, and supports computers and related products and services. Known for its reliable PCs and monitors.',
            'HP' => 'HP Inc. is an American multinational information technology company. It provides a wide variety of hardware components as well as software and related services to consumers.',
            'LENOVO' => 'Lenovo Group Limited is a Chinese multinational technology company. It designs, develops, manufactures, and sells personal computers, tablet computers, smartphones, workstations, servers, and electronic storage devices.',
            'ASUS' => 'ASUS is a Taiwanese multinational computer and phone hardware and electronics company. Its products include desktops, laptops, netbooks, mobile phones, networking equipment, monitors, and motherboards.',
            'ACER' => 'Acer Inc. is a Taiwanese multinational hardware and electronics corporation specializing in advanced electronics technology. Its products include desktops, laptops, tablets, and storage devices.',
            'SAMSUNG' => 'Samsung Electronics is a South Korean multinational electronics company. It is one of the world\'s largest manufacturers of electronic devices, known for its smartphones, televisions, and home appliances.',
            'MICROSOFT' => 'Microsoft Corporation is an American multinational technology company. It produces computer software, consumer electronics, personal computers, and related services, known for products like Windows, Office, and Xbox.',
            'LOGITECH' => 'Logitech International S.A. is a Swiss-American multinational manufacturer of computer peripherals and software. It is known for its products related to PCs such as keyboards, mice, and webcams.',
            'RAZER' => 'Razer Inc. is an American-Singaporean multinational technology company that designs, develops, and sells consumer electronics, financial services, and gaming hardware. Known for its gaming laptops and peripherals.',
            'CORSAIR' => 'Corsair Gaming, Inc. is an American computer peripherals and hardware company. It specializes in high-performance memory, power supplies, cooling solutions, and gaming peripherals.',
        ];
        $brandLogo = $brandLogos[$product['brand']] ?? '';
        $brandDescription = $brandDescriptions[$product['brand']] ?? 'No description available for this brand.';

        echo "<div class='overlay'></div>";

        echo "<div class='content'>";
        echo "<div class='product-card'>";
        echo "<h2>" . htmlspecialchars($product['name']) . "</h2>";
 echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='Product Image'>";
        echo "<p>" . nl2br(htmlspecialchars($product['description'])) . "</p>";
        echo "<p>Category: " . htmlspecialchars($product['category']) . "</p>";
        echo "<p>Brand: " . htmlspecialchars($product['brand']) . "</p>";
        echo "<p>Price: $" . number_format($product['price'], 2) . "</p>";
        echo "<button onclick=\"window.location.href='add_to_cart.php?product_id=" . $product['product_id'] . "&quantity=1'\">Add to Cart</button>";
        echo "</div>";

        echo "<div class='product-description'>";
        echo "<h1 id='idproduct' style='font-weight: bold; text-align: center; margin-top: 40px;'>" . htmlspecialchars($product['name']) . "</h1>";
        echo "<p>" . nl2br(htmlspecialchars($product['longDescription'])) . "</p>";
        echo "</div>";

        if (!empty($brandLogo)) {
            echo "<div class = 'brandanddesc'>";
            echo "<img src='{$brandLogo}' alt='" . htmlspecialchars($product['brand']) . " Logo' class='brand-logo'>";
            echo "<div class='brand-about'>";
            echo "$brandDescription";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>"; // Close content div
     
    } else {
        echo "<p>Product not found.</p>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<p>Invalid product ID.</p>";
}
?>

</main>
<?php include_once 'footer.php'; ?>
</body>
</html>
