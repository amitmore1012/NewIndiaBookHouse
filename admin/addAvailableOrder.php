

<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");

	if (isset($_POST['availableEnquiry'])) {
	    $userId = $_POST['user_id'];
		$id = $_POST['available_id'];
		$msg = "Your order is placed, Will update you further";
		 $sql1 = "INSERT INTO availableorder (id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid) SELECT id,OrderId,OrderDate,OrderYear,MobileNo,CustomerName,Stream,Branch,Year,Sem,Book,Publication,Author,Quantity,language,isbn,totalprice,Delivery,Address,Instructions,pid FROM placedorder WHERE id = '$id'";
		
		
		 $sql = "select * from availableorder where id='$id'";
         $query = mysqli_query($conn,$sql);
         foreach($query as $q){
             $mobile = $q['MobileNo'];
         }
		
		
		//SMS Settings
        $authKey = "326293ASOkOBKOwY5e986a97P1";
        $mobileNumber = $mobile;
        $senderId = "NEWIBH";
        $route = "4";
            
        
        $sql10 = "select * from message where msgType='AvailableOrder'";
         $query10 = mysqli_query($conn,$sql10);
         foreach($query10 as $q){
             $message = $q['msg'];
         }
         
         $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

		$sql3 = "update orders set Status = 'AO' where id = '$id'";
		 $sql4 = "DELETE FROM placedorder where id = '$id'";
		 $query1 = mysqli_query($conn, $sql1);
		 

		 if ($query1) {
            
            
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
 	

		 		$query3 = mysqli_query($conn, $sql3);    
		 	    if($query3){
		 	        $query4 = mysqli_query($conn, $sql4);
		 	        
		 	        if($query4){
		 	            
		 	header('Location: placedOrder.php');
			echo "in data sucess"; 
		 	        }  
		 	    }
		 }
		else{
			echo mysql_error();
		}
	}

?>