<?php
error_reporting(0);
require "db_connect.php";
 
$email = $_POST["email"];

$response = array();
 
$sql = "SELECT * FROM `tbl_patient` WHERE `email`= '".$email."'  ;";
$birth_date;
$result = mysqli_query($con, $sql);
			 if($result)
			{
				while($row = mysqli_fetch_array($result))
				{
					
					$birth_date = $row[2];
					$from = new DateTime($birth_date);
					$to   = new DateTime('today');
					
					
					$response = array("patient_id"=>$row[0],"name"=>$row[1],
					"age"=> $from->diff($to)->y,
					"gender"=>$row[3],
					"height"=>(string)$row[4],
					"marital_status"=>$row[5],
					"phone"=>$row[6],
					"email"=>$row[7],
					"image"=>$row[8]
				
					);
				}
	
			}
			else
			{
				echo 'Wrong ';
			}

echo json_encode(array("user_data"=>$response));
 
?>