<?php
include("../includes/header.php");
include("../includes/sidebar.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-gear fa-fw"></i> User Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-lg-6">
                                    <form role="form" method="post" action="login.php">
                                    <input name="id" type="hidden" value="" />
								
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input class="form-control"  value="<?php echo $_SESSION['login_full_name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input class="form-control"  value="<?php echo $_SESSION['login_username']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" value = "">
                                        </div>
                                       
										<button class="btn btn-success"> Save</button>
										<button class="btn btn-default"> Cancel</button>
                                    </form>
                                </div>
                              
                                </div>
                                <!-- /.col-lg-6 (nested) -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
