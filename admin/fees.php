<?php
session_start();
include("../config/db.php");
include("navbar.php");
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM fees WHERE id='$id'");

    header("Location: fees.php");
    exit();
}
if(isset($_POST['save']))
{
    $student_id = $_POST['student_id'];
    $total_fee = $_POST['total_fee'];
    $paid_fee = $_POST['paid_fee'];

    if($paid_fee >= $total_fee)
    {
        $status = "Paid";
    }
    else
    {
        $status = "Pending";
    }

    mysqli_query($conn,"
    INSERT INTO fees
    (student_id,total_fee,paid_fee,status)

    VALUES

    ('$student_id','$total_fee','$paid_fee','$status')
    ");
}
?>

<div class="container mt-4">

<h2>Fee Management</h2>

<form method="POST">

<label>Student</label>

<select name="student_id" class="form-control mb-3">

<?php
$result = mysqli_query($conn,"SELECT * FROM students");

while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?= $row['id']; ?>">
<?= $row['name']; ?>
</option>
<?php } ?>

</select>

<input type="number"
name="total_fee"
class="form-control mb-3"
placeholder="Total Fee"
required>

<input type="number"
name="paid_fee"
class="form-control mb-3"
placeholder="Paid Fee"
required>

<button class="btn btn-success"
name="save">
Save Fee Record
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>Student</th>
<th>Total Fee</th>
<th>Paid Fee</th>
<th>Remaining</th>
<th>Status</th>
<th>Actions</th>
</tr>
<?php

$result=mysqli_query($conn,"
SELECT fees.*,students.name

FROM fees

INNER JOIN students
ON fees.student_id=students.id
");

while($row=mysqli_fetch_assoc($result))
{
$remaining =
$row['total_fee'] - $row['paid_fee'];
?>

<tr>

<td><?= $row['name']; ?></td>

<td>₹<?= $row['total_fee']; ?></td>

<td>₹<?= $row['paid_fee']; ?></td>

<td>₹<?= $remaining; ?></td>

<td><?= $row['status']; ?></td>

<td>

<a href="edit_fee.php?id=<?= $row['id']; ?>"
class="btn btn-primary btn-sm">
Edit
</a>

<a href="fees.php?delete=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this fee record?')">
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