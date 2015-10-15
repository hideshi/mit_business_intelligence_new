<?php
include("../includes/header.php");
include("../includes/sidebar.php");
require "../lib/db.php";
require "../lib/util.php";
$db = new DbManager();
$genders = $db->execute("SELECT id, name FROM genders ORDER BY id ASC", array());
$ownerships = $db->execute("SELECT id, name FROM ownerships ORDER BY id ASC", array());
$educations = $db->execute("SELECT id, name FROM educations ORDER BY id ASC", array());
$civil_statuses = $db->execute("SELECT id, name FROM civil_statuses ORDER BY id ASC", array());
$relationships_dependent = $db->execute("SELECT id, name FROM relationships WHERE genre = 1 ORDER BY id ASC", array());
$relationships_boarder = $db->execute("SELECT id, name FROM relationships WHERE genre = 2 ORDER BY id ASC", array());
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-pencil"></i> Registration</h1>
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
                                    <form id="form_owner1" role="form"> <br>
                                        <input id="pk_owner" type="hidden"/>
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input id="house_number_owner" class="form-control" required placeholder="House Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input id="full_name_owner" class="form-control" required placeholder="Full Name">
                                        </div>
										<div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input id="birth_date_owner" type="date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Citizenship:</label>
                                            <input id="citizenship_owner" placeholder="Citizenship" class="form-control" required>
                                        </div>
										<div class="form-group">
                                           <label>Highest Education Attainment:</label>
                                           <select id="highest_education_attainment_id_owner" class="form-control">
<?php foreach($educations as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
										<div class="form-group">
                                           <label>Civil Status:</label>
                                           <select id="civil_status_id_owner" class="form-control">
<?php foreach($civil_statuses as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
										<div class="form-group">
                                           <label>Gender:</label>
                                           <select id="gender_id_owner" class="form-control">
<?php foreach($genders as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   <form id="form_owner2" role="form">
                                        <div class="form-group"><br>
                                           <label>Type of Ownership:</label>
                                           <select id="type_of_ownership_id_owner" class="form-control">
<?php foreach($ownerships as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
										   </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input id="address_owner" class="form-control" required placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Place of Birth:</label>
                                            <input id="birth_place_owner" class="form-control" required placeholder="Birth Place">
                                        </div>
										<div class="form-group">
                                            <label>Religion:</label>
                                            <input id="religion_owner" placeholder="Religion" class="form-control" required>
                                        </div>
										<div class="form-group">
                                            <label>Years of Residency:</label>
                                            <input id="years_of_residency_owner" type="number" min="0" class="form-control" required>
                                        </div>
										<div class="form-group">
                                            <label>Occupation:</label>
                                            <input id="occupation_owner" placeholder="Occupation" class="form-control" required>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <button id="save_owner" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
                            <button id="reset_owner" type="reset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
                            <!-- /.row (nested) -->
                                </div>
                                <div class="tab-pane fade" id="dependents">
								
									<button data-toggle="modal" data-target="#myModalAddDependents" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table id="table_dependent" class="table table-hover table-striped table-responsive">
									<tr>
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
									</table>
                                </div>
                                <div class="tab-pane fade" id="boarders">
                                    
									<button data-toggle="modal" data-target="#myModalAddBoarders" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table id="table_boarder" class="table table-hover table-striped table-responsive">
									<tr>
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

    <!--  -->
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
        <form id="form_dependent">
		  
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
        <button id="cancel_boarder" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Add Other Occupant</h4>
      </div>
      <div class="modal-body">
        <form id="form_boarder">
		  
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
                url: '../ajax/select_residents.php?pk_owner=' + $('#pk_owner').val() + '&genre=1',
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
                url: '../ajax/select_residents.php?pk_owner=' + $('#pk_owner').val() + '&genre=2',
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
    $('#tab_dependent').click(function(event) {
        console.log("click tab_dependent");
        if($('#pk_owner').val() === '') {
            alert("Please register owner first.");
            return false;
        }
    });
    $('#tab_boarder').click(function(event) {
        console.log("click tab_boarder");
        if($('#pk_owner').val() === '') {
            alert("Please register owner first.");
            return false;
        }
    });
    $('#reset_owner').click(function(event) {
        console.log("reset owner");
        $('#form_owner1')[0].reset();
        $('#form_owner2')[0].reset();
        $('#pk_owner').val('');
        $('#table_dependent').empty();
        $('#table_dependent').append('<tr><th>Full Name</th><th>Relationship</th><th>Gender</th><th>Birth Date</th><th>Birth Place</th><th>Civil Status</th><th>Years of Residency</th><th>Occupation</th>    <th>Highest Education Attainment</th></tr>');
        $('#table_boarder').empty();
        $('#table_boarder').append('<tr><th>Full Name</th><th>Relationship</th><th>Gender</th><th>Birth Date</th><th>Birth Place</th><th>Civil Status</th><th>Years of Residency</th><th>Occupation</th>    <th>Highest Education Attainment</th></tr>');
    });
});
</script>
