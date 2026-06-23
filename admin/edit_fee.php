<?php
include("../config/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM fees WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $total_fee = $_POST['total_fee'];
    $paid_fee = $_POST['paid_fee'];

    $status = ($paid_fee >= $total_fee)
        ? 'Paid'
        : 'Pending';

    mysqli_query($conn,"
    UPDATE fees
    SET
    total_fee='$total_fee',
    paid_fee='$paid_fee',
    status='$status'
    WHERE id='$id'
    ");

    header("Location: fees.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Fee</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Edit Fee</h2>

<form method="POST">

<label>Total Fee</label>
<input type="number"
name="total_fee"
value="<?= $row['total_fee']; ?>"
class="form-control mb-3">

<label>Paid Fee</label>
<input type="number"
name="paid_fee"
value="<?= $row['paid_fee']; ?>"
class="form-control mb-3">

<button type="submit"
name="update"
class="btn btn-success">
Update Fee
</button>

</form>

</div>

</body>
</html>