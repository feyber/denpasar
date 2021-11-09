<?php
    $setquerytop = mysqli_query($conn, "select * from db_contact where status='0'");
    $querytop = mysqli_fetch_array($setquerytop);
    $countquery = mysqli_num_rows($setquerytop);
?>

<div class="menu_section">
    <h3>&nbsp;</h3>
    <ul class="nav side-menu">
        <?php 
            if(setuserdata('role') == 1) {
                ?>
                <li><a href="<?php echo BaseURL() ?>/"><i class="fa fa-home"></i> Dashboard </a></li>
                <li><a href="<?php echo BaseURL() ?>/useradmin"><i class="fa fa-user"></i> User</a></li>
                <li><a href="<?php echo BaseURL() ?>/results"><i class="fa fa-star"></i> Results</a></li>
                <!-- <li>
                    <a><i class="fa fa-star"></i> Results <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li>
                            <a href="<?php echo BaseURL() ?>/results">All Results</a>
                        </li>
                        <li>
                            <a href="<?php echo BaseURL() ?>/1st-prize">1st Prize</a>
                        </li>
                        <li>
                            <a href="<?php echo BaseURL() ?>/2nd-prize">2nd Prize</a>
                        </li>
                        <li>
                            <a href="<?php echo BaseURL() ?>/3rd-prize">3rd Prize</a>
                        </li>
                        <li>
                            <a href="<?php echo BaseURL() ?>/starter">Starter</a>
                        </li>
                        <li>
                            <a href="<?php echo BaseURL() ?>/consolation">Consolation</a>
                        </li>
                    </ul>
                </li> -->
                <li><a href="<?php echo BaseURL() ?>/about"><i class="fa fa-question"></i> About</a></li>
                <li><a href="<?php echo BaseURL() ?>/responsible-gaming"><i class="fa fa-cog"></i> Responsible Gaming</a></li>
                <li><a href="<?php echo BaseURL() ?>/contact"><i class="fa fa-users"></i> Message <?= $countquery == 0 ? "" : '<span class="badge badge-primary">'.number_format($countquery).'</span>'; ?></a></li>
                <?php
            } else {
                ?>
                    <li><a href="<?php echo BaseURL() ?>/"><i class="fa fa-home"></i> Dashboard </a></li>
                    <li><a href="<?php echo BaseURL() ?>/results"><i class="fa fa-star"></i> Results</a></li>
                <?php
            }
        ?>
    </ul>
</div>