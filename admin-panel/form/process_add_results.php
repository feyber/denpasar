<?php 
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";

	$Prize1st 		= mysqli_real_escape_string($conn, $_POST['Prize1st']);
	$day 			= date("l");
	$DateRelease	= date("Y-m-d");
	$TimeStamp		= date("Y-m-d H:i:s");
	
	if(!empty($Prize1st)){
		$QUERYDATA 	= mysqli_query($conn, "SELECT * FROM db_winningresults WHERE date_release = '$DateRelease'");
		$CHECKDATA	= mysqli_num_rows($QUERYDATA);

		if($CHECKDATA === 0) {
		    $QUERYCOUNT = mysqli_query($conn, "SELECT * FROM `db_winningresults` ORDER BY `id` DESC");
		    $TOTALCOUNT = mysqli_num_rows($QUERYCOUNT) + 1;

			$query 		= mysqli_query($conn, "insert into db_winningresults (result, draw, day, date_release, date_insert) values ('$Prize1st', '$TOTALCOUNT', '$day', '$DateRelease', '$TimeStamp')"); 
			if($query) {
				echo '
					<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
					  <span class="sr-only">Success:</span>
					  Add Result Successfully
					</div>
					<script>
					$(".show-alert").show("fast");
					</script>
				';
				?><script>setTimeout(function(){window.location.href = "../results";}, 2000);</script><?php
			}
			else{
				echo '
					<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					  Add Result Failed !! Please try again
					</div>
					<script>
					$(".show-alert").show("fast");
					</script>
				';
			}
		}
		else{
			echo '
				<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  Result already exists for today
				</div>
				<script>
				$(".show-alert").show("fast");
				</script>
			';
		}
	}
	else{
		echo '
			<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			  Field cannot be empty !
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
	}
}
?>