<?php
session_start();
include("../config/db.php");

if(isset($_POST['save']))
{
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $exam_type = $_POST['exam_type'];
    $marks_obtained = $_POST['marks_obtained'];
    $total_marks = $_POST['total_marks'];

    mysqli_query($conn,"
    INSERT INTO marks
    (student_id,subject_id,exam_type,marks_obtained,total_marks)

    VALUES

    ('$student_id','$subject_id','$exam_type',
    '$marks_obtained','$total_marks')
    ");

    echo "<div class='alert alert-success'>Marks Added Successfully</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Marks Entry</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Add Marks</h2>

<form method="POST">

<label>Student</label>

<select name="student_id" class="form-control mb-3">

<?php
$s = mysqli_query($conn,"SELECT * FROM students");

while($row=mysqli_fetch_assoc($s))
{
?>
<option value="<?= $row['id']; ?>">
<?= $row['name']; ?>
</option>
<?php } ?>

</select>

<label>Subject</label>

<select name="subject_id" class="form-control mb-3">

<?php
$sub=mysqli_query($conn,"SELECT * FROM subjects");

while($row=mysqli_fetch_assoc($sub))
{
?>
<option value="<?= $row['id']; ?>">
<?= $row['subject_name']; ?>
</option>
<?php } ?>

</select>

<input type="text"
name="exam_type"
class="form-control mb-3"
placeholder="Exam Type (Unit Test / Final)"
required>

<input type="number"
name="marks_obtained"
class="form-control mb-3"
placeholder="Marks Obtained"
required>

<input type="number"
name="total_marks"
class="form-control mb-3"
placeholder="Total Marks"
required>

<button class="btn btn-success"
name="save">
Save Marks
</button>

</form>

</div>

</body>
</html>