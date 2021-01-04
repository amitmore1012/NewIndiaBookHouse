<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

	if (isset($_POST['saveBtn'])) {

		$sID = $_POST['StreamList'];
		$bID = $_POST['BranchList'];
		$yID = $_POST['YearList'];
		$semName = $_POST['semName'];


		 $sql = "insert into sem(semName, sID, bID, yID) values ('$semName','$sID','$bID','$yID')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: semester.php');
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
	    $sem1 = $_POST['editsemName'];
	    $year1 = $_POST['edityearName'];
	    $branch1 = $_POST['editbranchName'];
	    $Stream1 = $_POST['editstreamName'];
	    
	    $sql5="select * from stream where streamName='$Stream1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $strea = $k['streamID'];
         }
	    
	    $sql5="select * from branch where branchName='$branch1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $branch = $k['branchID'];
         }
         
         $sql5="select * from year where yearName='$year1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $year = $k['yearID'];
         }
	    
        $sql4 = "update sem set semName='$sem1', sID='$strea', bID='$branch', yID='$year' where semID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: semester.php');
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
        $sql4 = "DELETE FROM sem WHERE semID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: semester.php');
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