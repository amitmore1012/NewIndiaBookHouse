<?php 
    include 'security.php';
     $con = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
     $jsonArr = array();
     $CouponCode = $_POST['CouponCode'];
     $query=mysqli_query($con,"select * from coupon_master where coupon_code='$CouponCode' and status=1");
     $count=mysqli_num_rows($query);
        if($count>0){
            $CouponDetails = mysqli_fetch_assoc($query);
            $CouponCode=$CouponDetails['coupon_code'];
            $CouponId=$CouponDetails['id'];
            $CouponValue=$CouponDetails['coupon_value'];
            $CouponType=$CouponDetails['coupon_type'];
            $cart_min_value=$CouponDetails['cart_min_value'];
            $status=$CouponDetails['status'];
        }
        
       $total=0; 
     $where =  "'".session_id()."'";
    $count = 0;
    $query = "SELECT * FROM cart WHERE sessionid = $where";
    $result = mysqli_query($con, $query);
    while($query_row = mysqli_fetch_assoc($result)){ 
        	$price = $query_row['totalprice']; 
        	$total = $total + $price;																     
      }
        
       if($cart_min_value > $total){
            $jsonArr = array('is_error'=>'yes','result'=>'Coupon Not Applied. Cart total must be '.$cart_min_value);
            
        }
        else{
            if($CouponType=='cash'){
                $final_price = $total - $CouponValue;
            } else{
                $final_price = $total - (($total * $CouponValue) / 100) ;
            }
            $dd = $total - $final_price;
            $jsonArr = array('is_error'=>'no','result'=>'₹'.$final_price,'dd'=>'₹'.$dd);
        }
        
        unset($_SESSION['Coupon_Id']);
        unset($_SESSION['Final_Price']);
        unset($_SESSION['Coupon_Value']);
        unset($_SESSION['Coupon_Code']);
        
        $_SESSION['Coupon_Id'] = $CouponId;
        $_SESSION['Final_Price'] = $final_price;
        $_SESSION['Coupon_Value'] = $dd;
        $_SESSION['Coupon_Code'] = $CouponCode;
        echo json_encode($jsonArr);
?>