   <?php 
   include 'security.php';
   $conn = mysqli_connect("127.0.0.1","root-1","nibh@1713","nibh-v1");
   
   if (isset($_POST['cartBtn'])) {
        $book_id = $_POST['bookid'];
        $book_name = $_POST['bookname'];
        $book_stream = $_POST['bookstream'];
        $book_branch = $_POST['bookbranch'];
        $book_year = $_POST['bookyear'];
        $book_sem = $_POST['booksem'];
        $book_publication = $_POST['bookpublication'];
        $book_author = $_POST['bookauthor'];
        $book_price = $_POST['bookprice'];
        $book_ourprice = $_POST['bookourprice'];
		$book_isbn = $_POST['bookisbn'];
		$book_language = $_POST['booklanguage'];
		$book_discount = $_POST['bookdiscount'];
		$book_image = $_POST['bookimage'];
		$qnty = $_POST['qnty'];
   }

        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            
        }
        $sessionid = session_id();
        echo $sessionid;
        
        
      if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'],"id");
            
            
            if(in_array($_POST['bookid'],$item_array_id)){
                header('Location: index.php');
            } else{
                $count = count($_SESSION['cart']);
                $item_array = array('id'=>$_POST['bookid']);
                $_SESSION['cart'][$count] = $item_array;
                
                $totalprice = $qnty * $book_ourprice;
                
                $sql = "insert into cart(sessionid,image,productid,product,qnty,price,totalprice) values ('$sessionid','$book_image','$book_id','$book_name','$qnty','$book_ourprice','$totalprice')";
        
		$query = mysqli_query($conn, $sql);
        
		if ($query) {
 			    
 			    header('Location: index.php');
 			    
		}
            }
      }
   

   

?>
