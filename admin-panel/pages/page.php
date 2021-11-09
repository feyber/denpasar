<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo BaseURL() ?>/" class="site_title"><span><i class="fa fa-home"></i> Admin Panel</span></a>
                </div>
                <div class="clearfix"></div>
                <div class="profile">
                    <?php include "profile_user.php"; ?>
                </div>
                <br />
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <?php include "menu.php"; ?>
                </div>
                <div class="sidebar-footer hidden-small">
                    <div class="space-hover-a">
                        <a>&nbsp;</a>
                        <a>&nbsp;</a>
                        <a>&nbsp;</a>
                    </div>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo BaseURL() ?>/logout.php">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="top_nav">
            <?php include "top_nav.php"; ?>
        </div>
        <div class="right_col" role="main">
            <?php include ("pages/content.php"); ?>
            <footer>
                <div class="copyright-info">
                    <p class="pull-right">Welcome to Admin Dashboard</p>
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>