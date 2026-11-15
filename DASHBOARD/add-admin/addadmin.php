<?php
include 'Connection.php';
if(isset($_POST['submit']))

{
$Admin_name=$_POST['Admin_name'];
$Admin_password=$_POST['Admin_password'];

$sql="insert into `admin_login` (Admin_name,Admin_password) values ('$Admin_name','$Admin_password')";
$result=mysqli_query($con,$sql);

if($result)
{
//echo "data inseretd successfully";
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
    <title>BUS ROUTE</title>

    <link rel="stylesheet" type="text/css" href="addadmin.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>ADMIN NAME:</label>
                <input type="text" class="input-box" placeholder="Enter Admin Name" name="Admin_name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>ADMIN PASSWORD:</label>
                <input type="text" class="input-box" placeholder="Enter Admin Password" name="Admin_password" autocomplete="off" required>

            </div>
            <button type="submit" class="submit-btn" name="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>