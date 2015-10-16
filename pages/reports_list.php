<?php
include("../includes/header.php");
include("../includes/sidebar.php");
require "../lib/db.php";
require "../lib/util.php";
$db = new DbManager();
$options = $db->execute("SELECT id, genre, name FROM options ORDER BY id ASC", array());
$operators = $db->execute("SELECT id, genre, name FROM operators WHERE genre = 1 ORDER BY id ASC", array());
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
								<select id="option" class="form-control">
<?php foreach($options as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
								</select>
							  </div>
							  <div class="form-group">
								<select id="operator" class="form-control">
<?php foreach($operators as $i): ?>
		<option value="<?php echo $i['id'];?>" <?php if ($i['id'] == 1) echo 'selected'; ?>><?php h($i['name']);?></option>
<?php endforeach; ?>
								</select>
							  </div>
							  <div class="form-group">
								<input id="value" type="text" class="form-control" placeholder="Value">
							  </div>
							 
							  <button id="generate" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Generate</button>
							</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
            <!-- /.row -->
          
		    <!-- /.row -->
            <div class="row">
				
				<h2>Results:</h2>
                <a id="fileHolder" style="display:none;">download</a>
				<button id="excel" style="margin-bottom:10px;" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Extract to Excel</button>
				 <table id="table" class="table table-striped table-bordered table-hover" id="dataTables-example2">
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

<script>
jQuery(function($){
    $('#option').change(function(event) {
        console.log("changed option");
        $.ajax({
            url: '../ajax/select_operators.php?option_id=' + $('#option option:selected').val(),
            type: 'get',
            processData: false,
            contentType: false
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $('#operator').empty();
            $('#operator').append(data);
            $('#value').val("");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
            $('#message').append(jqXHR);
            $('#message').append(textStatus);
            $('#message').append(errorThrown);
        })
        .always(function() {
            console.log("complete");
        })
    });
    var d = new Object();
    $('#generate').click(function(event) {
        event.preventDefault();
        console.log("click generate");
        var formData = new FormData();
        d[$('#option option:selected').text()] = [$('#operator option:selected').val(), $('#value').val()];
        for(var k in d) {
            formData.append(k, d[k]);
        }
        formData.append('method', 1);
        $.ajax({
            url: '../ajax/select_reports.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $('#table').empty();
            $('#table').append(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
            $('#message').append(jqXHR);
            $('#message').append(textStatus);
            $('#message').append(errorThrown);
        })
        .always(function() {
            console.log("complete");
        })
    });
    $('#excel').click(function(event) {
        if($.isEmptyObject(d)) {
            alert('Please generate criteria at least 1.');
        }
        event.preventDefault();
        console.log("click extract to excel");
        var formData = new FormData();
        for(var k in d) {
            formData.append(k, d[k]);
        }
        formData.append('method', 2);
        $.ajax({
            url: '../ajax/select_reports.php',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData
        })
        .done(function(data) {
            console.log("success");
            console.log(data);
            $("#fileHolder").attr('href', data);
            $("#fileHolder")[0].click();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log("error");
            $('#message').append(jqXHR);
            $('#message').append(textStatus);
            $('#message').append(errorThrown);
        })
        .always(function() {
            console.log("complete");
        })
    });
});
</script>
</body>

</html>
