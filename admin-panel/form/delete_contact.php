<?php
$iddata = $_GET['iddata'];
$setquerytop = mysqli_query($conn, "select * from db_contact where id='$iddata'");
$querytop = mysqli_fetch_array($setquerytop);
?>
<div class="container-form" style="padding-top:70px;">
    <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-bottom:20px;"></div>
    <div style="margin-bottom:20px;"></div>
	<h4><strong><?php echo $querytop['name'] ?></strong></h4>
    <form action="" method="post" class="on_submit form-horizontal form-label-left">
        <input type="hidden" name="iddata" value="<?php echo $querytop['id'] ?>" />
        <label>Are you sure you want delete this item ?</label>
        <div style="margin-top:30px;">
            <input type="button" class="btn btn-primary" value="Yes" onClick="onsubmitdata();" /> 
            <input type="button" class="btn btn-default" value="No" onClick="document.location='<?php echo BaseURL() ?>/contact';" />
        </div>
	</form>
</div>
<script>
	function onsubmitdata(){
		$.post("<?php echo BaseURL() ?>/form/process_delete_contact.php",$(".on_submit").serialize(),function(data){
			$(".after_submit").html(data);
		});
	}
</script>