<?php
session_start();

include("../config/db.php");
include("navbar.php");

$students =
mysqli_fetch_array(
mysqli_query($conn,
"SELECT COUNT(*) AS total FROM students"));

$teachers =
mysqli_fetch_array(
mysqli_query($conn,
"SELECT COUNT(*) AS total FROM teachers"));

$subjects =
mysqli_fetch_array(
mysqli_query($conn,
"SELECT COUNT(*) AS total FROM subjects"));

$events =
mysqli_fetch_array(
mysqli_query($conn,
"SELECT COUNT(*) AS total FROM events"));

$holidays =
mysqli_fetch_array(
mysqli_query($conn,
"SELECT COUNT(*) AS total FROM holidays"));
?>


<div class="container mt-4">

<h2>Admin Dashboard</h2>

<div class="row">

<div class="col-md-4">

<div class="card text-white bg-primary">

<div class="card-body">

<h5>Total Students</h5>

<h1>
<?php echo $students['total']; ?>
</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-white bg-success">

<div class="card-body">

<h5>Total Teachers</h5>

<h1>
<?php echo $teachers['total']; ?>
</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card text-white bg-danger">

<div class="card-body">

<h5>Total Subjects</h5>

<h1>
<?php echo $subjects['total']; ?>
</h1>

</div>

</div>

</div>

</div>

</div>
</div>

</body>
</html>