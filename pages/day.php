<div id="home_content">
    <div class="title_day"><h2>&#10144; Result by <?php echo ucwords($menu); ?></h2></div>
    <div class="box_day">
        <table>
            <tbody>
                <tr class="boxday-tr1">
                    <td>Date</td>
                    <td>Draw</td>
                    <td>1<sup>st</sup> Prize</td>
                    <td>2<sup>nd</sup> Prize</td>
                    <td>3<sup>rd</sup> Prize</td>
                    <td>Starter</td>
                    <td>Consol</td>
                </tr>
                <?php
                    $i = 0;
                    $QUERYDATA = mysqli_query($conn, "SELECT * FROM `db_winningresults` WHERE day = '".ucwords($menu)."' ORDER BY `id` DESC");
                    while($GETDATA = mysqli_fetch_array($QUERYDATA)){
                        if($i % 2 == 0){
                            ?>
                            <tr class="boxday-tr2">
                                <td><?= date("Y-m-d", strtotime($GETDATA['date_insert'])); ?></td>
                                <td><?= $GETDATA['id']; ?></td>
                                <td><span class="xball"><?= substr($GETDATA['1stPrize'], 0, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 1, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 2, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 3, 1); ?></span></td>
                                <td><?= $GETDATA['2ndPrize']; ?></td>
                                <td><?= $GETDATA['3rdPrize']; ?></td>
                                <td><?= $GETDATA['starter']; ?></td>
                                <td><?= $GETDATA['consolation']; ?></td>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr class="boxday-tr3">
                                <td><?= date("Y-m-d", strtotime($GETDATA['date_insert'])); ?></td>
                                <td><?= $GETDATA['id']; ?></td>
                                <td><span class="xball"><?= substr($GETDATA['1stPrize'], 0, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 1, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 2, 1); ?></span><span class="xball"><?= substr($GETDATA['1stPrize'], 3, 1); ?></span></td>
                                <td><?= $GETDATA['2ndPrize']; ?></td>
                                <td><?= $GETDATA['3rdPrize']; ?></td>
                                <td><?= $GETDATA['starter']; ?></td>
                                <td><?= $GETDATA['consolation']; ?></td>
                            </tr>
                            <?php
                        }

                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br />
    <br />
    <div style="text-align: right; margin-top: -10px;">
        <span style="background-color: #247401; font-family: verdana; font-size: 11px; font-weight: bold; text-align: right; border: 1px solid #555555; padding: 5px;">
            <a href="2.html" style="text-decoration: none; color: #ffd801;">NEXT &raquo;</a>
        </span>
    </div>
</div>