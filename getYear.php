<?php 

require_once("admin/dbcontroller.php");

$db_handle = new DBController();

if (!empty($_POST["branchID"])) {
	$query = "select * from year where bID= '".$_POST["branchID"]."' order by yearID";
	$result = $db_handle->runQuery($query);
}

 ?>


 <option value disabled selected>Year</option>


 <?php 

 	foreach ($result as $key) {
 		 ?>

 		 <option value="<?php echo $key["yearID"]; ?>"> <?php echo $key["yearName"]; ?> </option>

 		<?php  
 	}

  ?>