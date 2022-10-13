<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$message=$_POST['message'];



	// Database connection
	$conn = new mysqli('localhost','root','','contactus2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users(firstName, lastName, gender, email,number,message) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $number,$message);
		$execval = $stmt->execute();
		echo $execval;
		echo "..................................................Successfully Sent.......................................................";
		$stmt->close();
		$conn->close();
	}
?>