<?php 
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";

	$iddata			= mysqli_real_escape_string($conn, $_POST['iddata']);
	$Prize1st 		= mysqli_real_escape_string($conn, $_POST['Prize1st']);
	$Prize2nd 		= mysqli_real_escape_string($conn, $_POST['Prize2nd']);
	$Prize3rd 		= mysqli_real_escape_string($conn, $_POST['Prize3rd']);
	$starter		= mysqli_real_escape_string($conn, $_POST['starter']);
	$consolation	= mysqli_real_escape_string($conn, $_POST['consolation']);
	
	if(!empty($Prize1st) and !empty($Prize2nd) and !empty($Prize3rd) and !empty($starter) and !empty($consolation)){
		$query 		= mysqli_query($conn, "update db_winningresults set result='$Prize1st', 1stPrize='$Prize1st', 2ndPrize='$Prize2nd', 3rdPrize='$Prize3rd', starter='$starter', consolation='$consolation' where id='$iddata'"); 
		if($query){
			echo '
				<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
				  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				  <span class="sr-only">Success:</span>
				  Edit result successfully
				</div>
				<script>
				$(".show-alert").show("fast");
				</script>
			';
			?><script>setTimeout(function(){window.location.href = "../../results";}, 3000);</script><?php
		}
		else{
			echo '
				<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  Edit result failed
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
			  Field cannot be empty
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
	}
}
?>