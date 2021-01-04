<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

        //SAVE DATA
	if (isset($_POST['saveBtn'])) {

		$custName = $_POST['StreamList'];
		$branchName = $_POST['branchName'];


		 $sql = "insert into branch(branchName, sID) values ('$branchName','$custName')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: branch.php');
			echo "in data sucess";
		}
		else{
			echo "else  ";
		}
	}

	else{
		echo "not in if";
	}
	
	
		//UPDATE DATA
    if(isset($_POST['updateBtn'])){
	    $updateId = $_POST['updateId'];
	    $branch1 = $_POST['editbranchName'];
	    $Stream1 = $_POST['editstreamName'];
	    
	    $sql5="select * from stream where streamName='$Stream1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $strea = $k['streamID'];
         }
	    
	    
        $sql4 = "update branch set branchName='$branch1', sID='$strea' where branchID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: branch.php');
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
        $sql4 = "DELETE FROM branch WHERE branchID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: branch.php');
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