   <?php 
  include 'security.php';
  
        
    ?>


<!DOCTYPE html>
<html amp lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NIBH - New India Book House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
    #feedback {
	height: 45px;
	width: 45px;
	position: fixed;
	right: 0.6%;
	bottom: 50%;
	z-index: 1000;
	/*background:rgba(255, 255, 255, 0.9);*/
	/*transform: rotateZ(-90deg);*/
	/*-webkit-transform: rotateZ(-90deg);*/
	/*-moz-transform: rotateZ(-90deg);*/
	/*-o-transform: rotateZ(-90deg);*/
	/*filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);*/
}
</style>
</head>

<body>
    <div class="site-wrapper" id="top">
                 <button onclick="myModalShow()" id="feedback" class="fa fa-pencil-square-o fa-3x">
		</button>
    <?php 
     
        include './imports/header.php';

    ?>
    
    

    
    
        <!--=================================
        Hero Area
        ===================================== -->
        <section class="hero-area hero-slider-1">
           
            <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
                <div class="single-slide bg-shade-whisper  ">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-right">
                                <img src="image/bg-images/home-slider-2-ai.png" alt=""></img>
                                
                            </div>
                            <div class="row no-gutters ">
                                <div class="col-xl-6 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-left-side">
                                        <h1>H.G. Wells<br>
                                            De Vengeance</h1>
                                        <h2>Cover Up Front Of Books and Leave Summary</h2>
                                        <!--<a href="#" class="btn btn-outlined--primary">-->
                                        <!--    $78.09 - Order Now!-->
                                        <!--</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-ghost-white">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-left">
                                <img src="image/bg-images/home-slider-1-ai.png" alt=""></img>
                            </div>
                            <div class="row align-items-center justify-content-start justify-content-md-end">
                                <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-right-side">
                                        <h1>J.D. Kurtness <br>
                                            De Vengeance</h1>
                                        <h2>Cover Up Front Of Books and Leave Summary</h2>
                                        <!--<a href="#" class="btn btn-outlined--primary">-->
                                        <!--    $78.09 - Learn More-->
                                        <!--</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Features Section
        ===================================== -->
        <section class="mb--30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Home </h5>
                                <p>Delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Replacement </h5>
                                <p>Guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Discounted</h5>
                                <p>Rates</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>096231 23458</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Promotion Section One
        ===================================== -->
        <section class="section-margin">
            <h2 class="sr-only">Promotion Section</h2>
            <div class="container">
                <div class="row space-db--30">
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-with-text.jpg" alt=""></img>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-with-text-2.jpg" alt=""></img>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        
                <!--=================================
        All Books Slider Tab
        ===================================== -->
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2>All Books</h2>
                </div>
                <!--<div id="slick1" name="slick1" class="product-slider arrow-type-two slider-border-single-row sb-slick-slider slick1" data-slick-setting='{-->
                <div class="sb-slick-slider blog-gallery-slider arrow-type-two slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "dots":true,
                "arrows": true,
                "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"}
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    
                    
<?php 
  $count = 0;
  require 'dbConfig.php';
  $query = "select * from allbook ORDER BY id DESC LIMIT 6";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;

  }
    while($query_row = mysqli_fetch_assoc($result)){        
    ?>
                    
                    <div class="single-slide">
                                     
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $query_row['author']; ?>
                                            </a>
                                            <h3><a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>"><?php echo $query_row['book']; ?></a></h3>
                                        </div>
                                        <div style="height: auto"></div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>">
                                                <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                            </a>
                                                <div class="hover-contents">
                                                    <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>" class="hover-image">
                                                        <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                                    </a>
                                                    <!--<div class="hover-btns">-->
                                                    <!--    <a href="cart.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-shopping-basket"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="wishlist.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-heart"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                    <!--        class="single-btn">-->
                                                    <!--        <i class="fas fa-eye"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <div style="height: 30px">
                                                <span class="price-discount">Featured</span>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">₹<?php echo $query_row['ourprice']; ?> </span>
                                                <del class="price-old">₹<?php echo $query_row['price']; ?> </del>
                                                <span class="price-discount"><?php echo $query_row['discount']; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                               <?php
                                      }
                                  if(isset($con)) { mysqli_close($con); }
                                ?>       
                                
                </div>
                <div style="height: 50px;">
                    <p> </p>
                </div>
                <center>
                         <a href="all-item.php" class="update-btn c-btn btn-outlined" style="text-align:center;display:block;width:20%;">View all</a>
                    </center>
            </div>
        </section>
        
        
        <!--=================================
        Featured Slider Tab
        ===================================== -->
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2>Featured Items</h2>
                </div>
                <!--<div id="slick1" name="slick1" class="product-slider arrow-type-two slider-border-single-row sb-slick-slider slick1" data-slick-setting='{-->
                <div class="sb-slick-slider blog-gallery-slider arrow-type-two slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "dots":true,
                "arrows": true,
                "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"}
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    
                    
