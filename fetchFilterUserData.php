
<?php

include('database_connection.php');
$column = array('id','CustomerName', 'MobileNo', 'Stream', 'Branch', 'Year', 'Sem', 'Address');
$query = "SELECT * FROM userData ";

if(isset($_POST['filter_stream'], $_POST['filter_branch']) && $_POST['filter_stream'] != '' && $_POST['filter_branch'] != '')
{
 $query .= ' WHERE Stream = "'.$_POST['filter_stream'].'" AND Branch = "'.$_POST['filter_branch'].'"  ';
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

// foreach($result as $row)
// {
//  $data[] = array(
//             "id" => $row['id'],
//             "MobileNo" => $row['MobileNo'],
// "Stream" => $row['streamName'],
// "Branch" => $row['branchName'],
// "Year" => $row['yearName'],
// "Sem" => $row['semName'],
// "Book" => $row['bookName'],
// "Publication" => $row['publicationName'],
// "Author" => $row['authorName']
//      );
// }


foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['CustomerName'];
 $sub_array[] = $row['MobileNo'];
 $sub_array[] = $row['Stream'];
 $sub_array[] = $row['Branch'];
 $sub_array[] = $row['Year'];
 $sub_array[] = $row['Sem'];
 $sub_array[] = $row['Address'];
 $data[] = $sub_array;
}




$output = array("data" =>  $data);

echo json_encode($output);

?>
