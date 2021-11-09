<?php
$actions = "";
$namedata = $menu;

if(isset($_GET['actions'])){
    $actions = $_GET['actions'];
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
            	<?php
                if(!$actions){
					echo '<h2>Results</h2>';
				}
				else{
					if($actions=="add"){
						echo '<h2>Tambah Results</h2>';
					}
					elseif($actions=="edit"){
						echo '<h2>Edit Results</h2>';
					}
					elseif($actions=="view"){
						echo '<h2>View Results</h2>';
					}
					elseif($actions=="delete"){
						echo '<h2>Delete Results</h2>';
					}
				}
				?>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link" style="cursor:pointer;"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            	<?php
                if(!$actions){
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
                        <a href="<?php echo BaseURL() ?>/<?php echo $namedata ?>/add" class="btn btn-info">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data
                        </a>
                    </p>
                    
                    <table class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Results</th>
                                <th>Day</th>
                                <th>Dates</th>
                                <th width="20%">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = "";
                            $setquerytop = mysqli_query($conn, "SELECT * FROM db_winningresults ORDER BY id DESC");
                            while($querytop = mysqli_fetch_array($setquerytop)){
                                if($querytop['1stPrize'] !== '0000' && $querytop['2ndPrize'] !== '0000' && $querytop['3rdPrize'] !== '0000' && $querytop['starter'] !== '0000' && $querytop['consolation'] !== '0000') {
                                    $EDITBUTTON = "<a href='".BaseURL()."/$namedata/edit/".$querytop['id']."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a>";
                                }
                                else {
                                    $EDITBUTTON = "<button type='button' class='btn btn-default btn-xs'><i class='fa fa-refresh'></i> Wait For All Results ... </button>";
                                }

                                $x++;
                                
                                echo "
                                    <tr>
                                        <th scope='row'>$x</th>
										<td>".$querytop['result']."</td>
                                        <td>".$querytop['day']."</td>
                                        <td>".convertdate($querytop['date_insert'])."</td>
                                        <td>
                                            ".$EDITBUTTON."
											<a href='".BaseURL()."/$namedata/delete/".$querytop['id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Delete </a>
                                        </td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
					<?php
				}
				else{
					if($actions=="add"){
						include "form/add_$namedata.php";
					}
					elseif($actions=="edit"){
						include "form/edit_$namedata.php";
					}
					elseif($actions=="delete"){
						include "form/delete_$namedata.php";
					}
				}
				?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>