<?php 
  $count = 0;
  require 'dbConfig.php';
  $query = "select * from allbook ORDER BY id DESC LIMIT 6";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;

  }
    while($query_row = mysqli_fetch_assoc($result)){        
    ?>
                    
                    <div class="single-slide">
                                     
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $query_row['author']; ?>
                                            </a>
                                            <h3><a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>"><?php echo $query_row['book']; ?></a></h3>
                                        </div>
                                        <div style="height: auto"></div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>">
                                                <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                            </a>
                                                <div class="hover-contents">
                                                    <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>" class="hover-image">
                                                        <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                                    </a>
                                                    <!--<div class="hover-btns">-->
                                                    <!--    <a href="cart.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-shopping-basket"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="wishlist.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-heart"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                    <!--        class="single-btn">-->
                                                    <!--        <i class="fas fa-eye"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <div style="height: 30px">
                                                <span class="price-discount">Featured</span>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">₹<?php echo $query_row['ourprice']; ?> </span>
                                                <del class="price-old">₹<?php echo $query_row['price']; ?> </del>
                                                <span class="price-discount"><?php echo $query_row['discount']; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                               <?php
                                      }
                                  if(isset($con)) { mysqli_close($con); }
                                ?>       
                                
                </div>
                <div style="height: 50px;">
                    <p> </p>
                </div>
                <center>
                         <a href="featured-items.php" class="update-btn c-btn btn-outlined" style="text-align:center;display:block;width:20%;">View all</a>
                    </center>
            </div>
        </section>
        
        <!--=================================
        New Arrival Slider Tab 
        ===================================== -->
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2>New Arrivals</h2>
                </div>
                <!--<div id="slick1" name="slick1" class="product-slider arrow-type-two slider-border-single-row sb-slick-slider slick1" data-slick-setting='{-->
                <div class="sb-slick-slider blog-gallery-slider arrow-type-two slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "dots":true,
                "arrows": true,
                "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"}
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    
                    
<?php 
  $count = 0;
  require 'dbConfig.php';
  $query = "select * from allbook ORDER BY id DESC LIMIT 6";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;

  }
    while($query_row = mysqli_fetch_assoc($result)){        
    ?>
                    
                    <div class="single-slide">
                                     
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $query_row['author']; ?>
                                            </a>
                                            <h3><a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>"><?php echo $query_row['book']; ?></a></h3>
                                        </div>
                                        <div style="height: auto"></div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>">
                                                <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                            </a>
                                                <div class="hover-contents">
                                                    <a href="product-details.php?bookisbn=<?php echo $query_row['isbn']; ?>" class="hover-image">
                                                        <img class="img-responsive img-thumbnail" src="../../../../admin/uploadImages/<?php echo $query_row['image']; ?>"></img>
                                                    </a>
                                                    <!--<div class="hover-btns">-->
                                                    <!--    <a href="cart.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-shopping-basket"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="wishlist.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-heart"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                    <!--        class="single-btn">-->
                                                    <!--        <i class="fas fa-eye"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <div style="height: 30px">
                                                <span class="price-discount">New Arrival</span>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">₹<?php echo $query_row['ourprice']; ?> </span>
                                                <del class="price-old">₹<?php echo $query_row['price']; ?> </del>
                                                <span class="price-discount"><?php echo $query_row['discount']; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                               <?php
                                      }
                                  if(isset($con)) { mysqli_close($con); }
                                ?>       
                                
                </div>
                <div style="height: 50px;">
                    <p> </p>
                </div>
                <center>
                         <a href="new-arrival-item.php" class="update-btn c-btn btn-outlined" style="text-align:center;display:block;width:20%;">View all</a>
                    </center>
            </div>
        </section>
        
        <!--=================================
        Shop By Category Tab
        ===================================== -->
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2>Shop by Category</h2>
                </div>
                <!--<div id="slick1" name="slick1" class="product-slider arrow-type-two slider-border-single-row sb-slick-slider slick1" data-slick-setting='{-->
                <div class="sb-slick-slider blog-gallery-slider arrow-type-two slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "dots":true,
                "arrows": true,
                "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"}
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    
                    
