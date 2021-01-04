<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {

		$stream = $_POST['StreamList'];
		$bID = $_POST['BranchList'];
		$yID = $_POST['YearList'];
		$sID = $_POST['SemList'];
		$bookName = $_POST['bookName'];

		 $sql = "insert into book(bookName, sID, bID, yID, semID) values ('$bookName','$stream','$bID','$yID','$sID')";

		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: books.php');
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
	    
        $sql4 = "update book set bookName='$book1', sID='$strea', bID='$branch', yID='$year', semID='$sem' where bookID='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: books.php');
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
        $sql4 = "DELETE FROM book WHERE bookID='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: books.php');
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