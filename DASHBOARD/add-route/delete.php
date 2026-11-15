<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql="delete from `route` where id=$id";
$result=mysqli_query($con,$sql);
if($result){
//echo"delete successful";
header('location:http://localhost/BUS_TRAVELS/DASHBOARD/add-route/add-route.php');
}
else{
die(mysqli_error($con));
}

}

?>