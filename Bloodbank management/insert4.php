<?php
 $donor_id = filter_input(INPUT_POST, 'donor_id');
 $name = filter_input(INPUT_POST, 'name');
 $age = filter_input(INPUT_POST, 'age');
 $address = filter_input(INPUT_POST, 'address');
 $gender = filter_input(INPUT_POST, 'gender');
 $blood_grp = filter_input(INPUT_POST, 'blood_grp');
 $quantity_donated = filter_input(INPUT_POST, 'quantity_donated');
 $date = filter_input(INPUT_POST, 'date');
 $phone = filter_input(INPUT_POST, 'phone');
 $ID = filter_input(INPUT_POST, 'ID');

$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);
echo"failure";

}
else
{
	$stmt = $conn->prepare("insert into donor(donor_id,name,age,address,gender,blood_grp,quantity_donated,date,phone,ID) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssisssdsii", $donor_id, $name, $age, $address, $gender,$blood_grp,$quantity_donated,$date,$phone,$ID );
	$stmt->execute();
        $stmt2 = $conn->prepare("update blood set quantity = (quantity + ?) where ID = ?");
	$stmt2->bind_param("ii", $quantity_donated,$ID);
	$stmt2->execute();
	echo "regitration done";
	$stmt->close();
	$conn->close();
}

?>