<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
                <h2>Results</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link" style="cursor:pointer;"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                    $DATE = date("Y-m-d");
                    $QUERYDATA = mysqli_query($conn, "SELECT * FROM db_winningresults WHERE date_release = '".$DATE."'");
                    $GETDATA = mysqli_fetch_assoc($QUERYDATA);
                ?>
                <h3 align="center">Date : <?= $GETDATA['day'] ? $GETDATA['day'] : "Day".", ".convertdate($GETDATA['date_insert'] ? $GETDATA['date_insert'] : "0000-01-01 00:00:00") ?></h3>
                <hr />
                <div class="row tile_count">
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star text-primary"></i> Set Result</span>
                            <div class="count green">Today</div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star text-success"></i> 1st Prize</span>
                            <div class="count"><?= $GETDATA['1stPrize'] ? $GETDATA['1stPrize'] : "0000" ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star text-warning"></i> 2nd Prize</span>
                            <div class="count"><?= $GETDATA['2ndPrize'] ? $GETDATA['2ndPrize'] : "0000" ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star text-info"></i> 3rd Prize</span>
                            <div class="count"><?= $GETDATA['3rdPrize'] ? $GETDATA['3rdPrize'] : "0000" ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star text-danger"></i> Starter</span>
                            <div class="count"><?= $GETDATA['starter'] ? $GETDATA['starter'] : "0000" ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-star"></i> Consolation</span>
                            <div class="count"><?= $GETDATA['consolation'] ? $GETDATA['consolation'] : "0000" ?></div>
                        </div>
                    </div>
                </div>

                <hr />
                <p class="ap-add-data" align="center">
                    <a href="<?php echo BaseURL() ?>/results" class="btn btn-warning">
                        <i class="fa fa-key"></i>&nbsp;&nbsp;Go To Results Page
                    </a>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>