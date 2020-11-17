<?php
 $e_id = filter_input(INPUT_POST, 'e_id');


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);

}
else
{
	$stmt = $conn->prepare("delete from employee where e_id = ? ");
	$stmt->bind_param("i",$e_id);
	$stmt->execute();
	echo "deletion done";
	$stmt->close();
	$conn->close();
}

?>