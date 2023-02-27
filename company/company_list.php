<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="company_list.css">
  <title>Company List</title>
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
$sql = "SELECT * FROM company";
$result = $conn->query($sql);

// Display projects in a table
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>CompanyName</th><th>Action</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td><a class='button' href='edit_company.php?id=" . $row["id"] . "'>Edit</a> | <a class='button' href='delete_company.php?id=" . $row["id"] . "'>Delete</a></td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No company found.";
}

// Close database connection
$conn->close();
?>
<a href="company_form.php" class="add-button">Add Company</a>
</body>
</html>