<?php
$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
//$conn = mysqli_connect("148.72.88.25","root-1","nibh@1713","nibh");
// $conn = mysqli_connect("192.168.43.161","root-1","root","nibh");

	if (isset($_POST['saveBtn'])) {
		$name = $_POST['adminName'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		 $sql = "insert into adminuser (name,password,email) values ('$name','$password','$email')";


		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: adminUsers.php');
			echo "in data sucess";
		}
		else{
			echo "else, CategoryName: '$adminName' ";
		}
	}

	else{
		echo "not in if";
	}
	
	
		//UPDATE DATA
    if(isset($_POST['updateBtn'])){
	    $updateId = $_POST['updateId'];
	    $name = $_POST['Name'];
	    $pass = $_POST['Password'];
	    $email = $_POST['Email'];
        $sql4 = "update adminuser set name='$name', password='$pass', email='$email' where id='$updateId' ";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: adminUsers.php');
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
        $sql4 = "DELETE FROM adminuser WHERE id='$deleteId'";

        $query4 = mysqli_query($conn,$sql4);
        
        if($query4){
            header('Location: adminUsers.php');
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