<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");
require "../lib/db.php";
require "../lib/util.php";
?>

<?php
    $db = new DbManager();
    $genders = $db->execute("SELECT id, name FROM genders ORDER BY id ASC", array());
    $ownerships = $db->execute("SELECT id, name FROM ownerships ORDER BY id ASC", array());
    $educations = $db->execute("SELECT id, name FROM educations ORDER BY id ASC", array());
    $civil_statuses = $db->execute("SELECT id, name FROM civil_statuses ORDER BY id ASC", array());
    $relationships_dependent = $db->execute("SELECT id, name FROM relationships WHERE genre = 1 ORDER BY id ASC", array());
    $relationships_boarder = $db->execute("SELECT id, name FROM relationships WHERE genre = 2 ORDER BY id ASC", array());
    $statuses = $db->execute("SELECT id, name FROM statuses ORDER BY id ASC", array());
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
		, gen.id AS gen_id
		, gen.name as gender
		, edu.id AS edu_id
		, edu.name as education
		, res.years_of_residency
		, civ.id AS civ_id
		, civ.name as civil_statuses
		, res.occupation
		, sts.id AS sts_id
		, sts.name as status
		, rel.id AS rel_id
		, rel.genre AS rel_genre
		, rel.name AS relationship
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
		inner join relationships rel
		on rel.id = res.relationship_id
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
                    <h1 id="name_d" class="page-header"><i class="fa fa-user"></i>
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
<?php if(isset($_GET["resident_id"])):?>
						<button id="modal_edit_resident" data-toggle="modal" data-target="#myModalEdit" style="float:right" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
<?php else:?>
						<button id="modal_edit_owner" data-toggle="modal" style="float:right" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
