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

// Get project details from form
$name = $_POST["name"];
$description = $_POST["description"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$status = $_POST["status"];

// Prepare SQL statement
$sql = "INSERT INTO projects (name, description, start_date, end_date, status)
VALUES ('$name', '$description', '$start_date', '$end_date', '$status')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
  header("Location: project_list.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
