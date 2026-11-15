<html>
<head>
<title>REGISTER</title>
<link rel="stylesheet" type="text/css"href="register.css">
<style>
label
{
display:inline-block;
width:100px;
text-align:center;
padding:5px;

}

textarea
{
display:inline-block;
width:50%;
margin-top:10px;
}

select
{
padding:10px;
margin:5px 0;
width:50%;
border:1px solid black;
outline:none;
}

input[type="date"]{
padding:10px;
margin:5px 0;
width:50%;
border:1px solid black;
outline:none;
}



</style>
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
    <form action="registration.php" method="post">
        <div class="sign-up-form">
            <h1>Register</h1>
            <label>Name:</label><input type="text" class=" input-box" placeholder="Your Name" name="name" id="name" required><br>
            <label>Username:</label><input type="text" maxlength="10" class=" input-box" placeholder="Your Username" name="username" id="username" required><br>
            <label>Email ID:</label><input type="email" class=" input-box" placeholder="Enter your Email ID" name="emailid" id="emailid" required><br>
            <label>Password:</label><input type="password" maxlength="10" class="input-box" name="password" id="password" required>
            <br>
            <label>Address:</label><textarea name="address" id="address" required></textarea><br>
            <label>Contact No:-</label><input type="tel" maxlength="10" class="input-box" name="contact" id="contact" required><br>
            <label>Gender:</label>Male<input type="radio" name="gender" id="gender" value="Male">
            Female<input type="radio" name="gender" id="gender" value="Female">
            Other<input type="radio" name="gender" id="gender" value="Other"><br><br>
            <label>Date Of Birth:</label><input type="date" name="dob" id="dob"><br>
            <label>City:</label><select align="center" name="city" id="city">
                <option>Mumbai
                <option>Pune
                <option>Solapur
            </select><br>
            <label>Country:</label><select align="center" name="country" id="country">
                <option>Indian
                <option>NRI
            </select><br>
                <input type="submit" value="SUBMIT" class="submit-btn">
                <input type="RESET" class="reset-btn">
        </div>
    </form>
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
                    </a><br><br><br>
                    Bus Travels is the world's largest<br>online bus ticket booking service<br>trusted by over 25 million happy<br>customers globally.Bus Travels<br>offers bus ticket booking through <br>its website only.
                </left>
            </p><hr>
            <center style="font-size:20px;">Design By RAJ BATTIN</center>
        </footer>
</body>
</html>