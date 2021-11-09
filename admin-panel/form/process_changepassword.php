<?php 
session_start();
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";

	$iddata=mysqli_real_escape_string($conn, $_POST['iddata']);
	$current_pass=md5(mysqli_real_escape_string($conn, $_POST['current_pass']));
	$new_pass=md5(mysqli_real_escape_string($conn, $_POST['new_pass']));
	$confirm_pass=md5(mysqli_real_escape_string($conn, $_POST['confirm_pass']));
	
	if(!empty($current_pass) and !empty($new_pass) and !empty($confirm_pass)){
		$setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='$iddata'");
		$useradmin=mysqli_fetch_array($setuseradmin);

		if($current_pass == $useradmin['password']) {
			if($new_pass == $confirm_pass) {
				$query=mysqli_query($conn, "update db_useradmin set password='$new_pass' where id='$iddata'"); 
				if($query){
					echo '
						<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
						  <span class="sr-only">Success:</span>
						  Change password successfully
						</div>
						<script>
						$(".show-alert").show("fast");
						</script>
					';
					?><script>setTimeout(function(){window.location.href = "";}, 3000);</script><?php
				}
				else{
					echo '
						<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						  Change password failed
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
					  Your new password & confirm password not same
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
				  Your current password wrong
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
			  Form not be empty
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
	}
}
?>