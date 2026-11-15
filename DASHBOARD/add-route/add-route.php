<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ADD ROUTE</title>

    <link rel="stylesheet" type="text/css" href="add-route.css">
    <!--BoxIcons CDN Link-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
        session_start();
    ?>

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

                <span class="addroute">ADD ROUTE</span>
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

        <div class="container">
            <div class="element">
                <a href="admin-route.php" class="boxs">
                    <button class="box">ADD ROUTE</button>
                </a>
            </div>
            <table class="table">

                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">ROUTE ID</th>
                    <th scope="col">BUS NO.</th>
                    <th scope="col">FROM</th>
                    <th scope="col">TO</th>
                    <th scope="col">DEPARTURE TIME</th>
                    <th scope="col">ARRIVAL TIME</th>
                    <th scope="col">DATE</th>
                    <th scope="col">Price per seat (in Rs.) </th>
                    <th scope="col">OPERATION</th>

                </tr>


                <?php
                include 'connect.php';
                $sql = "Select * from `route`";

                $result = mysqli_query($con, $sql);
                $index = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "
            <tr>
                <td scope='row'>$index</td>
                <td scope='row'>$row[id]</td>
                <td>$row[bus_no]</td>
                <td>$row[departure]</td>
                <td>$row[arrival]</td>
                <td>$row[dtime]</td>
                <td>$row[atime]</td>
                <td>$row[datetype]</td>
                <td>$row[price]</td>
                <td>
                    <a href='update.php? updateid=$row[id]' ><button class='update'>UPDATE</button></a>
                    <a href='delete.php? deleteid=$row[id]'><button class='delete'>DELETE</button></a>
                </td>
            </tr>";
                    $index++;
                }
                ?>


            </table>
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