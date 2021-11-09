<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";
	
	$iddata = mysqli_real_escape_string($conn, $_POST['iddata']);
	$setquery = mysqli_query($conn, "delete from db_contact where id='$iddata'");
	if($setquery){
		echo '
			<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
			  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
			  <span class="sr-only">Success:</span>
			  Delete contact successfully
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
		?><script>setTimeout(function(){window.location.href = "../../contact";}, 3000);</script><?php
	}
	else{
		echo '
			<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			  Delete contact failed
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
	}
}
?>