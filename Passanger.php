<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Passangers</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body {
        background-image: url(bus3.jpeg);
        background-size: cover;      
        background-repeat: no-repeat;
        font-family: 'Times New Roman', Times, serif;
        }
        label{
            color:#fff;
            font-size:20px;
        }
        div {
            margin-left: 30%;
            margin-right: 30%;
        }

        fieldset {
            text-align: center;
            background-color:transparent;
            color:#fff;
        }
        .submit {
            background-color: #1c8adb;
            color: #fff;
            width: 20%;
            padding: 10px;
            border-radius: 20px;
            font-size: 15px;
            margin: 10px 0;
            border: none;
            outline: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="/BUS_TRAVELS/payment.php" method="GET">
        <div>
            <?php
            session_start();

            $_SESSION['totalSeats'] = $_GET['totalSeats'];
            $_SESSION['seatNumbers'] = substr($_GET['seatNumbers'], 1);
            $seatNumbers = explode(",", $_SESSION['seatNumbers']);

            $totalSeats = (int) $_GET['totalSeats'];
            for ($seat = 1; $seat <= $totalSeats; $seat++) {
                $currentSeatNumer = $seatNumbers[$seat - 1];
                echo "
                <fieldset>
                    <legend>Passenger $seat | Seat No. $currentSeatNumer</legend>
                    <label for='passenger$seat-name'>Name: </label>
                    <input type='text' id='passenger$seat-name' name='passenger$seat-name' maxlength='25' class='input-box' autocomplete=off required>
                    <div>
                    <span for='passenger$seat-gender'>Gender: </span>
                    <label for='Male'>Male: </label>
                    <input id='Male' type='radio' name='passenger$seat-gender' value='Male' required>
                    <label for='Female'>Female: </label>
                    <input id='Female' type='radio' name='passenger$seat-gender' value='Female' required>
                    </div>
                    <label for='passenger$seat-age'>Age: </label>
                    <input type='number' id='passenger$seat-age' name ='passenger$seat-age' agclass='input-box' autocomplete=off required>
                </fieldset>
                ";
            }
            ?>
            <center><button type="submit" class="submit">SUBMIT</button></center>
        </div>
    </form>
</body>

</html>