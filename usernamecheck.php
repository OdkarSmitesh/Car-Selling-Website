<?php
include("conn.php");
if(!empty(isset($_POST['username'])) && isset($_POST['username'])){
    $username=$_POST['username'];
    checkusername($conn,$username);
}
function checkusername($conn,$username){
    $query="SELECT username FROM users Where username='$username'";
    $result=$conn->query($query);
    if($result->num_rows >0){
        echo "<span style='color:red'>this username exists</span>";
    }
    else{
        echo "<span style='color:green'>username available</span>";
    }

}
?>

