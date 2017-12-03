<?php
error_reporting(0);
require "db_connect.php";
 
$doctor_id = $_POST["doctor_id"];

$response = array();
 
//$sql = "SELECT name,patient_id FROM tbl_patient WHERE patient_id IN (SELECT patient_id FROM tbl_dpd WHERE doctor_id = '".$doctor_id."' ORDER BY  patient_id  ASC ) ;";
$sql = "SELECT DISTINCT t2.patient_id,name FROM tbl_dpd t1 INNER JOIN
tbl_patient t2 ON 
t1.patient_id = t2.patient_id
WHERE t1.doctor_id = '".$doctor_id."'
ORDER by t1.requettime
";

 
$result = mysqli_query($con, $sql);
			 if($result)
			{
				$response["nameList"] = array();
				while($row = mysqli_fetch_array($result))
				{
					$temp = array();
					$temp["name"] = $row["name"];
					$temp["patientId"]=$row["patient_id"];
					array_push($response["nameList"],$temp);
				
					
				}
	
			}
			else
			{
				echo '';
			}
echo json_encode($response);
 
?>