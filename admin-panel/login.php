<body style="background:#F7F7F7;">
    <div class="">
        <div id="wrapper">
            <div id="login" class="animate form">
                <div class="after_submit" style="width:350px;height:51.1167px;border:1px solid #F7F7F7;">
                    <?php
                        if(isset($_POST['submit'])) {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
                            
                            if(!empty($username) and !empty($password)){
                                $checkuser=mysqli_num_rows(mysqli_query($conn, "select * from db_useradmin where username='$username' and password='$password'"));
                                if($checkuser != 0){
                                    $_SESSION['username'] = $username;
                                    $_SESSION['password'] = $password;
                                    echo '
                                        <div class="alert alert-success show-alert" role="alert" style="text-align:center;display:none;">
                                          <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                          <span class="sr-only">Success:</span>
                                          Username or Password successfully
                                        </div>
                                        <script>
                                        $(document).ready(function(){show_alert();});
                                        function show_alert(){$(".show-alert").show("fast");}
                                        </script>
                                    ';
                                    ?><script>document.location = "";</script><?php
                                }
                                else{
                                    echo '
                                        <div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
                                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                          <span class="sr-only">Error:</span>
                                          Username or Password is incorrect
                                        </div>
                                        <script>
                                        $(document).ready(function(){show_alert();});
                                        function show_alert(){$(".show-alert").show("fast");}
                                        </script>
                                    ';
                                }
                            }
                            else{
                                echo '
                                    <div class="alert alert-danger show-alert" role="alert" style="text-align:center;display:none;">
                                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Username or Password not be empty
                                    </div>
                                    <script>
                                    $(document).ready(function(){show_alert();});
                                    function show_alert(){$(".show-alert").show("fast");}
                                    </script>
                                ';
                            }
                        }
                    ?>
                </div>
                <section class="login_content">
                    <form action="" method="post" class="on_submit">
                        <h1>Login</h1>
                        <div><input type="text" class="form-control" placeholder="Username" name="username" required /></div>
                        <div><input type="password" class="form-control" placeholder="Password" name="password" required /></div>
                        <div><button type="submit" name="submit" class="btn btn-default submit" onClick="onsubmitdata();">Log in</button></div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div><br />
                            <div>
                                <h1><i class="fa fa-home"></i> Admin Panel</h1>
                                <p>©2020 All Rights Reserved.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>