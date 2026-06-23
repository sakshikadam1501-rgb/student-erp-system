<?php
session_start();

include("../config/db.php");

/*
For testing.
Later replace with logged-in student id.
*/
$student_id = $_GET['student_id'];

$student = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT * FROM students WHERE id='$student_id'")
);

$total_obtained = 0;
$total_marks = 0;
?>

<!DOCTYPE html>
<html>
<head>

<title>Report Card</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="card-header text-center">

<h2>Aarag High School</h2>

<h4>Student Report Card</h4>

</div>

<div class="card-body">

<p>

<b>Name :</b>
<?= $student['name']; ?>

<br>

<b>Roll No :</b>
<?= $student['roll_no']; ?>

</p>

<table class="table table-bordered">

<tr>

<th>Subject</th>

<th>Exam</th>

<th>Obtained Marks</th>

<th>Total Marks</th>

</tr>

<?php

$result=mysqli_query($conn,"

SELECT
marks.*,
subjects.subject_name

FROM marks

INNER JOIN subjects

ON marks.subject_id = subjects.id

WHERE student_id='$student_id'

");

while($row=mysqli_fetch_assoc($result))
{

$total_obtained += $row['marks_obtained'];

$total_marks += $row['total_marks'];

?>

<tr>

<td>
<?= $row['subject_name']; ?>
</td>

<td>
<?= $row['exam_type']; ?>
</td>

<td>
<?= $row['marks_obtained']; ?>
</td>

<td>
<?= $row['total_marks']; ?>
</td>

</tr>

<?php
}
?>

</table>

<?php

if($total_marks > 0)
{
    $percentage =
    ($total_obtained/$total_marks)*100;
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

?>

<h4>

Total Marks :
<?= $total_obtained; ?>
/
<?= $total_marks; ?>

</h4>

<h4>

Percentage :
<?= round($percentage,2); ?>%

</h4>

<h4>

Grade :
<?= $grade; ?>

</h4>

<button
onclick="window.print()"
class="btn btn-primary">

Print Report Card

</button>

</div>

</div>

</div>

</body>
</html>