<?php
session_start();
include("../config/db.php");
include("navbar.php");

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM subjects WHERE id='$id'");

    header("Location: subjects.php");
    exit();
}

if(isset($_POST['add_subject']))
{
    $subject_name=$_POST['subject_name'];
    $class=$_POST['class'];

    mysqli_query($conn,"
    INSERT INTO subjects
    (subject_name,class)

    VALUES

    ('$subject_name','$class')
    ");
}
?>

<div class="container mt-4">

<h2>Subjects Management</h2>

<form method="POST">

<div class="row">

<div class="col-md-5">
<input type="text"
name="subject_name"
class="form-control"
placeholder="Subject Name"
required>
</div>

<div class="col-md-4">
<input type="text"
name="class"
class="form-control"
placeholder="Class"
required>
</div>

<div class="col-md-3">
<button class="btn btn-success"
name="add_subject">
Add Subject
</button>
</div>

</div>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>Subject</th>
<th>Class</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM subjects");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['subject_name']; ?></td>
<td><?= $row['class']; ?></td>

<td>

<a href="edit_subject.php?id=<?=$row['id'];?>"
class="btn btn-primary btn-sm">
Edit
</a>

<a href="?delete=<?=$row['id'];?>"
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