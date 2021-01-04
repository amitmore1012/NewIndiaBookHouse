<!DOCTYPE html>

<html lang="zxx">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>NIBH - New India Book House</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
	 <style>
/*            #map_canvas {*/
/*    display: block;*/
/*    width: 80%;*/
/*    height: 80%;*/
/*}*/
#current {
    padding-top: 25px;
}

        </style>
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
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
						<!-- Login Form s-->
						<form role="form" action="register_user.php" method="POST">
							<div class="login-form">
								<h4 class="login-title">New Customer</h4>
								<p><span class="font-weight-bold">I am a new customer</span></p>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email">Full Address</label>
										<input class="mb-0 form-control" type="text" id="address" name="address" placeholder="Enter your full address" required>
									</div>
									
									<div id='map_canvas' style="overflow: visible; width: 500px; height: 500px;">
					        
					    </div>
									
									
									<div class="col-12 mb--20">
										<div id="current">Location not set:</div>
                                        <input id="a1" type="hidden" class="form-control" name="email1" placeholder="Latitude will be set automatically" >
                                        <input id="a2" type="hidden" class="form-control" name="email2" placeholder="Longitude will be set automatically" >
                                    </div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-outlined" name="register1">Register</button>
									</div>
								</div>
							</div>
					</div>
					<div class=" col-md-12 col-lg-6 col-xs-12">
					    <!--<div id='map_canvas' style="overflow: visible; width: 500px; height: 500px;">-->
					        
					    <!--</div>-->
							<!--<div class="login-form">-->
							<!--	<h4 class="login-title">Returning Customer</h4>-->
							<!--	<p><span class="font-weight-bold">I am a returning customer</span></p>-->
							<!--	<div class="row">-->
							<!--		<div class="col-md-12 col-12 mb--15" ></div>-->
							<!--		<div class="col-12 mb--20">-->
							<!--			<div id="current">Nothing yet...</div>-->
       <!--                                 <input id="a1" type="text" class="form-control" name="email1" >-->
       <!--                                 <input id="a2" type="text" class="form-control" name="email2" >-->
							<!--		</div>-->
							<!--		<div class="col-md-12">-->
							<!--			<button type="submit" class="btn btn-outlined" name="register">Register</button>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
						</form>
					</div>
				</div>
			</div>
		</main>

	</div>

	<!--=================================
    Footer Area
===================================== -->
	    <?php 
	    
        include './imports/footer.php';

    ?>
    
        <script>
    
    function initMap() {
var map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 15,
     center: new google.maps.LatLng(19.9975, 73.7898),
    mapTypeId: google.maps.MapTypeId.HYBRID
    
});

        //         if (navigator.geolocation) {
        //   navigator.geolocation.getCurrentPosition(function(position) {
        //     var pos = {
        //       lat: position.coords.latitude,
        //       lng: position.coords.longitude
        //     };

        //   }
        // }


var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(19.9975, 73.7898),
    draggable: true
});

google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat() + ' Current Lng: ' + evt.latLng.lng() + '</p>';
    document.getElementById('a1').value = evt.latLng.lat();
    document.getElementById('a2').value = evt.latLng.lng();
});

google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
    document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
});

map.setCenter(myMarker.position);
myMarker.setMap(map);

}
    </script>
        
        
        <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzvMqiourwx4ZkG7-fnebJgQ6zEg67h78&callback=initMap">
    </script>
    
    
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>