<?php 

require_once("admin/dbcontroller.php");

$db_handle = new DBController();

if (!empty($_POST["yearID"])) {
	$query = "select * from sem where yID= '".$_POST["yearID"]."' order by semID";
	$result = $db_handle->runQuery($query);
}

 ?>


 <option value disabled selected>Semester</option>


 <?php 

 	foreach ($result as $key) {
 		 ?>

 		 <option value="<?php echo $key["semID"]; ?>"> <?php echo $key["semName"]; ?> </option>

 		<?php  
 	}

  ?>