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

// Update project details in database
$stmt = $conn->prepare("UPDATE company SET name=? WHERE id=?");
$stmt->bind_param("si", $name, $id);

if ($stmt->execute() === TRUE) {
  // Redirect to project list page
  header("Location: company_list.php");
} else {
  echo "Error updating company: " . $conn->error;
}

// Close database connection
$conn->close();
?>
