<html>
<head>
<title>CONTACT US</title>
<link rel="stylesheet" type="text/css"href="abc.css">
<style>
body{
    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, serif;
}

.message{
display:flex;
flex-wrap:wrap;
font-size:20px;
}

.message img{
height:500px;
width:100%;
}

.contact {

padding: 5px;
weight:100%;
display:flex;
}

.contact .case{
margin-left:10px;
border: 1px solid black;
padding: 5px;
width:500px;

}

.contact img{
height:auto;
width:auto;
}

label
{
display:inline-block;
text-align:left;
padding:5px;
}

.contact-in .contact-map .contact .case .input-box {
padding: 10px;
margin: 5px 10px;
width:300px;
border: 1px solid black;
outline: none;
}

.contact-in .contact-map .contact .case .submit-btn
{
    background:#030934;
    text-align:center;
    color:white;
    padding:10px;
    margin:0 40%;
}
</style>
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
	<center><h1><u>CONTACT US</u></h1></center><hr>
    <div class="message">
        <img src="contact.jpg"><hr><br>
        <p style="margin-left:80%;">Contact No:24367890<p>
        <p>Our system is committed to resolve customer concerns and grievances. We request our customers to contact our customer care representatives on the numbers provided in our website or reach us via our self-help page at https://www.bustravels.in/info/bustravelscare for quick resolution of any concerns or grievances. In the event your concerns have not been addressed, you may contact our grievance officer, Mr Sathish Krishnan at email ID- grievanceofficer@bustravels.in. The grievance officer shall endeavour to resolve your concerns within 30 days from the date of escalation</p><br>
        <hr>
    </div>

<div class="contact-in">
	<div class="contact-map">
      <form method="POST">
        <div class="contact">
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15088.178751274601!2d72.83660096977539!3d19.01775240000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cedc1b12ea71%3A0x2519a879e64f5383!2sDadar%20Club!5e0!3m2!1sen!2sin!4v1643304056496!5m2!1sen!2sin" width="800px" height="500px" style="border:0;" allowfullscreen="" loading="lazy" align="left"></iframe>
        <div class="case">
            <label>Name:</label><input type="text" name="name" maxlength="25" class="input-box" placeholder="Enter Name" required><br><br>
            <label>Email ID:</label><input type="email" name="email" maxlength="25" class="input-box" placeholder="Enter Email ID" required ><br><br>
            
            <label>Message:</label><textarea name="message" class="input-box" required> </textarea><br><br>
            <button type="submit" name="submit" class="submit-btn">SUMBIT</button>
            </div>

        </div>
    </form>
    
	</div>
	
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

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$emailid=$_POST['email'];
	$message=$_POST['message'];

    $mail = new PHPMailer(true);


	try {
		//Server settings
	
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'rajdbattin@gmail.com';                //SMTP username
		$mail->Password   = 'RAJb484631032002';                            //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	
		//Recipients
		$mail->setFrom('rajdbattin@gmail.com', 'Raj Battin');
		$mail->addAddress('rajdbattin@gmail.com');                 //Add a recipient
	
		//Content
		$mail->isHTML(true);                                        //Set email format to HTML
		$mail->Subject = 'BUS_TRAVELS:-Feedback Form Customer';
		$mail->Body    = "<br> NAME:- $name <br><br> E-MAIL:-  $emailid <br><br> MESSAGE:- $message";
	
		$mail->send();
	
		echo"<script>alert('Message has been sent')</script>";

	}
	catch (Exception $e) {
		echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
	
	}
}
?>

</body>
<html>