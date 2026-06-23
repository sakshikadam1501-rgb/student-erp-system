<?php
session_start();
include("../config/db.php");

if(isset($_POST['save']))
{
    $title=$_POST['title'];
    $description=$_POST['description'];
    $due_date=$_POST['due_date'];

    mysqli_query($conn,"
    INSERT INTO assignments
    (title,description,due_date)

    VALUES

    ('$title','$description','$due_date')
    ");

    echo "<div class='alert alert-success'>
    Assignment Added Successfully
    </div>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Assignments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2>Add Assignment</h2>

<form method="POST">

<input type="text"
name="title"
class="form-control mb-3"
placeholder="Assignment Title"
required>

<textarea
name="description"
class="form-control mb-3"
placeholder="Assignment Description"
required>
</textarea>

<input type="date"
name="due_date"
class="form-control mb-3"
required>

<button
class="btn btn-success"
name="save">
Save Assignment
</button>

</form>

</div>

</body>
</html>