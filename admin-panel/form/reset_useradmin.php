<?php
if(isset($_GET['iddata'])){
    $iddata=$_GET['iddata'];
}
?>
<div class="container-form">
    <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-left:10px;margin-bottom:20px;">
        <div class="progress" style="display:none;">
            <div class="progress-bar progress-bar-success" data-transitiongoal="0">0%</div>
        </div>
    </div>
    <div style="margin-bottom:20px;"></div>
    <form action="" method="post"  class="on_submit form-horizontal form-label-left">
    	<input type="hidden" name="iddata" value="<?php echo $iddata ?>" />
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="password" class="form-control has-feedback-left" placeholder="Current Password" name="current_password" />
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="password" class="form-control has-feedback-left" placeholder="New Password" name="new_password" />
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="password" class="form-control has-feedback-left" placeholder="Confirm Password" name="confirm_password" />
                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div style="margin-left:10px;margin-top:30px;margin-bottom:20px;">
            <input type="button" class="btn btn-primary" value="Confirm" onClick="onsubmitdata();" /> 
            <input type="button" class="btn btn-default" value="Cancel" onClick="document.location='<?php echo BaseURL() ?>/useradmin';" />
        </div>
    </form>
</div>
<script>
	function onsubmitdata(){
		$.post("<?php echo BaseURL() ?>/form/process_reset_useradmin.php",$(".on_submit").serialize(),function(data){
			$(".after_submit").html(data);
		});
	}
</script>