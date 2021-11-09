<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";
	
	$iddata=mysqli_real_escape_string($conn, $_POST['iddata']);
	$setquerytop=mysqli_query($conn, "select * from db_slideshow where id='$iddata'");
	$querytop=mysqli_fetch_array($setquerytop);
	$checkfiles="../files/slideshow/".$querytop['pict']."";
	if(file_exists($checkfiles)){unlink($checkfiles);}
	$setquery=mysqli_query($conn, "delete from db_slideshow where id='$iddata'");
	if($setquery){
		echo '
			<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
			  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
			  <span class="sr-only">Success:</span>
			  Delete slideshow successfully
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
		?><script>setTimeout(function(){window.location.href = "../../slideshow";}, 3000);</script><?php
	}
	else{
		echo '
			<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			  Delete slideshow failed
			</div>
			<script>
			$(".show-alert").show("fast");
			</script>
		';
	}
}
?>
