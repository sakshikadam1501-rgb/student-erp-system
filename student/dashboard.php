<?php
session_start();

if($_SESSION['role']!='student')
{
    header("Location: ../login.php");
}
?>

<h1>Student Dashboard</h1>

<a href="../logout.php">Logout</a>