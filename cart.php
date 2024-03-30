<?php
require_once "conn.php";
$name = $_COOKIE["user_login"];
$sql ="SELECT * FROM users WHERE username = '$name'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
$user_id = $res["id"];
$sql1 = "SELECT cart.*, users.* 
        FROM cart 
        JOIN users ON cart.user_id = users.id 
        WHERE users.id = $user_id";
$re = mysqli_query($conn, $sql1);
?>

<html lang="en">
<head>
    <title>Cart List</title>
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Link to Font Awesome for icons -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .user p {
            margin: 0;
        }

        .user a.button-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #b21f1f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .user a.button-link:hover {
            background-color: #333;
        }

        .empty-cart-message {
            text-align: center;
            color: #666;
        }

        .empty-cart-message a.button-link {
            color: #b21f1f;
            text-decoration: none;
            font-weight: bold;
        }

        .home-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #b21f1f;
            text-decoration: none;
            font-weight: bold;
        }

        .home-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container" align="center">
        <?php
        if (mysqli_num_rows($re) > 0) {
            while ($row = mysqli_fetch_assoc($re)) {
                echo '<h3> Wishlist </h3>
                <div class="user">
        
                        <p><strong>Car Name:</strong> ' . $row["CarName"] . '</p><br>
                        <p><strong>Price:</strong> ' . $row["Price"] . '</p><br>
                        <p>
                            <a href="cartdelete.php?id=' . $row["Car_id"] . '" class="button-link"><i class="fas fa-trash-alt"></i> REMOVE</a>
                        </p>
                      </div>';
            }
        } else {
            echo '<div class="empty-cart-message">Your wishlist is empty. <a href="home.php" class="button-link">Go Home</a></div>';
        }
        mysqli_close($conn);
        ?>
        <a href="home.php" class="home-link">HOME</a>
    </div>
</body>
</html>
