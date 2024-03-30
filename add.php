<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="add.css">
        <script>
            function validateForm() {
                var name = document.forms["registrationForm"]["name"];
                var email = document.forms["registrationForm"]["email"];
                var phone = document.forms["registrationForm"]["phone"];
                var username = document.forms["registrationForm"]["username"];
                var password = document.forms["registrationForm"]["password"];

                // Check if all fields are filled
                if (name.value === "" || email.value === "" || phone.value === "" || username.value === "" || password.value === "") {
                    alert("All fields must be filled out");
                    if (name.value === "") {
                        name.focus();
                    } else if (email.value === "") {
                        email.focus();
                    } else if (phone.value === "") {
                        phone.focus();
                    } else if (username.value === "") {
                        username.focus();
                    } else if (password.value === "") {
                        password.focus();
                    }
                    return false;
                }

                // Check email format
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value)) {
                    alert("Invalid email format");
                    email.focus();
                    return false;
                }

                // Check phone number format
                var phoneRegex = /^\d{10}$/;
                if (!phoneRegex.test(phone.value)) {
                    alert("Phone number must be numeric with 10 digits");
                    phone.focus();
                    return false;
                }

                // Check name format
                var nameRegex = /^[A-Za-z\s]{6,60}$/;
                if (!nameRegex.test(name.value)) {
                    alert("Name should contain only alphabets and have at least 6 characters");
                    name.focus();
                    return false;
                }



                // Check username format
                var usernameRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
                if (!usernameRegex.test(username.value)) {
                    alert("Username must contain an uppercase character, lowercase character, and a special character. Minimum length is 8 characters.");
                    username.focus();
                    return false;
                }

                // Check password length
                if (password.value.length < 8) {
                    alert("Password must contain at least 8 characters");
                    password.focus();
                    return false;
                }

                return true;
            }
        </script>
    </head>
    <body>
        <div align="center" class="container">
            <form name="registrationForm" method="post" action="insert.php" action="usernamecheck.php" onsubmit="return validateForm()">
            <p><b>Please enter the Details to Create New account. </b></p><br><br>
                <label>Name:</label><br>
                <input type="text" name="name" required><br><br>
                <label>E-mail:</label><br>
                <input type="email" name="email" required><br><br>
                <label>Phone:</label><br>
                <input type="text" name="phone" required><br><br>
                <label>Username:</label>
                <input type="text" name="username" id="username" onBlur="checkusernameAvailability()" >
                <div id="usernameavail"></div><br><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>
                <input type="submit" name="submit" value="Submit"><br><br>
                <a href="signin.php">Sign In</a><br><br>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script>
            function checkusernameAvailability(usernameinput){
                var username=$("#username").val();
                $.ajax({
                    method:"POST",
                    url:"usernamecheck.php",
                    data:{username:username},
                    success: function (data) {
                        $('#usernameavail').html(data);
                    if (data.indexOf("green") >= 0) {
                        // Username is available, submit the form
                        document.forms["registrationForm"].submit();
                    } else {
                        // Username already exists, show an alert
                        alert("Username is not available. Please choose a different username.");
                    }
                }
                });
            }
        </script>
        </div>
    </body>
</html>
