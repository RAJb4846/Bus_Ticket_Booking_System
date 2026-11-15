<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location:http://localhost/BUS_TRAVELS/DASHBOARD/dashboard-admin.php");
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BoxIcons CDN Link-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">BUS TRAVELS</span>
            <br>
            <img src="bus1.1.jpg">
        </div>
        <br>


        <ul class="nav-links">
            <li>
                <a href="http://localhost/BUS_TRAVELS/DASHBOARD/dashboard-admin.php">
                    <i class='bx bxs-grid-alt'></i>
                    <span class="link_name">DASHBOARD</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-admin/add-admin.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="link_name">ADD ADMIN</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-bus/add-bus.php">
                    <i class='bx bxs-bus'></i>
                    <span class="link_name">ADD BUS</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-route/add-route.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="link_name">ADD ROUTE</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">REPORT</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/BUS_TRAVELS/ADMIN%20LOGIN.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>

                <span class="dashboard">DASHBOARD</span>
            </div>
            <div class="search-box">
                <input type="search" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="RAJ.jpg" alt="">

                <span class="admin_name">
                    <?php echo $_SESSION['AdminLoginId'] ?>
                </span>
                <i class='bx bx-chevron-down'></i>
                <form method="POST">
                    <button name="Logout"><i class='bx bx-log-out-circle bx-flip-vertical' style='color:#fffafa'></i></button>
                </form>

            </div>

        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">ADD ADMIN</div>

                        <div class="indicator">
                            <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-admin/add-admin.php">
                                <button type="button" class="button">
                                    <i class='bx bx-book-add'></i>
                                    ADD
                                </button>
                            </a>
                        </div>
                    </div>
                    <i class='bx bx-user-circle cart '></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">ADD BUS</div>

                        <div class="indicator">
                            <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-bus/add-bus.php">
                                <button type="button" class="button">
                                    <i class='bx bx-book-add'></i>
                                    ADD
                                </button>
                            </a>
                        </div>
                    </div>
                    <i class='bx bxs-bus cart two'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">ADD ROUTE</div>

                        <div class="indicator">
                            <a href="http://localhost/BUS_TRAVELS/DASHBOARD/add-route/add-route.php">
                                <button type="button" class="button">
                                    <i class='bx bx-book-add'></i>
                                    ADD
                                </button>
                            </a>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">CUSTOMER DETAILS</div>

                        <div class="indicator">
                            <a href="http://localhost/BUS_TRAVELS/DASHBOARD/customer-details/customer-details.php">
                                <button type="button" class="button">
                                    <i class='bx bx-book-add'></i>
                                    ADD
                                </button>
                            </a>
                        </div>
                    </div>
                    <i class='bx bxs-user-circle cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">BUS/TICKET BOOKING</div>

                        <div class="indicator">                           
                            <a href="/BUS_TRAVELS/DASHBOARD/booking-details/booking-details.php">
                                <button type="button" class="button">
                                    <i class='bx bx-book-add'></i>
                                    ADD
                                </button>
                            </a>                           
                        </div>
                    </div>
                    <i class='bx bxs-bus cart two'></i>
                </div>
                



        </div>
    </section>


    <!--<script src="script.js"></script>-->
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
    <?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        echo "<script>alert('Are you really want to logout')</script>";
        echo "<script>location.href='http://localhost/BUS_TRAVELS/ADMIN%20LOGIN.php'</script>";
        exit();
    }


    ?>

</body>

</html>