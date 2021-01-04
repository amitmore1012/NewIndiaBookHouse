<?php
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {
	    
 		$stream = $_POST['StreamName'];
		$branch = $_POST['BranchName'];
	    $year = $_POST['YearName'];
		$sem = $_POST['Semester'];
        $book = $_POST['Books'];
		$author = $_POST['Author'];
		$publication = $_POST['Publication'];
		$Language = $_POST['Language'];
		$ISBN = $_POST['ISBN'];
		$price = $_POST['Price'];
		$discount = $_POST['Discount'];
		$image = $_FILES["Image"]['name'];
        $ourprice = $price - ($price * ($discount / 100));
        $f = $_POST['filterType'];
        // selling price = 15 - (15 * (5 / 100)) = $14.25
        
		$sql = "insert into allbook(stream, branch, year, sem, book, publication, author, language, isbn, price, discount, ourprice, image) values ('$stream','$branch','$year','$sem','$book','$publication','$author','$Language','$ISBN', '$price', '$discount', '$ourprice', '$image')";
        
		$query = mysqli_query($conn, $sql);
        
		if ($query) {
		    
		    
		    //Upload Image
 			    move_uploaded_file($_FILES["Image"]['tmp_name'], "uploadImages/".$_FILES["Image"]['name']);

 			    
 		if($f == "featured"){
	            
 			    $sql1 = "insert into featuredItem(stream, branch, year, sem, book, publication, author, language, isbn, price, discount, ourprice, image) values ('$stream','$branch','$year','$sem','$book','$publication','$author','$Language','$ISBN', '$price', '$discount', '$ourprice', '$image')";
 			    $query1 = mysqli_query($conn, $sql1);
 			    if($query1){
 			        header('Location: AllBooks.php');
 			    }
	    }
 			
 		if($f == "newArrival"){
	            
 			    $sql1 = "insert into newArrivalItem(stream, branch, year, sem, book, publication, author, language, isbn, price, discount, ourprice, image) values ('$stream','$branch','$year','$sem','$book','$publication','$author','$Language','$ISBN', '$price', '$discount', '$ourprice', '$image')";
 			    $query1 = mysqli_query($conn, $sql1);
 			    if($query1){
 			        header('Location: AllBooks.php');
 			    }
	    }    
 			    header('Location: AllBooks.php');
 			    
		}
	}
		else{
			echo "<br>data not saved";
		}

	
	//Update Data
    if(isset($_POST['updateBtn'])){
	    $updateId = $_POST['updateId'];
		$Stream1 = $_POST['editStream'];
		$Branch1 = $_POST['editBranch'];
		$Year1 = $_POST['editYear'];
		$Sem1 = $_POST['editSem'];
		$Book1 = $_POST['editBook'];
		$Publication1 = $_POST['editPublication'];
		$Author1 = $_POST['editAuthor'];
		$Lang1 = $_POST['editLang'];
		$ISBN1 = $_POST['editISBN'];
        $Price1 = $_POST['editPrice'];
        
        
        $sql4 = "update allbook set stream='$Stream1', branch='$Branch1', year='$Year1', sem='$Sem1', book='$Book1', publication='$Publication1', author='$Author1', language='$Lang1',isbn='$ISBN1', price='$Price1' where id='$updateId' ";
        
        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: AllBooks.php');
			echo "in data sucess";
        }
        else{
            echo mysql_error();
        }
	}



    //Delete Data
     if(isset($_POST['deleteEnquiry'])){
	    $deleteId = $_POST['edit_id2'];
        $sql4 = "DELETE FROM allbook WHERE id='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: AllBooks.php');
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