<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";
	
	$iddata=mysqli_real_escape_string($conn, $_POST['iddata']);
	$catwinning=mysqli_real_escape_string($conn, $_POST['catwinning']);
	
	if(!empty($catwinning)){
		$check_data=mysqli_num_rows(mysqli_query($conn, "select * from db_catwinning where catwinning='$catwinning' and id!='$iddata'"));
		if($check_data==0){
			$setquery=mysqli_query($conn, "update db_catwinning set catwinning='$catwinning' where id='$iddata'");
			if($setquery){
				echo '
					<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
					  <span class="sr-only">Success:</span>
					  Edit category winning successfully
					</div>
					<script>
					$(".show-alert").show("fast");
					</script>
				';
				?><script>setTimeout(function(){window.location.href = "../../category";}, 3000);</script><?php
			}
			else{
				echo '
					<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					  Edit category winning failed
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
                  Failed, there is a same data
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