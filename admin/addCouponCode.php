<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {
		$CouponName = $_POST['CouponName'];
		$CouponValue = $_POST['CouponValue'];
		$CouponType = $_POST['CouponType'];
		$cart_min_value = $_POST['cart_min_value'];
		$status = $_POST['status'];


		 $sql = "insert into coupon_master(coupon_code,coupon_value,coupon_type,cart_min_value,status) values ('$CouponName','$CouponValue','$CouponType','$cart_min_value','$status')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: coupon_code.php');
			echo "in data sucess";
		}
		else{
			echo "else, Not added";
		}
	}

	else{
		echo "not in if";
	}
	
	
	
		//UPDATE DATA
    if(isset($_POST['updateBtn'])){
	    $updateId = $_POST['updateId'];
	    $Stream1 = $_POST['editstreamName'];
        $sql4 = "update stream set streamName='$Stream1' where streamID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: category.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}
	
		else{
		echo "not in if update";
	}



        //DELETE DATA
            if(isset($_POST['deleteEnquiry'])){
	    $deleteId = $_POST['edit_id2'];
        $sql4 = "DELETE FROM stream WHERE streamID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: category.php');
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