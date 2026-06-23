<?php
session_start();
include("../config/db.php");

if(isset($_POST['save']))
{
    $date = $_POST['attendance_date'];

    foreach($_POST['status'] as $student_id => $status)
    {
        mysqli_query($conn,"
        INSERT INTO attendance
        (student_id,attendance_date,status)

        VALUES

        ('$student_id','$date','$status')
        ");
    }

    echo "<div class='alert alert-success'>Attendance Saved</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Mark Attendance</h2>

<form method="POST">

<input type="date"
name="attendance_date"
class="form-control mb-3"
required>

<table class="table table-bordered">

<tr>
<th>Roll No</th>
<th>Name</th>
<th>Status</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM students");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['roll_no']; ?></td>

<td><?= $row['name']; ?></td>

<td>

<select
name="status[<?= $row['id']; ?>]"
class="form-control">

<option value="Present">
Present
</option>

<option value="Absent">
Absent
</option>

</select>

</td>

</tr>

<?php } ?>

</table>

<button
class="btn btn-success"
name="save">
Save Attendance
</button>

</form>

</div>

</body>
</html>