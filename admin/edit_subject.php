<?php
session_start();
include("../config/db.php");

$id=$_GET['id'];

$result=mysqli_query($conn,
"SELECT * FROM subjects WHERE id='$id'");

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $subject_name=$_POST['subject_name'];
    $class=$_POST['class'];

    mysqli_query($conn,"
    UPDATE subjects SET
    subject_name='$subject_name',
    class='$class'
    WHERE id='$id'
    ");

    header("Location: subjects.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Subject</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Edit Subject</h2>

<form method="POST">

<div class="mb-3">
<label>Subject Name</label>
<input type="text"
name="subject_name"
class="form-control"
value="<?= $row['subject_name']; ?>">
</div>

<div class="mb-3">
<label>Class</label>
<input type="text"
name="class"
class="form-control"
value="<?= $row['class']; ?>">
</div>

<button class="btn btn-success"
name="update">
Update Subject
</button>

<a href="subjects.php"
class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>