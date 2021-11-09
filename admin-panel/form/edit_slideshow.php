<?php
$iddata=$_GET['iddata'];
$setquerytop=mysqli_query($conn, "select * from db_slideshow where id='$iddata'");
$querytop=mysqli_fetch_array($setquerytop);
?>
<div class="container-form">
    <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-left:10px;margin-bottom:20px;">
        <div class="progress" style="display:none;">
            <div class="progress-bar progress-bar-success" data-transitiongoal="0">0%</div>
        </div>
    </div>
    <div style="margin-bottom:20px;"></div>
    <form action="<?php echo BaseURL() ?>/form/process_edit_slideshow.php" method="post" enctype="multipart/form-data" class="on_submit form-horizontal form-label-left">
    	<input type="hidden" name="iddata" value="<?php echo $querytop['id'] ?>" />
        <div style="margin-left:10px;">
            <div class="fileinput fileinput-exists" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 180px;">
                	<img src="<?php echo BaseURL() ?>/images/no-image.png" width="200" height="180">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:180px;">
                	<?php
					if(!empty($querytop['pict'])){
						echo "<img src='".BaseURL()."/files/slideshow/".$querytop['pict']."' width='200' height='180'>";
					}
					else{
						echo "<img src='".BaseURL()."/images/no-image.png' width='200' height='180'>";
					}
					?>
                </div>
                <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select Image</span><span class="fileinput-exists">Change</span><input type="file" name="pict"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control has-feedback-left" placeholder="Title Of Picture" name="title" value="<?php echo $querytop['title'] ?>" />
                <span class="fa fa-ellipsis-h form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div style="margin-left:10px;margin-top:30px;margin-bottom:20px;">
            <input type="submit" class="btn btn-primary" value="Confirm" /> 
            <input type="button" class="btn btn-default" value="Cancel" onClick="document.location='<?php echo BaseURL() ?>/slideshow';" />
        </div>
    </form>
</div>
<script>
	$(document).ready(function() {
		$(".select2_single").select2({
			placeholder: "Select Category",
			allowClear: true
		});
		$('.fileinput').fileinput();
		var options = { 
			beforeSend:function(){$(".progress").show();$(".progress-bar").width('0%');$(".percent").html("0%");},
			uploadProgress:function(event, position, total, percentComplete){
				$(".progress-bar").width(percentComplete+'%');
				$(".progress-bar").html(percentComplete+'%');
			},
			success:function(){$(".progress-bar").width('100%');$(".progress-bar").html('100%');},
			complete:function(response){$(".after_submit").html(response.responseText);},
			error:function(){$(".after_submit").html("<div class='alert alert-danger show-alert' role='alert' style='text-align:center;display:none;'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error:</span>ERROR: unable to upload files</div><script>$('.show-alert').show('fast');<\/script>");}
		};
		$(".on_submit").ajaxForm(options);
	});
</script>