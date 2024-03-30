<?php
require_once "conn.php";
session_start();
$name = isset($_COOKIE["user_login"]) ? $_COOKIE["user_login"] : (isset($_COOKIE["login"]) ? $_SESSION["username"] : null);

if (!$name) {
    header("location:signin.php");
    exit(); // Terminate script to prevent further execution
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Lover's Paradise</title>
    <link rel="stylesheet" href="hmstyle.css"> <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Link to Font Awesome for icons -->
    <style>
        /* Styles from the existing code */
        body {
            background: url('vin.jpg') center/cover fixed;
            
            color: #fff;
            margin: 0;
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        header {
            background-color: #b0034880;
            padding: 20px;
        }

        header h1 {
            color: #fdbb2d;
        }

        .user-info {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 10px;
        }

        .user-info p {
            margin: 0;
        }

        .fa-user {
            font-size: 24px;
            color: #fdbb2d;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .car-listing a, .car-listing input[type="submit"] {
        background-color: #fdbb2d;
        color: #333;
        padding: 10px;
        text-decoration: none;
        border-radius: 5px;
        display: block;
        margin-top: 10px;
    }
    .car-listing:hover {
    transform: scale(1.05);
}

    /* Adjust the style for the submit button to match the link */
    .car-listing input[type="submit"] {
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    /* Hover effect for both link and button */
    .car-listing a:hover, .car-listing input[type="submit"]:hover {
        background-color: #ADD8E6;
    }

        .car-listing {
            background-color: #21f3d742;
            color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .car-listing img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .car-listing a {
            background-color: #fdbb2d;
            color: #333;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            display: block;
            margin-top: 10px;
        }

        footer {
            background-color: #333;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        footer a {
            color: #fdbb2d;
            text-decoration: none;
        }

        /* Hover effect for buttons */
        button, .car-listing a {
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        button:hover, .car-listing a:hover {
            background-color: #b21f1f;
        }
        
    </style>
</head>
<body>

<header>
    <h1>Car Lover's Paradise</h1>
    <div class="user-info" >
        <div align="center">
            <p><?php echo "Welcome " . $name; ?></p><br>
            <a href="profile.php">
                <i class="fas fa-user"></i>
            </a><br><p>Profile</p>
        </div>
        
    </div>
</header>

<main>
    <!-- Add car listings, images, and information here -->
    <form action="cartinsert.php" method="post">
                <div class="car-listing">
                    <img src="OIP1.jpg" alt="Car 1">
                    <h3>Car Model 1</h3>
                        
                    <a href="car_details.php?id=1">View Details</a>
                    <input type="hidden" name="carname" value="Honda City">
                    <input type="hidden" name="price" value="₹150000">
                    <input type="submit" name="submit" class="btn" value="Add to wishlist">
                </div>
    </form>
   
    <form action="cartinsert.php" method="post">
        <div class="car-listing">
        
            <img src="for.jpg" alt="Car 2">
            <h3>Car Model 2</h3>
            
            <a href="car_details.php?id=2">View Details</a>
            <input type="hidden" name="carname" value="Fortuner">
            <input type="hidden" name="price" value="₹300000">
            <input type="submit" name="submit" class="btn" value="Add to wishlist">
        </div>
    </form>
    <!-- Add more car listings as needed -->
    
</main>

<footer>
<br><br><a href="cart.php">Wishlist</a><br><br><a href="logout.php">Logout</a>
</footer>

</body>
</html>