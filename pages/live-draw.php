<?php
    $DATE = date("Y-m-d");
    $QUERYDATA = mysqli_query($conn, "SELECT * FROM `db_winningresults` WHERE date(date_insert) = '".$DATE."' ORDER BY `id` DESC");
    $GETDATA = mysqli_fetch_array($QUERYDATA);

    $QUERYCOUNT = mysqli_query($conn, "SELECT * FROM `db_winningresults` ORDER BY `id` DESC");
    $TOTALCOUNT = mysqli_num_rows($QUERYCOUNT);
?>
<div id="home_content">
    <div id="bgdragon">
        <div id="livedrawbox">
            <div id="responsecontainer">
                <div id="footer_left_home_content">
                    <p>Livedraw will start on <a>08:50 AM</a> and finish at <a>09:20 AM</a> (GMT+4)</p>
                </div>
                <br />
                <div id="header_left_home_content">
                    <img src="<?= BaseURL(); ?>/images/logo.png" width="60" style="margin-top: 2px;" />
                    <h2>LIVE DRAW</h2>
                    <p>Draw No : <?= $GETDATA['id'] !== null ? number_format($TOTALCOUNT) : "?"; ?> | <?= date("Y-m-d", strtotime($GETDATA['date_insert'])); ?> | <?= $GETDATA['day'] ? $GETDATA['day'] : "Not Update"; ?></p>
                </div>
                <div id="table_left_home_content">
                    <table id="table_home_1" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="td1_home1">1st prize</td>
                                <td class="td2_home1">
                                    <?php
                                        if($GETDATA['1stPrize'] !== null) {
                                            if($GETDATA['1stPrize'] !== '0000') {
                                                ?>
                                                <span class="ball"><?= substr($GETDATA['1stPrize'], 0, 1) !=='' ? substr($GETDATA['1stPrize'], 0, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['1stPrize'], 1, 1) !=='' ? substr($GETDATA['1stPrize'], 1, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['1stPrize'], 2, 1) !=='' ? substr($GETDATA['1stPrize'], 2, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['1stPrize'], 3, 1) !=='' ? substr($GETDATA['1stPrize'], 3, 1) : "x"; ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                                <?php
                                            }
                                        }
                                        else {
                                            ?>
                                            <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1_home1">2nd prize</td>
                                <td class="td2_home1">
                                    <?php
                                        if($GETDATA['2ndPrize'] !== null) {
                                            if($GETDATA['2ndPrize'] !== '0000') {
                                                ?>
                                                <span class="ball"><?= substr($GETDATA['2ndPrize'], 0, 1) !=='' ? substr($GETDATA['2ndPrize'], 0, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['2ndPrize'], 1, 1) !=='' ? substr($GETDATA['2ndPrize'], 1, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['2ndPrize'], 2, 1) !=='' ? substr($GETDATA['2ndPrize'], 2, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['2ndPrize'], 3, 1) !=='' ? substr($GETDATA['2ndPrize'], 3, 1) : "x"; ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                                <?php
                                            }
                                        }
                                        else {
                                            ?>
                                            <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1_home1">3rd prize</td>
                                <td class="td2_home1">
                                    <?php
                                        if($GETDATA['3rdPrize'] !== null) {
                                            if($GETDATA['3rdPrize'] !== '0000') {
                                                ?>
                                                <span class="ball"><?= substr($GETDATA['3rdPrize'], 0, 1) !=='' ? substr($GETDATA['3rdPrize'], 0, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['3rdPrize'], 1, 1) !=='' ? substr($GETDATA['3rdPrize'], 1, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['3rdPrize'], 2, 1) !=='' ? substr($GETDATA['3rdPrize'], 2, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['3rdPrize'], 3, 1) !=='' ? substr($GETDATA['3rdPrize'], 3, 1) : "x"; ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                                <?php
                                            }
                                        }
                                        else {
                                            ?>
                                            <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1_home1">Starter</td>
                                <td class="td2_home1">
                                    <?php
                                        if($GETDATA['starter'] !== null) {
                                            if($GETDATA['starter'] !== '0000') {
                                                ?>
                                                <span class="ball"><?= substr($GETDATA['starter'], 0, 1) !=='' ? substr($GETDATA['starter'], 0, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['starter'], 1, 1) !=='' ? substr($GETDATA['starter'], 1, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['starter'], 2, 1) !=='' ? substr($GETDATA['starter'], 2, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['starter'], 3, 1) !=='' ? substr($GETDATA['starter'], 3, 1) : "x"; ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                                <?php
                                            }
                                        }
                                        else {
                                            ?>
                                            <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td1_home1">Consolation</td>
                                <td class="td2_home1">
                                    <?php
                                        if($GETDATA['consolation'] !== null) {
                                            if($GETDATA['consolation'] !== '0000') {
                                                ?>
                                                <span class="ball"><?= substr($GETDATA['consolation'], 0, 1) !=='' ? substr($GETDATA['consolation'], 0, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['consolation'], 1, 1) !=='' ? substr($GETDATA['consolation'], 1, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['consolation'], 2, 1) !=='' ? substr($GETDATA['consolation'], 2, 1) : "x"; ?></span><span class="ball"><?= substr($GETDATA['consolation'], 3, 1) !=='' ? substr($GETDATA['consolation'], 3, 1) : "x"; ?></span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                                <?php
                                            }
                                        }
                                        else {
                                            ?>
                                            <span class="ball">x</span><span class="ball">x</span><span class="ball">x</span><span class="ball">x</span>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="footer_left_home_content">
                    <p>Full Payment Guaranted</p>
                </div>
            </div>
        </div>
    </div>
</div>