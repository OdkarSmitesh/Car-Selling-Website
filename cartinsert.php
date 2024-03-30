<?php
    require_once "conn.php";
    $name = $_COOKIE["user_login"];
    $ql ="SELECT id FROM users WHERE username = '$name'";
    $result = mysqli_query($conn, $ql);

    // Check if the query was successful
    if ($result) {
        // Fetch the user ID from the result set
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];

        if (isset($_POST['submit'])) {
            $carname = $_POST['carname'];
            $price = $_POST['price'];

            if ($carname != "" && $price != "") {
                $sql = "INSERT INTO cart (CarName, Price, user_id)
                        VALUES ('$carname', '$price', '$user_id')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>window.location.href='cart.php';</script>";
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "<script>window.location.href='home.php';</script>";
            }
        }
    } else {
        echo mysqli_error($conn);
    }
?>


