<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-home"></i> Houses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of all Houses
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									<tr>
                                            <th>House No.</th>
                                            <th>Address</th>
                                            <th>Owner</th>
                                            <th>Length of Residency</th>
											<th>Status</th>
											
                                        </tr>
										
                                    </thead>
									<?php
										
										$sql = "SELECT
											 o.id
											,o.full_name
											,o.years_of_residency
											,s.name as status
											,o.house_number
											,o.address										
										FROM owners o
										INNER JOIN statuses s ON s.id = o.status_id";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) 
										{
										echo'	 <tbody>
													<tr>
													<td><a href="house_details.php?id='.$row['id'].'">'.$row['house_number'].'</a></td>
													<td>'.$row['address'].'</td>
													<td>'.$row['full_name'].'</td>
													<td>'.$row['years_of_residency'].'</td>
													<td>'.$row['status'].'</td>
													</tr>
												  
												</tbody>';
										}
										}
									?>
                                        
                                </table>
                            </div>
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

</body>

</html>
