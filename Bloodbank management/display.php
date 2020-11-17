
<?php


$conn = mysqli_connect('localhost:3307','root','','blood_bank');
if($conn->connect_error){
	die('connection failed  : '.$conn->connect_error);

}
else
{
mysqli_select_db($conn,'blood_bank');	
$stmt =  "select * from doctor";	
$records = mysqli_query($conn,$stmt);

$stmt2 =  "select * from employee";	
$records2 = mysqli_query($conn,$stmt2);


$stmt3 =  "select * from blood";	
$records3 = mysqli_query($conn,$stmt3);

$stmt4 =  "SELECT * FROM donor ";	
$records4 = mysqli_query($conn,$stmt4);


$stmt5 =  "SELECT * FROM receiver ";	
$records5 = mysqli_query($conn,$stmt5);

	

}

?>

<html>
<head>
	<title> display</title>
</head>
<body>
<h2> DOCTOR RECORDS </h2>
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th> d_id </th>
		<th>d_name</th>
		<th>phone</th>
                <th>Join_year</th>
		<th>experience</th>

	</tr>
	<?php
 $d_id = filter_input(INPUT_POST, 'd_id');
 $d_name = filter_input(INPUT_POST, 'd_name');
 $phone = filter_input(INPUT_POST, 'phone');

	while($doctor=mysqli_fetch_assoc($records))
	{
 
 $d_name = filter_input(INPUT_POST, 'd_name');
 $phone = filter_input(INPUT_POST, 'phone');
		echo "<tr>";
			echo "<td>".$doctor["d_id"]."</td>>";
			echo "<td>".$doctor["d_name"]."</td>";
			echo "<td>".$doctor["phone"]."</td>";
                        echo "<td>".$doctor["Join_year"]."</td>";
			echo "<td>".$doctor["experience"]."</td>";
		echo "</tr>";
	}
?>	

</table>
<br>
<br>
EMPLOYEE DATA
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th> e_id </th>
		<th>e_name</th>
		<th>phone</th>
	</tr>
	<?php
 $e_id = filter_input(INPUT_POST, 'e_id');
 $e_name = filter_input(INPUT_POST, 'e_name');
 $phone = filter_input(INPUT_POST, 'phone');

	while($employee=mysqli_fetch_assoc($records2))
	{
 
 $d_name = filter_input(INPUT_POST, 'd_name');
 $phone = filter_input(INPUT_POST, 'phone');
		echo "<tr>";
			echo "<td>".$employee["e_id"]."</td>>";
			echo "<td>".$employee["e_name"]."</td>";
			echo "<td>".$employee["phone"]."</td>";
		echo "</tr>";
	}
?>	
</table>
<br><br>

BLOOD INVENTORY

<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th> ID </th>
		<th>blood_grp</th>
		<th>quantity</th>
	</tr>
	<?php
 $ID = filter_input(INPUT_POST, 'ID');
 $blood_grp = filter_input(INPUT_POST, 'blood_grp');
 $quantity = filter_input(INPUT_POST, 'quantity');

	while($blood=mysqli_fetch_assoc($records3))
	{
 
 $d_name = filter_input(INPUT_POST, 'd_name');
 $phone = filter_input(INPUT_POST, 'phone');
		echo "<tr>";
			echo "<td>".$blood["ID"]."</td>>";
			echo "<td>".$blood["blood_grp"]."</td>";
			echo "<td>".$blood["quantity"]."</td>";
		echo "</tr>";
	}
?>	
</table>


<br><br>

</table>
DONOR DATA
<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th> donor_id </th>
		<th>name</th>
		<th>age</th>
                <th>address</th>
                <th>gender</th>
                <th>blood_grp</th>
                <th>quantity</th>	
                <th>month</th>
                <th>year</th>
                <th>phone</th>
                <th>ID</th>
</tr>
	<?php

	while($donor=mysqli_fetch_assoc($records4))
	{
 


		echo "<tr>";
			echo "<td>".$donor["donor_id"]."</td>>";
			echo "<td>".$donor["name"]."</td>";
			echo "<td>".$donor["age"]."</td>";
                        echo "<td>".$donor["address"]."</td>>";
			echo "<td>".$donor["gender"]."</td>";
			echo "<td>".$donor["blood_grp"]."</td>";
                        echo "<td>".$donor["quantity_donated"]."</td>>";
			echo "<td>".$donor["month"]."</td>";
                        echo "<td>".$donor["year"]."</td>";
			echo "<td>".$donor["phone"]."</td>";
                        echo "<td>".$donor["ID"]."</td>";
                        

		echo "</tr>";
	}
?>	
</table>
<br><br>
RECEIPIENT DATA

<table width="600" border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th> receiver_id </th>
		<th>name</th>
		<th>age</th>
                <th>address</th>
                <th>gender</th>
                <th>blood_grp</th>
                <th>quantity_received</th>	
                <th>date</th>
                <th>phone</th>
                <th>ID</th>
                <th>d_id</th>
</tr>
	
<?php


	while($receiver=mysqli_fetch_assoc($records5))
	{
 


		echo "<tr>";
			echo "<td>".$receiver["receiver_id"]."</td>>";
			echo "<td>".$receiver["name"]."</td>";
			echo "<td>".$receiver["age"]."</td>";
                        echo "<td>".$receiver["address"]."</td>>";
			echo "<td>".$receiver["gender"]."</td>";
			echo "<td>".$receiver["blood_grp"]."</td>";
                        echo "<td>".$receiver["quantity_received"]."</td>>";
			echo "<td>".$receiver["date"]."</td>";
			echo "<td>".$receiver["phone"]."</td>";
                        echo "<td>".$receiver["ID"]."</td>";
                         echo "<td>".$receiver["d_id"]."</td>";

		echo "</tr>";
	}
?>	
</table>


<style type="text/css">
	table {

  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
padding: 15px;
  text-align: left;
 border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
  height: 50px;
text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</body>
</html>