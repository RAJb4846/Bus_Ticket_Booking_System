<?php
//servername => localhost
//username => root
//password => empty
//database name => bus
$conn = mysqli_connect("localhost", "root", "", "bustravels");


        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

//Taking all 10 values from the form data(input)
$name=$_REQUEST['name'];
$username = $_REQUEST['username'];
$emailid = $_REQUEST['emailid'];
$password = $_REQUEST['password'];
$address = $_REQUEST['address'];
$contact = $_REQUEST['contact'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$city = $_REQUEST['city'];
$country = $_REQUEST['country'];

// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO cregistration VALUES ('$name', '$username', '$emailid', '$password', '$address', '$contact', '$gender','$dob', '$city', '$country')";

if(mysqli_query($conn, $sql)){
echo "<h2>DATA HAS BEEN STORED SUCCESSFULL.</h2>";
}
else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}

//Close connection
mysqli_close($conn);
 ?>