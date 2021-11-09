<?php
    $setquerytop = mysqli_query($conn, "select * from db_responsible");
    $querytop = mysqli_fetch_array($setquerytop);
?>
<div id="home_content">
    <div class="title_day"><h1>&#10144; Responsible Gambling</h1></div>
    <div class="box_responsible">
        <?= $querytop['responsible'] ?>
    </div>
</div>