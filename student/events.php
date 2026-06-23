<?php
include("../config/db.php");
?>

<div class="container mt-4">

<h2>Upcoming Events</h2>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Date</th>
<th>Description</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM events ORDER BY event_date");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['title']; ?></td>
<td><?= $row['event_date']; ?></td>
<td><?= $row['description']; ?></td>

</tr>

<?php } ?>

</table>

</div>