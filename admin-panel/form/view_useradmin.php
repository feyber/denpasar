<?php
if(isset($_GET['iddata'])){
    $iddata=$_GET['iddata'];
}
$setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='$iddata'");
$useradmin=mysqli_fetch_array($setuseradmin);
?>
<div style="width:300px;margin:0 auto;">
    <div class="avatar-view">
    	<?php
        if(!empty($useradmin['photo'])){
			echo "<a href='".BaseURL()."/files/pict/".$useradmin['photo']."' target='_blank'><img src='".BaseURL()."/files/pict/".$useradmin['photo']."' alt='Avatar' width='100%' height='100%'></a>";
		}
		else{
			echo "<img src='".BaseURL()."/images/no-image.png' alt='Avatar'>";
		}
        ?>
    </div>
    <h3><?php echo $useradmin['name'] ?></h3>
    <ul class="list-unstyled user_data">
        <?php if($useradmin['gender']="Male"){$gender="fa-male";}else{$gender="fa-female";} ?>
        <li><label style="float:left;width:25px;">| <i class="fa <?php echo $gender ?> user-profile-icon"></i></label>| <?php echo $useradmin['gender'] ?></li>
        <li><label style="float:left;width:25px;">| <i class="fa fa-envelope user-profile-icon"></i></label>| <?php echo $useradmin['email'] ?></li>
    </ul>
    <a class="btn btn-success" href="<?php echo BaseURL() ?>/useradmin/edit/<?php echo $iddata ?>"><i class="fa fa-edit m-right-xs"></i> Edit</a>
</div>