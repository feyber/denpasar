<div class="container-form">
    <div class="after_submit col-md-12" style="height:51.1167px;border:1px solid #FFF;margin-bottom:20px;"></div>
    <div style="margin-bottom:20px;"></div>
    <form action="" method="post" class="on_submit form-horizontal form-label-left row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-info">
                NOTE <span class="text-danger">*</span> : 
                <br />
                <br />
                <p>
                    Result akan otomatis terisi untuk "Consolation, Starter, 3rd Prize, 2nd Prize & 1stPrize".
                </p>
                <p>
                    Masukan angka 1st Prize dibawah ini dan yang lainnya akan otomatis terisi setiap 2 menit.
                </p>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <label for="1st-prize">Set Result <span class="text-danger">*</span> :</label>
            <input type="text" id="1st-prize" class="form-control" name="Prize1st" required="required" placeholder="Only Number, Example : 1234" maxlength="4">
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback mt-20">
            <input type="button" class="btn btn-primary" value="Submit" onClick="onsubmitdata();" /> 
            <input type="button" class="btn btn-default" value="Back" onClick="document.location='<?php echo BaseURL() ?>/results';" />
        </div>
    </form>
</div>
<script>
	function onsubmitdata(){
		$.post("<?php echo BaseURL() ?>/form/process_add_results.php",$(".on_submit").serialize(),function(data){
			$(".after_submit").html(data);
		});
	}
</script>