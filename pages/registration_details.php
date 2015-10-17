<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>

<?php
	$owner_id = $_GET['owner_id'];
	if(isset($_GET["resident_id"])) {
		$sqlResident = "
		select
		house_number
		, gen.name as gender
		, res.full_name
		, own.address
		, res.birth_date
		, res.birth_place
		, res.citizenship
		, res.religion
		, edu.name as education
		, res.years_of_residency
		, civ.name as civil_statuses
		, res.occupation
		, sts.name as status
		from residents res
		inner join owner_residents ors
		on ors.resident_id = resident_id
		inner join owners own
		on own.id = ors.owner_id
		inner join educations edu
		on edu.id = res.highest_education_attainment_id
		left outer join statuses sts
		on sts.id = res.status_id
		inner join civil_statuses civ
		on civ.id = res.civil_status_id
		inner join genders gen
		on gen.id = res.gender_id
		where res.id = " . $_GET["resident_id"];
		$resultResident = $conn->query($sqlResident);
		$rowResident = $resultResident->fetch_assoc();
	
	} else {
		$sqlOwner = "
		select
		own.house_number
		, gen.name as gender
		, own.full_name
		, own.address
		, own.birth_date
		, own.birth_place
		, own.citizenship
		, own.religion
		, edu.name as education
		, own.years_of_residency
		, civ.name as civil_status
		, own.occupation
		, sts.name as status
		from owners own
		inner join educations edu
		on edu.id = own.highest_education_attainment_id
		left outer join statuses sts
		on sts.id = own.status_id
		inner join civil_statuses civ
		on civ.id = own.civil_status_id
		inner join genders gen
		on gen.id = own.gender_id
		where own.id = " . $owner_id;
		$resultOwner = $conn->query($sqlOwner);
		$rowOwner = $resultOwner->fetch_assoc();
	}
	
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-user"></i>
					<?php
					if(isset($_GET["resident_id"])) {
					echo $rowResident['full_name'];
					}
					else
					{
					echo $rowOwner['full_name'];
					}
					?>
					</h1>
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
                                    <?php
									
					if(isset($_GET["resident_id"])) {
					echo'
					
									<table class="table table-hover table-bordered table-striped">
									<tr>
									<th>House Number:</th>
									<td> '.$rowResident['house_number'].'</td>
									<th>Gender:</th>
									<td> '.$rowResident['gender'].'</td>
									</tr>
									
									<tr>
									<th>Full Name:</th>
									<td> '.$rowResident['full_name'].'</td>
									<th>Address:</th>
									<td> '.$rowResident['address'].'</td>
									</tr>
									
									<tr>
									<th>Date of Birth:</th>
									<td> '.$rowResident['birth_date'].'</td>
									<th>Place of Birth:</th>
									<td> '.$rowResident['birth_place'].'</td>
									</tr>
									
									<tr>
									<th>Citizenship:</th>
									<td>'.$rowResident['citizenship'].'</td>
									<th>Religion:</th>
									<td>'.$rowResident['religion'].'</td>
									</tr>
									
									<tr>
									<th>Highest Education Attainment:</th>
									<td>'.$rowResident['education'].'</td>
									<th>Years of Residency:</th>
									<td>'.$rowResident['years_of_residency'].'</td>
									</tr>
									
									<tr>
									<th>Civil Status:</th>
									<td>'.$rowResident['civil_statuses'].'</td>
									<th>Occupation:</th>
									<td>'.$rowResident['occupation'].'</td>
									</tr>
									
									<tr>
									<th>Status:</th>
									<td>'.$rowResident['status'].'</td>
									</tr>
								    </table>
						';
					}
					else{
					
					echo'
					
									<table class="table table-hover table-bordered table-striped">
									<tr>
									<th>House Number:</th>
									<td> '.$rowOwner['house_number'].'</td>
									<th>Gender:</th>
									<td> '.$rowOwner['gender'].'</td>
									</tr>
									
									<tr>
									<th>Full Name:</th>
									<td> '.$rowOwner['full_name'].'</td>
									<th>Address:</th>
									<td> '.$rowOwner['address'].'</td>
									</tr>
									
									<tr>
									<th>Date of Birth:</th>
									<td> '.$rowOwner['birth_date'].'</td>
									<th>Place of Birth:</th>
									<td> '.$rowOwner['birth_place'].'</td>
									</tr>
									
									<tr>
									<th>Citizenship:</th>
									<td>'.$rowOwner['citizenship'].'</td>
									<th>Religion:</th>
									<td>'.$rowOwner['religion'].'</td>
									</tr>
									
									<tr>
									<th>Highest Education Attainment:</th>
									<td>'.$rowOwner['education'].'</td>
									<th>Years of Residency:</th>
									<td>'.$rowOwner['years_of_residency'].'</td>
									</tr>
									
									<tr>
									<th>Civil Status:</th>
									<td>'.$rowOwner['civil_status'].'</td>
									<th>Occupation:</th>
									<td>'.$rowOwner['occupation'].'</td>
									</tr>
									
									<tr>
									<th>Status:</th>
									<td>'.$rowOwner['status'].'</td>
									</tr>
								    </table>
						';					
						
					}
                         ?>        
                                        
                                           
                                        </div>
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					
					<a href="registration_list.php" class="btn btn-default">Back</a>
					
					
					
					
					
					
					
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
