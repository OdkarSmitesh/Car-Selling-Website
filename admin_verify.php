<!-- admin_verify.php -->
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Change this to your actual admin password
    $adminPassword = "admin";

    // Get the entered password
    $enteredPassword = $_POST["admin_password"];

    // Verify the password
    if ($enteredPassword == $adminPassword) {
        // Password is correct, redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        // Password is incorrect, redirect back to admin_login.php
        header("Location: admin_login.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to admin_login.php
    header("Location: admin_login.php");
    exit();
}
?>
