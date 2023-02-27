<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="project_style.css">
  <title>Project Form</title>
</head>

<body>
  <h1>Project Form</h1>
  <form action="save_project.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea><br>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date"><br>

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date"><br>

    <label for="status">Status:</label>
    <select id="status" name="status">
      <option value="pending">Pending</option>
      <option value="in_progress">In Progress</option>
      <option value="completed">Completed</option>
    </select><br>

    <input type="submit" value="Save">
  </form>
</body>

</html>