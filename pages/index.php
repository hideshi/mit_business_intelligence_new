<?php
include ("../config/db_config.php");
include("../includes/header.php");
include("../includes/sidebar.php");

?>

<?php
		$sqlTotalCount = "SELECT COUNT(gender_id) AS TotalCount FROM residents WHERE status_id = 1";
		$resultTotalCount = $conn->query($sqlTotalCount);
		$rowTotalCount = $resultTotalCount->fetch_assoc();
		$sqlTotalCount2 = "SELECT COUNT(gender_id) AS TotalCount FROM owners WHERE status_id = 1";
		$resultTotalCount2 = $conn->query($sqlTotalCount2);
		$rowTotalCount2 = $resultTotalCount2->fetch_assoc();
		$total = $rowTotalCount['TotalCount'] + $rowTotalCount2['TotalCount'];
		
		$sqlMale = "SELECT COUNT(gender_id) AS MaleCount FROM residents WHERE gender_id = 1 AND status_id = 1";
		$resultMale = $conn->query($sqlMale);
		$rowMale = $resultMale->fetch_assoc();
		$sqlMale2 = "SELECT COUNT(gender_id) AS MaleCount FROM owners WHERE gender_id = 1 AND status_id = 1";
		$resultMale2 = $conn->query($sqlMale2);
		$rowMale2 = $resultMale2->fetch_assoc();
		echo $male = $rowMale['MaleCount'] + $rowMale2['MaleCount'];
		
		$sqlFemale = "SELECT COUNT(gender_id) AS FemaleCount FROM residents WHERE gender_id = 2 AND status_id = 1";
		$resultFemale = $conn->query($sqlFemale);
		$rowFemale = $resultFemale->fetch_assoc();
		$sqlFemale2 = "SELECT COUNT(gender_id) AS FemaleCount FROM owners WHERE gender_id = 2 AND status_id = 1";
		$resultFemale2 = $conn->query($sqlFemale2);
		$rowFemale2 = $resultFemale2->fetch_assoc();
		echo $female = $rowFemale['FemaleCount'] + $rowFemale2['FemaleCount'];
		
		
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
					<div class="alert alert-info" role="alert"><i class="fa fa-male fa-fw"></i> Total Male Count: <?php echo $male;?></div>
					<div class="alert alert-danger" role="alert"><i class="fa fa-female fa-fw"></i> Total Female Count: <?php echo $female;?></div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


	<script>
		
		var pieData = [
				{
					value: <?php echo $male; ?>,
					color:"#81DAF5",
					highlight: "#2E64FE",
					label: "Male"
				},
				
				{
					value:  <?php echo $female; ?>,
					color:"#F6CEE3",
					highlight: "#FE2E64",
					label: "Female"
				},
				
			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};



	</script>
