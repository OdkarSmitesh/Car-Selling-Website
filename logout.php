<?php
session_start();
if(isset($_SESSION["login"])){
    unset($_SESSION["login"]);
    session_destroy();
}
if(isset($_COOKIE["user_login"]) AND isset($_COOKIE["user_password"])){
    setcookie("user_login", '',time() - (3600));
    setcookie("user_password", '',time() - (3600));
}
header("location:signin.php");
?>