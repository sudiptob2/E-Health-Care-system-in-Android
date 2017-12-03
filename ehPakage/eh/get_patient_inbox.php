<?php
error_reporting(0);
require "db_connect.php";
 
$patient_id = $_POST["patient_id"];
 
$response = array();
 
 $sql = "SELECT * FROM tbl_request WHERE request_id IN ( SELECT request_id FROM tbl_dpd WHERE patient_id = '".$patient_id."' ); ";
//$sql = "SELECT name,patient_id FROM tbl_patient WHERE patient_id IN (SELECT patient_id FROM tbl_dpd WHERE doctor_id = '".$doctor_id."' ORDER BY  patient_id  ASC ) ;";

$sql = "SELECT disease_name,name as doctor_name , T2.detail as prescription_detail,responded_at,t2.prescription_id as pid FROM tbl_dpd T1 INNER join tbl_prescription T2 
ON T1.prescription_id = T2.prescription_id
 INNER join tbl_doctor T3 ON 
 t1.doctor_id = t3.doctor_id
 INNER JOIN tbl_request T4 ON 
 t1.request_id = t4.request_id
 WHERE t1.patient_id = '".$patient_id."' ;";
 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				$response["patient_inbox_items"] = array();
				while($row = mysqli_fetch_array($result))
				{
					$temp = array();
					$temp["disease_name"] = $row["disease_name"];
					$temp["doctor_name"]=$row["doctor_name"];
					$temp["prescription_detail"] = $row["prescription_detail"];	
					$reqTime = date('M j Y g:i A', strtotime($row["responded_at"]));
					$temp["responded_at"] = $reqTime;	
					$temp["pid"]=$row["pid"];
					array_push($response["patient_inbox_items"],$temp);
				
					
				}
	
			}
			else
			{
				echo '';
			}
echo json_encode($response);
 
?>