<?php endif;?>
							Resident Information
								
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
									
					if(isset($_GET["resident_id"])) {
					echo'
					
									<table id="table_resident" class="table table-hover table-bordered table-striped">
									<tr>
									<th>House Number:</th>
									<td id="house_number"> '.$rowResident['house_number'].'</td>
									<th>Gender:</th>
									<td id="gender"> '.$rowResident['gender'].'</td>
									</tr>
									
									<tr>
									<th>Full Name:</th>
									<td id="full_name_d"> '.$rowResident['full_name'].'</td>
									<th>Address:</th>
									<td id="address_d"> '.$rowResident['address'].'</td>
									</tr>
									
									<tr>
									<th>Date of Birth:</th>
									<td id="birth_date_d"> '.$rowResident['birth_date'].'</td>
									<th>Place of Birth:</th>
									<td id="birth_place_d"> '.$rowResident['birth_place'].'</td>
									</tr>
									
									<tr>
									<th>Citizenship:</th>
									<td id="citizenship_d">'.$rowResident['citizenship'].'</td>
									<th>Religion:</th>
									<td id="religion_d">'.$rowResident['religion'].'</td>
									</tr>
									
									<tr>
									<th>Highest Education Attainment:</th>
									<td id="education_d">'.$rowResident['education'].'</td>
									<th>Years of Residency:</th>
									<td id="years_of_residency_d">'.$rowResident['years_of_residency'].'</td>
									</tr>
									
									<tr>
									<th>Civil Status:</th>
									<td id="civil_status_d">'.$rowResident['civil_statuses'].'</td>
									<th>Occupation:</th>
									<td id="occupation_d">'.$rowResident['occupation'].'</td>
									</tr>
									
									<tr>
									<th>Status:</th>
									<td id="status_d">'.$rowResident['status'].'</td>
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

</body>

</html>

<?php if(isset($_GET["resident_id"])):?>
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span> Edit Information</h4>
      </div>
      <div class="modal-body">
        <form>
		  
		  <input id="resident_id" type="hidden" value="<?php echo $_GET['resident_id'];?>">
		  <div class="form-group">
			<label>Full Name:</label>
			<input id="full_name" type="text" required class="form-control" placeholder="Full Name" value="<?php echo $rowResident['full_name'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Relationship:</label>
			<select id="relationship_id" class="form-control">
<?php if($rowResident['rel_genre'] == 1):?>
<?php foreach($relationships_dependent as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['rel_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
<?php else: ?>
<?php foreach($relationships_boarder as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['rel_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
<?php endif;?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Birth Date:</label>
			<input id="birth_date" type="date" required class="form-control" value="<?php echo $rowResident['birth_date'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Birth Place:</label>
			<input id="birth_place" type="text" required class="form-control" placeholder="Birth Place" value="<?php echo $rowResident['birth_place'];?>">
		  </div>
		  
		   <div class="form-group">
			<label>Civil Status:</label>
			<select id="civil_status_id" class="form-control">
<?php foreach($civil_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['civ_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Years of Residency:</label>
			<input id="years_of_residency" type="number" min="0" required class="form-control" value="<?php echo $rowResident['years_of_residency'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Occupation:</label>
			<input id="occupation" type="text" required class="form-control" placeholder="Occupation" value="<?php echo $rowResident['occupation'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Citizenship:</label>
			<input id="citizenship" type="text" required class="form-control" placeholder="Citizenship" value="<?php echo $rowResident['citizenship'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Religion:</label>
			<input id="religion" type="text" required class="form-control" placeholder="Religion" value="<?php echo $rowResident['religion'];?>">
		  </div>
		  
		  <div class="form-group">
			<label>Gender:</label>
            <select id="gender_id" class="form-control">
<?php foreach($genders as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['gen_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Highest Education Attainment:</label>
            <select id="highest_education_attainment_id" class="form-control">
<?php foreach($educations as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['edu_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Status:</label>
            <select id="status_id" class="form-control">
<?php foreach($statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $rowResident['sts_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		</form>
      </div>
      <div class="modal-footer">
        <button id="save_resident" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button id="cancel_resident" type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<script>
jQuery(function($){
    $('#modal_edit_owner').click(function(event) {
        console.log("edit owner");
         window.location.href = '/pages/registration_edit.php?id=<?php echo $owner_id;?>';
    });
    $('#save_resident').click(function(event) {
        console.log("save resident");
        var formData = new FormData();
        formData.append('resident_id', <?php echo $_GET["resident_id"]?>);
        formData.append('full_name', $('#full_name').val());
        formData.append('birth_date', $('#birth_date').val());
        formData.append('birth_place', $('#birth_place').val());
        formData.append('years_of_residency', $('#years_of_residency').val());
        formData.append('occupation', $('#occupation').val());
        formData.append('citizenship', $('#citizenship').val());
        formData.append('religion', $('#religion').val());
        formData.append('relationship_id', $('#relationship_id option:selected').val());
        formData.append('highest_education_attainment_id', $('#highest_education_attainment_id option:selected').val());
        formData.append('civil_status_id', $('#civil_status_id option:selected').val());
        formData.append('gender_id', $('#gender_id option:selected').val());
        formData.append('status_id', $('#status_id option:selected').val());
        $.ajax({
            url: '../ajax/update_resident.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $('#myModalEdit').modal('hide');
            $.ajax({
                url: '../ajax/select_resident.php?resident_id=<?php echo $_GET["resident_id"]?>',
                type: 'get',
                processData: false,
                contentType: false,
                data: formData
            })
            .done(function(data) {
                console.log("success");
                console.log($.parseJSON(data));
                var d = $.parseJSON(data);
                $('#name_d').text(d.full_name);
                $('#full_name_d').text(d.full_name);
                $('#gender_d').text(d.gender);
                $('#birth_date_d').text(d.birth_date);
                $('#birth_place_d').text(d.birth_place);
                $('#citizenship_d').text(d.citizenship);
                $('#religion_d').text(d.religion);
                $('#education_d').text(d.education);
                $('#years_of_residency_d').text(d.years_of_residency);
                $('#civil_status_d').text(d.civil_status);
                $('#occupation_d').text(d.occupation);
                $('#status_d').text(d.status);
                alert("Registered a resident");
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log("error");
                $('#message').append(jqXHR);
                $('#message').append(textStatus);
                $('#message').append(errorThrown);
            })
            .always(function() {
                console.log("complete");
            });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
        });
    });
});
</script>
