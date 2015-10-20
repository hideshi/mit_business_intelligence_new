<?php
include("../includes/header.php");
include("../includes/sidebar.php");
require '../lib/db.php';
if (isset($_POST['id'])) {
	$id = $_SESSION['login_id'];
	$db = new DbManager();
	if($_POST['password'] == "")
	{
		$query = $db->execute("UPDATE users SET full_name = ? WHERE id = ?", array($_POST['full_name'], $id));
		header("location: user_settings.php");
		$_SESSION['info'] = 'Successfully updated!';
		$_SESSION['login_full_name'] = $_POST['full_name'];
		
	}
	else {
		$query = $db->execute("UPDATE users SET full_name = ?, password = md5(?) WHERE id = ?", array($_POST['full_name'], $_POST['password'], $id));
		header("Refresh:0");
		$_SESSION['info'] = 'Successfully updated!';
		$_SESSION['login_full_name'] = $_POST['full_name'];
	}
}
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
               
                                    <form id="form" role="form" method="POST" action="user_settings.php">
                                    <input name="id" type="hidden" value="" />
				<?php
			    if (isset($_SESSION['info'])) {
			        echo '<div class="alert alert-info" role="alert">' . $_SESSION['info'] . '</div>';
			    }
				?>
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input name="full_name" class="form-control"  value="<?php echo $_SESSION['login_full_name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input class="form-control"  disabled ="true" value="<?php echo $_SESSION['login_username']; ?>">
                                        </div>
										<div class="form-group">
                                            <label>Password:</label>
                                            <input name="password" type="password" class="form-control" value = "">
                                        </div>
                                       
										<button id="save_settings" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Save</button>
										<button id="cancel_settings" class="btn btn-default">Cancel</button>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
<script>
jQuery(function($){
    $('#save_settings').click(function(event) {
        console.log("submit");
		$('#form').submit();
	
    })

     $('#cancel_settings').click(function(event) {
    })
});




</script>
</html>
