
<?php
require_once "conn.php";
$id=$_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";
$result = mysqli_query($conn,$sql);
include 'view.php'
?>