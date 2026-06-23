<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Student ERP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f4f6f9;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#198754;
    position:fixed;
    top:0;
    left:0;
    overflow-y:auto;
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:20px;
    border-bottom:1px solid rgba(255,255,255,0.3);
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    font-size:16px;
}

.sidebar a:hover{
    background:#146c43;
}

.main-content{
    margin-left:250px;
    padding:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Student Panel</h3>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="attendance.php">📅 Attendance</a>

<a href="marks.php">📝 Marks</a>

<a href="report_card.php">📄 Report Card</a>

<a href="assignments.php">📚 Assignments</a>

<a href="announcements.php">📢 Announcements</a>

<a href="events.php">🎉 Events</a>

<a href="holidays.php">🏖 Holidays</a>

<a href="fees.php">💰 Fees</a>

<a href="profile.php">👤 My Profile</a>

<a href="../logout.php">🚪 Logout</a>

</div>

<div class="main-content">