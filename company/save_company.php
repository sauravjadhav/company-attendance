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
$name	 = $_POST["name"];


// Prepare SQL statement
$sql = "INSERT INTO company(name)
VALUES ('$name')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
  header("Location: company_list.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
