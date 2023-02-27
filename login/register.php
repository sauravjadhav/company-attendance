<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Registration Page</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>

    <?php
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the register button was clicked
    if (isset($_POST['register'])) {
        // Get the input values
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Validate the input values
        $errors = array();
        if (empty($username)) {
            $errors['username'] = 'Username is required';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is required';
        }
        if ($password != $confirm_password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
        if (empty($email)) {
            $errors['email'] = 'Email is required';
        }

        // If there are no errors, proceed with registration
        if (empty($errors)) {
            // Prepare SQL statement to insert user data into database
            $sql = "INSERT INTO loginpage (username, password, email) VALUES ('$username', '$password', '$email')";

            // Execute the SQL statement
            if (mysqli_query($conn, $sql)) {
                echo '<p>Registration successful!</p>';
            } else {
                echo '<p>Error registering user.</p>';
            }
        } else {
            // Print error messages
            echo '<ul class="error">';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
        }

        // Close database connection
        mysqli_close($conn);
    }
    ?>

</body>

</html>