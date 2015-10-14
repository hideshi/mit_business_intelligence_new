<?php
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
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td class="center"><a href="house_details.php">665</a></td>
                                            <td><a href="registration_details.php">Francis Vigor De Ocampo</a></td>
                                            <td>Manila</td>
                                            <td>10/05/1992</td>
                                            <td>Deceased</td>
											
                                        </tr>
                                        <tr class="even gradeC">
                                            <td class="center"><a href="house_details.php">676</a></td>
                                            <td><a href="registration_details.php">Catherine Adonis</a></td>
                                            <td>Makati</td>
                                            <td>11/06/1993</td>
                                            <td>Alive</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td class="center"><a href="house_details.php">687</a></td>
                                            <td><a href="registration_details.php">Rose Ann Assuncion</a></td>
                                            <td>Cavite</td>
                                            <td>10/10/1952</td>
                                            <td>Deceased</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">610</a></td>
                                            <td><a href="registration_details.php">Gem</a></td>
                                            <td>Zamboanga</td>
                                            <td>11/05/1992</td>
                                            <td>Alive</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td class="center"><a href="house_details.php">665</a></td>
                                            <td><a href="registration_details.php">Hideshi</a></td>
                                            <td>Japan</td>
                                            <td>12/05/1995</td>
                                            <td>Alive</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Deceased</td>
                                        </tr>
										<tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Deceased</td>
                                        </tr>
										<tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Alive</td>
                                        </tr>
										<tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Deceased</td>
                                        </tr>
										<tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Alive</td>
                                        </tr>
										<tr class="even gradeA">
                                            <td class="center"><a href="house_details.php">672</a></td>
                                            <td><a href="registration_details.php">Randy</a></td>
                                            <td>Somewhere</td>
                                            <td>10/01/1192</td>
                                            <td>Deceased</td>
                                        </tr>
                                    </tbody>
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
