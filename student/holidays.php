<?php
session_start();

include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>School Holidays</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>School Holidays</h2>

<table class="table table-bordered table-striped">

<tr>
<th>Holiday</th>
<th>Date</th>
<th>Description</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM holidays
ORDER BY holiday_date ASC");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['title']; ?></td>

<td><?= $row['holiday_date']; ?></td>

<td><?= $row['description']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>