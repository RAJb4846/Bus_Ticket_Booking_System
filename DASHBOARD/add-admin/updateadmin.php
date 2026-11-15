<?php
include 'Connection.php';
$id=$_GET['updateid'];
$sql="Select * from `admin_login` where id=$id";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$Admin_name=$row['Admin_name'];
$Admin_password=$row['Admin_password'];

if(isset($_POST['update']))

{
$Admin_name=$_POST['Admin_name'];
$Admin_password=$_POST['Admin_password'];

$sql="update `admin_login` set id=$id,Admin_name='$Admin_name',Admin_password='$Admin_password' where id=$id";
$result=mysqli_query($con,$sql);

if($result)
{
//echo "update successfully";
header('location:http://localhost/BUS_TRAVELS/DASHBOARD/add-admin/add-admin.php');
}
else
{
die(mysqli_error($con));
}
}
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>UPDATE FORM</title>
    <link rel="stylesheet" type="text/css" href="addadmin.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>ADMIN NAME:</label>
                <input type="text" class="input-box" placeholder="Update Admin Name" name="Admin_name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>ADMIN PASSWORD:</label>
                <input type="text" class="input-box" placeholder="Update Admin Password" name="Admin_password" autocomplete="off" required>

            </div>  
            <button type="update" class="submit-btn" name="update">UPDATE</button>
        </form>
    </div>
</body>
</html>