<?php
session_start();
include("../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Assignments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2>Assignments</h2>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Description</th>
<th>Due Date</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM assignments ORDER BY due_date ASC");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['title']; ?></td>

<td><?= $row['description']; ?></td>

<td><?= $row['due_date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>