<?php
error_reporting(0);
require "db_connect.php";
 
$patient_id = $_POST["patient_id"];
 
$response = array();
 
$sql = "SELECT * FROM tbl_request T1 
INNER JOIN tbl_dpd T2
ON T1.request_id = T2.request_id
WHERE
T2.patient_id = '".$patient_id."'
ORDER BY T2.requettime DESC ; " ;
//$sql = "SELECT name,patient_id FROM tbl_patient WHERE patient_id IN (SELECT patient_id FROM tbl_dpd WHERE doctor_id = '".$doctor_id."' ORDER BY  patient_id  ASC ) ;";

 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				$response["patient_outbox_items"] = array();
				while($row = mysqli_fetch_array($result))
				{
					$temp = array();
					$temp["request_id"] = $row["request_id"];
					$temp["prescription_id"]=$row["prescription_id"];
					$temp["disease_name"] = $row["disease_name"];
					$temp["detail"]=$row["detail"];
					$temp["q1"]=$row["q1"];
					$temp["q2"]=$row["q2"];
					$temp["q3"]=$row["q3"];
					$temp["q4"]=$row["q4"];
					$temp["audio_description"]=$row["audio_description"];
					$temp["image"]=$row["image"];
		
					$reqTime = date('M j Y g:i A', strtotime($row["requettime"]));
					$temp["requettime"] = $reqTime;
					array_push($response["patient_outbox_items"],$temp);
				
					
				}
	
			}
			else
			{
				echo '';
			}
echo json_encode($response);
 
?>