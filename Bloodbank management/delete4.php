<?php
 $donor_id = filter_input(INPUT_POST, 'donor_id');


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);

}
else
{
	$stmt = $conn->prepare("delete from donor where donor_id = ? ");
	$stmt->bind_param("s",$donor_id);
	$stmt->execute();
	echo "deletion done";
	$stmt->close();
	$conn->close();
}

?>