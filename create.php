<?php
 require_once "conn.php";
 $sql="CREATE TABLE users (
 id INT(2) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 name VARCHAR(30) NOT NULL,
 email VARCHAR(50) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 username VARCHAR(50) NOT NULL,
 password VARCHAR(30) NOT NULL
 )";
 if(mysqli_query($conn,$sql)){
 echo "<script>alert('Table users created 
successful');window.location.href='index.php';</script>";
 }
 else{
 echo "<script>alert('error creating table: " .mysqli_error($conn)."');</script>";
 }
 mysqli_close($conn);
?>