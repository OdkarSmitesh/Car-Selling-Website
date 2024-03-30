<?php
    require_once "conn.php";
    session_start();
    if(isset($_POST["submit"]))
    {
        if(!empty($_POST["username"]) && !empty($_POST["password"]))
        {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users where username='".$username."' and password = '".$password."'";
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($result);
            if ($user)
            {
                if(!empty($_POST["rememberme"])){
                    setcookie("user_login",$username,time()+(10*365*24*60*60));

                    setcookie("user_password",$password,time()+(10*365*24*60*60));
                }else{
                    $_SESSION["username"]= $username;
                    $_SESSION["login"]= "login";
                    
            }
            header("location:home.php");    
            }
            else{
                echo "<script>alert('Username or Password is invalid'); window.location.href='signin.php';</script>";
            }

        }
    }else{
        echo "<script>
        alert('username and password cannot be emppty');window.location.href='signin.php';</script>)";
    }
?>