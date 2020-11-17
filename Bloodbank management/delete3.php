<?php
 $ID = filter_input(INPUT_POST, 'ID');


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);

}
else
{
	$stmt = $conn->prepare("delete from blood where ID = ? ");
	$stmt->bind_param("i",$ID);
	$stmt->execute();
	echo "deletion done";
	$stmt->close();
	$conn->close();
}

?>