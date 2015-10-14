<?php
include("../includes/header.php");
include("../includes/sidebar.php");
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-user"></i> Francis Vigor De Ocampo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
						<button data-toggle="modal" data-target="#myModalEdit" style="float:right" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
							Resident Information
								
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-hover table-bordered table-striped">
									<tr>
									<th>House Number:</th>
									<td>665</td>
									<th>Type of Ownership:</th>
									<td>Owned</td>
									</tr>
									
									<tr>
									<th>Full Name:</th>
									<td>Francis De Ocampo</td>
									<th>Address:</th>
									<td>Manila</td>
									</tr>
									
									<tr>
									<th>Date of Birth:</th>
									<td>10/04/15</td>
									<th>Place of Birth:</th>
									<td>Manila</td>
									</tr>
									
									<tr>
									<th>Citizenship:</th>
									<td>Filipino</td>
									<th>Religion:</th>
									<td>Catholic</td>
									</tr>
									
									<tr>
									<th>Highest Education Attainment:</th>
									<td>College</td>
									<th>Years of Residency:</th>
									<td>1</td>
									</tr>
									
									<tr>
									<th>Civil Status:</th>
									<td>Single</td>
									<th>Occupation:</th>
									<td>Programmer</td>
									</tr>
									
									<tr>
									<th>Gender:</th>
									<td>Male</td>
									<th>Status:</th>
									<td>Alive</td>
									</tr>
								    </table>
                                            
                                        
                                           
                                        </div>
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					
					
					
					
					
					
					
					
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	
	  <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>


<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span> Edit Information</h4>
      </div>
      <div class="modal-body">
        <form>
		  
		  <div class="form-group">
			<label>Full Name:</label>
			<input type="text" required class="form-control" placeholder="Full Name">
		  </div>
		  
		  <div class="form-group">
			<label>Relationship:</label>
			<select class="form-control">
			<option>Boarder</option>
			<option>Helper</option>
			
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Birth Date:</label>
			<input type="date" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Birth Place:</label>
			<input type="text" required class="form-control" placeholder="Birth Place">
		  </div>
		  
		   <div class="form-group">
			<label>Civil Status:</label>
			<select class="form-control">
			<option>Single</option>
			<option>Married</option>
			<option>Widowed</option>
			<option>Separated</option>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Years of Residency:</label>
			<input type="number" min="0" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Occupation:</label>
			<input type="text" required class="form-control" placeholder="Occupation">
		  </div>
		  
		  <div class="form-group">
			<label>Gender:</label>
            <select class="form-control">
			<option>Male</option>
			<option>Female</option>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Highest Education Attainment:</label>
            <select class="form-control">
			<option>Elementary</option>
			<option>High School</option>
			<option>College</option>
			<option>Post College</option>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Status:</label>
            <select class="form-control">
			<option>Alive</option>
			<option>Deceased</option>
			</select>
          </div>
		  
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>