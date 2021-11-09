<?php
$iddata=$_GET['iddata'];
$setquerytop=mysqli_query($conn, "select * from db_slideshow where id='$iddata'");
$querytop=mysqli_fetch_array($setquerytop);
?>
<div style="width:600px;margin:0 auto;">
    <div class="avatar-view" style="margin:0 auto;">
    	<?php
        if(!empty($querytop['pict'])){
			echo "<a href='".BaseURL()."/files/slideshow/".$querytop['pict']."' target='_blank'><img src=".BaseURL()."/files/slideshow/".$querytop['pict']."' alt='Avatar' width='100%' height='100%'></a>";
		}
		else{
			echo "<img src='".BaseURL()."/images/no-image.png' alt='Avatar'>";
		}
        ?>
    </div>
    <br />
    <h3>Details</h3>
    <ul class="list-unstyled user_data">
        <li><label style="float:left;width:100px;">Title </label>: <?php echo $querytop['title'] ?></li>
    </ul>
    <br />
    <a class="btn btn-success" href="<?php echo BaseURL() ?>/slideshow/edit/<?php echo $iddata ?>"><i class="fa fa-edit m-right-xs"></i> Edit</a>
</div>