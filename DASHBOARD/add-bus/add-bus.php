<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADD BUS</title>
    <link rel="stylesheet" href="add-bus.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BoxIcons CDN Link-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet' />
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">BUS TRAVELS</span>
            <br />
            <img src="bus1.1.jpg">
        </div>
        <br />
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

                <span class="addbus">ADD BUS</span>
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
                <a href="addbus.php" class="boxs">
                    <button class="box">ADD BUS</button>
                </a>
            </div>
            <table class="table">

                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">IMAGE</th>                  
                    <th scope="col">BUS NAME</th>
                    <th scope="col">BUS NUMBER</th>                   
                    <th scope="col">BUS DETAILS</th>
                    <th scope="col">BUS TYPE</th>
                    <th scope="col">OPERATION</th>

                </tr>


                <?php
                include 'Connection.php';

                $sql = "Select * from `add-bus`";

                $result = mysqli_query($con, $sql);
                $index = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $thumbnail = base64_encode($row['image']);
                    echo "
                        <tr>                          
                        <td scope='row'>$index</td>
                            <td><img src='data:image/jpg;charset=utf8;base64,$thumbnail' width='200px' height='100px'/></td>                            
                            <td>$row[name]</td>
                            <td>$row[bus_no]</td>                           
                            <td>$row[bus_details]</td>
                            <td>$row[bus_type]</td>
                            <td>
                                <a href='updatebus.php?updateid=$row[id]'><button class='update'>UPDATE</button></a>
                                <a href='deletebus.php?deleteid=$row[id]'><button class='delete'>DELETE</button></a>
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
        echo " <script>alert('Are you really want to logout')</script>";
        echo "<script>location.href='http://localhost/BUS_TRAVELS/ADMIN%20LOGIN.php'</script>";
        exit();
    }
    ?>
</body>

</html>