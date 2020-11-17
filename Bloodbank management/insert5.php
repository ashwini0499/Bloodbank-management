<?php
 $receiver_id = filter_input(INPUT_POST, 'receiver_id');
 $name = filter_input(INPUT_POST, 'name');
 $age = filter_input(INPUT_POST, 'age');
 $address = filter_input(INPUT_POST, 'address');
 $gender = filter_input(INPUT_POST, 'gender');
 $blood_grp = filter_input(INPUT_POST, 'blood_grp');
 $quantity_received = filter_input(INPUT_POST, 'quantity_received');
 $date = filter_input(INPUT_POST, 'date');
 $phone = filter_input(INPUT_POST, 'phone');
 $ID = filter_input(INPUT_POST, 'ID');
 $d_id = filter_input(INPUT_POST, 'd_id');

$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);
echo"failure";

}
else
{
	$stmt = $conn->prepare("insert into receiver(receiver_id,name,age,address,gender,blood_grp,quantity_received,date,phone,ID,d_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssisssisiii", $receiver_id, $name, $age, $address, $gender,$blood_grp,$quantity_received,$date,$phone,$ID,$d_id );
	$stmt->execute();
$stmt2 = $conn->prepare("update blood set quantity = (quantity - ?) where ID = ?");
	$stmt2->bind_param("ii", $quantity_received,$ID);
	$stmt2->execute();

	echo "regitration done";
	$stmt->close();
	$conn->close();
}

?>