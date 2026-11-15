<?php
include 'Connection.php';

$id = $_POST['updateid'];
$fileName = basename($_FILES["image"]["name"]);
$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

$image = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

$name = $_POST['name'];
$bus_no = $_POST['bus_no'];
$bus_details = $_POST['bus_details'];
$bus_type = $_POST['type'];

$sql = "update `add-bus` set image='$imgContent',name='$name', bus_no='$bus_no', bus_details='$bus_details', bus_type='$bus_type'  where id='$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    //echo "update successfully";
    $json = ['redirectPath' => '/BUS_TRAVELS/DASHBOARD/add-bus/add-bus.php'];
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($json);
} else {
    die(mysqli_error($con));
}
