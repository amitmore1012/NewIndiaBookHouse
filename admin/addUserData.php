<?php

// $conn = mysqli_connect("192.168.43.161","root-1","root","nibh");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {
		$custName = $_POST['CustomerName'];
		$mobileNo = $_POST['MobileNo'];
 		$stream = $_POST['StreamList'];
		$branch = $_POST['BranchList'];
	    $year = $_POST['YearList'];
		$sem = $_POST['SemList'];
		$address = $_POST['Address'];
        
          $sql5="select * from stream where streamID='$stream'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $stream1 = $k['streamName'];
         }
	    
	    $sql5="select * from branch where branchID='$branch'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $branch1 = $k['branchName'];
         }
         
         $sql5="select * from year where yearID='$year'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $year1 = $k['yearName'];
         }
         
          $sql5="select * from sem where semID='$sem'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $sem1 = $k['semName'];
         }
         
         $wer = "SELECT * FROM userData WHERE MobileNo = '$mobileNo'";
		$query = mysqli_query($conn, $wer);
		while($data=mysqli_fetch_array($query)){
		    $qw = $data['MobileNo'];
		}
         
         if($qw == $mobileNo){
             echo "User Already exist";
?>

<html>
<body>

<button type="button" onclick="location.href='dashboard.php'">Back</button>
 
</body>
</html>

<?php
             
         }
         else{
         
		//$sql = "insert into enquiry(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream1','$branch1','$year1','$sem1','$book1','$publication1','$author1', '$quantity', '$delivery', '$address', '$instruction')";
        $sql = "insert into userData(MobileNo, CustomerName, Stream, Branch, Year, Sem, Address) values ('$mobileNo','$custName','$stream1','$branch1','$year1','$sem1', '$address')";
		$query = mysqli_query($conn, $sql);
        
		if ($query) {
        	    header('Location: userData.php');
 		}
         }
	}
		else{
			echo "<br>data not saved";
		}


	
	//Update Data
    if(isset($_POST['updateBtn'])){
	    $updateId = $_POST['updateId'];
	    $custName1 = $_POST['editCustomerName'];
		$mobileNo1 = $_POST['editMobileNo'];
		$Stream1 = $_POST['editStream'];
		$Branch1 = $_POST['editBranch'];
		$Year1 = $_POST['editYear'];
		$Sem1 = $_POST['editSem'];
        $address1 = $_POST['editAddress'];
        
        
         $sql5="select * from stream where streamName='$Stream1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $strea = $k['streamID'];
         }
	    
	    $sql5="select * from branch where branchName='$Branch1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $branch = $k['branchID'];
         }
         
         $sql5="select * from year where yearName='$Year1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $year = $k['yearID'];
         }
         
          $sql5="select * from sem where semName='$Sem1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $sem = $k['semID'];
         }

        
        $sql4 = "update userData set CustomerName='$custName1', MobileNo='$mobileNo1', Stream='$strea', Branch='$branch', Year='$year', Sem='$sem', Book='$book', Publication='$publication', Author='$author', Instructions='$Instructions1', Quantity='$Quantity1', Delivery='$delivery1', Address='$address1' where id='$updateId' ";
        
        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: userData.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}



    //Delete Data
     if(isset($_POST['deleteEnquiry'])){
	    $deleteId = $_POST['edit_id2'];
        $sql4 = "DELETE FROM userData WHERE id='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: userData.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}
	
		else{
	//	echo "not in if delete";
	}
	

?>