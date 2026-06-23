<?php
session_start();
include("../config/db.php");
include("navbar.php");

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM teachers WHERE id='$id'");

    header("Location: teachers.php");
    exit();
}

if(isset($_POST['add_teacher']))
{
    $name=$_POST['name'];
    $department=$_POST['department'];
    $qualification=$_POST['qualification'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];

    mysqli_query($conn,"
    INSERT INTO teachers
    (name,department,qualification,phone,email)

    VALUES

    ('$name','$department',
    '$qualification','$phone','$email')
    ");
}
?>

<div class="container mt-4">

<h2>Teachers Management</h2>

<form method="POST">

<div class="row">

<div class="col-md-2">
<input type="text" name="name"
class="form-control"
placeholder="Teacher Name" required>
</div>

<div class="col-md-2">
<input type="text" name="department"
class="form-control"
placeholder="Department">
</div>

<div class="col-md-2">
<input type="text" name="qualification"
class="form-control"
placeholder="Qualification">
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
name="add_teacher"
class="btn btn-success">
Add Teacher
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Name</th>
<th>Department</th>
<th>Qualification</th>
<th>Phone</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM teachers");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['department']; ?></td>
<td><?= $row['qualification']; ?></td>
<td><?= $row['phone']; ?></td>
<td><?= $row['email']; ?></td>

<td>

<a href="edit_teacher.php?id=<?= $row['id']; ?>"
class="btn btn-primary btn-sm">
Edit
</a>

<a href="?delete=<?= $row['id']; ?>"
class="btn btn-danger btn-sm">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>