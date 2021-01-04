<?php
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


	if (isset($_POST['completedEnquiry'])) {
		$id = $_POST['completed_id'];
		$msg = "Your order is out for delivery, Will update you further";
		 $sql1 = "INSERT INTO completedorder (id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid) SELECT id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid FROM orderoutfordelivery WHERE id = '$id'";
		 $query1 = mysqli_query($conn, $sql1);
		 

		 if ($query1) {

		 $sql3 = "update orders set Status = 'CO' where id = '$id'";
		 $sql4 = "DELETE FROM orderoutfordelivery where id = '$id'";

		 		$query3 = mysqli_query($conn, $sql3);    
		 	    if($query3){
		 	        $query4 = mysqli_query($conn, $sql4);
		 	        
		 	        if($query4){
		 	            
		 	header('Location: orderOutForDelivery.php');
			echo "in data sucess"; 
		 	        }  
		 	    }
		 }
		else{
			echo mysql_error();
		}
	}

?>