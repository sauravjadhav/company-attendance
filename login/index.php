<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="atten.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENATTS ATTENDANCE FORM</title>
</head>

<body>
    <h1>
        <div class="logo"><img src="enats-logo.png" alt="logo"> ATTENDANCE FORM
    </h1>
    </div>
    <form action="insert.php" method="post">
        <table>
            <div class="container">
                <tr class="Name">
                    <td> <label for="name">Name:</label></td>
                    <td> <input type="search" id="name" name="name"><br><br></td>
                </tr>
                <tr class="Office In Time">
                    <td><label for="time">Office In Time:</label></td>
                    <td><input type="time" id="time" name="time"><br><br></td>
                </tr>
                <tr class="company">
                    <td><label for="company">Company:</label></td>
                    <td><select name="company" id="company">
                            <option value="Training">Training</option>
                            <option value="sample">sample</option>
                            <option value="sample">sample</option>
                            <option value="sample">sample</option>
                        </select></td>
                </tr>
                <tr class=" Project">
                    <td><label for="project"> Company Project:</label></td>
                    <td>
                        <select name="project" id="project">
                            <?php
                            // Connect to the database
                            $conn = mysqli_connect("localhost", "root", "", "login");

                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            // Query the database to fetch project names
                            $sql = "SELECT name FROM projects";
                            $result = mysqli_query($conn, $sql);

                            // Generate HTML options for each project
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                                }
                            }

                            // Close the database connection
                            mysqli_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="project Start Time">
                    <td><label for="time">Project Start Time:</label></td>
                    <td><input type="time" id="time" name="time"><br><br></td>
                </tr>
                <tr class="Company leader Name">
                    <td><label for="leader">Company Leader Name:</label></td>
                    <td><input type="text" id="Company Leader Name" name="Company Leader Name"><br><br></td>
                </tr>
                <tr class="Task/Queries">
                    <td><label for="name">Task/Queries:</label></td>
                    <td><input type="text" id="Task/Queries" name="Task/Queries"><br><br></td>
                </tr>
                <tr class="Project Status">
                    <td> <label for="status">Project Status:</label></td>
                    <td><select id="status" name="status">
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="on hold">On Hold</option>
                        </select><br><br>
                </tr>
                <tr class="Commit No">
                    <td><label for="name">Commit No:</label></td>
                    <td><input type="text" id="Commit No" name="Commit No"><br><br></td>
                </tr>
                <tr>
                    <td>
                        <a href="logout.php">Logout</a>
                    </td>
                    <td><button type="submit" value="Submit">Submit</button></td>
                </tr>
        </table>
    </form>
</body>
</html>

