<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

	if (isset($_POST['saveBtn'])) {
		$msgType = $_POST['MessageType'];
        $msgTemplate = $_POST['MessageTemplate'];

		 $sql = "insert into message(msgType,msg) values ('$msgType','$msgTemplate')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: smsSettings.php');
			echo "in data sucess";
		}
		else{
			echo "else, CategoryName: '$custName' ";
		}
	}

	else{
		echo "not in if";
	}

?>