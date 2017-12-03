<?php
error_reporting(0);
require "db_connect.php";
 
$email = $_POST["email"];
$password = $_POST["password"];
 
$response = array();
 
$sql = "SELECT * FROM `tbl_patientlogin` WHERE `email`='".$email."' AND `password`='".$password."';";
 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				while($row = mysqli_fetch_array($result))
				{
					$response = array("email"=>$row[0],"password"=>$row[1],"userid"=>$row[2]);
				}
	
			}
			else
			{
				echo 'Wrong Email or Password!';
			}
echo json_encode(array("user_data"=>$response));
 
?>