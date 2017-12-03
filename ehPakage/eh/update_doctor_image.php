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

$sql = "UPDATE `tbl_doctor` SET `image`= '$path' WHERE email = '".$email."' ;";

if(mysqli_query($con,$sql))
	{
		echo "success";
		$response = array("success"=> 1);

	}
else
	{
		$response = array("success"=> 0);
	}
	$response = array("image path"=>$sql);
	echo json_encode(array("user_data"=>$response));
		
?>