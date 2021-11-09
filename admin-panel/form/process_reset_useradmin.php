<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";
	
	$iddata=mysqli_real_escape_string($conn, $_POST['iddata']);
	$current_password=md5(mysqli_real_escape_string($conn, $_POST['current_password']));
	$new_password=md5(mysqli_real_escape_string($conn, $_POST['new_password']));
	$confirm_password=md5(mysqli_real_escape_string($conn, $_POST['confirm_password']));
	
	if(!empty($current_password) and !empty($new_password) and !empty($confirm_password)){
		$setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='$iddata'");
		$useradmin=mysqli_fetch_array($setuseradmin);
		if($current_password==$useradmin['password']){
			if($new_password==$confirm_password){
				$setquery=mysqli_query($conn, "update db_useradmin set password='$new_password' where id='$iddata'");
				if($setquery){
					echo '
						<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
						  <span class="sr-only">Success:</span>
						  Update password successfully
						</div>
						<script>
						$(".show-alert").show("fast");
						</script>
					';
					?><script>setTimeout(function(){window.location.href = "../../useradmin";}, 3000);</script><?php
				}
				else{
					echo '
						<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						  Update password failed
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
					  New password or Current password wrong
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
				  Current password wrong
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