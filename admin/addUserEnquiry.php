<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

	if (isset($_POST['saveBtn'])) {

		date_default_timezone_set('Asia/Kolkata');
		$orderDate = date("d/m/Y");


		if (date('m') < "06") {
			$orderYear	= date('Y', strtotime(date('Y')." -1 year"))."-".date('Y');
		}
		else{
			$orderYear = date('Y')."-".date('Y', strtotime(date('Y')." +1 year"));
		}
		$s = date("h:i:sa");
		$orderId = date('dmY').date("His", strtotime("$s"));

		$custName = $_POST['CustomerName'];
		$mobileNo = $_POST['MobileNo'];
		$stream = $_POST['StreamList'];
		$branch = $_POST['BranchList'];
		$sem = $_POST['SemList'];
		$book = $_POST['BookList'];
		$author = $_POST['AuthorList'];
		$publication = $_POST['PubList'];
		$quantity = $_POST['Quantity'];
		$delivery = $_POST['Delivery'];
		$instruction = $_POST['Instructions'];




		 $sql = "insert into enquiry(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Title, Publication, Author, Semester, Quantity, Delivery, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream','$branch','$book','$publication','$author', '$sem', '$quantity', '$delivery', '$instruction')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: userPage.php');
			echo "in data sucess";
		}
		else{
			echo "Database connection error while adding enquiry";
		}
	}

	// if (isset($_POST['acceptEnquiry'])) {
	// 	$id = $_POST['edit_id'];
	// 	 $sql1 = "insert into acceptedEnquiry select e.* from enquiry e where id = '$id'";

	// 	 $query1 = mysqli_query($conn, $sql1);

	// 	 if ($query1) {
	// 	 	header('Location: enquiry.php');
	// 		echo "in data sucess";
	// 	 }
	// 	else{
	// 		echo mysql_error();
	// 	}
	// }

?>