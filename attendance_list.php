<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="attendance_list.css">
  <title>Attendance List</title>
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
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);

// Display projects in a table
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Name</th><th>Office in time</th><th>Company</th><th>Project</th><th>Project Start Time</th><th>Company Leader Name</th><th>Task-queries</th><th>Project status</th><th>Commit No</th><th>Marked on</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["office_in_time"] . "</td>";
    echo "<td>" . $row["company"] . "</td>";
    echo "<td>" . $row["project"] . "</td>";
    echo "<td>" . $row["project_start_time"] . "</td>";
    echo "<td>" . $row["company_leader_name"] . "</td>";
    echo "<td>" . $row["task_queries"] . "</td>";
    echo "<td>" . $row["project_status"] . "</td>";
    echo "<td>" . $row["commit_no"] . "</td>";
    echo "<td>" . $row["created_at"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No attendance found.";
}

// Close database connection
$conn->close();
?>
<a href="logout.php">Logout</a>
</body>
</html>