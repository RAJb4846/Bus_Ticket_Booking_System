<?php
    session_start();
    ?>
<html>
<head>
<title>BUS INFO</title>
   
    <link rel="stylesheet" type="text/css" href="businfo.css">

</head>


<body>
    <nav>
    <a href="home.php" style="padding: 14px 16px;">HOME</a>&nbsp;
    <a href="about.php" style="padding: 14px 16px;">ABOUT US</a>&nbsp;
    <a href="book.php" style="padding: 14px 16px;">BUS INFO</a>&nbsp;
    <div class="dropdown">
        <button class="dropbtn">LOGIN<i class='bx bxs-down-arrow'></i></button>
        <div class="dropdown-content">
            <a href="login.php">CUSTOMER LOGIN</a>&nbsp;
            <a href="ADMIN LOGIN.php">ADMIN LOGIN</a>&nbsp;
        </div>
    </div>
    <a href="register.php" style="padding: 14px 16px;">REGISTER</a>&nbsp;
    <a href="contact.php" style="padding: 14px 16px;">CONTACT US</a>&nbsp;
</nav>
<div class="container">
           
            <table class="table">

                <tr style="color:white; background-color:#0A2558;">
                    <th scope="col">SR NO.</th>
                    <th scope="col">IMAGE</th>                  
                    <th scope="col">BUS NAME</th>
                    <th scope="col">BUS NUMBER</th>                   
                    <th scope="col">BUS DETAILS</th>
                    <th scope="col">BUS TYPE</th>
              

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
                            <td><img src='data:image/jpg;charset=utf8;base64,$thumbnail' width='300px' height='150px'/></td>                            
                            <td>$row[name]</td>
                            <td>$row[bus_no]</td>                           
                            <td>$row[bus_details]</td>
                            <td>$row[bus_type]</td>
                           ";
                        $index++;
                }
                ?>


            </table>
        </div>

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

</body>
</html>