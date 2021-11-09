<?php
$iddata=$_GET['iddata'];
$setquerydata=mysqli_query($conn, "select * from db_catwinning where id='$iddata'");
$querydata=mysqli_fetch_array($setquerydata);
?>
<div class="container-form">
    <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-left:10px;margin-bottom:20px;"></div>
    <div style="margin-bottom:20px;"></div>
    <form action="" method="post" class="on_submit form-horizontal form-label-left">
    	<input type="hidden" name="iddata" value="<?php echo $querydata['id'] ?>" />
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control has-feedback-left" placeholder="Category Winning" name="catwinning" value="<?php echo $querydata['catwinning'] ?>" required />
                <span class="fa fa-database form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div style="margin-left:10px;margin-top:30px;">
            <input type="button" class="btn btn-primary" value="Confirm" onClick="onsubmitdata();" /> 
            <input type="button" class="btn btn-default" value="Cancel" onClick="document.location='<?php echo BaseURL() ?>/category';" />
        </div>
    </form>
</div>
<script>
	function onsubmitdata(){
		$.post("<?php echo BaseURL() ?>/form/process_edit_category.php",$(".on_submit").serialize(),function(data){
			$(".after_submit").html(data);
		});
	}
</script>