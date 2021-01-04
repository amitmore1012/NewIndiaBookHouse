<?php 

require_once("dbcontroller.php");

$db_handle = new DBController();

if (!empty($_POST["streamID"])) {
	$query = "select * from branch where sID= '".$_POST["streamID"]."' order by branchID";
	$result = $db_handle->runQuery($query);
}

 ?>


 <option value disabled selected>Branch</option>


 <?php 

 	foreach ($result as $key) {
 		 ?>

 		 <option value="<?php echo $key["branchID"]; ?>"> <?php echo $key["branchName"]; ?> </option>

 		<?php  
 	}

  ?>