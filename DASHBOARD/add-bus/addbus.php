<?php
include 'Connection.php';
if (isset($_POST['submit'])) {
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    $name = $_POST['name'];
    $bus_no = $_POST['bus_no'];
    $bus_details = $_POST['bus_details'];
    $bus_type = $_POST['type'];
    $sql = "insert into `add-bus` (image,name,bus_no,bus_details,bus_type) values('$imgContent','$name','$bus_no','$bus_details','$bus_type')";
    $addBusResults = mysqli_query($con, $sql);
    mysqli_close($con);

    $con = mysqli_connect("localhost", "root", "", "bus-details");
    if (mysqli_connect_error()) {
        echo "cannot connect";
        exit();
    }

    $bus_no = strtolower($bus_no);
    $busTableQuery = "CREATE TABLE `$bus_no` ( `seat_no` INT NOT NULL AUTO_INCREMENT , `booked` BOOLEAN NOT NULL , PRIMARY KEY (`seat_no`)) ENGINE = InnoDB;";
    $addBusTableResults = mysqli_query($con, $busTableQuery);
    mysqli_close($con);

    $noOfSeats = 0;
    if ($bus_type == "NON-AC") $noOfSeats = 40;
    if ($bus_type == "AC") $noOfSeats = 32;
    if ($bus_type == "SLEEPER") $noOfSeats = 15;
    $addSeatsQuery = "INSERT INTO `$bus_no`(`booked`) VALUES ('false')";
    for ($seat = 1; $seat <=  $noOfSeats; $seat++) {
        $con = mysqli_connect("localhost", "root", "", "bus-details");
        if (mysqli_connect_error()) {
            echo "cannot connect";
            exit();
        }
        $addSeatsQueryResults = mysqli_query($con, $addSeatsQuery);
        mysqli_close($con);
    }


    if ($addBusResults && $addBusTableResults) {
        //echo "data inseretd successfully";
        header('location:http://localhost/BUS_TRAVELS/DASHBOARD/add-bus/add-bus.php');
    }
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>ADD BUS</title>

    <link rel="stylesheet" type="text/css" href="addbus.css">
</head>

<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>PHOTO:</label>
                <input type="file" class="input-box" name="image" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>BUS TYPE:</label>
                <select name="type" class="input-box" required>
                    <option value="" disabled selected>Select your option</option>
                    <option value="NON-AC">NON-AC</option>
                    <option value="AC">AC</option>
                    <option value="SLEEPER">SLEEPER</option>
                </select>
            </div>

            <div class="form-group">
                <label>BUS NAME:</label>
                <input type="text" class="input-box" placeholder="Enter Bus Name" name="name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>BUS NUMBER:</label>
                <input type="text" class="input-box" placeholder="Enter Bus Number" name="bus_no" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>BUS DETAILS:</label>
                <input type="text" class="input-box" name="bus_details" autocomplete="off" required>
            </div>
            <button type="submit" class="submit-btn" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>