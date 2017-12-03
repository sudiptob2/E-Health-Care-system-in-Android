<?php
error_reporting(0);
require "db_connect.php";
$response = array();
define('UPLOAD_DIR', 'Images/');
$img = $_POST["image"];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.png';
$success = file_put_contents($file, $data);

$email =$_POST["email"];

$path = $file;

$sql = "UPDATE `tbl_patient` SET `image`= '$path' WHERE email = '".$email."' ;";

if(mysqli_query($con,$sql))
	{
		echo "success";

	}
else
	{
		echo "Failed";
	}
	$response = array("image path"=>$path);
	echo json_encode(array("user_data"=>$response));
		
?>