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

// Delete project from database
$sql = "DELETE FROM projects WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Project deleted successfully.";
  header("Location: project_list.php");
} else {
  echo "Error deleting project: " . $conn->error;
}

// Close database connection
$conn->close();
?>
