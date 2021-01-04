<?php 
session_start();
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
	//User Orders
		if (isset($_POST['placeOrder'])) {
		    $where =  session_id();
		  $qnty1 = array();
		  $product1= array();
		  $stream1= array();
		  $branch1 = array();
		  $year1 = array();
		  $sem1 = array();
		  $book1 = array();
		  $publication1 = array();
		  $author1 = array();
		  $language1 = array();
		  $isbn1 = array();
		  
		 $total = $_POST['totalPrice'];
		 $delivery = $_POST['delivery'];
		 $instruction = $_POST['instruction'];
		 $username = $_POST['CustomerName'];
		 $pid = $_POST['productid'];
		 
		 $sql="select * from users where name='$username'";
         $result = mysqli_query($conn,$sql);
          while($query = mysqli_fetch_assoc($result)){
		     $phone = $query['phoneNo'];
		     $userId = $query['id'];
             $address = $query['userAddress'];
             $lat = $query['lat'];
             $lng = $query['lng'];
		     
		 }
         
		 $latlng = $lat.",".$lng;
		 $userAddress = $address."<br>Location: <br>".$latlng;
		 
		 
		 $sql1="select * from cart where sessionid='$where'";
		 $result1 = mysqli_query($conn,$sql1);
		 while($query1 = mysqli_fetch_assoc($result1)){
		     array_push($qnty1,$query1['qnty']);
             array_push($product1,$query1['productid']);
		     
		 }
		 
		 $qnty = implode(",<br>",$qnty1);
		 $product = implode(",",$product1);
		 
		  $sql2="select * from allbook where id in ($product)";
		 $result2 = mysqli_query($conn,$sql2);
		 while($query2 = mysqli_fetch_assoc($result2)){
		     if(in_array($query2['stream'], $stream1)){
		         echo "<br>";
		     } else{
		         array_push($stream1,$query2['stream']);
		         print_r($stream1);
		         echo "<br>";
		     }
		     
		     if(in_array($query2['branch'], $branch1)){
		         echo "<br>";
		     } else{
		         array_push($branch1,$query2['branch']);
		         print_r($branch1);
		         echo "<br>";
		     }
		     
		     if(in_array($query2['year'], $year1)){
		         echo "<br>";
		     } else{
		         array_push($year1,$query2['year']);
		         print_r($year1);
		         echo "<br>";
		     }
		     
		     if(in_array($query2['sem'], $sem1)){
		         echo "<br>";
		     } else{
		         array_push($sem1,$query2['sem']);
		         print_r($sem1);
		         echo "<br>";
		     }
		     
		     if(in_array($query2['publication'], $publication1)){
		         echo "<br>";
		     } else{
		         array_push($publication1,$query2['publication']);
		         print_r($publication1);
		         echo "<br>";
		     }
		     
		     array_push($book1,$query2['book']);
		     print_r($book1);
		         echo "<br>";
		     
		     if(in_array($query2['author'], $author1)){
		         echo "<br>";
		     } else{
		         array_push($author1,$query2['author']);
		         print_r($author1);
		         echo "<br>";
		     }
		     
		     if(in_array($query2['language'], $language1)){
		         echo "<br>";
		     } else{
		         array_push($language1,$query2['language']);
		         print_r($language1);
		         echo "<br>";
		     }
		     
		     array_push($isbn1,$query2['isbn']);
		     print_r($isbn1);
		         echo "<br>";
             echo "product got...!<br>";
		 }
		 
		 
		 
		 if(isset($_SESSION['Coupon_Id'])){
		        $CouponId = $_SESSION['Coupon_Id'];
                $final_price = $_SESSION['Final_Price'];
                $dd = $_SESSION['Coupon_Value'];
                $CouponCode = $_SESSION['Coupon_Code'];
		 } else{
		        $CouponId = '';
                $final_price = $total;
                $dd = '';
                $CouponCode = '';
		 }
		 
		 $stream = implode(",<br>",$stream1);
		 $branch = implode(",<br>",$branch1);
		 $year = implode(",<br>",$year1);
		 $sem = implode(",<br>",$sem1);
		 $book = implode(",<br>",$book1);
		 $publication = implode(",<br>",$publication1);
		 $author = implode(",<br>",$author1);
		 $language = implode(",<br>",$language1);
		 $isbn = implode(",<br>",$isbn1);
		 
		 
		date_default_timezone_set('Asia/Kolkata');
		$orderDate = date("d/m/Y");


		if (date('m') < "04") {
			$orderYear	= date('Y', strtotime(date('Y')." -1 year"))."-".date('Y');
		}
		else{
			$orderYear = date('Y')."-".date('Y', strtotime(date('Y')." +1 year"));
		}
		$s = date("h:i:sa");
		$orderId = date('dmY').date("His", strtotime("$s"));

        //SMS Settings
        $authKey = "326293ASOkOBKOwY5e986a97P1";
        $mobileNumber = "91".$_POST['MobileNo'];
        $senderId = "NEWIBH";
        $route = "4";




        
        
        
        
		$sql = "insert into orders(OrderId, OrderDate, OrderYear, MobileNo, CustomerName, Stream, Branch, Year, Sem, Book, Publication, Author, Quantity, language, isbn, totalprice, coupon_id, coupon_code, coupon_value, Delivery,Address, Instructions, pid) 
		          values ('$orderId', '$orderDate', '$orderYear','$phone','$username','$stream','$branch','$year','$sem','$book','$publication','$author', '$qnty', '$language', '$isbn', '$final_price', '$CouponId', '$CouponCode', '$dd', '$delivery', '$userAddress', '$instruction','$pid')";
        
        echo "<br> SQL:".$sql;
        //SMS Setting
        $s = "<br>";
        
        $msg1 = " 
        Order id:".$orderId."
        ";
        
        $sql10 = "select * from message where msgType='Enquiry'";
         $query10 = mysqli_query($conn,$sql10);
         foreach($query10 as $q){
             $message = $q['msg'];
         }
         
         $postData = array(
            'authkey' => $authKey,
            'mobiles' => $phone,
            'message' => $message.$msg1,
            'sender' => $senderId,
            'route' => $route
        );

        
		$query = mysqli_query($conn, $sql);
        
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
                
                $sql4 = "insert into userOrders (OrderId, OrderDate, Status, price, userId) values ('$orderId','$orderDate','Pending', '$final_price', '$userId')";
 			    $query = mysqli_query($conn, $sql4);
                if($query){
 			        echo "Order Placed in user account";
 			    }
                
 			    
 			    $sql4 = "DELETE FROM cart WHERE sessionid='$where'";
 			    $query = mysqli_query($conn, $sql4);
 			    if($query){
 			        unset($_SESSION['cart']);
 			        unset($_SESSION['Coupon_Id']);
                    unset($_SESSION['Final_Price']);
                    unset($_SESSION['Coupon_Value']);
                    unset($_SESSION['Coupon_Code']);
 			        header('Location: order-complete.php');
 			    }
 			    echo "in data sucess";
		}
		else{
			echo "Database connection error while adding enquiry";
		}
	}


?>