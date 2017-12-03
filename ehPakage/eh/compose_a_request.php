<?php
error_reporting(0);
require "db_connect.php";
$response = array();

//Uploading Image 
define('UPLOAD_DIR', 'Images/');
$img = $_POST["image"];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.png';
$success = file_put_contents($file, $data);


$diseaseName = $_POST["diseaseName"];
$q1 = $_POST["q1"];
$q2 = $_POST["q2"];
$q3 = $_POST["q3"];
$q4 = $_POST["q4"];
$problemDetails = $_POST["problemDetails"];
$doctorId = $_POST["doctorId"];
$imagePath = $file;
$audioPath = $_POST["audioPath"];
$patientId = $_POST["patientId"];


$sql = "INSERT INTO `tbl_request` (`request_id`, `prescription_id`, `disease_name`, `detail`, `q1`, `q2`, `q3`, `q4`, `audio_description`, `image`, `requettime`) 
								VALUES (NULL, NULL, '$diseaseName', '$problemDetails', '$q1', '$q2', '$q3', '$q4', '$audioPath', '$imagePath', CURRENT_TIMESTAMP); ";
								
	$sql = 	"INSERT INTO `tbl_request` (`request_id`, `prescription_id`, `disease_name`, `detail`, `q1`, `q2`, `q3`, `q4`, `audio_description`, `image`, `requettime`)
								VALUES (NULL, NULL, '$diseaseName', '$problemDetails', '$q1', '$q2', '$q3', '$q4', '$audioPath', '$imagePath', CURRENT_TIMESTAMP)" ;

								
if(mysqli_query($con,$sql))
	{
		echo "F1success";

	}
else
	{
		echo "F1Failed";
	}

$sql2 = "SELECT request_id FROM tbl_request ORDER BY request_id DESC LIMIT 1;";
$requestId;
$result = mysqli_query($con, $sql2);
if($result)
	{
				while($row = mysqli_fetch_array($result))
				{
					$requestId = $row["request_id"];
				
					
				}
	}
	
$sql3 = "INSERT INTO `tbl_dpd` (`id`, `patient_id`, `doctor_id`, `prescription_id`, `request_id`, `requettime`) 
VALUES (NULL, '$patientId', '$doctorId', NULL, '$requestId', CURRENT_TIMESTAMP);";
	
	if(mysqli_query($con,$sql3))
	{
		echo 'F2success';
	}
	else
		echo'F2failed';
	
	$response = array("doctor_id"=>$doctorId);
	echo json_encode(array("user_data"=>$response));
		
?>