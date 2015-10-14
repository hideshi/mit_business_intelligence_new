<?php
include("../includes/header.php");
include("../includes/sidebar.php");
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
                                <li><a href="#dependents" data-toggle="tab">Dependents</a>
                                </li>
                                <li><a href="#boarders" data-toggle="tab">Other Occupants</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="owner">
                                   <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"> <br>
                                        <div class="form-group">
                                            <label>House Number:</label>
                                            <input class="form-control" required placeholder="House Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input class="form-control" required placeholder="Full Name">
                                        </div>
										<div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Citizenship:</label>
                                            <input placeholder="Citizenship" class="form-control" required>
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
                                           <label>Civil Status:</label>
                                           <select class="form-control">
										   <option>Single</option>
										   <option>Married</option>
										   <option>Widowed</option>
										   <option>Separated</option>
										   </select>
                                        </div>
										<div class="form-group">
                                           <label>Gender:</label>
                                           <select class="form-control">
										   <option>Male</option>
										   <option>Female</option>
										   </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                   <form role="form">
                                        <div class="form-group"><br>
                                           <label>Type of Ownership:</label>
                                           <select class="form-control">
										   <option>Owned</option>
										   <option>Rented</option>
										   </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input class="form-control" required placeholder="Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Place of Birth:</label>
                                            <input class="form-control" required placeholder="Birth Place">
                                        </div>
										<div class="form-group">
                                            <label>Religion:</label>
                                            <input placeholder="Religion" class="form-control" required>
                                        </div>
										<div class="form-group">
                                            <label>Years of Residency:</label>
                                            <input type="number" min="0" class="form-control" required>
                                        </div>
										<div class="form-group">
                                            <label>Occupation:</label>
                                            <input placeholder="Occupation" class="form-control" required>
                                        </div>
										<div class="form-group">
                                           <label>House Status:</label>
                                           <select class="form-control">
										   <option>Active</option>
										   <option>Inactive</option>
										   </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                                </div>
                                <div class="tab-pane fade" id="dependents">
								
									<button data-toggle="modal" data-target="#myModalAddDependents" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table class="table table-hover table-striped table-bordered table-responsive">
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
									
									<tr>
									<td><button style="float:right" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> </button></td>
									<td>Francis De Ocampo</td>
									<td>Son</td>
									<td>Male</td>
									<td>10/04/15</td>
									<td>Manila</td>
									<td>Single</td>
									<td>1</td>
									<td>Student</td>
									<td>College</td>
									
									</tr>
									
									</table>
                                </div>
                                <div class="tab-pane fade" id="boarders">
                                    
									<button data-toggle="modal" data-target="#myModalAddBoarders" style="margin-top:10px;margin-bottom:10px;float:right" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</button>
									
								   <table class="table table-hover table-bordered table-striped table-responsive">
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
									
									<tr>
									<td><button style="float:right" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> </button></td>
									<td>Francis De Ocampo</td>
									<td>Son</td>
									<td>Male</td>
									<td>10/04/15</td>
									<td>Manila</td>
									<td>Single</td>
									<td>1</td>
									<td>Student</td>
									<td>College</td>
									</tr>
									
									</table>
                                </div>
                              
                            </div>
				
                    
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
					<button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-refresh"></span> Reset</button>
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
			<input type="text" required class="form-control" placeholder="Full Name">
		  </div>
		  
		  <div class="form-group">
			<label>Relationship:</label>
			<select class="form-control">
			<option>Father</option>
			<option>Mother</option>
			<option>Sister</option>
			<option>Brother</option>
			<option>Cousin</option>
			<option>GrandFather</option>
			<option>GrandMother</option>
			<option>Sister-in-law</option>
			<option>Brother-in-law</option>
			<option>Son-in-law</option>
			<option>Daughter-in-law</option>
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
		  
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
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
		  
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-ok"></span> Save</button>
		<button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span> Close</button>
        
      </div>
    </div>
  </div>
</div>