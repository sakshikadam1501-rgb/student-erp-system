<?php
session_start();
include("../config/db.php");
include("navbar.php");
?>

<div class="container mt-4">

<h2>Marks Records</h2>

<table class="table table-bordered">

<tr>
<th>Student</th>
<th>Subject</th>
<th>Exam</th>
<th>Marks</th>
<th>Total</th>
<th>%</th>
</tr>

<?php

$result=mysqli_query($conn,"
SELECT marks.*,
students.name,
subjects.subject_name

FROM marks

INNER JOIN students
ON marks.student_id=students.id

INNER JOIN subjects
ON marks.subject_id=subjects.id
");

while($row=mysqli_fetch_assoc($result))
{
$percentage=
($row['marks_obtained']/$row['total_marks'])*100;
?>

<tr>

<td><?= $row['name']; ?></td>

<td><?= $row['subject_name']; ?></td>

<td><?= $row['exam_type']; ?></td>

<td><?= $row['marks_obtained']; ?></td>

<td><?= $row['total_marks']; ?></td>

<td><?= round($percentage,2); ?>%</td>

</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>
