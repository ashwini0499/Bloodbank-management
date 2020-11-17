<?php
 $e_id = filter_input(INPUT_POST, 'e_id');
 $e_name = filter_input(INPUT_POST, 'e_name');
 $phone = filter_input(INPUT_POST, 'phone');
 $address = filter_input(INPUT_POST, 'address');

$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);
echo"failure";

}
else
{
	$stmt = $conn->prepare("insert into employee(e_id,e_name,phone,address) values(?, ?, ?, ?)");
	$stmt->bind_param("isis",$e_id, $e_name, $phone, $address );
	$stmt->execute();
	echo "regitration done";
	$stmt->close();
	$conn->close();
}

?>