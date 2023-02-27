<?php
// Set database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get project ID from URL parameter
$id = $_GET["id"];

// Fetch project details from database
$sql = "SELECT * FROM projects WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $description = $row["description"];
    $start_date = $row["start_date"];
    $end_date = $row["end_date"];
    $status = $row["status"];
} else {
    echo "Project not found.";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Project</title>
    <link rel="stylesheet" href="project_style.css">
</head>

<body>
    <h1>Edit Project</h1>
    <form action="update_project.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $description; ?></textarea><br><br>
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" value="<?php echo $start_date; ?>"><br><br>
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" value="<?php echo $end_date; ?>"><br><br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="not started" <?php if ($status == "not started") echo "selected"; ?>>Not Started</option>
            <option value="in progress" <?php if ($status == "in progress") echo "selected"; ?>>In Progress</option>
            <option value="completed" <?php if ($status == "completed") echo "selected"; ?>>Completed</option>
        </select><br><br>
        <input type="submit" value="Save">

    </form>
</body>

</html>