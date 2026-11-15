<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `route` where id=$id";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$departure=$row['departure'];
$arrival=$row['arrival'];
$dtime=$row['dtime'];
$atime=$row['atime'];
$datetype=$row['datetype'];
$price = $row['price'];

if(isset($_POST['update']))
    {
            $busNumber = $_POST['bus_no'];
            $sql = "SELECT bus_no FROM `add-bus` WHERE bus_no='$busNumber'";
            $isBusAvailable = mysqli_num_rows(mysqli_query($con, $sql)) > 0;
            if ($isBusAvailable){

            $busNumber=$_POST['$bus_no'];
            $departure=$_POST['departure'];
            $arrival=$_POST['arrival'];
            $dtime=$_POST['dtime'];
            $atime=$_POST['atime'];
            $datetype=$_POST['datetype'];
            $price = $_POST['price'];

        $sql="update `route` set id=$id,bus_no='$busNumber',departure='$departure', arrival='$arrival', dtime='$dtime', atime='$atime',datetype='$datetype', price='$price' where id=$id";
        $result=mysqli_query($con,$sql);

        if($result)
        {
        //echo "update successfully";
        header('location:http://localhost/BUS_TRAVELS/DASHBOARD/add-route/add-route.php');
        }
        else
        {
        die(mysqli_error($con));
        }
    }
}
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>UPDATE FORM</title>
    <link rel="stylesheet" type="text/css" href="addroute.css">
</head>
<body>
    <div class="container">
        <form method="post">
        <div class="form-group">
                <label>Bus Number:</label>
                <input type="text" class="input-box" placeholder="Enter bus number" name="bus_no" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>FROM:</label>
                <input type="text" class="input-boxs" placeholder="Enter Departure" name="departure" autocomplete="off" required>

                <label>TO:</label>
                <input type="text" class="input-boxs" placeholder="Enter Arrival" name="arrival" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>DEPARTURE TIME:</label>
                <input type="time" class="input-boxx" name="dtime" autocomplete="off" required>
                <br>
                <label>ARRIVAL TIME:</label>
                <input type="time" class="input-boxx" name="atime" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>DATE:</label>
                <input type="date" class="input-box" name="datetype" required>
            </div>

            <div class="form-group">
                <label>Price per Seat:</label>
                <input type="number" class="input-box" name="price" required>
            </div>
            <br>
            <button type="update" class="submit-btn" name="update">UPDATE</button>
        </form>
    </div>
</body>
</html>