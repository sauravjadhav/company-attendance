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
$sql = "SELECT * FROM company WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $rows = $result->fetch_assoc();
    $name = $rows["name"];
  
} else {
    echo "company not found.";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Company</title>
    <link rel="stylesheet" href="company_style.css">
</head>

<body>
    <h1>Edit Company</h1>
    <form action="update_company.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Company Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <input type="submit" value="Save">
    </form>
</body>

</html>