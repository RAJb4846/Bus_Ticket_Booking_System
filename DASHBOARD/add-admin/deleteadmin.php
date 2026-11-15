<?php
include 'Connection.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql="delete from `admin_login` where id=$id";
$result=mysqli_query($con,$sql);
if($result){
//echo"delete successful";
header('location:http://localhost/BUS_TRAVELS/DASHBOARD/add-admin/add-admin.php');
}
else{
die(mysqli_error($con));
}

}

?>