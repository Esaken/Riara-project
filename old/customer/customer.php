<?php
include '../connect.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Customer Landing Page</title>
    <style>
        /* Add a background color to the body */
        body {
            background-color: #f2f2f2;
        }
        /* Style the header */
        header {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 20px;
        }
        /* Style the navigation menu */
        .nav {
            background-color: gray;
            padding: 10px;
            text-align: center;
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        /* Style the main content container */
        #main-content {
            background-color: white;
            padding: 20px;
            /* Add a border and shadow */
            border: 1px solid gray;
            box-shadow: 2px 2px 5px gray;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to our website</h1>
    </header>
    <div class="nav">
        <a href="customer.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="products.php">Products</a>
    </div>
    <div id="main-content">
        <h2>Featured Products</h2>

        <?php
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo '<div class="product">
            <img src="'.$row['image_path'].'" alt="'.$row['name'].'">
            <h3>'.$row['name'].'</h3>
            <p>'.$row['description'].'</p>
            <p>Price: $'.$row['price'].'</p>
            <a href="product_detail.php?id='.$row['id'].'">View Detail</a>
            </div>';
            }
            } else {
            echo "No products found";
            }
            ?>
            </div>
            <footer>
            <p>Copyright ©2022 by My Website</p>
            </footer>
            
            </body>
            </html> 
