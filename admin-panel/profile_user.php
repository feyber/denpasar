<div class="profile_pic">
	<?php
	$setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='".setuserid()."'");
	$useradmin=mysqli_fetch_array($setuseradmin);
    if(!empty($useradmin['photo'])){
		echo "<img src='".BaseURL()."/files/pict/".$useradmin['photo']."' class='img-circle profile_img'>";
	}
	else{
		echo "<img src='".BaseURL()."/images/no-image.png' class='img-circle profile_img'>";
	}
    ?>
</div>
<div class="profile_info">
    <span>Welcome,</span>
    <h2><?php echo setuserdata('name') ?></h2>
</div>