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
		$pubID = $_POST['BookList'];
		$authorName = $_POST['authorName'];


		 $sql = "insert into author(authorName, sID, bID, yID, semID, bkID,pubID) values ('$authorName','$streamID','$bID','$yID','$sID','$bkID','$pubID')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: authors.php');
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
	    $auth1 = $_POST['editauthName'];
	    $pub1 = $_POST['editpubName'];
	    $book1 = $_POST['editbookName'];
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
         
          $sql5="select * from sem where semName='$sem1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $sem = $k['semID'];
         }
         
         $sql5="select * from books where bookName='$book1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $book = $k['bookID'];
         }
         
         $sql5="select * from publication where publicationName='$pub1'";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             $publication = $k['publicationID'];
         }
	    
        $sql4 = "update author set authorName='$auth1', sID='$strea', bID='$branch', yID='$year', semID='$sem',bkID='$book',pubID='$publication' where authorID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: authors.php');
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
        $sql4 = "DELETE FROM author WHERE authorID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: authors.php');
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