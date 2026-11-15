<HTML>
<HEAD>
    <TITLE>BUS TICKET BOOKING SYSTEM</TITLE>
    <link rel="stylesheet" type="text/css" href="abc.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        h1 {
            color: black;
            margin-top: -2px;
        }
    </style>
</HEAD>

<BODY>
    <HEADER>
        <img src="bus1.1.jpg" alt="BUS" height="60" width="100" align="left">&nbsp;&nbsp;&nbsp&nbsp
        <h1>BUS TRAVELS</h1>
    </HEADER>
    <nav>
        <a href="home.php" style="padding: 14px 16px;">HOME</a>&nbsp;
        <a href="about.php" style="padding: 14px 16px;">ABOUT US</a>&nbsp;
        <a href="book.php" style="padding: 14px 16px;">BUS INFO</a>&nbsp;
        <div class="dropdown">
            <button class="dropbtn">LOGIN   <i class='bx bxs-down-arrow'></i></button>
            <div class="dropdown-content">
                <a href="login.php">CUSTOMER LOGIN</a>&nbsp;
                <a href="ADMIN LOGIN.php">ADMIN LOGIN</a>&nbsp;
            </div>
        </div>
        <a href="register.php" style="padding: 14px 16px;">REGISTER</a>&nbsp;
        <a href="contact.php" style="padding: 14px 16px;">CONTACT US</a>&nbsp;
    </nav>
    <br>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">
                1 / 3
            </div>
            <img src="bus8.jpg">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">
                2 / 3
            </div>
            <img src="bus4.jpg">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">
                3 / 3
            </div>
            <img src="bus5.jpg">

        </div>

    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <div class="container" style="margin:0% 20%">

        <div class="block">
            <i class="fa-solid fa-laptop"></i>
            <h2>BUS SEATS BOOKING</h2>
            <p>Organize bus routes and tours with ease.The Bus Booking <br>Software allows you to plan,schedule, and manage mutiple<br>routes with start,end,and stop detination,create timetable,<br>print bus schedules,etc.</p>
            <br>
        </div>
        <div class="block">
            <i class="fa-duotone fa-route"></i>
            <h2>BUS ROUTES</h2>
            <p>Create different bus routes with start,end and stop destinations,<br>manage time traveling, and bus schedules.See a route<br>timetable with the departure times of all buses of a specific route.</p>
            <br>
        </div>
    </div><br>
    <div class="container" style="margin:0% 20%">

        <div class="block">
            <i class="fa-solid fa-ticket"></i>
            <h2>RATES & TICKETS</h2>
            <p>Manage your specific ticket rates and discounts for each<br>bus route with our smart bus booking system. Create custom<br>ticket templates using a simple editor in the administration area.</p>
            <br>
        </div>
        <div class="block">
            <i class="fa-solid fa-credit-card"></i>
            <h2>PAYMENT METHODS</h2>
            <p>Process online and offline payments using the bus reservation<br>software. Clients can pay via PayPal or Authorize.Net by CC.<br>cash or make wire transfers.We can add other payment gateways too.</p>
            <br>
        </div>
    </div>
    <br>
    <div class="new">
        <center>
            <br>
            <center><img src="promise.png"><br>
            <h4>WE PROMISE TO DELIVER</h4>
        </center>
    </div>
    <div class="container">
        <div class="block">
            <br>
            <center><img src="medical.png"></center><br>
            <h5>SAFETY+</h5>
            <p>With Safety+ we have brought in a set of measures like Sanitized buses, mandatory masks etc. to ensure you travel safely.</p>
        </div>
        <div class="block">
            <br>
            <center><img src="customer_care.png"></center><br>
            <h5>SUPERIOR CUSTOMER SERVICE</h5>
            <p>We put our experience and relationships to good use and are available to solve your travel issues.</p>
        </div>
        <div class="block">
            <br>
            <center><img src="lowestprice.png"></center><br>
            <h5>LOWEST PRICES</h5>
            <p>We always give you the lowest price with the best partner offers.</p>
        </div>
        <div class="block">
            <br>
            <center><img src="benefits.png"><center><br>
            <h5>UNMATCHED BENEFITS</h5>
            <p>We take care of your travel beyond ticketing by providing you with innovative and unique benefits.</p>
        </div>
    </div>
        <br>
        <footer>
            <div class="codes">
                <div class="link">
                    <br>
                    <h4>Bus Travels Info</h4>
                    <a href="home.php">HOME</a><br>
                    <a href="about.php">ABOUT US</a><br>
                    <a href="book.php">BUS INFO</a><br>
                    <a href="contact.php">CONTACT US</a><br>
                </div>
                <div class="link">
                    <br>
                    <h4>Login</h4>
                    <a href="login.php">CUSTOMER LOGIN</a><br>
                    <a href="ADMIN LOGIN.php">ADMIN LOGIN</a><br>

                </div>
            </div>

            <p style="margin-left:75%">
                <left>
                    <br>
                    <a href="home.php">
                        <img src="bus1.1.jpg" alt="BUS" height="60" width="100">
                    </a><br><br>
                    Bus Travels is the world's largest<br>online bus ticket booking service<br>trusted by over 25 million happy<br>customers globally.Bus Travels<br>offers bus ticket booking through <br>its website only.
                </left>
            </p><hr>
            <center style="font-size:20px;">Design By RAJ BATTIN</center>
        </footer>

        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2500); // Change image every 2 seconds
            }
        </script>
</BODY>
</HTML>