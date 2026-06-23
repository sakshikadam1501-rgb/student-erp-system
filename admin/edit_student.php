<?php
session_start();

include("../config/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $division = $_POST['division'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mysqli_query($conn,"
        UPDATE students
        SET
        roll_no='$roll_no',
        name='$name',
        class='$class',
        division='$division',
        phone='$phone',
        email='$email'
        WHERE id='$id'
    ");

    header("Location: students.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Edit Student</h2>

<form method="POST">

<div class="mb-3">
<label>Roll No</label>
<input type="text"
name="roll_no"
class="form-control"
value="<?php echo $row['roll_no']; ?>">
</div>

<div class="mb-3">
<label>Name</label>
<input type="text"
name="name"
class="form-control"
value="<?php echo $row['name']; ?>">
</div>

<div class="mb-3">
<label>Class</label>
<input type="text"
name="class"
class="form-control"
value="<?php echo $row['class']; ?>">
</div>

<div class="mb-3">
<label>Division</label>
<input type="text"
name="division"
class="form-control"
value="<?php echo $row['division']; ?>">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control"
value="<?php echo $row['phone']; ?>">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>">
</div>

<button type="submit"
name="update"
class="btn btn-success">
Update Student
</button>

<a href="students.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>