<?php
include("config/db.php");

$msg = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $msg = "Email already exists!";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,password,role)
                VALUES('$name','$email','$password','$role')";

        if(mysqli_query($conn,$sql))
        {
            $msg = "Registration Successful!";
        }
        else
        {
            $msg = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

<div class="card p-4 mx-auto" style="max-width:500px;">

<h2 class="text-center">Register</h2>

<?php
if($msg!="")
{
    echo "<div class='alert alert-info'>$msg</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Role</label>

<select name="role" class="form-control" required>
<option value="">Select Role</option>
<option value="student">Student</option>
<option value="teacher">Teacher</option>
<option value="admin">Admin</option>
</select>

</div>

<button type="submit" name="register" class="btn btn-primary w-100">
Register
</button>

</form>

<br>

<a href="login.php">Already have an account?</a>

</div>

</div>

</body>
</html>