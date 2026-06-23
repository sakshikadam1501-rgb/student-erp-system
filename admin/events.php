<?php
session_start();
include("../config/db.php");
include("navbar.php");

if(isset($_POST['save']))
{
    $title=$_POST['title'];
    $event_date=$_POST['event_date'];
    $description=$_POST['description'];

    mysqli_query($conn,"
    INSERT INTO events
    (title,event_date,description)
    VALUES
    ('$title','$event_date','$description')
    ");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM events WHERE id='$id'");

    header("Location: events.php");
}
?>

<div class="container mt-4">

<h2>Events Management</h2>

<form method="POST">

<input type="text"
name="title"
class="form-control mb-2"
placeholder="Event Title"
required>

<input type="date"
name="event_date"
class="form-control mb-2"
required>

<textarea
name="description"
class="form-control mb-2"
placeholder="Description">
</textarea>

<button
class="btn btn-success"
name="save">
Add Event
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>Title</th>
<th>Date</th>
<th>Description</th>
<th>Action</th>
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

<td>

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