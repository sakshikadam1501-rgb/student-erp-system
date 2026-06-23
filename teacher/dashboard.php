<?php
session_start();

if($_SESSION['role']!='teacher')
{
    header("Location: ../login.php");
}
?>

<h1>Teacher Dashboard</h1>

<a href="../logout.php">Logout</a>