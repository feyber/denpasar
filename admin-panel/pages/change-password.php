<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
				<h2>Change Password</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link" style="cursor:pointer;"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                $iddata=setuserdata('id');
                $setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='$iddata'");
                $useradmin=mysqli_fetch_array($setuseradmin);
                ?>
                <div class="container-form">
                    <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-left:10px;margin-bottom:20px;">
                    </div>
                    <div style="margin-bottom:20px;"></div>
                    <form action="" method="post" class="on_submit form-horizontal form-label-left row">
                        <input type="hidden" name="iddata" value="<?php echo $useradmin['id'] ?>" />
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="password" class="form-control has-feedback-left" placeholder="Current Password" name="current_pass" />
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="password" class="form-control has-feedback-left" placeholder="New Password" name="new_pass" />
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="password" class="form-control has-feedback-left" placeholder="Confirm Password" name="confirm_pass" />
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div style="margin-left:10px;margin-top:30px;margin-bottom:20px;">
                            <input type="button" class="btn btn-primary" value="Submit" onClick="onsubmitdata();" /> 
                        </div>
                    </form>
                </div>
                <script>
                    function onsubmitdata(){
                        $.post("<?php echo BaseURL() ?>/form/process_changepassword.php",$(".on_submit").serialize(),function(data){
                            $(".after_submit").html(data);
                        });
                    }
                </script>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>