<?php
include("../includes/header.php");
include("../includes/sidebar.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="panel panel-primary">
                        <div class="panel-heading">
                            Generate Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form class="form-inline">
							  <div class="form-group">
								<select class="form-control">
									<option>[column_1]</option>
									<option>[column_2]</option>
									<option>...</option>
								</select>
							  </div>
							  <div class="form-group">
								<select class="form-control">
									<option>Equal To</option>
									<option>Greater than</option>
									<option>...</option>
								</select>
							  </div>
							  <div class="form-group">
								<input type="text" class="form-control" placeholder="Value">
							  </div>
							 
							  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Generate</button>
							</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
            <!-- /.row -->
          
		    <!-- /.row -->
            <div class="row">
				
				<h2>Results:</h2>
				<button style="margin-bottom:10px;" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Extract to Excel</button>
				 <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
											<th>[column_1]</th>
                                            <th>[column_2]</th>
                                            <th>[column_3]</th>
                                            <th>[column_4]</th>
											<th>[column_5]</th>
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>