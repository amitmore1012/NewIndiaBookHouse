
<?php

$con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");

 include('database_connection.php');
 $column = array('id', 'MobileNo','CustomerName', 'Stream', 'Branch', 'Year', 'Sem', 'Address');

$query = "
SELECT * FROM userData 
";

    
    $s = $_POST['filter_stream'];
    $b = $_POST['filter_branch'];
    $y = $_POST['filter_year'];
    $sem = $_POST['filter_sem'];
    






//for stream
if(isset($s) && $s != '' && $b == '' && $y == '' && $sem == '')
{

$querys = "select streamName from stream where streamID =".$s;
 $result1 = mysqli_query($con, $querys);
  if(!$result1){
    echo "Items not found.. Please try again later.." . mysqli_error($con);
    //exit;

  }
        while($query_row1 = mysqli_fetch_assoc($result1)){  
                $stream1 = $query_row1['streamName'];        
        }
        
$query .= '
WHERE Stream = "'.$stream1.'"
';
}










//for stream and branch
if(isset($s, $b) && $s != '' && $b != '' && $y == '' && $sem == '')
{

$querys = "select streamName from stream where streamID =".$s;
 $result1 = mysqli_query($con, $querys);
  if(!$result1){
    echo "Items not found.. Please try again later.." . mysqli_error($con);
    //exit;

  }
        while($query_row1 = mysqli_fetch_assoc($result1)){  
                $stream1 = $query_row1['streamName'];        
        }
        
        $queryb = "select branchName from branch where branchID =".$b;
 $result2 = mysqli_query($con, $queryb);
  if(!$result2){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row2 = mysqli_fetch_assoc($result2)){  
                $branch1 = $query_row2['branchName'];        
        }
        

$query .= '
WHERE Stream = "'.$stream1.'" AND Branch = "'.$branch1.'" 
';
}

//for stream branch and year
if(isset($s, $b, $y) && $s != '' && $b != '' && $y != '' && $sem == '')
{

$querys = "select streamName from stream where streamID =".$s;
 $result1 = mysqli_query($con, $querys);
  if(!$result1){
    echo "Items not found.. Please try again later.." . mysqli_error($con);
    //exit;

  }
        while($query_row1 = mysqli_fetch_assoc($result1)){  
                $stream1 = $query_row1['streamName'];        
        }
        
        $queryb = "select branchName from branch where branchID =".$b;
 $result2 = mysqli_query($con, $queryb);
  if(!$result2){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row2 = mysqli_fetch_assoc($result2)){  
                $branch1 = $query_row2['branchName'];        
        }
        
        
        $queryy = "select yearName from year where yearID =".$y;
 $result3 = mysqli_query($con, $queryy);
  if(!$result3){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row3 = mysqli_fetch_assoc($result3)){  
                $year1 = $query_row3['yearName'];        
        }
        
$query .= '
WHERE Stream = "'.$stream1.'" AND Branch = "'.$branch1.'" AND Year = "'.$year1.'"
';
}


//for stream branch and year
if(isset($s, $b, $y, $sem) && $s != '' && $b != '' && $y != '' && $sem != '')
{

$querys = "select streamName from stream where streamID =".$s;
 $result1 = mysqli_query($con, $querys);
  if(!$result1){
    echo "Items not found.. Please try again later.." . mysqli_error($con);
    //exit;

  }
        while($query_row1 = mysqli_fetch_assoc($result1)){  
                $stream1 = $query_row1['streamName'];        
        }
        
        $queryb = "select branchName from branch where branchID =".$b;
 $result2 = mysqli_query($con, $queryb);
  if(!$result2){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row2 = mysqli_fetch_assoc($result2)){  
                $branch1 = $query_row2['branchName'];        
        }
        
        
        $queryy = "select yearName from year where yearID =".$y;
 $result3 = mysqli_query($con, $queryy);
  if(!$result3){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row3 = mysqli_fetch_assoc($result3)){  
                $year1 = $query_row3['yearName'];        
        }
        
        
                $querys1 = "select semName from sem where semID =".$sem;
 $result4 = mysqli_query($con, $querys1);
  if(!$result4){
    echo "Items not found.. Please try again later.." . mysqli_error($conn);
    //exit;

  }
        while($query_row4 = mysqli_fetch_assoc($result4)){  
                $sem1 = $query_row4['semName'];        
        }
    
    
    
//  $query .= 'WHERE Stream = "'.$stream1.'" AND Branch = "'.$branch1.'" AND Year = "'.$year1.'" AND Sem = "'.$sem1.'"  ';
$query .= '
WHERE Stream = "'.$stream1.'" AND Branch = "'.$branch1.'" AND Year = "'.$year1.'" AND Sem = "'.$sem1.'" 
';
}


$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();


foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['MobileNo'];
 $sub_array[] = $row['CustomerName'];
 $sub_array[] = $row['Stream'];
 $sub_array[] = $row['Branch'];
 $sub_array[] = $row['Year'];
 $sub_array[] = $row['Sem'];
 $sub_array[] = $row['Address'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM userData";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);
//print_r($output);





?>
