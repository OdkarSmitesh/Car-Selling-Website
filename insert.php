<?php
 require_once "conn.php";
 if(isset($_POST['submit'])){
 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 if($name !="" && $email !="" && $phone !="" && $username !="" && $password !="" ){
 $sql = "INSERT INTO users (name, email, phone, username, password)
 VALUES('$name','$email','$phone','$username','$password')";
 if(mysqli_query($conn,$sql)){
 echo "<script>alert('Account Created successfully');window.location.href='signin.php';</script>";
 }
 else{
 echo mysqli_error($conn);
 }
 }else{
 echo "<script>alert('Values cannot be empty');window.location.href='add.php';</script>";
 }
 }
?>
