<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
require('Connection.php');
session_start();
#for login
if (isset($_POST['login'])) {
    $query = "SELECT * FROM `registration` WHERE `username`='$_POST[username]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                #if password matched
                $_SESSION['username'] = $result_fetch['username'];
                $_SESSION['customer_name'] = $result_fetch['name'];
                //echo'login in';
                header("location:http://localhost/BUS_TRAVELS/route.php");
            } else {
                #if incorrect password
                echo "
                <script>
                alert('Incorrect password');
                window.location.href='login.php';
                </script>
                ";
            }
        } else {
            echo "
                <script>
                alert('Username Not Registered');
                window.location.href='login.php';
                </script>
                ";
        }
    } else {
        echo "
            <script>
            alert('Cannot Run Query');
            window.location.href='login.php';
            </script>
            ";
    }
}
?>
    <nav>
        <a href="home.php" style="padding: 14px 16px;">HOME</a>&nbsp;
        <a href="about.php" style="padding: 14px 16px;">ABOUT US</a>&nbsp;
        <a href="book.php" style="padding: 14px 16px;">BUS INFO</a>&nbsp;
        <div class="dropdown">
            <button class="dropbtn">LOGIN <i class='bx bxs-down-arrow bx-xs'></i></button>
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
            <input type="text" class="input-box" maxlength="10" placeholder="Enter Username" name="username" autocomplete="off" required>
            <input type="password" class="input-box" maxlength="10" placeholder="Enter Password" name="password" autocomplete="off" required>
            <p><span><input type="checkbox" style="margin:0 10px;" required></span>I agree to the terms</p>
            <button class="login-btn" name="login">LOGIN</button>
            <hr style="margin:10px;">
            <p class="or">OR</p>
            <a href="register.php">
                <button type="button" class="signup-btn">SIGN UP</button>
            </a>
            <!--<p><button type="button" class="forgot-btn" onclick="forgotPopup()">Forgot Password?</button></p>-->
        </form>
    </div>
    <!--..........................RESET PASSWORD...........................-->
    <div class="popup-container" id="forgot-popup">
        <div class="forgot-popup">
            <form method="POST" action="forgotpassword.php">
                <h2>
                    <span>Forgot Password</span>
                    <button type="reset" onclick="closeForm()">X</button>
                </h2>
                <input type="email" placeholder="Enter Your Email-ID" name="emailid">
                <button type="submit" class="reset-btn" name="send-reset-link">send link</button>
            </form>
        </div>
    </div>
    <!--...........................................................................-->

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
        </p>
        <hr>
        <center style="font-size:20px;">Design By RAJ BATTIN</center>
    </footer>

    <script>
        function forgotPopup() {
            document.getElementById('forgot-popup').style.display = "flex";

        }
    </script>
</body>

</html>