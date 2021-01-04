<?php
include 'security.php';;
$con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$con = mysqli_connect("192.168.43.161","root-1","root","nibh");
if (isset($_POST['loginbt'])) {
	$username= $_POST['email1'];
	$password= $_POST['pass1'];

	$query = "select * from users where email = '$username' and password = '$password'";
	$result = mysqli_query($con,$query);
	$res = mysqli_fetch_array($result);

	if ($res['email'] == $username && $res['password'] == $password) {
            $_SESSION['username'] = $res['name'];
//            print_r($_SESSION);
            echo $_SESSION['username'];
		header('Location: index.php');

		
	
	
	}
	else {
		$_SESSION['status'] = 'Incorrect Username or Password';
		header('Location: login-register.php');
	}

}

?>