<!--<?php
include 'Connection.php';
    if(isset($_POST['Signin']))      
    {
    $query="SELECT * FROM `cregistration` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
    session_start();
    
    header("location:http://localhost/BUS_TRAVELS/dashboard-admin.php");
    exit();
    }
    else
    {
    echo"<script>alert('Incorrect Password');</script>";
    }
    
    }
    
?>
-->
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <nav>
        <a href="home.php" style="padding: 14px 16px;">HOME</a>&nbsp;
        <a href="about.php" style="padding: 14px 16px;">ABOUT US</a>&nbsp;
        <a href="book.php" style="padding: 14px 16px;">BOOK TICKET</a>&nbsp;
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
    <br>
<div class="login-form">
    <i class='bx bxs-user-circle bx-lg'></i>
<h1>Log In</h1>
<form method="POST">
<input type="text" class="input-box" maxlength="10" placeholder="Enter Username" name="username" id="username" required>
<input type="password" class="input-box" maxlength="8" placeholder="Enter Password" name="password" id="password">
<p><span><input type="checkbox"></span>I agree to the terms</p>
<button class="login-btn" name="login">LOGIN</button>
<hr>
<p class="or">OR</p>
<a href="register.php">
            <input type="button" class="signup-btn" value="Sign Up">
            </a>
<p><a href="#">Forgot Password</a></p>
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
                    <a href="book.php">BOOK TICKET</a><br>
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