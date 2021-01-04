
<?php

 include 'security.php';
require_once("dbcontroller.php");

$db_handle = new DBController();

    $query = "select * from stream";
    $result = $db_handle->runQuery($query);

?>
<!DOCTYPE html>
<html>
 <head>
  <title>NIBH | Add Entry </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>-->
  <script src="js/multiselect/bootstrap-multiselect.js"></script>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />-->
  <link href="js/multiselect/bootstrap-multiselect.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 </head>
 <body>
     
  <br />
  
  <div class="container">
   <br />
   
   
   <!--Modal Start-->
   

   
   
   
   <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" align="center">Add Entry</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
     
      <div class="modal-body">
           <form action="addEnquiry.php" method="POST">
          
    <div class="form-row">
                <div class="form-group">
                        <label for="CustomerName">Customer Name</label>
                        <input type="text" class="form-control" id="CustomerName" name="CustomerName">
                    </div>
                    
    </div>                
    <div class="form-row">
                    
                <div class="form-group">
                        <label for="MobileNo">Mobile Number</label>
                        <input type="text" class="form-control" id="MobileNo" name="MobileNo">
                    </div>
    </div>
    
    <div class="form-row">           
                    <div class="form-group">
              <label>Stream</label><br />
                 <select id="first_level" name="first_level[]" multiple class="form-control">
                 <?php
                 foreach($result as $row)
                 {
                  echo '<option value="'.$row["streamID"].'">'.$row["streamName"].'</option>';
                 }
                 ?>
                 </select>
                </div>
                
    </div>
    <div class="form-row">            
                <div class="form-group">
                 <label>Branch</label><br />
                 <select id="second_level" name="second_level[]" multiple class="form-control">
            
                 </select>
                </div>
    </div>
    
    <div class="form-row">
                <div class="form-group">
                 <label>Year</label><br />
                 <select id="third_level" name="third_level[]" multiple class="form-control">
            
                 </select>
                </div>
    
    </div>
    <div class="form-row">
    
                <div class="form-group">
                 <label>Semester</label><br />
                 <select id="forth_level" name="forth_level[]" multiple class="form-control">
            
                 </select>
                </div>
    </div>
    
    <div class="form-row">
                <div class="form-group">
                 <label>Books</label><br />
                 <select id="fifth_level" name="fifth_level[]" multiple class="form-control">
            
                 </select>
                </div>
      
      </div>
      <div class="form-row">
      
                 <div class="form-group">
                 <label>Publication</label><br />
                 <select id="sixth_level" name="sixth_level[]" multiple class="form-control">

                 </select>
                </div> 
    </div>  
    
    <div class="form-row">
                     <div class="form-group">
                     <label>author</label><br />
                     <select id="seventh_level" name="seventh_level[]" multiple class="form-control">

                     </select>
                    </div> 
                    
    </div>
    <div>                
                    
                    <div class="form-group">
                        <label for="Instructions">Instructions</label>
                        <input type="text" class="form-control" id="Instructions" name="Instructions">
                    </div>
                
    </div>      
    
        <div>                
                    
                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="text" class="form-control" id="Quantity" name="Quantity">
                    </div>
                
    </div> 
    
        <div>                
                    
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                
    </div> 
    
    <div class="form-row">
                    <div class="form-group">
                        <label for="Delivery">Delivery</label>
                        <input type="text" class="form-control" id="Delivery" name="Delivery">
                    </div>
               
    </div>           
    <div>           
               
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address">
                    </div>
     </div>
     
         <div class="form-row">
                    
                <div class="form-group">
                        <label for="orderby">Order Taken By</label>
                        <input type="text" class="form-control" id="orderby" name="orderby">
                    </div>
    </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="window.location.href = 'enquiry.php';">Close</button>
        <button type="submit" class="btn btn-primary" name="saveBtn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
   

  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select Stream',
  buttonWidth:'100%',
  onChange:function(option, checked){
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
    $('#forth_level').html('');
   $('#forth_level').multiselect('rebuild');
    $('#fifth_level').html('');
   $('#fifth_level').multiselect('rebuild');
   $('#sixth_level').html('');
   $('#sixth_level').multiselect('rebuild');
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_second_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
     }
    })
   }
  }
 });

 $('#second_level').multiselect({
  nonSelectedText: 'Select Branch',
  buttonWidth:'100%',
  onChange:function(option, checked)
  {
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
    $('#forth_level').html('');
   $('#forth_level').multiselect('rebuild');
      $('#fifth_level').html('');
   $('#fifth_level').multiselect('rebuild');
      $('#sixth_level').html('');
   $('#sixth_level').multiselect('rebuild');
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_third_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#third_level').html(data);
      $('#third_level').multiselect('rebuild');
     }
    });
   }
  }
 });


$('#third_level').multiselect({
  nonSelectedText: 'Select Year',
  buttonWidth:'100%',
  onChange:function(option, checked)
  {
   $('#forth_level').html('');
   $('#forth_level').multiselect('rebuild');
      $('#fifth_level').html('');
   $('#fifth_level').multiselect('rebuild');
      $('#sixth_level').html('');
   $('#sixth_level').multiselect('rebuild');
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_forth_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#forth_level').html(data);
      $('#forth_level').multiselect('rebuild');
     }
    });
   }
  }
 });
 
 
 $('#forth_level').multiselect({
  nonSelectedText: 'Select Semester',
  buttonWidth:'100%',
  onChange:function(option, checked)
  {
   $('#fifth_level').html('');
   $('#fifth_level').multiselect('rebuild');
      $('#sixth_level').html('');
   $('#sixth_level').multiselect('rebuild');
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_fifth_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#fifth_level').html(data);
      $('#fifth_level').multiselect('rebuild');
     }
    });
   }
  }
 });


 $('#fifth_level').multiselect({
  nonSelectedText: 'Select Books',
  buttonWidth:'100%',
  onChange:function(option, checked)
  {
   $('#sixth_level').html('');
   $('#sixth_level').multiselect('rebuild');
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_sixth_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#sixth_level').html(data);
      $('#sixth_level').multiselect('rebuild');
     }
    });
   }
  }
 });

 $('#sixth_level').multiselect({
  nonSelectedText: 'Select Publication',
  buttonWidth:'100%',
  onChange:function(option, checked)
  {
   $('#seventh_level').html('');
   $('#seventh_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_seventh_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#seventh_level').html(data);
      $('#seventh_level').multiselect('rebuild');
     }
    });
   }
  }
 });

 $('#seventh_level').multiselect({
  nonSelectedText: 'Select Author',
  buttonWidth:'100%',
  
 });

});
</script>
