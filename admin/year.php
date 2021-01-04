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
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo/nibhLogoWhite-1.png">
    <title>NIBH | Year</title>
    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
   
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/buttons.dataTables.min.css">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
        <link href="js/multiselect/bootstrap-multiselect.css" rel="stylesheet">
    <script src="js/multiselect/bootstrap-multiselect.js"></script>
</head>
<body>

	<div id="wrapper">
   <?php 
        include './imports/sidebar.php';
        include './imports/header.php';

    ?>


    <div class="table-responsive">


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Add Year</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        


<form action="addYear.php" method="POST">
    <div class="modal-body">
  <div class="form-row">
      <label for="yearName">Year Name</label>
      <input type="text" class="form-control" id="yearName" name="yearName">
    

  </div>
  <div style="margin-top:5px"></div>
  <div class="form-row">
           
           <select class="form-control chosen-select" id="StreamList" name="StreamList" onChange="getBranch(this.value);">
            <option selected disabled> Category</option>
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
           
           <select class="form-control" id="BranchList" name="BranchList" >
            <option selected disabled> Branch</option>
            
      </select>
    
  </div>
  </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="saveBtn">Save changes</button>
      </div>
      
</form>
                



      

    </div>
  </div>
</div>






        <center><h2>Year Table</h2></center>

                <button type="button" class="pull pull-right btn btn-default" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus-circle"> Add Entry</i> 
</button>


    <br />
    <br />
    <br />

	<table id="tableCategory" class="table-bordered dataTables-example" cellspacing="10" cellpadding="10" width="100%">
		<thead>
		    <th>Delete</th>
            <th>Edit</th>
			<th>ID</th>
			<th>Year</th>
            <th>Stream</th>
            <th>Branch</th>
		</thead>
		<tbody>
			<?php 
            require_once("dbConfig.php");
                $e = "select year.yearID, year.yearName, stream.streamName, branch.branchName from ((year inner join stream on year.sID = stream.streamID)inner join branch on year.bID = branch.branchID)";
                $query = mysqli_query($con, $e);
				while ($res = mysqli_fetch_array($query)) { ?>
					<tr>
					<td>
                            <form action="addYear.php" method="POST">
                                <div >
                                <input type="hidden" class="form-control" id="edit_id2" name="edit_id2" value='<?php echo $res['yearID']; ?>'>
                                <button type="submit" class="btn btn-sm btn-danger-1 fa fa-times" id="deleteEnquiry" name="deleteEnquiry"> </button>
                                </div>
                            </form>
                            
                        </td>
                        <td>
                            <form action="editYear.php" method="POST">
                                <input type="hidden" class="form-control" id="edit_id1" name="edit_id1" value='<?php echo $res['yearID']; ?>'>
                                <button type="submit" class="btn btn-sm btn-warning-1 fa fa-pencil" id="editYear" name="editYear"> </button>
                            </form>
                            
                        </td>
						<td><?php echo $res['yearID']; ?></td>
						<td><?php echo $res['yearName']; ?></td>
				 		<td><?php echo $res['streamName']; ?></td>
				 		<td><?php echo $res['branchName']; ?></td>
					</tr>
					 <?php  
				}
			 ?>
		</tbody>

	</table>
</div>
</div>
            
<script type="text/javascript">
        function getBranch(val) {
            $.ajax({
                type : "POST",
                url : "getBranch.php",
                data : 'streamID='+val,
                success : function(data) {
                    $('#BranchList').html(data);
                    //getSem();
                }
            });
        }   

         
    </script>



<script src="js/plugins/chosen/chosen.jquery.js"></script>


       <script>
            $(document).ready(function(){
               $(".chosen-select").chosen();
                $('button').click(function(){
                    $(".chosen-select").val('').trigger("chosen:updated");
                }); 
            });
        </script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {extend: 'pdf'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
 $('.chosen-select').chosen({width: "100%"});
    </script>

   
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/datatables/jquery-3.3.1.js"></script>
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.buttons.min.js"></script>
    <script src="js/datatables/buttons.flash.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/buttons.html5.min.js"></script>
    <script src="js/datatables/buttons.print.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>


    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

</body>
</html>