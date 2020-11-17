<?php
 $ID = filter_input(INPUT_POST, 'ID');
 $blood_grp = filter_input(INPUT_POST, 'blood_grp');
 $quantity = filter_input(INPUT_POST, 'quantity');


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);
echo"failure";

}
else
{
	$stmt = $conn->prepare("insert into blood(ID,blood_grp,quantity) values(?, ?, ?)");
	$stmt->bind_param("isd",$ID, $blood_grp, $quantity );
	$stmt->execute();
	echo "regitration done";
	$stmt->close();
	$conn->close();
}

?>