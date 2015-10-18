<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");

?>

<?php
		$sqlTotalCount = "SELECT COUNT(gender_id) AS TotalCount FROM residents";
		$resultTotalCount = $conn->query($sqlTotalCount);
		$rowTotalCount = $resultTotalCount->fetch_assoc();
		$total = $rowTotalCount['TotalCount'];
		
		$sqlMale = "SELECT COUNT(gender_id) AS MaleCount FROM residents WHERE gender_id=1";
		$resultMale = $conn->query($sqlMale);
		$rowMale = $resultMale->fetch_assoc();
		echo $male = $rowMale['MaleCount'];
		
		$sqlFemale = "SELECT COUNT(gender_id) AS FemaleCount FROM residents WHERE gender_id=2";
		$resultFemale = $conn->query($sqlFemale);
		$rowFemale = $resultFemale->fetch_assoc();
		echo $female = $rowFemale['FemaleCount'];
		
		
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-dashboard fa-fw"></i> Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<div class="col-md-6">
					<div class="alert alert-success" role="alert"><i class="fa fa-users fa-fw"></i> Total Residents: <?php echo $total;?></div>
					<div class="alert alert-warning" role="alert"><i class="fa fa-male fa-fw"></i> Total Male Count: <?php echo $male;?></div>
					<div class="alert alert-info" role="alert"><i class="fa fa-female fa-fw"></i> Total Female Count: <?php echo $female;?></div>
				</div>
			   <div class="col-md-6">
					<div id="canvas-holder">
					<center>
						<canvas id="chart-area" width="400" height="400"/>
					</center>
					</div>
					
				</div>
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


	<script>
		
		var pieData = [
				{
					value: <?php echo $male; ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				
				{
					value:  <?php echo $female; ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				
			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};



	</script>
