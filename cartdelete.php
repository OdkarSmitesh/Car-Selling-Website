<?php
require_once "conn.php";
$id=$_GET['id'];
$sql = "DELETE FROM cart WHERE Car_id=$id";
$result = mysqli_query($conn,$sql);
include 'cart.php'
?>