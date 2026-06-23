<?php
session_start();

include("../config/db.php");
?>

<div class="container mt-4">

<h2>Attendance Records</h2>

<table class="table table-bordered">

<tr>
<th>Date</th>
<th>Status</th>
</tr>

<?php

$student_id=1; // temporary

$result=mysqli_query($conn,"
SELECT *
FROM attendance
WHERE student_id='$student_id'
");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['attendance_date']; ?></td>

<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</table>

</div>