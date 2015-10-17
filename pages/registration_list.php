<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-users"></i> Residents</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of all Residents
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>House No.</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Birthdate</th>
                                            <th>Status</th>
											
                                        </tr>
                                    </thead>
									
									<?php
										
										$sql = "SELECT
											  'owner' as type
											, o.id as resident_id
											, o.id as owner_id
											,o.full_name
											,o.birth_date
											,s.name as status
											,o.house_number
											,o.address										
										FROM owners o
										LEFT OUTER JOIN statuses s ON s.id = o.status_id
										UNION
										SELECT
											 'resident' as type
											, r.id as resident_id
											, o2.id as owner_id
											,r.full_name
											,r.birth_date
											,s.name as status
											,o2.house_number
											,o2.address
										FROM residents r
										INNER JOIN owner_residents ors ON ors.resident_id = r.id
										INNER JOIN owners o2 ON ors.owner_id = o2.id
										LEFT OUTER JOIN statuses s ON s.id = r.status_id
										"; 
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) 
										{
											echo ' <tbody>
													<tr>
													<td><a href="house_details.php?id='.$row['owner_id'].'">'.$row['house_number'].'</a></td>
												';
												
														if ($row['type'] === "owner")
														{
												echo'			<td><a style="cursor:pointer" type="button"	 			href="registration_details.php?owner_id='.$row['owner_id'].'">'.$row['full_name'].'</a></td>
												';
														}
															elseif ($row['type'] === "resident")
															{
												echo'			<td><a style="cursor:pointer" type="button" href="registration_details.php?owner_id='.$row['owner_id'].'&resident_id='.$row['resident_id'].'">'.$row['full_name'].'</a></td>	
												';
															}
															
														
												echo'	<td>'.$row['address'].'</td>
														<td>'.$row['birth_date'].'</td>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
