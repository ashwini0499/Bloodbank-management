<?php
 $receiver_id = filter_input(INPUT_POST, 'receiver_id');


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);

}
else
{
	$stmt = $conn->prepare("delete from receiver where receiver_id = ? ");
	$stmt->bind_param("s",$receiver_id);
	$stmt->execute();
	echo "deletion done";
	$stmt->close();
	$conn->close();
}

?>