<?php
require_once "conn.php";
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .menu-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table border="1" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                    <td>' . $row["id"] . '</td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["phone"] . '</td>
                    <td>' . $row["username"] . '</td>
                    <td>' . $row["password"] . '</td>
                    <td><a href="update.php?id=' . $row["id"] . '">Edit</a>/<a href="delete.php?id=' . $row["id"] . '">DELETE</a></td>
                </tr>';
            }
        } else {
            echo "0 results";
        }
        mysqli_close($conn)
        ?>
    </table>
    <a class="menu-link" href="index.php">Menu</a>
</body>

</html>
