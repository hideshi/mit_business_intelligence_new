<?php
include("../includes/header.php");
include("../includes/sidebar.php");
require "../lib/db.php";
require "../lib/util.php";
$id = $_GET['id'];
$db = new DbManager();
$genders = $db->execute("SELECT id, name FROM genders ORDER BY id ASC", array());
$ownerships = $db->execute("SELECT id, name FROM ownerships ORDER BY id ASC", array());
$educations = $db->execute("SELECT id, name FROM educations ORDER BY id ASC", array());
$civil_statuses = $db->execute("SELECT id, name FROM civil_statuses ORDER BY id ASC", array());
$relationships_dependent = $db->execute("SELECT id, name FROM relationships WHERE genre = 1 ORDER BY id ASC", array());
$relationships_boarder = $db->execute("SELECT id, name FROM relationships WHERE genre = 2 ORDER BY id ASC", array());
$house_statuses = $db->execute("SELECT id, name FROM house_statuses ORDER BY id ASC", array());
$owner = $db->execute(
"SELECT
      o.id
    , o.full_name
    , o.address
    , o.house_number
    , o.birth_date
    , o.birth_place
    , o.citizenship
    , o.religion
    , o.occupation
    , o.years_of_residency
    , os.id AS ownership_id
    , os.name AS ownership_name
    , e.id AS education_id
    , e.name AS education_name
    , c.id AS civil_status_id
    , c.name AS civil_status_name
    , g.id AS gender_id
    , g.name AS gender_name
    , h.id AS house_status_id
    , h.name AS house_status_name
    FROM owners o
    INNER JOIN ownerships os
    ON os.id = o.type_of_ownership_id
    INNER JOIN educations e
    ON e.id = o.highest_education_attainment_id
    INNER JOIN civil_statuses c
    ON c.id = o.civil_status_id
    INNER JOIN genders g
    ON g.id = o.gender_id
    INNER JOIN house_statuses h
    ON h.id = o.house_status_id
    WHERE o.id = ?
", array($id));
$owner = $owner[0];
$residents = $db->execute(
"SELECT
      res.id
    , res.full_name
    , res.birth_date
    , res.birth_place
    , res.occupation
    , res.years_of_residency
    , r.id AS relationship_id
    , r.genre AS relationship_genre
    , r.name AS relationship_name
    , e.id AS education_id
    , e.name AS education_name
    , c.id AS civil_status_id
    , c.name AS civil_status_name
    , g.id AS gender_id
    , g.name AS gender_name
    FROM residents res
    INNER JOIN owner_residents ors
    ON ors.resident_id = res.id
    INNER JOIN owners o
    ON o.id = ors.owner_id
    INNER JOIN relationships r
    ON r.id = res.relationship_id
    INNER JOIN educations e
    ON e.id = res.highest_education_attainment_id
    INNER JOIN civil_statuses c
    ON c.id = res.civil_status_id
    INNER JOIN genders g
    ON g.id = res.gender_id
    WHERE o.id = ?
", array($id));
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-pencil"></i> Edit House</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            <div class="row">
                <div class="col-lg-12">
				<!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#owner" data-toggle="tab">Owner</a>
                                </li>
                                <li id="tab_dependent"><a href="#dependents" data-toggle="tab">Dependents</a>
                                </li>
                                <li><a id="tab_boarder" href="#boarders" data-toggle="tab">Other Occupants</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="owner">
                                   <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"> <br>
                                        <input id="pk_owner" type="hidden" value="<?php echo $id;?>">
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input id="house_number_owner" class="form-control" required placeholder="House Number" value="<?php echo $owner['house_number'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input id="full_name_owner" class="form-control" required placeholder="Full Name" value="<?php echo $owner['full_name'];?>">
                                        </div>
										<div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input id="birth_date_owner" type="date" class="form-control" required value="<?php echo $owner['birth_date'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Citizenship:</label>
                                            <input id="citizenship_owner" placeholder="Citizenship" class="form-control" required value="<?php echo $owner['citizenship'];?>">
                                        </div>
										<div class="form-group">
                                           <label>Highest Education Attainment:</label>
                                           <select id="highest_education_attainment_id_owner" class="form-control">
<?php foreach($educations as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $owner['education_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
										<div class="form-group">
                                           <label>Civil Status:</label>
                                           <select id="civil_status_id_owner" class="form-control">
<?php foreach($civil_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $owner['civil_status_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
										<div class="form-group">
                                           <label>Gender:</label>
                                           <select id="gender_id_owner" class="form-control">
<?php foreach($genders as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $owner['gender_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   <form role="form">
                                        <div class="form-group"><br>
                                           <label>Type of Ownership:</label>
                                           <select id="type_of_ownership_id_owner" class="form-control">
<?php foreach($ownerships as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $owner['ownership_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input id="address_owner" class="form-control" required placeholder="Address" value="<?php echo $owner['address'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Place of Birth:</label>
                                            <input id="birth_place_owner" class="form-control" required placeholder="Birth Place" value="<?php echo $owner['birth_place'];?>">
                                        </div>
										<div class="form-group">
                                            <label>Religion:</label>
                                            <input id="religion_owner" placeholder="Religion" class="form-control" required value="<?php echo $owner['religion'];?>">
                                        </div>
										<div class="form-group">
                                            <label>Years of Residency:</label>
                                            <input id="years_of_residency_owner" type="number" min="0" class="form-control" required value="<?php echo $owner['years_of_residency'];?>">
                                        </div>
										<div class="form-group">
                                            <label>Occupation:</label>
                                            <input id="occupation_owner" placeholder="Occupation" class="form-control" required value="<?php echo $owner['occupation'];?>">
                                        </div>
										<div class="form-group">
                                           <label>House Status:</label>
                                           <select id="house_status_id_owner" class="form-control">
<?php foreach($house_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == $owner['house_status_id']) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <button id="save_owner" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
                            <!-- /.row (nested) -->
                                </div>
                                <div class="tab-pane fade" id="dependents">
								
									<button data-toggle="modal" data-target="#myModalAddDependents" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table id="table_dependent" class="table table-hover table-striped table-bordered table-responsive">
									<tr>
									<th></th>
									<th>Full Name</th>
									<th>Relationship</th>
									<th>Gender</th>
									<th>Birth Date</th>
									<th>Birth Place</th>
									<th>Civil Status</th>
									<th>Years of Residency</th>
									<th>Occupation</th>
									<th>Highest Education Attainment</th>
									</tr>
									
<?php foreach($residents as $i):?>	
<?php if($i['relationship_genre'] == 1):?>
									<tr>
									<td><button value="<?php echo $i['id'];?>" style="float:right" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> </button></td>
									<td><?php echo $i['full_name'];?></td>
									<td><?php echo $i['relationship_name'];?></td>
									<td><?php echo $i['gender_name'];?></td>
									<td><?php echo $i['birth_date'];?></td>
									<td><?php echo $i['birth_place'];?></td>
									<td><?php echo $i['civil_status_name'];?></td>
									<td><?php echo $i['years_of_residency'];?></td>
									<td><?php echo $i['occupation'];?></td>
									<td><?php echo $i['education_name'];?></td>
									</tr>
<?php endif;?>	
<?php endforeach;?>	
									</table>
                                </div>
                                <div class="tab-pane fade" id="boarders">
                                    
									<button data-toggle="modal" data-target="#myModalAddBoarders" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table id="table_boarder" class="table table-hover table-bordered table-striped table-responsive">
									<tr>
									<th></th>
									<th>Full Name</th>
									<th>Relationship</th>
									<th>Gender</th>
									<th>Birth Date</th>
									<th>Birth Place</th>
									<th>Civil Status</th>
									<th>Years of Residency</th>
									<th>Occupation</th>
									<th>Highest Education Attainment</th>
									</tr>
									
<?php foreach($residents as $i):?>	
<?php if($i['relationship_genre'] == 2):?>
									<tr>
									<td><button value="<?php echo $i['id'];?>" style="float:right" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> </button></td>
									<td><?php echo $i['full_name'];?></td>
									<td><?php echo $i['relationship_name'];?></td>
									<td><?php echo $i['gender_name'];?></td>
									<td><?php echo $i['birth_date'];?></td>
									<td><?php echo $i['birth_place'];?></td>
									<td><?php echo $i['civil_status_name'];?></td>
									<td><?php echo $i['years_of_residency'];?></td>
									<td><?php echo $i['occupation'];?></td>
									<td><?php echo $i['education_name'];?></td>
									</tr>
<?php endif;?>	
<?php endforeach;?>	
									</table>
                                </div>
                              
                            </div>
                   
					<br><br>
					
			 </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<div class="modal fade" id="myModalAddDependents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Add Dependent</h4>
      </div>
      <div class="modal-body">
        <form>
		  
		  <div class="form-group">
			<label>Full Name:</label>
			<input id="full_name_dependent" type="text" required class="form-control" placeholder="Full Name">
		  </div>
		  
		  <div class="form-group">
			<label>Relationship:</label>
			<select id="relationship_id_dependent" class="form-control">
<?php foreach($relationships_dependent as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Birth Date:</label>
			<input id="birth_date_dependent" type="date" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Birth Place:</label>
			<input id="birth_place_dependent" type="text" required class="form-control" placeholder="Birth Place">
		  </div>
		  
		   <div class="form-group">
			<label>Civil Status:</label>
			<select id="civil_status_id_dependent" class="form-control">
<?php foreach($civil_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Years of Residency:</label>
			<input id="years_of_residency_dependent" type="number" min="0" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Occupation:</label>
			<input id="occupation_dependent" type="text" required class="form-control" placeholder="Occupation">
		  </div>
		  
		  <div class="form-group">
			<label>Gender:</label>
            <select id="gender_id_dependent" class="form-control">
<?php foreach($genders as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Highest Education Attainment:</label>
            <select id="highest_education_attainment_id_dependent" class="form-control">
<?php foreach($educations as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		</form>
      </div>
      <div class="modal-footer">
        <button id="save_dependent" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button id="cancel_dependent" type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModalAddBoarders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Add Other Occupant</h4>
      </div>
      <div class="modal-body">
        <form>
		  
		  <div class="form-group">
			<label>Full Name:</label>
			<input id="full_name_boarder" type="text" required class="form-control" placeholder="Full Name">
		  </div>
		  
		  <div class="form-group">
			<label>Relationship:</label>
			<select id="relationship_id_boarder" class="form-control">
<?php foreach($relationships_boarder as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Birth Date:</label>
			<input id="birth_date_boarder" type="date" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Birth Place:</label>
			<input id="birth_place_boarder" type="text" required class="form-control" placeholder="Birth Place">
		  </div>
		  
		   <div class="form-group">
			<label>Civil Status:</label>
			<select id="civil_status_id_boarder" class="form-control">
<?php foreach($civil_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
		  </div>
		  
		  <div class="form-group">
			<label>Years of Residency:</label>
			<input id="years_of_residency_boarder" type="number" min="0" required class="form-control">
		  </div>
		  
		  <div class="form-group">
			<label>Occupation:</label>
			<input id="occupation_boarder" type="text" required class="form-control" placeholder="Occupation">
		  </div>
		  
		  <div class="form-group">
			<label>Gender:</label>
            <select id="gender_id_boarder" class="form-control">
<?php foreach($genders as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		  <div class="form-group">
            <label>Highest Education Attainment:</label>
            <select id="highest_education_attainment_id_boarder" class="form-control">
<?php foreach($educations as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
			</select>
          </div>
		  
		</form>
      </div>
      <div class="modal-footer">
        <button id="save_boarder" type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button id="cancel_boarder" type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
jQuery(function($){
    $('#save_owner').click(function(event) {
        console.log("save owner");
        var formData = new FormData();
        formData.append('pk_owner', $('#pk_owner').val());
        formData.append('house_number', $('#house_number_owner').val());
        formData.append('full_name', $('#full_name_owner').val());
        formData.append('birth_date', $('#birth_date_owner').val());
        formData.append('address', $('#address_owner').val());
        formData.append('birth_place', $('#birth_place_owner').val());
        formData.append('religion', $('#religion_owner').val());
        formData.append('years_of_residency', $('#years_of_residency_owner').val());
        formData.append('occupation', $('#occupation_owner').val());
        formData.append('citizenship', $('#citizenship_owner').val());
        formData.append('highest_education_attainment_id', $('#highest_education_attainment_id_owner option:selected').val());
        formData.append('civil_status_id', $('#civil_status_id_owner option:selected').val());
        formData.append('gender_id', $('#gender_id_owner option:selected').val());
        formData.append('type_of_ownership_id', $('#type_of_ownership_id_owner option:selected').val());
        $.ajax({
            url: '../ajax/add_owner.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            $('#pk_owner').val(data);
            alert("Updated the owner");
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
    });
    $('#save_dependent').click(function(event) {
        console.log("save dependent");
        var formData = new FormData();
        formData.append('pk_owner', $('#pk_owner').val());
        formData.append('full_name', $('#full_name_dependent').val());
        formData.append('birth_date', $('#birth_date_dependent').val());
        formData.append('birth_place', $('#birth_place_dependent').val());
        formData.append('years_of_residency', $('#years_of_residency_dependent').val());
        formData.append('occupation', $('#occupation_dependent').val());
        formData.append('relationship_id', $('#relationship_id_dependent option:selected').val());
        formData.append('highest_education_attainment_id', $('#highest_education_attainment_id_dependent option:selected').val());
        formData.append('civil_status_id', $('#civil_status_id_dependent option:selected').val());
        formData.append('gender_id', $('#gender_id_dependent option:selected').val());
        $.ajax({
            url: '../ajax/add_resident.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $('#myModalAddDependents').modal('hide');
            $.ajax({
                url: '../ajax/select_residents.php?pk_owner=' + $('#pk_owner').val() + '&genre=1&edit',
                type: 'get',
                processData: false,
                contentType: false,
                data: formData
            })
            .done(function(data) {
                console.log("success");
                console.log(data);
                $('#table_dependent').empty();
                $('#table_dependent').append(data);
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
            $('#message').append(jqXHR);
            $('#message').append(textStatus);
            $('#message').append(errorThrown);
        })
        .always(function() {
            console.log("complete");
        });
    });
    $('#save_boarder').click(function(event) {
        console.log("save boarder");
        var formData = new FormData();
        formData.append('pk_owner', $('#pk_owner').val());
        formData.append('full_name', $('#full_name_boarder').val());
        formData.append('birth_date', $('#birth_date_boarder').val());
        formData.append('birth_place', $('#birth_place_boarder').val());
        formData.append('years_of_residency', $('#years_of_residency_boarder').val());
        formData.append('occupation', $('#occupation_boarder').val());
        formData.append('relationship_id', $('#relationship_id_boarder option:selected').val());
        formData.append('highest_education_attainment_id', $('#highest_education_attainment_id_boarder option:selected').val());
        formData.append('civil_status_id', $('#civil_status_id_boarder option:selected').val());
        formData.append('gender_id', $('#gender_id_boarder option:selected').val());
        $.ajax({
            url: '../ajax/add_resident.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $('#myModalAddBoarders').modal('hide');
            $.ajax({
                url: '../ajax/select_residents.php?pk_owner=' + $('#pk_owner').val() + '&genre=2&edit',
                type: 'get',
                processData: false,
                contentType: false,
                data: formData
            })
            .done(function(data) {
                console.log("success");
                console.log(data);
                $('#table_boarder').empty();
                $('#table_boarder').append(data);
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
            $('#message').append(jqXHR);
            $('#message').append(textStatus);
            $('#message').append(errorThrown);
        })
        .always(function() {
            console.log("complete");
        });
    });
    $(document).on('click', '.btn-danger', function(event) {
        console.log("delete resident");
        if (!confirm('Are you sure to delete this resident?')) {
            return false;
        }
        var p = $(this).parents('tr');
        var formData = new FormData();
        formData.append('id', $(this).val());
        $.ajax({
            url: '../ajax/delete_resident.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            p.remove();
            alert("Deleted the resident");
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
    });
});
</script>
