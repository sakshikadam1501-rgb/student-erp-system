<?php
session_start();

include("../config/db.php");

include("navbar.php");
?>
<div class="container mt-4">

<h2>Attendance Records</h2>

<table class="table table-bordered">

<tr>
<th>Date</th>
<th>Roll No</th>
<th>Name</th>
<th>Status</th>
</tr>


<?php

$result=mysqli_query($conn,"
SELECT attendance.*,
students.roll_no,
students.name

FROM attendance

INNER JOIN students
ON attendance.student_id=students.id

ORDER BY attendance_date DESC
");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row['attendance_date']; ?></td>

<td><?= $row['roll_no']; ?></td>

<td><?= $row['name']; ?></td>

<td><?= $row['status']; ?></td>

</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>