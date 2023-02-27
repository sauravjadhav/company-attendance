<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "login");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement to insert the form data into the table
$sql = "INSERT INTO attendance (name, office_in_time, company, project, project_start_time, company_leader_name, task_queries, project_status, commit_no)
        VALUES ('".$_POST["name"]."', '".$_POST["time"]."', '".$_POST["company"]."', '".$_POST["project"]."', '".$_POST["time"]."', '".$_POST["Company_Leader_Name"]."', '".$_POST["Task/Queries"]."', '".$_POST["status"]."', '".$_POST["Commit_No"]."')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Attendance is marked";
    header("Location: attendance_list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
