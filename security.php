<?php 
session_start();
include('dbConfig.php');
if ($con) {
	# code...
}
else{
	header("Location: dbConfig.php");
}

 ?>