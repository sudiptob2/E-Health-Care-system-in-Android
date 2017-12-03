<?php
error_reporting(0);
require "db_connect.php";
 
$response = array();
 
 $sql = "SELECT name,doctor_id FROM tbl_doctor;";

 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				$response["spinner_items"] = array();
				while($row = mysqli_fetch_array($result))
				{
					$temp = array();
					$temp["doctor_id"] = $row["doctor_id"];
					$temp["name"]=$row["name"];
					array_push($response["spinner_items"],$temp);
				
					
				}
	
			}
			else
			{
				echo '';
			}
echo json_encode($response);
 
?>