<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('must.jpg') center/cover fixed;
        }

        form {
            background-color: #9e9e9eb8;
            margin: 50px;
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #0020ba;
            color: #fff;
            cursor: pointer;
        }

        p {
            color: #ffeb3b;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <form method="post" action="login.php">
        <div class="align-center">
            <h1>Sign In</h1>
            <p>Please fill in the form to log in.</p>
        </div>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
        <div id="usernameavail"></div>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="rememberme"><b>Keep me logged in</b></label>
        <input type="checkbox" name="rememberme">

        <input type="submit" value="Sign In" name="submit"><br>
        <button onclick="window.location.href='admin_login.php'">Admin Login </button>
        <p>Don't have an Account?</p><br>
        <button onclick="window.location.href='add.php'">Create New Account </button><br><br>
    </form>
</body>
</html>
