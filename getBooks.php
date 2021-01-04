<?php 

require_once("admin/dbcontroller.php");

$db_handle = new DBController();

if (!empty($_POST["semID"])) {
	$query = "select * from book where semID= '".$_POST["semID"]."' order by bookID";
	$result = $db_handle->runQuery($query);
}

 ?>


 <option value disabled selected>Books</option>


 <?php 

 	foreach ($result as $key) {
 		 ?>

 		 <option value="<?php echo $key["bookID"]; ?>"> <?php echo $key["bookName"]; ?> </option>

 		<?php  
 	}

  ?>