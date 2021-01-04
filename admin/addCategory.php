<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {
		$custName = $_POST['CategoryName'];


		 $sql = "insert into stream(streamName) values ('$custName')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: category.php');
			echo "in data sucess";
		}
		else{
			echo "else, CategoryName: '$custName' ";
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