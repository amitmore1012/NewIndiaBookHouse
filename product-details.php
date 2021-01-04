   <?php 
  include 'security.php';
  $book_isbn = $_GET['bookisbn'];
  $count = 0;
  require 'dbConfig.php';
  $query = "SELECT * FROM allbook WHERE isbn = '$book_isbn'";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
      
$row = mysqli_fetch_assoc($result);
  if(!$row){
    	header('Location: index.php');
    exit;
  }  
    ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - Product Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
</head>

<body>
    <div class="site-wrapper" id="top">
         
    <?php 
     
        include './imports/header.php';

    ?>   
        
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Product Details</li>
                            <li class="breadcrumb-item active"><?php echo $row['book']; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div id="message"></div>
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                            <div class="single-slide">
                                <img class="img-responsive img-thumbnail" src="admin/uploadImages/<?php echo $row['image']; ?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form action="cart1.php" method="POST" enctype="multipart/form-data">
                        <div class="product-details-info pl-lg--30 ">
                            
                            <h3 class="product-title"><?php echo $row['book']; ?></h3>
                            <ul class="list-unstyled">
                                <li>Stream: <span class="list-value"><?php echo $row['stream']; ?></span></li>
                                <input type="hidden" name="bookstream" value="<?php echo $row['stream']; ?>">
                                <li>Branch: <span class="list-value"><?php echo $row['branch']; ?></span></li>
                                <input type="hidden" name="bookbranch" value="<?php echo $row['branch']; ?>">
                                <li>Year: <span class="list-value"><?php echo $row['year']; ?></span></li>
                                <input type="hidden" name="bookyear" value="<?php echo $row['year']; ?>">
                                <li>Semester: <span class="list-value"><?php echo $row['sem']; ?></span></li>
                                <input type="hidden" name="booksem" value="<?php echo $row['sem']; ?>">
                                <li>Publication: <span class="list-value"><?php echo $row['publication']; ?></span></li>
                                <input type="hidden" name="bookpublication" value="<?php echo $row['publication']; ?>">
                                <li>Author: <span class="list-value"><?php echo $row['author']; ?></span></li>
                                <input type="hidden" name="bookauthor" value="<?php echo $row['author']; ?>">
                                <li>ISBN: <span class="list-value"><?php echo $row['isbn']; ?></span></li>
                                <input type="hidden" name="bookisbn" value="<?php echo $row['isbn']; ?>">
                                <li>Language: <span class="list-value"><?php echo $row['language']; ?></span></li>
                                <input type="hidden" name="booklanguage" value="<?php echo $row['language']; ?>">
                                <input type="hidden" name="bookname" value="<?php echo $row['book']; ?>">
                                <input type="hidden" name="bookimage" value="<?php echo $row['image']; ?>">
                                <input type="hidden" name="bookdiscount" value="<?php echo $row['discount']; ?>">
                                 <input type="hidden" name="bookid" value="<?php echo $row['id']; ?>">
                            </ul>
                            <div class="price-block">
                                <span class="price-new">₹<?php echo $row['ourprice']; ?></span>
                                <input type="hidden" name="bookourprice" value="<?php echo $row['ourprice']; ?>">
                                <del class="price-old">₹<?php echo $row['price']; ?></del>
                                <input type="hidden" name="bookprice" value="<?php echo $row['price']; ?>">
                            </div>
                            <div class="add-to-cart-row">
                                <div class="count-input-block">
                                    
                                    <span class="widget-label">Qty</span>
                                    <input type="number" class="form-control text-center" name="qnty" value="1">
                                    <div class="count-input-btns">
												<a class="inc-ammount count-btn"><i
														class="zmdi zmdi-chevron-up"></i></a>
												<a class="dec-ammount count-btn"><i
														class="zmdi zmdi-chevron-down"></i></a>
											</div>
                                </div>
                                <div class="add-cart-btn">
                                        <!--<input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">-->
                                        <button type="submit" name="cartBtn" class="btn btn-outlined--primary cartBtn"><span class="plus-icon"></span>Add to Cart</button>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!--=================================
    Brands Slider    Footer Area
===================================== -->
    <?php 
        include './imports/footer.php';

    ?>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>