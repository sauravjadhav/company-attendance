<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="project_list.css">
  <title>Project List</title>
</head>
<body>
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

// Fetch all projects from database
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

// Display projects in a table
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Name</th><th>Description</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "<td>" . $row["start_date"] . "</td>";
    echo "<td>" . $row["end_date"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "<td><a class='button' href='edit_project.php?id=" . $row["id"] . "'>Edit</a> | <a class='button' href='delete_project.php?id=" . $row["id"] . "'>Delete</a></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No projects found.";
}

// Close database connection
$conn->close();
?>
<a href="project_form.php" class="add-button">Add Project</a>
</body>
</html>