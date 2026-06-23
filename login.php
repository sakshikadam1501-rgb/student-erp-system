<?php

session_start();

include("config/db.php");

$msg="";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password']))
        {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            if($row['role']=="admin")
            {
                header("Location: admin/dashboard.php");
            }
            elseif($row['role']=="teacher")
            {
                header("Location: teacher/dashboard.php");
            }
            else
            {
                header("Location: student/dashboard.php");
            }

            exit();
        }
        else
        {
            $msg = "Invalid Password";
        }
    }
    else
    {
        $msg = "User Not Found";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card p-4 mx-auto" style="max-width:500px;">

<h2 class="text-center">Login</h2>

<?php
if($msg!="")
{
    echo "<div class='alert alert-danger'>$msg</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-success w-100">
Login
</button>

</form>

<br>

<a href="register.php">
Create New Account
</a>

</div>

</div>

</body>
</html>