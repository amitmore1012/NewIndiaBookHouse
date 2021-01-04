<?php

$conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");


    //SAVE DATA
	if (isset($_POST['saveBtn'])) {

		$stream1 = $_POST['first_level'];
		$s = implode(", ",$stream1);
			$s1 = array();
		$sql5="select * from stream where streamID in ($s)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($s1,$k['streamName']);
             
         }
         $stream = implode(",<br> ",$s1);
         
         
         
		$bID1 = $_POST['second_level'];
		$bID = implode(", ",$bID1);
		$branch1 = array();
		$sql5="select * from branch where branchID in ($bID)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($branch1,$k['branchName']);
             
         }
         $bID2 = implode(",<br> ",$branch1);
         
         
		$yID1 = $_POST['third_level'];
		$y = implode(", ",$yID1);
		$y1 = array();
		$sql5="select * from year where yearID in ($y)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($y1,$k['yearName']);
             
         }
         $yID2 = implode(",<br> ",$y1);
		
		
		
		
		$sID1 = $_POST['forth_level'];
		$sID = implode(", ",$sID1);
		$sID1 = array();
		$sql5="select * from sem where semID in ($sID)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($sID1,$k['semName']);
             
         }
         $sID2 = implode(",<br> ",$sID1);
		
		
		
		$bookName1 = $_POST['fifth_level'];
		$bookName2 = implode(", ",$bookName1);
		$erID1 = array();
		$sql5="select * from book where bookID in ($bookName2)";
         $query5 = mysqli_query($conn,$sql5);
         foreach($query5 as $k){
             array_push($erID1,$k['bookName']);
             
         }
         $bookName = implode(",<br> ",$erID1);
		

		 $sql = "insert into sa(bkID, sID, bID, yID, semID) values ('$bookName','$stream','$bID2','$yID2','$sID2')";
echo $sql;
		$query = mysqli_query($conn, $sql);

		if ($query) {

			header('Location: sa.php');
			echo "in data sucess";
		}
		else{
			echo "else  ";
		}
	}
	
	?>