<?php 
  $count = 0;
  require 'dbConfig.php';
  $query = "select * from stream ORDER BY streamID DESC LIMIT 6";
  $result = mysqli_query($con, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;

  }
    while($query_row = mysqli_fetch_assoc($result)){        
    ?>
                    
                    <div class="single-slide">
                                     
                                    <div class="product-card">
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <a href="category-details.php?categoryName=<?php echo $query_row['streamName']; ?>">   
                                                <!--<img class="img-responsive img-thumbnail" src="../../../../admin/categoryImages/<?php //echo $query_row['image']; ?>">-->
                                            </a>
                                                <div class="hover-contents">
                                                   <a href="category-details.php?categoryName=<?php echo $query_row['streamName']; ?>">  
                                                <!--<img class="img-responsive img-thumbnail" src="../../../../admin/categoryImages/<?php //echo $query_row['image']; ?>">-->
                                            </a> 
                                                    <!--<div class="hover-btns">-->
                                                    <!--    <a href="cart.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-shopping-basket"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="wishlist.html" class="single-btn">-->
                                                    <!--        <i class="fas fa-heart"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <a href="#" data-toggle="modal" data-target="#quickModal"-->
                                                    <!--        class="single-btn">-->
                                                    <!--        <i class="fas fa-eye"></i>-->
                                                    <!--    </a>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <a href="category-details.php?categoryName=<?php echo $query_row['streamName']; ?>">   
                                                <span class="price"><?php echo $query_row['streamName']; ?> </span>
                                            </a> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                               <?php
                                      }
                                  if(isset($con)) { mysqli_close($con); }
                                ?>       
                                
                </div>
                <div style="height: 50px;">
                    <p> </p>
                </div>
                <center>
                         <a href="category-list.php" class="update-btn c-btn btn-outlined" style="text-align:center;display:block;width:20%;">View all</a>
                    </center>
            </div>
        </section>
        
        <!--=================================
        Footer
        ===================================== -->
        
        


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <form action="addEnquiry.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModal">Place Enquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          
      <div class="modal-body">

        
            <div class="form-row">
              <div class="form-group col-md-6" >
                <label for="CustomerName">Name</label>
                <input type="text" class="form-control" id="CustomerName" name="CustomerName" required>
              </div>
              
              <div class="form-group col-md-6" >
                  <label for="MobileNo">Mobile</label>
                  <input type="text" class="form-control" id="MobileNo" name="MobileNo" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Stream">Stream</label>
                  <input type="text" class="form-control" id="Stream" name="Stream" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="Branch">Branch</label>
                  <input type="text" class="form-control" id="Branch" name="Branch" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Year">Year</label>
                  <input type="text" class="form-control" id="Year" name="Year" placeholder="Optional">
                </div>
                <div class="form-group col-md-6">
                  <label for="Sem">Sem</label>
                  <input type="text" class="form-control" id="Sem" name="Sem" placeholder="Optional">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Book">Books</label>
                  <input type="text" class="form-control" id="Book" name="Book" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="Publication">Publication</label>
                  <input type="text" class="form-control" id="Publication" name="Publication" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="Author">Author</label>
                  <input type="text" class="form-control" id="Author" name="Author" placeholder="Optional">
                </div>
                <div class="form-group col-md-6">
                  <label for="Address">Address</label>
                  <input type="text" class="form-control" id="Address" name="Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="Instruction">Instructions</label>
                  <input type="text" class="form-control" id="Instruction" name="Instruction" placeholder="Optional">
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outlined" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outlined--primary" name="saveBtnModalPop">Save changes</button>
      </div>
     
    </div>
  </div>
  </form>
</div>
</div>




    <!--=================================
    Brands Slider footer related books
    ===================================== -->
    <?php 
        include './imports/footer.php';

    ?>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    // $(window).on('load',function(){
    //     $('#myModal').modal('show');
    // });
    
    // $(window).on('load',function(){
    //     $('#myModal').modal('show');
    // });
    
    
    function myModalShow() {
        $('#myModal').modal('show');
//   var x = document.getElementById("myModal");
//   if (x.style.display === "none") {
//     x.style.display = "block";
//   } 
//   else {
//     x.style.display = "none";
//   }
}
    
</script>

</body>

</html>