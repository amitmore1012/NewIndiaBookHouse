<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
//$conn = mysqli_connect("192.168.43.161","root-1","root","nibh");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {

		$streamID = $_POST['StreamList'];
		$bID = $_POST['BranchList'];
		$yID = $_POST['YearList'];
		$sID = $_POST['SemList'];
		$bkID = $_POST['BookList'];
		$publicationName = $_POST['publicationName'];


		 $sql = "insert into publication(publicationName, sID, bID, yID, semID, bkID) values ('$publicationName','$streamID','$bID','$yID','$sID','$bkID')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: publications.php');
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
	    $pub1 = $_POST['editpubName'];
	    $book1 = $_POST['BookList'];
	    $sem1 = $_POST['SemList'];
	    $year1 = $_POST['YearList'];
	    $branch1 = $_POST['BranchList'];
	    $Stream1 = $_POST['StreamList'];
	    
        $sql4 = "update publication set publicationName='$pub1', sID='$Stream1', bID='$branch1', yID='$year1', semID='$sem1',bkID='$book1' where publicationID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: publications.php');
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
        $sql4 = "DELETE FROM publication WHERE publicationID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: publications.php');
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