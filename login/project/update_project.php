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

// Get project details from form data
$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$status = $_POST["status"];

// Update project details in database
$stmt = $conn->prepare("UPDATE projects SET name=?, description=?, start_date=?, end_date=?, status=? WHERE id=?");
$stmt->bind_param("sssssi", $name, $description, $start_date, $end_date, $status, $id);

if ($stmt->execute() === TRUE) {
  // Redirect to project list page
  header("Location: project_list.php");
} else {
  echo "Error updating project: " . $conn->error;
}

// Close database connection
$conn->close();
?>
