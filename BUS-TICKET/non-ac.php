<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title></title>

    <link rel="stylesheet" href="ticketnon.css">
</head>

<body>

    <form action="/BUS_TRAVELS/Passanger.php" method="GET">
        <div class="BUS">
            <ul class="Ticket">
                <li>
                    <div class="seat selected"></div>
                    <small>Selected</small>
                </li>
                <li>
                    <div class="seat occupied"></div>
                    <small>Occupied</small>
                </li>
            </ul>

            <div class="container">
                <div class="screen"></div>
                <img src="drive.jpeg" height="50" width="50">


                <hr>

                <?php

                session_start();
                $_SESSION['routeId'] = $_GET['routeId'];
                $_SESSION['busId'] = $_GET['busId'];
                $_SESSION['busType'] = $_GET['busType'];
                $_SESSION['basePrice'] = $_GET['basePrice'];

                $con = mysqli_connect("localhost", "root", "", "bus-details");
                if (mysqli_connect_error()) {
                    echo "cannot connect";
                    exit();
                }

                $bus_no = $_GET['busId'];
                $sql = "SELECT * FROM `$bus_no`";

                $result = mysqli_query($con, $sql);
                $busRow = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($busRow % 5 == 0) {
                        echo "<div class='row'>";
                    }

                    $seatNo = $row['seat_no'];
                    $isOccupied  = $row['booked'] == '1' ? " occupied" : "";
                    echo "
                        <div class='seat$isOccupied'>$seatNo</div>
                    ";

                    if (($busRow + 1) % 5 == 0) {
                        echo "</div>";
                    }
                    $busRow++;
                }
                mysqli_close($con);
                ?>

            </div>

        </div>
        <label for="totalSeats">Total Seats Selected: </label>
        <input type="number" id="totalSeats" name="totalSeats" readonly value="0">
        <input type="text" id="seatNumbers" name="seatNumbers" hidden>
        <input type="submit" value="Book Seats">
    </form>
    <h2 style="text-align:center">Slideshow Gallery</h2>

    <div class="container">
        <div class="mySlides">
            <div class="numbertext">1 / 3</div>
            <img src="nonac-1.jpeg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="nonac-2.jpeg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="nonac-3.jpeg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="nonac-1.jpeg" style="width:100%" onclick="currentSlide(1)">
            </div>
            <div class="column">
                <img class="demo cursor" src="nonac-2.jpeg" style="width:100%" onclick="currentSlide(2)">
            </div>
            <div class="column">
                <img class="demo cursor" src="nonac-3.jpeg" style="width:100%" onclick="currentSlide(3)">
            </div>

        </div>
    </div>
    <script>
        const container = document.querySelector('.container');
        const seats = document.querySelectorAll('.row .seat:not(.occupied)');

        container.addEventListener('click', (e) => {
            if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
                const totalSeats = document.getElementById('totalSeats').value;
                if (totalSeats < 6) {
                    e.target.classList.toggle('selected');
                    document.getElementById('totalSeats').value = parseInt(document.getElementById('totalSeats').value) + 1;
                    document.getElementById('seatNumbers').value = document.getElementById('seatNumbers').value + "," + e.target.textContent;
                } else {
                    alert('Maximum 6 seats can be selected!')
                }
            }
        });
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
</body>

</html>