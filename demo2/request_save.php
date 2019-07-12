<?php
include("request_new.php");
include("connection_database.php");


$request_name = $_POST['requestname'];
$department_name = $_POST['departmentname'];
getDepartments($conn);

$department_id = null;
//departman_id alınacak.

$requester_name = $_POST['requesteremail'];
getRequesterUsers($conn);

$requester_id = null;
//requuester_id alınacak

$delivery_date = $_POST['date'];
$delivery_address = $_POST['addressname'];

print_r($_POST);
die();

$sql = "INSERT INTO requests (request_name, department_id,requester_id,delivery_date,delivery_address) VALUES ('$request_name','$department_id','$requester_id','$delivery_date','$delivery_address')";
$result_query = mysqli_query($conn,$sql);