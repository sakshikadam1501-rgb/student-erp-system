<?php
session_start();

include("../config/db.php");
include("navbar.php");

if(isset($_POST['save']))
{
    $title = $_POST['title'];
    $holiday_date = $_POST['holiday_date'];
    $description = $_POST['description'];

    mysqli_query($conn,"
    INSERT INTO holidays
    (title,holiday_date,description)

    VALUES

    ('$title','$holiday_date','$description')
    ");
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM holidays WHERE id='$id'");

    header("Location: holidays.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Holiday Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Holiday Management</h2>

<form method="POST">

<input
type="text"
name="title"
class="form-control mb-3"
placeholder="Holiday Title"
required>

<input
type="date"
name="holiday_date"
class="form-control mb-3"
required>

<textarea
name="description"
class="form-control mb-3"
placeholder="Holiday Description">
</textarea>

<button
class="btn btn-success"
name="save">
Add Holiday
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Holiday</th>
<th>Date</th>
<th>Description</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM holidays
ORDER BY holiday_date ASC");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['title']; ?></td>

<td><?= $row['holiday_date']; ?></td>

<td><?= $row['description']; ?></td>

<td>

<a href="?delete=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this holiday?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>