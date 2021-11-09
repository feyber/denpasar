<?php 
session_start();
if($_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest"){
	include "../../config.php";
	$role=mysqli_real_escape_string($conn, $_POST['role']);
	$full_name=mysqli_real_escape_string($conn, $_POST['full_name']);
	$email=mysqli_real_escape_string($conn, $_POST['email']);
	$username=mysqli_real_escape_string($conn, $_POST['username']);
	$password=md5(mysqli_real_escape_string($conn, $_POST['password']));
	$gender=mysqli_real_escape_string($conn, $_POST['gender']);
	$pict_name="";
	$pict_tmp="";

	if(isset($_FILES['pict'])){
		$pict_name=$_FILES['pict']['name'];
		$pict_tmp=$_FILES['pict']['tmp_name'];
	}
	
	if(!empty($full_name) and !empty($email) and !empty($username) and !empty($password) and !empty($gender)){
		$checkemail=mysqli_num_rows(mysqli_query($conn, "select * from db_useradmin where email='$email'")); 
		if($checkemail==0){
			$checkdata=mysqli_num_rows(mysqli_query($conn, "select * from db_useradmin where username='$username'")); 
			if($checkdata==0){
				if(!empty($pict_name)){
					$temp = explode(".",$pict_name);
					$new_file_name = strtoupper($full_name).'-'.rand(0000,9999).'-'.rand(00000,99999).'-'.rand(000000,999999).'.'.end($temp);	
					$target_files="../files";
					if(!file_exists($target_files)){mkdir($target_files);}
					$target_pict=$target_files."/pict";
					if(!file_exists($target_pict)){mkdir($target_pict);}
					move_uploaded_file($pict_tmp,"$target_pict/$new_file_name");
					$pict=$new_file_name;
				}
				else{$pict="";}
				$query=mysqli_query($conn, "insert into db_useradmin (role,name,email,username,password,gender,photo) values ('$role','$full_name','$email','$username','$password','$gender','$pict')"); 
				if($query){
					echo '
						<div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
						  <span class="sr-only">Success:</span>
						  Add user admin successfully
						</div>
						<script>
						$(".show-alert").show("fast");
						</script>
					';
					?><script>setTimeout(function(){window.location.href = "../useradmin";}, 3000);</script><?php
				}
				else{
					echo '
						<div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						  Add user admin failed
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
					  Failed, username already exists
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
				  Failed, email already exists
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