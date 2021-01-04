
<?php 
require_once("admin/dbcontroller.php");

$db_handle = new DBController();

    $query = "select * from stream";
    $result = $db_handle->runQuery($query);
 ?>

<!DOCTYPE html>
<html>
 <head>
  <title>NIBH | Customer Data </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
  <script src="../js/multiselect/bootstrap-multiselect.js"></script>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />-->
  <link href="../js/multiselect/bootstrap-multiselect.css" rel="stylesheet">
      <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
 </head>
 <body>
  <br />
  <div class="container">
   <br />
   
   
   <!--Modal Start-->
   
   
   
   
   
   <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" align="center">Add Entry</h3>

      </div>
      
     
      <div class="modal-body">
           <form action="addCustomerData.php" method="POST">
          
    <div class="form-row">
                <div class="form-group">
                        <label for="CustomerName">Customer Name</label>
                        <input type="text" class="form-control" id="CustomerName" name="CustomerName" required>
                    </div>
                    
    </div>                
    <div class="form-row">
                    
                <div class="form-group">
                        <label for="MobileNo">Mobile Number</label>
                        <input type="text" class="form-control" id="MobileNo" name="MobileNo" required>
                    </div>
    </div>
    
  <div style="margin-top:5px"></div>
  <div class="form-row">
           <label for="Stream">Stream</label>
           <select class="form-control chosen-select" id="Stream" name="Stream" onChange="getBranch(this.value);" required>
            <option selected disabled> Select Options</option>
            <?php 

    foreach ($result as $key) {
         ?>

         <option value="<?php echo $key["streamID"]; ?>"> <?php echo $key["streamName"]; ?> </option>

        <?php  
    }

  ?>

      </select>
    
  </div>

    <div style="margin-top:5px"></div>
  <div class="form-row">
           <label for="Branch">Branch</label>
           <select class="form-control" id="Branch" name="Branch" onChange="getYear(this.value);" required>
            <option selected disabled> Select Options</option>
            
      </select>
    
  </div>
  
      <div style="margin-top:5px"></div>
  <div class="form-row">
           <label for="Year">Year</label>
           <select class="form-control" id="Year" name="Year" onChange="getSem(this.value);" required>
            <option selected disabled> Select Options</option>
            
      </select>
    
  </div>

      <div style="margin-top:5px"></div>
  <div class="form-row">
           <label for="Sem">Sem</label>
           <select class="form-control" id="Sem" name="Sem" onChange="getBooks(this.value);" required>
            <option selected disabled> Select Options</option>
            
      </select>
    
  </div>
    
     
         <div>           
               
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" required>
                    </div>
     </div>
     
         <div>           
               
                    <div class="form-group">
                        <label for="MapLocation">Map Location</label>
                        <div id='map_canvas' style="overflow: visible; width: 500px; height: 500px;">
					        
					    </div>
                    </div>
     </div>
     
         <div>           
               
                    <div class="form-group">
                        <div id="current">Location not set:</div>
                        <input id="a1" type="hidden" class="form-control" name="email1" placeholder="Latitude will be set automatically" required>
                        <input id="a2" type="hidden" class="form-control" name="email2" placeholder="Longitude will be set automatically" required>
                    </div>
     </div>
     
                 <div class="form-row">
                    
                <div class="form-group">
                        <label for="Feedback">Feedback</label>
                        <input type="text" class="form-control" id="Feedback" name="Feedback" style="height:90px">
                    </div>
    </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="window.location.href = 'index.php';">Close</button> 
        <button type="submit" class="btn btn-success" name="saveBtn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
   
   
   
   
   
   
   
   
   
   <!--Modal End-->

   
  </div>
 </body>
 
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
 
 
 
 <script type="text/javascript">
    function getBranch(val) {
            $.ajax({
                type : "POST",
                url : "getBranch.php",
                data : 'streamID='+val,
                success : function(data) {
                    $('#Branch').html(data);
                    getYear();
                }
            });
        }   

         function getYear(val) {
            $.ajax({
                type : "POST",
                url : "getYear.php",
                data : 'branchID='+val,
                success : function(data) {
                    $('#Year').html(data);
                    getBooks();
                }
            });
        }

         function getSem(val) {
            $.ajax({
                type : "POST",
                url : "getSem.php",
                data : 'yearID='+val,
                success : function(data) {
                    $('#Sem').html(data);
                    getBooks();
                }
            });
        }

        function getBooks(val) {
            $.ajax({
                type : "POST",
                url : "admin/getBooks.php",
                data : 'semID='+val,
                success : function(data) {
                    $('#BookList').html(data);
                    getPublication();
                }
            });
        }
        
                function getPublication(val) {
            $.ajax({
                type : "POST",
                url : "getPublication.php",
                data : 'bookID='+val,
                success : function(data) {
                    $('#PublicationList').html(data);
                   // getAuthor();
                }
            });
        }
</script>
</html>
