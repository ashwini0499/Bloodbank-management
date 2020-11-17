<?php
 $d_id = filter_input(INPUT_POST, 'd_id');
 $d_name = filter_input(INPUT_POST, 'd_name');
 $phone = filter_input(INPUT_POST, 'phone');
 $Join_year = filter_input(INPUT_POST, 'Join_year');
$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);
echo"failure";

}
else
{
	$stmt = $conn->prepare("insert into doctor(d_id,d_name,phone,Join_year) values(?, ?, ?, ?)");
	$stmt->bind_param("isii",$d_id, $d_name, $phone,$Join_year);
	$stmt->execute();
	echo "regitration done";
	$stmt->close();
	$conn->close();
}

?>