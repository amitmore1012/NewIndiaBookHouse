
<?php

//fetch_second_level_category.php

include('database_connection.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT branchID,branchName FROM branch 
 WHERE sID IN ('".$id."')
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["branchID"].'">'.$row["branchName"].'</option>';
 }
 echo $output;
}

?>