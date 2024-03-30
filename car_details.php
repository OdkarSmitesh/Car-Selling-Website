<?php
require_once "conn.php";
session_start();

// Check if the car ID is provided in the URL
if (!isset($_REQUEST["id"]) || !is_numeric($_REQUEST["id"])) {
    header("location: index.php"); // Redirect to the main page if no ID is provided
    exit();
}

// Retrieve car details from the database based on the provided ID
$carId = $_GET["id"];
// Replace the following with your actual database query to get car details
// For example: $carDetails = getCarDetailsById($carId);
// Make sure to sanitize user inputs before using them in a query to prevent SQL injection

// Sample car details (replace this with your actual database query)
$carDetails = array(
    "id" => $carId,
    "model" => "Car Model $carId",
    "description" => getDescriptionFromDatabase($carId), // Replace this with your actual function to get description
    "price" => "Rs." . ($carId * 150000), // Sample price calculation, replace it with your actual price
);

// Check if the "Add to Wishlist" button is clicked
if (isset($_POST["add_to_wishlist"])) {
    // Replace the following with your logic to add the car to the user's wishlist
    // For example: addToWishlist($_SESSION["username"], $carId);
    // Make sure to sanitize user inputs before using them in a query to prevent SQL injection
    $wishlistMessage = "Car added to wishlist!";
}

function getDescriptionFromDatabase($carId) {
    // Replace this with your actual database query to get the description
    // For example: $description = getCarDescriptionById($carId);
    // Make sure to sanitize user inputs before using them in a query to prevent SQL injection

    // Sample descriptions based on car ID
    if ($carId == 1) {
        $description = "<b>Honda City</b><br>Elegant Design: The Honda City captivates with its refined and aerodynamic exterior. From the bold front grille to the sculpted lines that gracefully run along the body, every detail is meticulously crafted to exude elegance.<br>

        Efficient Performance: Powered by a responsive and fuel-efficient engine, the Honda City delivers a dynamic driving experience. Whether navigating city streets or embarking on a highway journey, the car's performance remains consistently impressive.<br>
        
        Spacious Interior: Step inside the Honda City to discover a world of comfort and convenience. The thoughtfully designed interior provides ample space for both passengers and luggage, making every journey enjoyable.<br>
        
        Smart Technology: Stay connected and entertained with the Honda City's cutting-edge technology features. The intuitive infotainment system, touchscreen display, and connectivity options enhance the overall driving experience.<br>
        
        Safety First: Honda prioritizes your safety. The City comes equipped with advanced safety features, including airbags, anti-lock braking system (ABS), and a robust body structure designed to protect occupants in the event of an accident.<br>
        
        Smooth Handling: Experience a smooth and agile ride, thanks to the Honda City's finely tuned suspension system. Whether navigating tight city corners or cruising on the open road, the car responds with precision and control.<br>";
        $src = "OIP";
    } elseif ($carId == 2) {
        $description = "<b>Fortuner</b><br>Key Features:<br>

        Performance: Under the hood, the Fortuner boasts a powerful engine that delivers an exhilarating driving experience. With advanced suspension systems, it smoothly glides over rough surfaces, ensuring a comfortable journey for both driver and passengers.<br>
        
        Design: The exterior is a testament to its robust character, featuring a bold front grille, sleek LED headlights, and muscular contours. The interior is crafted with precision, offering spaciousness, premium materials, and cutting-edge technology.<br>
        
        Off-Road Capabilities: Built for the thrill-seekers, the Fortuner comes equipped with advanced off-road capabilities. Whether navigating through rocky terrains or tackling challenging trails, this SUV is ready for any adventure.<br>
        
        Safety: Prioritizing safety, the Fortuner is equipped with a comprehensive suite of safety features, including advanced airbag systems, anti-lock braking, and stability control, providing peace of mind for both the driver and passengers.<br>
        
        Infotainment: The Fortuner's interior is a tech-savvy haven. An intuitive infotainment system keeps you connected on the go, and the premium sound system ensures an immersive audio experience.<br>
        
        Versatility: With flexible seating configurations and ample cargo space, the Fortuner adapts to your lifestyle. Whether it's a family road trip or a weekend getaway with friends, the Fortuner is your reliable companion.<br>";
        $src = "1.2_3";
    } else {
        $description = "Default description for Car $carId. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
        $src = "default";
    }

    return array("description" => $description, "src" => $src);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $carDetails["model"]; ?> Details</title>
    <link rel="stylesheet" href="car_details_style.css"> <!-- Link to your external CSS file for car details -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Link to Font Awesome for icons -->
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fdbb2d;
        padding: 20px;
        text-align: center;
    }

    main {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .car-details {
        text-align: center;
    }

    h3 {
        color: #333;
    }

    p {
        color: #666;
    }

    footer {
        background-color: #333;
        padding: 20px;
        color: #fff;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    footer a {
        color: #fdbb2d;
        text-decoration: none;
    }
</style>
</head>
<body>

<header>
    <h1><?php echo $carDetails["model"]; ?> Details</h1>
</header>

<main>
    <div class="car-details">
        
        <h3><?php echo $carDetails["model"]; ?></h3>
        <p><?php echo $carDetails["description"]["description"]; ?></p>
        <p>Price: <?php echo $carDetails["price"]; ?></p>

        <!-- Add to Wishlist button -->
        

        <?php
        // Display wishlist message if set
        if (isset($wishlistMessage)) {
            echo "<p>$wishlistMessage</p>";
        }
        ?>
    </div>
</main>

<footer>
    <a href="Home.php">Back to Home</a>
</footer>

</body>
</html>
