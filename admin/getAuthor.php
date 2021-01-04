<?php 

require_once("dbcontroller.php");

$db_handle = new DBController();

if (!empty($_POST["bookID"])) {
	$query = "select * from author where bkID= '".$_POST["bookID"]."' order by authorID";
	$result = $db_handle->runQuery($query);
}

 ?>


 <option value disabled selected>Author...</option>


 <?php 

 	foreach ($result as $key) {
 		 ?>

 		 <option value="<?php echo $key["authorID"]; ?>"> <?php echo $key["authorName"]; ?> </option>

 		<?php  
 	}

  ?>