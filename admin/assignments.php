<?php
session_start();
include("../config/db.php");
include("navbar.php");
?>

<div class="container mt-4">

<h2>All Assignments</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>Due Date</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM assignments");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= $row['title']; ?></td>

<td><?= $row['description']; ?></td>

<td><?= $row['due_date']; ?></td>

</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>