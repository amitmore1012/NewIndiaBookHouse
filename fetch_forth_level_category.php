
<?php

//fetch_third_level_category.php

include('database_connection.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT semID, semName FROM sem 
 WHERE yID IN ('".$id."')
 "; 
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["semID"].'">'.$row["semName"].'</option>';
 }
 echo $output;
}




?>
