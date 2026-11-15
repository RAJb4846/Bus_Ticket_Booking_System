<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ticket</title>
    <link rel="stylesheet" href="ticket.css">
</head>
<body>
<nav>
    <a href="ticket.php" style="padding: 14px 16px;">TICKET</a>&nbsp;
    <a href="ticketnon.php" style="padding: 14px 16px;">TICKET NON-AC</a>&nbsp;
    <a href="ticketac.php" style="padding: 14px 16px;">TICKET AC</a>&nbsp;
    <a href="ticketsleeper.php" style="padding: 14px 16px;">TICKET SLEEPER</a>&nbsp;
    </nav>
    <form>
        <div class="BUS">
            <div class="Book_Ticket">

                <label>Select Ticket</label><input type="number" max="6" min="1">
                <input type="submit">
                <select id="movie">
                    <option value="10">red bus ($10)</option>
                    <option value="20">blue bus ($12)</option>
                </select>
            </div>
            <ul class="Ticket">
                <li>
                    <div class="seat"></div>
                    <small>N/A</small>
                </li>
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
                <div class="row">
                    <div class="seat">1</div>
                    <div class="seat">2</div>
                    <div class="seat">3</div>
                    <div class="seat occupied">4</div>

                </div>
                <div class="row">
                    <div class="seat">5</div>
                    <div class="seat occupied">6</div>
                    <div class="seat occupied">7</div>
                    <div class="seat">8</div>

                </div>
                <div class="row">
                    <div class="seat">9</div>
                    <div class="seat">10</div>
                    <div class="seat">11</div>
                    <div class="seat">12</div>

                </div>
                <div class="row">
                    <div class="seat">13</div>
                    <div class="seat occupied">14</div>
                    <div class="seat">15</div>
                    <div class="seat">16</div>

                </div>
                <div class="row">
                    <div class="seat">17</div>
                    <div class="seat occupied">18</div>
                    <div class="seat">19</div>
                    <div class="seat">20</div>

                </div>
                <div class="row">
                    <div class="seat">21</div>
                    <div class="seat occupied">22</div>
                    <div class="seat">23</div>
                    <div class="seat">24</div>

                </div>
                <div class="row">
                    <div class="seat">25</div>
                    <div class="seat occupied">26</div>
                    <div class="seat">27</div>
                    <div class="seat">28</div>

                </div>

                <div class="row">
                    <div class="seat">29</div>
                    <div class="seat occupied">30</div>
                    <div class="seat">31</div>
                    <div class="seat">32</div>


                </div>

            </div>

        </div>
        <right>dscherhcoiehociheo</right>
        <input type="submit" value="Book Seats">
    </form>


    <h2 style="text-align:center">Slideshow Gallery</h2>

    <div class="container">
        <div class="mySlides">
            <div class="numbertext">1 / 3</div>
            <img src="busphoto8.jpeg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="busphoto9.jpeg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="busphoto10.jpeg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="busphoto8.jpeg" style="width:100%" onclick="currentSlide(1)" alt="busphoto8">
            </div>
            <div class="column">
                <img class="demo cursor" src="busphoto9.jpeg" style="width:100%" onclick="currentSlide(2)" alt="busphoto9">
            </div>
            <div class="column">
                <img class="demo cursor" src="busphoto10.jpeg" style="width:100%" onclick="currentSlide(3)" alt="busphoto10">
            </div>

        </div>
    </div>

    <script>
        const container = document.querySelector('.container');
        const seats = document.querySelectorAll('.row .seat:not(.occupied)');
        const count = document.getElementById('count');
        const total = document.getElementById('total');
        const movieSelect = document.getElementById('movie');

        populateUI();
        let ticketPrice = +movieSelect.value;

        function setMovieData(movieIndex, moviePrice) {
            localStorage.SetItem('selectedMovieIndex', movieIndex);
            localStorage.SetItem('selectedMoviePrice', moviePrice)
        }
        function updateSelectedCount() {
            const selectedSeats = documnet.querySelectorall('.row .seat.selected');
            const seatsIndex = [...selectedSeats].map(function (seat) {
                return [...seats].indexof(seat);
            });

            localStorage.setItem('selectedSeats', JSON.stringify(seats))

            const selectedSeatsCount = selectedSeats.lenght;

            count.innerText = selectedSeatsCount;

            total.innerText = selectedSeatsCount * ticketPrice;

        }

        function populateUI() {
            const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

            if (selectedSeats !== null && selectedSeats.length > 0) {
                seats.forEach((seat, index) => {
                    if (selectedSeats.indexof(index) > -1) {
                        seat.classList.add('selected');
                    }
                });
            }

            const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

            if (selectedMovieIndex != null) {
                movieSelect.selectedIndex = selectedMovieIndex;
            }
        }


        movieSelect.addEventListener('change', (e) => {
            ticketPrice = +e.target.value;
            setMovieData(e.target.selectIndex, e.target.value);
            updateSelectedCount();
        });

        container.addEventListener('click', (e) => {
            if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
                e.target.classList.toggle('selected');
            }
            updateSelectedCount()


        });
        updateSelectedCount();


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
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
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