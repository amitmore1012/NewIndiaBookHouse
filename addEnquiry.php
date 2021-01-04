<?php

// $conn = mysqli_connect("192.168.43.161","root-1","root","nibh");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
    	if (isset($_POST['saveBtnModalPop'])) {

		date_default_timezone_set('Asia/Kolkata');
		$orderDate = date("d/m/Y");


		if (date('m') < "05") {
			$orderYear	= date('Y', strtotime(date('Y')." -1 year"))."-".date('Y');
		}
		else{
			$orderYear = date('Y')."-".date('Y', strtotime(date('Y')." +1 year"));
		}
		$s = date("h:i:sa");
		$orderId = date('dmY').date("His", strtotime("$s"));
		$custName = $_POST['CustomerName'];
		$mobileNo = $_POST['MobileNo'];
 		$stream = $_POST['Stream'];
        $branch = $_POST['Branch'];
        $year = $_POST['Year'];
        $semester = $_POST['Sem'];
        $bookName = $_POST['Book'];
         $author = $_POST['Author'];
         $publication = $_POST['Publication'];
		$address = $_POST['Address'];
		$instruction = $_POST['Instruction'];
		
		//$sql = "insert into enquiry(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream1','$branch1','$year1','$sem1','$book1','$publication1','$author1', '$quantity', '$delivery', '$address', '$instruction')";
        $sql = "insert into enquiry(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream','$branch','$year','$semester','$bookName','$publication','$author', '$address', '$instruction')";
        
		$query = mysqli_query($conn, $sql);
        
		if ($query) {
        	    header('Location: index.php');
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
		else{
			echo "<br>data not saved";
		}
    
    
    
    
    
   

?>