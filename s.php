<?php  
include 'security.php';
$con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$con = mysqli_connect("192.168.43.161","root-1","root","nibh");
if (isset($_POST['loginbt'])) {
	$u1= $_POST['email1'];
	$u2= $_POST['email2'];

	
	$sql = "insert into latlong(lat,lng) values ('$u1','$u2')";
	$result = mysqli_query($con,$sql);

    if($result){
        header('Location: https://newindiabookhouse.com/sample/a1.php');
    }


// 	if ($res['email'] == $username && $res['password'] == $password) {
// 		$_SESSION['username'] = $res['name'];
// 		header('Location: https://newindiabookhouse.com/sample/a1.php');
	
// 	}
// 	else {
// 		$_SESSION['status'] = 'Incorrect Username or Password';
// 		header('Location: https://newindiabookhouse.com/sample/one.php');
// 	}

}

?>