<?php
session_start();
include("../config/db.php");

$student_id = 1; // temporary
?>

<div class="container mt-4">

<h2>My Fees</h2>

<table class="table table-bordered">

<tr>
<th>Total Fee</th>
<th>Paid Fee</th>
<th>Remaining</th>
<th>Status</th>
</tr>

<?php

$result=mysqli_query($conn,"
SELECT *
FROM fees
WHERE student_id='$student_id'
");

while($row=mysqli_fetch_assoc($result))
{
$remaining =
$row['total_fee'] - $row['paid_fee'];
?>

<tr>

<td>₹<?= $row['total_fee']; ?></td>

<td>₹<?= $row['paid_fee']; ?></td>

<td>₹<?= $remaining; ?></td>

<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</table>

</div>