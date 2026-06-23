<?php
session_start();
include("../config/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM teachers WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $department = $_POST['department'];
    $qualification = $_POST['qualification'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mysqli_query($conn,"
    UPDATE teachers SET
    name='$name',
    department='$department',
    qualification='$qualification',
    phone='$phone',
    email='$email'
    WHERE id='$id'
    ");

    header("Location: teachers.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Teacher</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Edit Teacher</h2>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
value="<?php echo $row['name']; ?>">
</div>

<div class="mb-3">
<label>Department</label>
<input type="text" name="department" class="form-control"
value="<?php echo $row['department']; ?>">
</div>

<div class="mb-3">
<label>Qualification</label>
<input type="text" name="qualification" class="form-control"
value="<?php echo $row['qualification']; ?>">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control"
value="<?php echo $row['phone']; ?>">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?php echo $row['email']; ?>">
</div>

<button class="btn btn-success" name="update">
Update Teacher
</button>

<a href="teachers.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</body>
</html>