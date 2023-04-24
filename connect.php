<?php
	ini_set("display_errors","1");
	error_reporting(E_ALL);
	$flat = $_POST['flat'];
	$area = $_POST['area'];
	$garden = $_POST['garden'];
	$furniture = $_POST['furniture'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','wdd');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `wdd` (`flat`, `area`, `garden`, `furniture`, `gender`, `email`, `number`) VALUES (?, ?, ?, ?,?,?,?)");
		$stmt->bind_param("ssiissi", $flat, $area, $garden, $furniture, $gender, $email, $number );
		$exeval = $stmt->execute();
		echo $exeval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
		
	}
?>