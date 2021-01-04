<?php  
session_start();
if (isset($_POST['logoutBtn'])) {
	session_destroy();
	unset($_SESSION['usernameUser']);
	header("Location: index.php");
}
?>