<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";
	
	$responsible = mysqli_real_escape_string($conn, $_POST['responsible']);
	
	if(!empty($responsible)){
		$set_data = mysqli_query($conn, "select * from db_responsible");
		$get_data = mysqli_fetch_array($set_data);
		$check_data = mysqli_num_rows($set_data);
		if($check_data == 0){
			$setquery = mysqli_query($conn, "insert into db_responsible(responsible) values('$responsible')");
			if($setquery){
				echo '
					<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
					  <span class="sr-only">Success:</span>
					  Add responsible successfully
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
					  Add responsible failed
					</div>
					<script>
					$(".show-alert").show("fast");
					</script>
				';
			}
		}
		else{
			$setquery = mysqli_query($conn, "update db_responsible set responsible='$responsible' where id = '".$get_data['id']."'");
			if($setquery){
				echo '
					<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
					  <span class="sr-only">Success:</span>
					  Add responsible successfully
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
					  Add responsible failed
					</div>
					<script>
					$(".show-alert").show("fast");
					</script>
				';
			}
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