<?php
require_once "conn.php";
$id = $_REQUEST['id'];
$sql = "SELECT * from users where id='" . $id . "'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result)
?>
<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #fdbb2d;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #b21f1f;
        }

        a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-top: 15px;
        }

        a:hover {
            color: #fdbb2d;
        }
    </style>
</head>

<body>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value=<?php echo $_REQUEST["id"]; ?>>
        <label>Name:</label>
        <input type="text" name="name" value=<?php echo $row["name"]; ?>><br>
        <label>E-mail:</label>
        <input type="email" name="email" value=<?php echo $row["email"]; ?>><br>
        <label>Phone:</label>
        <input type="text" name="phone" value=<?php echo $row["phone"]; ?>><br>
        <label>Username:</label>
        <input type="text" name="username" value=<?php echo $row["username"]; ?>><br>
        <label>Password:</label>
        <input type="password" name="password" value=<?php echo $row["password"]; ?>><br>
        <input type="submit" name="submit" value="Submit"><br>
        <a href="home.php">Home</a><br><br>
    </form>
</body>

</html>
