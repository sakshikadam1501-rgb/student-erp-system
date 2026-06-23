<?php
session_start();

include("../config/db.php");



include("navbar.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"DELETE FROM students WHERE id='$id'");

    header("Location: students.php");
    exit();
}

/* DELETE */

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM students WHERE id='$id'");
}

/* INSERT */

if(isset($_POST['add_student']))
{
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $division = $_POST['division'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mysqli_query($conn,"
    INSERT INTO students
    (roll_no,name,class,division,phone,email)

    VALUES

    ('$roll_no','$name','$class',
     '$division','$phone','$email')
    ");
}
?>

<div class="container mt-4">

<h2>Students Management</h2>

<form method="POST">

<div class="row">

<div class="col-md-2">
<input type="text" name="roll_no"
class="form-control"
placeholder="Roll No" required>
</div>

<div class="col-md-2">
<input type="text" name="name"
class="form-control"
placeholder="Name" required>
</div>

<div class="col-md-2">
<input type="text" name="class"
class="form-control"
placeholder="Class" required>
</div>

<div class="col-md-2">
<input type="text" name="division"
class="form-control"
placeholder="Division" required>
</div>

<div class="col-md-2">
<input type="text" name="phone"
class="form-control"
placeholder="Phone">
</div>

<div class="col-md-2">
<input type="email" name="email"
class="form-control"
placeholder="Email">
</div>

</div>

<br>

<button
name="add_student"
class="btn btn-success">
Add Student
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Roll No</th>
<th>Name</th>
<th>Class</th>
<th>Division</th>
<th>Phone</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

$result =
mysqli_query($conn,
"SELECT * FROM students");

while($row =
mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['division']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>

<a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
Edit
</a>

<a href="report_card.php?student_id=<?= $row['id']; ?>"
class="btn btn-success btn-sm">
Report Card
</a>

<a href="students.php?delete=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this student?')">
Delete
</a>

</td>

</tr>

<?php
}
?>

</table>

</div>
</div>

</body>
</html>