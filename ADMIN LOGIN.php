<html>
<head>
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" type="text/css" href="adminlogin.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php
    session_start();
    ?>
    <nav>
        <a href="home.php" style="padding: 14px 16px;">HOME</a>&nbsp;
        <a href="about.php" style="padding: 14px 16px;">ABOUT US</a>&nbsp;
        <a href="book.php" style="padding: 14px 16px;">BUS INFO</a>&nbsp;
         <div class="dropdown">
            <button class="dropbtn">LOGIN   <i class='bx bxs-down-arrow bx-xs'></i></button>
            <div class="dropdown-content">
                <a href="login.php">CUSTOMER LOGIN</a>&nbsp;
                <a href="ADMIN LOGIN.php">ADMIN LOGIN</a>&nbsp;
            </div>
        </div>
        <a href="register.php" style="padding: 14px 16px;">REGISTER</a>&nbsp;
        
        <a href="contact.php" style="padding: 14px 16px;">CONTACT US</a>&nbsp;
    </nav>
    <?php  
    include 'Connection.php';
    if(isset($_POST['Signin']))    
      
    {
    $query="SELECT * FROM `admin_login` WHERE `Admin_name`='$_POST[Admin_name]' AND `Admin_password`='$_POST[Admin_password]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
    session_start();
    $_SESSION['AdminLoginId']=$_POST['Admin_name'];
    header("location:http://localhost/BUS_TRAVELS/DASHBOARD/dashboard-admin.php");
    exit();
    }

    else
    {
    echo"<script>alert('Incorrect Password');</script>";
    }
    
    }
    ?>
    
    <div class="adminlogin-form">
        <i class='bx bxs-user-circle bx-lg'></i>
        
        <form method="POST">

        
            <input type="text" class="input-box" maxlength="10" placeholder="Enter Username" name="Admin_name" autocomplete="off" required>
            <input type="password" class="input-box" maxlength="8" placeholder="Enter Password" name="Admin_password" autocomplete="off" required>

            <button type="submit" class="login-btn" name="Signin">Sign In</button>

            
            </form>

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
                    <a href="adminlogin.php">ADMIN LOGIN</a><br>

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