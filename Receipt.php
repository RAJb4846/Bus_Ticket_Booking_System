<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>RECIEPT</title>
    <link rel="stylesheet" href="receipt.css">

</head>

<body>
    <form>
        <div class="container">
            <div class=header>
                <img src="bus1.1.jpg">

                <h1>BUS TRAVELS</h1>
                <p>Contact No: 986725888</p>

            </div>

            <h2>RECEIPT</h2>
            <?php
            require('Connection.php');

            session_start();

            $customer_id = $_SESSION['username'];
            $customer_name = $_SESSION['customer_name'];
            $departure =  $_SESSION['departure'];
            $arrival =  $_SESSION['arrival'];
            $datetype =  $_SESSION['datetype'];
            
            $totalSeats = $_SESSION['totalSeats'];
            $busId = $_SESSION['busId'];

            $passengerDetails = '';
            $seatNumbers = explode(",", $_SESSION['seatNumbers']);
            if (isset($_SESSION['passenger1-name'])) {
                $passengerName = $_SESSION["passenger1-name"];
                $passengerGender = $_SESSION["passenger1-gender"];
                $passengerAge = $_SESSION["passenger1-age"];
                $passengerDetails = $passengerDetails . "passenger1-name=" . $passengerName . ",passenger1-gender=" . $passengerGender  . ",passenger1-age=" . $passengerAge . ",seat-no=" . $seatNumbers[0];
            }
            if (isset($_SESSION['passenger2-name'])) {
                $passengerName = $_SESSION["passenger2-name"];
                $passengerGender = $_SESSION["passenger2-gender"];
                $passengerAge = $_SESSION["passenger2-age"];
                $passengerDetails = $passengerDetails . "|passenger2-name=" . $passengerName . ",passenger2-gender=" . $passengerGender  . ",passenger2-age=" . $passengerAge . ",seat-no=" . $seatNumbers[1];
            }
            if (isset($_SESSION['passenger3-name'])) {
                $passengerName = $_SESSION["passenger3-name"];
                $passengerGender = $_SESSION["passenger3-gender"];
                $passengerAge = $_SESSION["passenger3-age"];
                $passengerDetails = $passengerDetails . "|passenger3-name=" . $passengerName . ",passenger3-gender=" . $passengerGender  . ",passenger3-age=" . $passengerAge . ",seat-no=" . $seatNumbers[2];
            }
            if (isset($_SESSION['passenger4-name'])) {
                $passengerName = $_SESSION["passenger4-name"];
                $passengerGender = $_SESSION["passenger4-gender"];
                $passengerAge = $_SESSION["passenger4-age"];
                $passengerDetails = $passengerDetails . "|passenger4-name=" . $passengerName . ",passenger4-gender=" . $passengerGender  . ",passenger4-age=" . $passengerAge . ",seat-no=" . $seatNumbers[3];
            }
            if (isset($_SESSION['passenger5-name'])) {
                $passengerName = $_SESSION["passenger5-name"];
                $passengerGender = $_SESSION["passenger5-gender"];
                $passengerAge = $_SESSION["passenger5-age"];
                $passengerDetails = $passengerDetails . "|passenger5-name=" . $passengerName . ",passenger5-gender=" . $passengerGender  . ",passenger5-age=" . $passengerAge . ",seat-no=" . $seatNumbers[4];
            }
            if (isset($_SESSION['passenger6-name'])) {
                $passengerName = $_SESSION["passenger6-name"];
                $passengerGender = $_SESSION["passenger6-gender"];
                $passengerAge = $_SESSION["passenger6-age"];
                $passengerDetails = $passengerDetails . "|passenger6-name=" . $passengerName . ",passenger6-gender=" . $passengerGender  . ",passenger6-age=" . $passengerAge . ",seat-no=" . $seatNumbers[6];
            }
            $sql = "insert into `booking-details` (userid, customer_name, departure, arrival, date, no_of_passengers, passenger_details) values('$customer_id','$customer_name','$departure','$arrival','$datetype','$totalSeats','$passengerDetails')";
            $result = mysqli_query($con, $sql);

            $con = mysqli_connect("localhost", "root", "", "bus-details");
            if (mysqli_connect_error()) {
                echo "cannot connect";
                exit();
            }

            for ($seat = 0; $seat < sizeof($seatNumbers); $seat++) {
                $currenSeatNumber = $seatNumbers[$seat];
                $updateSeatQuery = "UPDATE `$busId` SET booked = '1' WHERE seat_no = '$currenSeatNumber' ";
                $con = mysqli_connect("localhost", "root", "", "bus-details");
                if (mysqli_connect_error()) {
                    echo "cannot connect";
                    exit();
                }
                $addSeatsQueryResults = mysqli_query($con, $updateSeatQuery);
                mysqli_close($con);
            }

            ?>

            <label>Name:</label><input type="text" class=" input-box" value="<?php echo $customer_name ?>" readonly><br>
            <label>Username:</label><input type="text" maxlength="10" class=" input-box" value="<?php echo $customer_id ?>" readonly><br>
            <div>
                <table class="tables">
                    <tr>
                        <td>BUS NUMBER</td>
                        <td>FROM</td>
                        <td>TO</td>
                        <td>DATE</td>
                        <td>BUS TYPE</td>
                        <td>AMOUNT</td>
                    </tr>
                    <tr>
                        <td><?php echo $busId ?></td>
                        <td><?php echo $departure ?></td>
                        <td><?php echo $arrival ?></td>
                        <td><?php echo $datetype ?></td>
                        <td><?php echo $_SESSION['busType'] ?></td>
                        <td><?php echo "Rs. " . $_SESSION["totalPrice"] . "/-" ?></td>
                    </tr>
                </table>
            </div>

            <table class="table">
                <tr>
                    <td>NAME</td>
                    <td>SEAT NO.</td>
                    <td>AGE</td>
                    <td>GENDER</td>
                </tr>

                <?php
                $passengers = explode("|", $passengerDetails);
                for ($index = 0; $index < sizeof($passengers); $index++) {
                    $currenPassenger = explode(",", $passengers[$index]);
                    $name = explode("=", $currenPassenger[0])[1];
                    $gender = explode("=", $currenPassenger[1])[1];
                    $age = explode("=", $currenPassenger[2])[1];
                    $seatNo = explode("=", $currenPassenger[3])[1];
                    echo "
                        <tr>
                            <td>$name</td>
                            <td>$seatNo</td>
                            <td>$age</td>
                            <td>$gender</td>
                        </tr>
                        ";
                }
                ?>
            </table>
            <br>

            <div class="box">
                <div class="first">
                    <p>
                    <h3><b>TERMS AND CODITIONS:</b></h3><br>
                    1. Bus Travels is only a bus ticket agent.It does not operate bus services of its
                    own. In order to provide a comprehensive choice od bus operations
                    departure times and prices to customers, it has tied up with many bus operators.
                    Bus Travels advice to customers is to choose bus operators they are aware of
                    and whose service they are comfortable with.
                    <h3><b>Bus Travels responsibilities include:</b></h3><br>
                    1. Issuing a valid ticket (a ticket that will be accepted by the bus
                    operator)for its network of bus operators<br>
                    2. Providing refund and support in the event of cancellation.<br>
                    3.Providing customer support and information in case of any delays/inconvenience.<br>
                    <h3><b>Bus Travels resonsibilities do not includes:</b></h3><br>
                    1.The bus operator's bus not departing/reaching on time.<br>
                    2.The bus operator's employees being rude.<br>
                    3.The bus operator's bus seats etc not being up to the customer's expextation.<br>
                    4.The bus operator's cancelling the trip due to unavoidable reasons.<br>
                    5.The baggage of the customer getting lost/stolen/damaged.<br>
                    6.The bus operator changing a customer's seat at the last minute to
                    accommodate a lady/child.<br>
                    7.The customer waiting at the wrong boarding point (please call the
                    bus operator to find out the exact boarding point if you are not a
                    regular traveler on that particular bus).<br>
                    8.The bus operator changing the boarding point and or using a pick
                    up vehicle at the boarding point to take customers to the bus
                    departure point.<br>
                    <br>
                    2.The departure time mentioned on the ticket are only tentative timing.
                    However the bus will not leave the source before the time that is mentioned on
                    the ticket.<br>
                    </p>
                </div>
                <div class="second">
                    <br>
                    <p>3.Passengers are required to furrish the following at the time of boarding the bus:<br>
                        1. A copy of the ticket (A print of the ticket or the print out of the ticket e-mail)<br>
                        2.A valid identity proof.<br>
                        Failing to do so,they may not be allowed to board the bus.<br>
                        <br>
                        4.Change of bus:In case the bus operator changes the type of the bus due to some
                        reason,Bus Travel will refund te differential amount to the customer upon being
                        intimated by the customers in 24 hours of the joourney.<br><br>
                        5.Amenities for this bus as shown on Bus Travels have been configured and provided by
                        the bus provider(bus operator). These amentions will be provided unless there are
                        some exceptions on certain days. Please note that Bus Travels provides this information
                        in good faith to help passangers to make an informed decision.The liability of the
                        amenity not being made available lies with the operator and not with Bus Travels.
                        6.In case one needs the refund to be credited back to his/her bank account,please
                        write your cash coupon details to support@bustravel.in". The home delivery charges
                        (i any), will not be refunded in the event of ticket cancellation.<br><br>
                        7.In case a booking confirmation e-mail and sms gets delayed or fails because of
                        technical reasons or as a result of incorrect e-mail ID/ phone number provided by
                        the user etc, a ticket will be considered booked as long as the ticket shows up on
                        the confirmation page of www.bustravels.in<br><br>
                        8.Grievances and claims related to the bus journey should be reported to Bus Travels<br>
                        support team within 10 days of your travel date.<br><br>
                    <table>
                        <tr>
                            <td>Cancellation time</td>
                            <td>Cancellation charges</td>
                        </tr>
                        <tr>
                            <td>After 9:30 AM</td>
                            <td>Rs.430</td>
                        </tr>
                        <tr>
                            <td>Between 9:30PM on 2nd May 9:30AM on 3rd May</td>
                            <td>Rs.215</td>
                        </tr>
                        <tr>
                            <td>Till 9:30PM on 2nd May</td>
                            <td>Rs.43</td>
                        </tr>
                    </table>
                </div>

            </div>

            </p>
            <button type="button" class="print" onclick="window.print()">PRINT</button>
            <a href="home.php"><button type="button" class="download">HOME</button></a>
    </form>
</body>

</html>