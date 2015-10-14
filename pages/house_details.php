<?php
include("../includes/header.php");
include("../includes/sidebar.php");
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-home"></i> House - 665</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="registration_edit.php" type="button" style="float:right" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
							Owner Information
							
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
									
									<tr>
									<th>Date Registered:</th>
									<td>10/04/15 09:00AM</td>
									<th>Date Modified:</th>
									<td>10/04/15 09:00AM</td>
									</tr>
								    </table>
                                            
                                        
                                           
                                        </div>
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					
					
					
					
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            Dependents Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Relationship</th>
                                            <th>Date of Birth</th>
                                            <th>Civil Status</th>
											<th>Gender</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td class="center"><a style="cursor:pointer" type="button" data-toggle="modal" data-target="#myModalViewDependents">Hideshi</a></td>
                                            <td>Brother</td>
											<td>11/01/15</td>
                                            <td>Single</td>
                                            <td>Male</td>
											
                                        </tr>
                                        <tr class="even gradeC">
                                             <td class="center"><a style="cursor:pointer" type="button" data-toggle="modal" data-target="#myModalViewDependents">Randy</a></td>
                                            <td>Brother</td>
											<td>12/01/15</td>
                                            <td>Married</td>
                                            <td>Male</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					
					
					
					
					
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            Other Occupants Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
											<th>Full Name</th>
                                            <th>Relationship</th>
                                            <th>Date of Birth</th>
                                            <th>Civil Status</th>
											<th>Gender</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td class="center"><a style="cursor:pointer" type="button" data-toggle="modal" data-target="#myModalViewBoarders">Francis Vigor De Ocampo</a></td>
                                            <td>Boarder</td>
											<td>11/01/15</td>
                                            <td>Single</td>
                                            <td>Male</td>
											
                                        </tr>
                                        <tr class="even gradeC">
                                             <td class="center"><a style="cursor:pointer" type="button" data-toggle="modal" data-target="#myModalViewBoarders">Catherine Adonis</a></td>
                                            <td>Helper</td>
											<td>12/01/15</td>
                                            <td>Married</td>
                                            <td>Female</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					<button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button> <br>
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




<div class="modal fade" id="myModalViewBoarders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Other Occupant Information</h4>
      </div>
      <div class="modal-body">
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
									
									<tr>
									<th>Date Registered:</th>
									<td>10/04/15 09:00AM</td>
									<th>Date Modified:</th>
									<td>10/04/15 09:00AM</td>
									</tr>
								    </table>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="myModalViewDependents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-user"></span> Dependent Information</h4>
      </div>
      <div class="modal-body">
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
									
									<tr>
									<th>Date Registered:</th>
									<td>10/04/15 09:00AM</td>
									<th>Date Modified:</th>
									<td>10/04/15 09:00AM</td>
									</tr>
								    </table>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>


