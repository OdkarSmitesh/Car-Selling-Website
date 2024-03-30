<?php
require_once "conn.php";
if(isset($_POST["submit"])){
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$password=$_POST['password'];
$update = " update users
set name = '".$name."', email='".$email."', phone= '".$phone."', username = '".$username."', 
password = '".$password."'
WHERE id='".$id."'";
if(mysqli_query($conn,$update)){
 echo "<script>alert('Profile Updated successfully');
 window.location.href='profile.php';</script>";
}else{
 echo mysqli_error($conn);
}
}
?>