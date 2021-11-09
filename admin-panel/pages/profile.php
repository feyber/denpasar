<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
				<h2>Edit Profile</h2>
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
                        <div class="progress" style="display:none;">
                            <div class="progress-bar progress-bar-success" data-transitiongoal="0">0%</div>
                        </div>
                    </div>
                    <div style="margin-bottom:20px;"></div>
                    <form action="<?php echo BaseURL() ?>/form/process_profile.php" method="post" enctype="multipart/form-data" class="on_submit form-horizontal form-label-left">
                        <input type="hidden" name="iddata" value="<?php echo $useradmin['id'] ?>" />
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="form-control" name="role">
                                    <option value="">Choose Access</option>
                                    <option value="1">Super Admin (All Access)</option>
                                    <option value="0">Editor (Only Results)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control has-feedback-left" placeholder="Full Name" name="full_name" value="<?php echo $useradmin['name'] ?>" />
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control has-feedback-left" placeholder="Email" name="email" value="<?php echo $useradmin['email'] ?>" />
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control has-feedback-left" placeholder="Username" name="username" value="<?php echo $useradmin['username'] ?>" readonly />
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left:11px;margin-bottom:0px;">
                            <label>Gender :</label>
                            <?php
                            $checked_male="";
                            $checked_female="";
                            if($useradmin['gender']=="Male"){$checked_male="checked";}
                            elseif($useradmin['gender']=="Female"){$checked_female="checked";}
                            ?>
                            <p>
                            Male :
                            <input type="radio" class="flat" name="gender" id="genderM" value="Male" <?php echo $checked_male ?> required /> Female :
                            <input type="radio" class="flat" name="gender" id="genderF" value="Female" <?php echo $checked_female ?> />
                            </p>
                        </div>
                        <div style="position:absolute;float:right;top:14%;right:15%;">
                            <div class="fileinput fileinput-exists" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 180px;">
                                    <img src="<?php echo BaseURL() ?>/images/no-image.png" width="200" height="180">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="width:200px;height:180px;">
                                    <?php
                                    if(!empty($useradmin['photo'])){
                                        echo "<img src='".BaseURL()."/files/pict/".$useradmin['photo']."' width='200' height='180'>";
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
                        <div style="margin-left:10px;margin-top:30px;margin-bottom:20px;">
                            <input type="submit" class="btn btn-primary" value="Submit" /> 
                        </div>
                    </form>
                </div>
                <script>
                    $(document).ready(function() {
                        $("select[name=role]").val("<?= $useradmin['role'] ?>")
                        $(".select2_single").select2({
                            placeholder: "Select Level User",
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>