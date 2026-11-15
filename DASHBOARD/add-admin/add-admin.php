<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" >
    <title>ADD ADMIN</title>
    <link rel="stylesheet" href="add-admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                <span class="addadmin">ADD ADMIN</span>
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
                <a href="addadmin.php" class="boxs">
                    <button class="box">ADD ADMIN</button>
                </a>
            </div>
            <table class="table">

                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">ADMIN NAME</th>
                    <th scope="col">ADMIN PASSWORD</th>
                   
                    <th scope="col">OPERATION</th>

                </tr>


                <?php
                include 'Connection.php';
                $sql="Select * from `admin_login`";

                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                $id=$row['id'];
                $Admin_name=$row['Admin_name'];
                $Admin_password=$row['Admin_password'];
                

                echo'
                <tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$Admin_name.'</td>
                    <td>'.$Admin_password.'</td>
                    
                    <td>
                        <a href="updateadmin.php? updateid='.$id.'" class=""><button class="update">UPDATE</button></a>
                        <a href="deleteadmin.php? deleteid='.$id.'" class=""><button class="delete">DELETE</button></a>
                    </td>
                </tr>';
                }
                ?>


            </table>
        </div>
    </section>


    <!--<script src="script.js"></script>-->
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            }
            else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }


    </script>

    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    echo"
    <script>alert('Are you really want to logout')</script>";
    echo"
    <script>location.href='http://localhost/BUS_TRAVELS/ADMIN%20LOGIN.php'</script>";
    exit();
    }
    ?>
</body>
</html>