<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>BUS ROUTE</title>

    <link rel="stylesheet" type="text/css" href="addroute.css">
</head>

<body>
    <?php
    include 'connect.php';
    if (isset($_POST['submit'])) {

        $busNumber = $_POST['bus_no'];
        $sql = "SELECT bus_no FROM `add-bus` WHERE bus_no='$busNumber'";
        $isBusAvailable = mysqli_num_rows(mysqli_query($con, $sql)) > 0;
        if ($isBusAvailable) {
            $departure = $_POST['departure'];
            $arrival = $_POST['arrival'];
            $dtime = $_POST['dtime'];
            $atime = $_POST['atime'];
            $datetype = $_POST['datetype'];
            $price = $_POST['price'];
            $sql = "insert into `route` (bus_no,departure,arrival,dtime,atime,datetype,price) values('$busNumber','$departure','$arrival','$dtime','$atime','$datetype','$price')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                //echo "data inseretd successfully";
                header('location:/BUS_TRAVELS/DASHBOARD/add-route/add-route.php');
            } else {
                die(mysqli_error($con));
            }
        } else {
            header('location:/BUS_TRAVELS/DASHBOARD/add-route/admin-route.php?error=bus not found!');
        }
    }
    ?>
    <div class="container">
        <form method="post">
            <?php

            if (isset($_GET['error'])) {
                $errorMessage = $_GET['error'];
                echo "
                        <div class='form-group' style='color:red'>
                            <h3>
                            $errorMessage
                            </h3>
                        </div>
                    ";
            }

            ?>
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
                <input type="number" class="input-box" name="price" pattern="(?=.*\d){,10}" required>
            </div>
            <br>
            <button type="submit" class="submit-btn" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>