<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>

<?php
	$owner_id = $_GET['id'];
	$sqlOwner = "SELECT * FROM owners WHERE id = $owner_id";
	$resultOwner = $conn->query($sqlOwner);
	$rowOwner = $resultOwner->fetch_assoc();
	
	$education_id= $rowOwner['highest_education_attainment_id'];
	$gender_id= $rowOwner['gender_id'];
	$civil_status_id= $rowOwner['civil_status_id'];
	$status_id= $rowOwner['status_id'];
	$ownership_id= $rowOwner['type_of_ownership_id'];
	
	
		$sqlOwnership = "SELECT * FROM ownerships WHERE id=$ownership_id";
		 $resultOwnership = $conn->query($sqlOwnership);
		 $rowOwnership = $resultOwnership->fetch_assoc();
		 
		$sqlStatus = "SELECT * FROM statuses WHERE id=$status_id";
		 $resultStatus = $conn->query($sqlStatus);
		 $rowStatus = $resultStatus->fetch_assoc();
		
		 $sqlEducations = "SELECT * FROM educations WHERE id=$education_id";
		 $resultEducations = $conn->query($sqlEducations);
		 $rowEducations = $resultEducations->fetch_assoc();
		 
		 
		 $sqlGenders = "SELECT * FROM genders  WHERE id=$gender_id";
		 $resultGenders = $conn->query($sqlGenders);
		 $rowGenders = $resultGenders->fetch_assoc();
		 
		 
		 $sqlCivilStatuses = "SELECT * FROM civil_statuses WHERE id=$civil_status_id";
		 $resultCivilStatuses = $conn->query($sqlCivilStatuses);
		 $rowCivilStatuses = $resultCivilStatuses->fetch_assoc();
	
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-home"></i> House - <?php echo $rowOwner['house_number'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="registration_edit.php?id=<?php echo $owner_id;?>" type="button" style="float:right" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
							Owner Information
							
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-hover table-bordered table-striped">
									<tr>
									<th>House Number:</th>
									<td> <?php echo $rowOwner['house_number'];?></td>
									<th>Type of Ownership:</th>
									<td> <?php echo $rowOwnership['name'];?></td>
									</tr>
									
									<tr>
									<th>Full Name:</th>
									<td> <?php echo $rowOwner['full_name'];?></td>
									<th>Address:</th>
									<td> <?php echo $rowOwner['address'];?></td>
									</tr>
									
									<tr>
									<th>Date of Birth:</th>
									<td> <?php echo $rowOwner['birth_date'];?></td>
									<th>Place of Birth:</th>
									<td> <?php echo $rowOwner['birth_place'];?></td>
									</tr>
									
									<tr>
									<th>Citizenship:</th>
									<td><?php echo $rowOwner['citizenship'];?></td>
									<th>Religion:</th>
									<td><?php echo $rowOwner['religion'];?></td>
									</tr>
									
									<tr>
									<th>Highest Education Attainment:</th>
									<td><?php echo $rowEducations['name'];?></td>
									<th>Years of Residency:</th>
									<td><?php echo $rowOwner['years_of_residency'];?></td>
									</tr>
									
									<tr>
									<th>Civil Status:</th>
									<td><?php echo $rowCivilStatuses['name'];?></td>
									<th>Occupation:</th>
									<td> <?php echo $rowOwner['occupation'];?></td>
									</tr>
									
									<tr>
									<th>Status:</th>
									<td><?php echo $rowStatus['name'];?></td>
									<th>Gender:</th>
									<td><?php echo $rowGenders['name'];?></td>
									</tr>
									
									<tr>
									<th>Date Created:</th>
									<td><?php echo $rowOwner['created'];?></td>
									<th>Date Modified:</th>
									<td><?php echo $rowOwner['modified'];?></td>
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
                                    <?php
									$sqlResident = "SELECT residents.id, owner_residents.resident_id
													FROM residents
													INNER JOIN owner_residents
													ON residents.id=owner_residents.resident_id
													WHERE owner_id = $owner_id";
									$resultResident = $conn->query($sqlResident);
									if ($resultResident->num_rows > 0) {
										// output data of each row
										while($rowResident = $resultResident->fetch_assoc()) 
										{
											$resident_id = $rowResident['resident_id'];
											$sql = "SELECT * FROM residents WHERE id=$resident_id AND relationship_id < 12";
											$result = $conn->query($sql);
													if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														$relationship_id = $row['relationship_id'];
														$sqlRelationship = "SELECT * FROM relationships WHERE id=$relationship_id";
														$resultRelationship = $conn->query($sqlRelationship);
														$rowRelationship = $resultRelationship->fetch_assoc();
														$relationship = $rowRelationship['name'];
															
														$civil_status_id = $row['civil_status_id'];
														$sqlCivilStatus = "SELECT * FROM civil_statuses WHERE id=$civil_status_id";
														$resultCivilStatus = $conn->query($sqlCivilStatus);
														$rowCivilStatus = $resultCivilStatus->fetch_assoc();
														$civil_status = $rowCivilStatus['name'];
														
														$gender_id = $row['gender_id'];
														$sqlGender = "SELECT * FROM genders WHERE id=$gender_id";
														$resultGender = $conn->query($sqlGender);
														$rowGender = $resultGender->fetch_assoc();
														$gender = $rowGender['name'];														
														
														
														
														echo ' <tbody>
																<tr>
																	<td><a href="registration_details.php?owner_id='.$owner_id.'&resident_id='.$resident_id.'">'.$row['full_name'].'</a></td>
																	<td>'.$relationship.'</td>
																	<td>'.$row['birth_date'].'</td>
																	<td>'.$civil_status.'</td>
																	<td>'.$gender.'</td>
																</tr>
															  
															</tbody>';
													}
													}
										}
										}														
									
									?>
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
                                    <?php
									$sqlResident = "SELECT residents.id, owner_residents.resident_id
													FROM residents
													INNER JOIN owner_residents
													ON residents.id=owner_residents.resident_id
													WHERE owner_id = $owner_id";
									$resultResident = $conn->query($sqlResident);
									if ($resultResident->num_rows > 0) {
										// output data of each row
										while($rowResident = $resultResident->fetch_assoc()) 
										{
											$resident_id = $rowResident['resident_id'];
											$sql = "SELECT * FROM residents WHERE id=$resident_id AND relationship_id > 11";
											$result = $conn->query($sql);
													if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) 
													{
														$relationship_id = $row['relationship_id'];
														$sqlRelationship = "SELECT * FROM relationships WHERE id=$relationship_id";
														$resultRelationship = $conn->query($sqlRelationship);
														$rowRelationship = $resultRelationship->fetch_assoc();
														$relationship = $rowRelationship['name'];
															
														$civil_status_id = $row['civil_status_id'];
														$sqlCivilStatus = "SELECT * FROM civil_statuses WHERE id=$civil_status_id";
														$resultCivilStatus = $conn->query($sqlCivilStatus);
														$rowCivilStatus = $resultCivilStatus->fetch_assoc();
														$civil_status = $rowCivilStatus['name'];
														
														$gender_id = $row['gender_id'];
														$sqlGender = "SELECT * FROM genders WHERE id=$gender_id";
														$resultGender = $conn->query($sqlGender);
														$rowGender = $resultGender->fetch_assoc();
														$gender = $rowGender['name'];														
														
														
														
														echo ' <tbody>
																<tr>
																	<td><a href="registration_details.php?owner_id='.$owner_id.'&resident_id='.$resident_id.'">'.$row['full_name'].'</a></td>
																	<td>'.$relationship.'</td>
																	<td>'.$row['birth_date'].'</td>
																	<td>'.$civil_status.'</td>
																	<td>'.$gender.'</td>
																</tr>
															  
															</tbody>';
													}
													}
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
