<?php  
session_start();
$con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$con = mysqli_connect("192.168.43.161","root-1","root","nibh");
if (isset($_POST['register'])) {
	$username= $_POST['name'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$phnNo= $_POST['rphnNo'];
	$_SESSION["favanimal"] = $phnNo;

	$query = "INSERT INTO users (name,password,email,phoneNo) VALUES ('$username','$password','$email','$phnNo')";
	$result = mysqli_query($con,$query);

	if ($result) {
		$_SESSION['success'] = "User Added";
		header('Location: addUserAddress.php');
	}
	else{
		$_SESSION['status'] = "User Not Added";
		header('Location: register.php');
	}

}


if (isset($_POST['register1'])) {
    $u1= $_POST['email1'];
	$u2= $_POST['email2'];
	$phnNo1 = $_SESSION["favanimal"];
	$address= $_POST['address'];
//	UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;
	$query1 = "UPDATE users SET userAddress = '$address', lat = '$u1', lng = '$u2' WHERE phoneNo = '$phnNo1'";
	$result = mysqli_query($con,$query1);

	if ($result) {
		$_SESSION['success'] = "User Added";
		header('Location: login-register.php');
		unset($_SESSION["favanimal"]);
	}
	else{
		$_SESSION['status'] = "User Not Added";
		header('Location: register.php');
	}

}


if (isset($_POST['register2'])) {
    $username= $_POST['first-name'];
	$email= $_POST['new-email'];
	$password= $_POST['new-pwd'];
	$confirmPwd= $_POST['confirm-pwd'];
	$phnNo= $_POST['new-Mobile'];
	$phnNo1= $_POST['old-Mobile'];
//	UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;
	$query1 = "UPDATE users SET userAddress = '$username', password = '$password', email = '$email', phoneNo = '$phnNo' WHERE phoneNo = '$phnNo1'";
	$result = mysqli_query($con,$query1);

	if ($result) {
		$_SESSION['success'] = "User Added";
		header('Location: my-account.php');
		unset($_SESSION["favanimal"]);
	}
	else{
		$_SESSION['status'] = "User Not Added";
		header('Location: register.php');
	}

}

?>