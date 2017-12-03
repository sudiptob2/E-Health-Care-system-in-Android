<?php
error_reporting(0);
require "db_connect.php";


$gender = $_POST["gender"];
$maritalStatus = $_POST["maritalStatus"];
$name = $_POST["name"];
$birthDate = $_POST["birthDate"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$reEnteredPassword = $_POST["reEnteredPassword"];
$height =$_POST["height"];
 
$response = array();

$sql = "INSERT INTO `tbl_patient` (`patient_id`, `name`, `birth_date`, `gender`, `height`, `marital_status`, `phone`, `email`)  VALUES (NULL, '$name', '$birthDate', '$gender', '$height', '$maritalStatus', '$phone', '$email');" ;
$sql_patientLogin = "INSERT INTO `tbl_patientlogin` (`email`, `password`, `patient_id`) VALUES ('$email', '$password', NULL); ";
if(mysqli_query($con,$sql) && mysqli_query($con,$sql_patientLogin))
	{
		$response = array("success"=>1);

	}
else
	{
		$response = array("success"=>0);
	}
			
mysqli_close($con);
echo json_encode(array("is_login_successful"=>$response));
	
?>