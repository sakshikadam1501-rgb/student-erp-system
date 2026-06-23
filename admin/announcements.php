<?php
session_start();
include("../config/db.php");
include("navbar.php");

if(isset($_POST['save']))
{
    $title=$_POST['title'];
    $description=$_POST['description'];

    mysqli_query($conn,"
    INSERT INTO announcements
    (title,description)
    VALUES
    ('$title','$description')
    ");
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM announcements WHERE id='$id'");

    header("Location: announcements.php");
}
?>

<div class="container mt-4">

<h2>Announcements</h2>

<form method="POST">

<input type="text"
name="title"
class="form-control mb-3"
placeholder="Announcement Title"
required>

<textarea
name="description"
class="form-control mb-3"
placeholder="Announcement Details"
required>
</textarea>

<button class="btn btn-success"
name="save">
Post Announcement
</button>

</form>

<hr>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>Date</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,
"SELECT * FROM announcements ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['id']; ?></td>
<td><?= $row['title']; ?></td>
<td><?= $row['description']; ?></td>
<td><?= $row['created_at']; ?></td>

<td>

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