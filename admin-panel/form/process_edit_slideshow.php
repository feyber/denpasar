<?php 
session_start();
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	require "../../config.php";

	$iddata=mysqli_real_escape_string($conn, $_POST['iddata']);
	$title=mysqli_real_escape_string($conn, $_POST['title']);

	$pict_name="";
	$pict_tmp="";

	if(isset($_FILES['pict'])){
		$pict_name=$_FILES['pict']['name'];
		$pict_tmp=$_FILES['pict']['tmp_name'];
	}
	
	if(!empty($title)){
		$checkdata=mysqli_num_rows(mysqli_query($conn, "select * from db_slideshow where title='$title' and id!='$iddata'")); 
		if($checkdata==0){
			$setquerytop=mysqli_query($conn, "select * from db_slideshow where id='$iddata'");
			$querytop=mysqli_fetch_array($setquerytop);
			if(!empty($pict_name)){
				$checkfiles="../files/slideshow/".$querytop['pict'];
				if(file_exists($checkfiles)){unlink($checkfiles);}
				$temp = explode(".",$pict_name);
				$new_file_name = strtoupper($title).'-'.rand(0000,9999).'-'.rand(00000,99999).'-'.rand(000000,999999).'.'.end($temp);	
				$target_files="../files";
				if(!file_exists($target_files)){mkdir($target_files);}
				$target_pict=$target_files."/slideshow";
				if(!file_exists($target_pict)){mkdir($target_pict);}
				move_uploaded_file($pict_tmp,"$target_pict/$new_file_name");
				$pict=$new_file_name;
			}
			else{$pict=$querytop['pict'];}
			$query=mysqli_query($conn, "update db_slideshow set title='$title',pict='$pict' where id='$iddata'"); 
			if($query){
				echo '
				<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Success:</span>
				Edit slideshow successfully
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
				Edit slideshow failed
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
			Failed, title already exists
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