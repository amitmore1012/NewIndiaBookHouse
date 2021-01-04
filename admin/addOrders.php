<?php

// $conn = mysqli_connect("192.168.43.161","root-1","root","nibh");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {

		date_default_timezone_set('Asia/Kolkata');
		$orderDate = date("d/m/Y");


		if (date('m') < "06") {
			$orderYear	= date('Y', strtotime(date('Y')." -1 year"))."-".date('Y');
		}
		else{
			$orderYear = date('Y')."-".date('Y', strtotime(date('Y')." +1 year"));
		}
		$s = date("h:i:sa");
		$orderId = date('dmY').date("His", strtotime("$s"));
		$custName = $_POST['CustomerName'];
		$mobileNo = $_POST['MobileNo'];
 		
 		$stream1 = $_POST['first_level'];
		$s = implode(", ",$stream1);
			$s1 = array();
		$sql5="select * from stream where streamID in ($s)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($s1,$k['streamName']);
             
         }
         $stream = implode(",<br> ",$s1);
         
         
         
		$bID1 = $_POST['second_level'];
		$bID = implode(", ",$bID1);
		$branch1 = array();
		$sql5="select * from branch where branchID in ($bID)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($branch1,$k['branchName']);
             
         }
         $branch = implode(",<br> ",$branch1);
         
         
		$yID1 = $_POST['third_level'];
		$y = implode(", ",$yID1);
		$y1 = array();
		$sql5="select * from year where yearID in ($y)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($y1,$k['yearName']);
             
         }
         $year = implode(",<br> ",$y1);
		
		
		
		
		$sID1 = $_POST['forth_level'];
		$sID = implode(", ",$sID1);
		$sID1 = array();
		$sql5="select * from sem where semID in ($sID)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($sID1,$k['semName']);
             
         }
         $semester = implode(",<br> ",$sID1);
		
		
		
		$bookName1 = $_POST['fifth_level'];
		$bookName2 = implode(", ",$bookName1);
		$erID1 = array();
		$sql5="select * from book where bookID in ($bookName2)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($erID1,$k['bookName']);
             
         }
         $bookName = implode(",<br> ",$erID1);
		
        
        $author1 = $_POST['seventh_level'];
		$author2 = implode(", ",$author1);
		$aID1 = array();
		$sql5="select * from author where authorID in ($author2)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($aID1,$k['authorName']);
             
         }
         $author = implode(",<br> ",$aID1);
        
        $publication1 = $_POST['sixth_level'];
		$publication2 = implode(", ",$publication1);
		$pID1 = array();
		$sql5="select * from publication where publicationID in ($publication2)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($pID1,$k['publicationName']);
             
         }
         $publication = implode(",<br> ",$pID1);
        
		
		
		
 		
 		
		$quantity = $_POST['Quantity'];
		$delivery = $_POST['Delivery'];
		$address = $_POST['Address'];
		$instruction = $_POST['Instructions'];
		$Language = $_POST['Language'];
		$ISBN = $_POST['ISBN'];
		$price = $_POST['price'];

        //SMS Settings
        $authKey = "326293ASOkOBKOwY5e986a97P1";
        $mobileNumber = "91".$_POST['MobileNo'];
        $senderId = "NEWIBH";
        $route = "4";
        
       
		//$sql = "insert into orders(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream','$branch','$year','$sem','$book','$publication','$author', '$quantity', '$delivery', '$address', '$instruction')";
        $sql = "insert into orders(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, language, isbn, totalprice, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream','$branch','$year','$semester','$bookName','$publication','$author', '$quantity', '$Language','$ISBN','$Price','$delivery', '$address', '$instruction')";
       
        
        //SMS Setting
        $s = "<br>";
        
        $msg1 = "
    Following are your order details:
            Category :".$stream."
            Branch :".$branch."
            Year :".$year."
            Sem :".$semester."
            Book :".$bookName."
            Publication :".$publication."
            Author :".$author."
            ";
        
        $sql10 = "select * from message where msgType='Enquiry'";
         $query10 = mysqli_query($conn,$sql10);
         foreach($query10 as $q){
             $message = $q['msg'];
         }
         
         $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message.$msg1,
            'sender' => $senderId,
            'route' => $route
        );

        
		$query = mysqli_query($conn, $sql);
		$query1 = mysqli_query($conn, $sql1);
        
		if ($query) {
                $url="http://sms.happysms.in/api/sendhttp.php";
                $ch = curl_init();
               
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));


                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


                //get response
                $output = curl_exec($ch);

                //Print error if any
                if(curl_errno($ch))
                {
                    echo 'error:' . curl_error($ch);
                }

                curl_close($ch);
                 $sql1 = "insert into allstatus(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, language, isbn, totalprice, Delivery,Address, Instructions) values ('$orderId', '$orderDate', '$orderYear','$mobileNo','$custName','$stream','$branch','$year','$semester','$bookName','$publication','$author', '$quantity', '$Language','$ISBN','$Price','$delivery', '$address', '$instruction')";
 			    		$query1 = mysqli_query($conn, $sql1);
 			    header('Location: orders.php');
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


    //FORWARD DATA
	if (isset($_POST['acceptEnquiry'])) {
		$id = $_POST['edit_id'];

		$msg = "Your Order is forwarded for pre-processing, Will update you further";
		 $sql1 = "INSERT INTO acceptedorders (id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid) SELECT id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid FROM orders WHERE id = '$id'";
		 $sql2 = "insert into userlogs (OrderId,CustomerName,MobileNo) select OrderId,CustomerName,MobileNo from orders where id = '$id'";
		 
		 $sql3 = "update userlogs set Status = '".$msg."' where id = '$id'";
		 $sql4 = "update allstatus set Status = 'OP' where id = '$id'";
		 $sql5 = "DELETE FROM orders where id = '$id'";
		 
		 //echo $sql3;
		 $query1 = mysqli_query($conn, $sql1);
		 
		 

		 if ($query1) {

		 	$query2 = mysqli_query($conn, $sql2);

		 	if ($query2) {

		 		$query3 = mysqli_query($conn, $sql3);
		 		//echo $query3;

		 		if ($query3) {
		 		$query4 = mysqli_query($conn, $sql4);    
                
                    if($query4){
                        $query5 = mysqli_query($conn, $sql5);
		 	header('Location: orders.php');
			echo "in data sucess";
                    }
		 		}
		 	}
		 }
		else{
			echo mysql_error();
		}
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
		$Book1 = $_POST['editBook'];
		$Publication1 = $_POST['editPublication'];
		$Author1 = $_POST['editAuthor'];
		$Instructions1 = $_POST['editInstructions'];
        $delivery1 = $_POST['editDelivery'];
        $address1 = $_POST['editAddress'];
        $Quantity1 = $_POST['editQuantity'];
        
        
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
         
         $sql5="select * from books where bookName='$Book1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $book = $k['bookID'];
         }
         
         $sql5="select * from publication where publicationName='$Publication1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $publication = $k['publicationID'];
         }
	    
	    $sql5="select * from author where authorName='$Author1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $author = $k['authorID'];
         }
        
        $sql4 = "update orders set CustomerName='$custName1', MobileNo='$mobileNo1', Stream='$strea', Branch='$branch', Year='$year', Sem='$sem', Book='$book', Publication='$publication', Author='$author', Instructions='$Instructions1', Quantity='$Quantity1', Delivery='$delivery1', Address='$address1' where id='$updateId' ";
        $sql5 = "update allstatus set CustomerName='$custName1', MobileNo='$mobileNo1', Stream='$strea', Branch='$branch', Year='$year', Sem='$sem', Book='$book', Publication='$publication', Author='$author', Instructions='$Instructions1', Quantity='$Quantity1', Delivery='$delivery1', Address='$address1' where id='$updateId' ";
        
        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            $query5 = mysqli_query($conn,$sql5);
            header('Location: orders.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}



    //Delete Data
     if(isset($_POST['deleteEnquiry'])){
	    $deleteId = $_POST['edit_id2'];
        $sql4 = "DELETE FROM orders WHERE id='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: orders.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}
	
		else{
		echo "not in if delete";
	}
	

?>