<?php
session_start();
include("../config/db.php");

/*
For testing:
Replace 1 with logged-in student's ID later
*/
$student_id = 1;

/* Student Details */
$student_query = mysqli_query($conn,
"SELECT * FROM students WHERE id='$student_id'");

$student = mysqli_fetch_assoc($student_query);

$total_obtained = 0;
$total_marks = 0;
?>

<!DOCTYPE html>
<html>
<head>

<title>Student Report Card</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f5f5;
}

.report-card{
    background:white;
    padding:20px;
    margin-top:20px;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="container">

<div class="report-card">

<div class="text-center">

<h2>Aarag High School</h2>
<h4>Annual Report Card</h4>

</div>

<hr>

<p>
<strong>Student Name:</strong>
<?= $student['name']; ?>
</p>

<p>
<strong>Roll No:</strong>
<?= $student['roll_no']; ?>
</p>

<table class="table table-bordered">

<tr>
<th>Subject</th>
<th>Exam Type</th>
<th>Obtained Marks</th>
<th>Total Marks</th>
</tr>

<?php

$result = mysqli_query($conn,"
SELECT
marks.*,
subjects.subject_name

FROM marks

INNER JOIN subjects
ON marks.subject_id = subjects.id

WHERE marks.student_id='$student_id'
");

while($row=mysqli_fetch_assoc($result))
{
    $total_obtained += $row['marks_obtained'];
    $total_marks += $row['total_marks'];
?>

<tr>

<td><?= $row['subject_name']; ?></td>

<td><?= $row['exam_type']; ?></td>

<td><?= $row['marks_obtained']; ?></td>

<td><?= $row['total_marks']; ?></td>

</tr>

<?php
}
?>

</table>

<?php

if($total_marks > 0)
{
    $percentage =
    ($total_obtained / $total_marks) * 100;
}
else
{
    $percentage = 0;
}

if($percentage >= 90)
{
    $grade = "A+";
}
elseif($percentage >= 75)
{
    $grade = "A";
}
elseif($percentage >= 60)
{
    $grade = "B";
}
elseif($percentage >= 40)
{
    $grade = "C";
}
else
{
    $grade = "FAIL";
}

$result_status =
($percentage >= 40)
? "PASS"
: "FAIL";

?>

<div class="row">

<div class="col-md-6">

<h5>
Total Obtained:
<?= $total_obtained; ?>
</h5>

<h5>
Total Marks:
<?= $total_marks; ?>
</h5>

</div>

<div class="col-md-6">

<h5>
Percentage:
<?= round($percentage,2); ?>%
</h5>

<h5>
Grade:
<?= $grade; ?>
</h5>

<h5>
Result:
<?= $result_status; ?>
</h5>

</div>

</div>

<hr>

<button
onclick="window.print()"
class="btn btn-primary">

Print Report Card

</button>

</div>

</div>

</body>
</html>