<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
	        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php
                    $setuseradmin=mysqli_query($conn, "select * from db_useradmin where id='".setuserid()."'");
                    $useradmin=mysqli_fetch_array($setuseradmin);
					if(!empty($useradmin['photo'])){
						echo "<img src='".BaseURL()."/files/pict/".$useradmin['photo']."' />";
					}
					else{
						echo "<img src='".BaseURL()."/images/no-image.png' />";
					}
                    echo setuserdata('name');
					?> 
                    <span class="fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="<?php echo BaseURL() ?>/profile"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="<?php echo BaseURL() ?>/change-password"><i class="fa fa-key pull-right"></i> Change Password</a></li>
                    <li><a href="<?php echo BaseURL() ?>/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>