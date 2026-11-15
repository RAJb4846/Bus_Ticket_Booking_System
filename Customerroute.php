<?php
include 'Connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <style>

    </style>
    <link rel="stylesheet" type="text/css" href="customerroute.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <table class="table">
        <thead class="boxx">
            <tr>
                <th>BUS NAME</th>
                <th>FROM</th>
                <th>TO</th>
                <th>DEPARTURE TIME</th>
                <th>ARRIVAL TIME</th>
                <th>DATE</th>
                <th>BUS TYPE</th>
                <th>PRICE PER SEAT</th>
                <th>OPERATION</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $user = 'root';
            $password = '';
            $batabase = 'bustravels';
            $servername = 'localhost:3306';
            $mysqli = new mysqli($servername, $user, $password, $batabase);

            if ($mysqli->connect_error) {
                die('Connect Error (' .
                    $mysqli->connect_errno . ') ' .
                    $mysqli->connect_error);
            }

            $departure = $_GET['departure'];
            $arrival = $_GET['arrival'];
            $datetype = $_GET['datetype'];

            session_start();
            $_SESSION['departure'] = $departure;
            $_SESSION['arrival'] = $arrival;
            $_SESSION['datetype'] =  $datetype;

            $query = "SELECT `route`.*, `add-bus`.id as 'bus_id', `add-bus`.name, `add-bus`.bus_type FROM `route` INNER JOIN `add-bus` ON route.bus_no = `add-bus`.bus_no WHERE `route`.departure = '$departure' AND `route`.`arrival` = '$arrival' AND `route`.`datetype` = '$datetype';";
            $result = $mysqli->query($query);
            $mysqli->close();
            // READ DATA FROM EACH ROW  
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["departure"]; ?></td>
                    <td><?php echo $row["arrival"]; ?></td>
                    <td><?php echo $row["dtime"]; ?></td>
                    <td><?php echo $row["atime"]; ?></td>
                    <td><?php echo $row["datetype"]; ?></td>
                    <td><?php echo $row["bus_type"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <?php
                    $seatBookingURL = "/BUS_TRAVELS/BUS-TICKET/" . strtolower($row["bus_type"]) . ".php";
                    ?>
                    <td><a href="<?php echo $seatBookingURL . "?routeId=" . $row["id"] . "&busId=" . $row['bus_no'] . "&busType=" . $row['bus_type'] . "&basePrice=" . $row['price'] ?>"><button class="book">Book Now</button></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>