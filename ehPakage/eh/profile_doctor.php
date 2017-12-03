<?php
error_reporting(0);
require "db_connect.php";
 
$email = $_POST["email"];

$response = array();
 
$sql = "SELECT * FROM `tbl_doctor` WHERE `email`= '".$email."'  ;";
 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				while($row = mysqli_fetch_array($result))
				{
					
					
					$response = array("doctor_id"=>$row[0],"name"=>$row[1],
					"email"=>$row[2],
					"phone"=>$row[3],
					"image"=>$row[4],
					"degrees"=>$row[5],
					"designation"=>$row[6],
					"organization"=>$row[7],
					"yearofgraduation"=>$row[8],
					"contactaddress"=>$row[9]
				
					);
				}
	
			}
			else
			{
				echo 'Wrong ';
			}
echo json_encode(array("user_data"=>$response));
 
?>