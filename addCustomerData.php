<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
    	if (isset($_POST['saveBtn'])) {

		date_default_timezone_set('Asia/Kolkata');
		$orderDate = date("d/m/Y");
		$custName = $_POST['CustomerName'];
		$mobileNo = $_POST['MobileNo'];
        $feedback = $_POST['Feedback'];
		$address = $_POST['Address'];
		   $u1= $_POST['email1'];
	$u2= $_POST['email2'];
	$latlng = $u1.",".$u2;
	
	
	
	    $stream1 = $_POST['Stream'];
		$sql5="select * from stream where streamID = $stream1";
         $query5 = mysqli_query($conn,$sql5);
         while ($res = mysqli_fetch_array($query5)) {
             $stream = $res['streamName'];
         }
         
         
         
		$bID1 = $_POST['Branch'];
		$sql5="select * from branch where branchID = $bID1";
         $query5 = mysqli_query($conn,$sql5);
        while ($res = mysqli_fetch_array($query5)) {
             $branch = $res['branchName'];
         }
         
         
		$yID1 = $_POST['Year'];
		$sql5="select * from year where yearID = $yID1";
         $query5 = mysqli_query($conn,$sql5);
        while ($res = mysqli_fetch_array($query5)) {
             $year = $res['yearName'];
         }
		echo $res['streamID'];
		
		
		
		$sID1 = $_POST['Sem'];
		$sql5="select * from sem where semID = $sID1";
         $query5 = mysqli_query($conn,$sql5);
         while ($res = mysqli_fetch_array($query5)) {
             $semester = $res['semName'];
         }
		
		$wer = "SELECT * FROM customerData WHERE MobileNo = '$mobileNo'";
		$query = mysqli_query($conn, $wer);
		while($data=mysqli_fetch_array($query)){
		    $qw = $data['MobileNo'];
		}

		echo $data['MobileNo'];
		if($qw == $mobileNo){
		   header('Location: dataAlreadyExist.php');
		}
		else{
		 $sql = "insert into customerData(OrderDate, MobileNo, CustomerName, Stream, Branch, Year, Sem,Feedback, Address, LatLng) values ('$orderDate', '$mobileNo','$custName','$stream','$branch','$year','$semester','$feedback', '$address','$latlng')";
        
		$query = mysqli_query($conn, $sql);
        
		if ($query) {
        	    header('Location: thankyou.php');
 			    echo "in data sucess";
 			    echo "<br>";
 			    echo "<br>";
 			    echo $stream;
 			    echo "<br>";
 			    echo "<br>";
 			    echo $sql;
		}
		else{
			echo "Database connection error while adding enquiry";
		}
		}
		
		//$sql = "insert into enquiry(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream1','$branch1','$year1','$sem1','$book1','$publication1','$author1', '$quantity', '$delivery', '$address', '$instruction')";

	}
		else{
			echo "<br>data not saved";
		}
    
    
    
    
    
   

?>