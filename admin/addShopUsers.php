<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

	if (isset($_POST['saveBtn'])) {
		$name = $_POST['workerName'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$no = $_POST['no'];

		 $sql = "insert into vendoruser (name,password,email,mobile) values ('$name','$password','$email','$no')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: shopWorkers.php');
			echo "in data sucess";
		}
		else{
			echo "else, CategoryName: '$adminName' ";
		}
	}

	else{
		echo "not in if";
	}

?>