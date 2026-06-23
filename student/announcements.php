<?php
session_start();
include("../config/db.php");
?>

<div class="container mt-4">

<h2>Latest Announcements</h2>

<?php

$result=mysqli_query($conn,
"SELECT * FROM announcements ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="card mb-3">

<div class="card-body">

<h5><?= $row['title']; ?></h5>

<p><?= $row['description']; ?></p>

<small>
<?= $row['created_at']; ?>
</small>

</div>

</div>

<?php } ?>

</div>