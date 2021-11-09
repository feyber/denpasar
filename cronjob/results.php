<?php
	include ("../config.php");

    $DATE = date("Y-m-d");
    $TIMESTAMP = date("Y-m-d H:i:s");

    $QUERYDATA = mysqli_query($conn, "SELECT * FROM `db_winningresults` WHERE date_release = '".$DATE."' ORDER BY `id` DESC");
    $GETDATA = mysqli_fetch_assoc($QUERYDATA);

    $DATE1 = strtotime($GETDATA['date_insert']);  
	$DATE2 = strtotime($TIMESTAMP);

	$DIFF = abs($DATE2 - $DATE1);

	$YEARS = floor($DIFF / (365*60*60*24));  
	$MONTHS = floor(($DIFF - $YEARS * 365*60*60*24) / (30*60*60*24));
	$DAYS = floor(($DIFF - $YEARS * 365*60*60*24 - $MONTHS*30*60*60*24)/ (60*60*24));
	$HOURS = floor(($DIFF - $YEARS * 365*60*60*24 - $MONTHS*30*60*60*24 - $DAYS*60*60*24) / (60*60));  
	$MINUTES = floor(($DIFF - $YEARS * 365*60*60*24 - $MONTHS*30*60*60*24 - $DAYS*60*60*24 - $HOURS*60*60)/ 60); 
	$SECONDS = floor(($DIFF - $YEARS * 365*60*60*24 - $MONTHS*30*60*60*24 - $DAYS*60*60*24 - $HOURS*60*60 - $MINUTES*60));

    if($GETDATA['consolation'] === '0000') {
	    $RANDOMCONSOLATION = mysqli_query($conn, "SELECT random_prize FROM ( SELECT LPAD(FLOOR(RAND() * 9999), 4, '0') AS random_prize ) AS ConsolationRandom WHERE random_prize NOT IN (SELECT consolation FROM db_winningresults WHERE consolation IS NOT NULL) LIMIT 1");
	    $SETCONSOLATION = mysqli_fetch_assoc($RANDOMCONSOLATION);

    	$UPDATECONSOLATION = mysqli_query($conn, "UPDATE db_winningresults SET consolation = '".$SETCONSOLATION['random_prize']."', date_insert = '".$TIMESTAMP."' WHERE date_release = '".$DATE."'");

    	if($UPDATECONSOLATION) {
    		echo "CONSOLATION (UPDATE) : ".$SETCONSOLATION['random_prize']." <br />";
    	}
    	else {
    		echo "CONSOLATION : CAN'T UPDATE <br />";
    	}
    }
    else {
    	echo "CONSOLATION TODAY : ".$GETDATA['consolation']."<br />";
    }

    if($GETDATA['starter'] === '0000' && $GETDATA['consolation'] !== '0000') {
    	if($MINUTES >= 2) {
		    $RANDOMSTARTER = mysqli_query($conn, "SELECT random_prize FROM ( SELECT LPAD(FLOOR(RAND() * 9999), 4, '0') AS random_prize ) AS StarterRandom WHERE random_prize NOT IN (SELECT starter FROM db_winningresults WHERE starter IS NOT NULL) LIMIT 1");
		    $SETSTARTER = mysqli_fetch_assoc($RANDOMSTARTER);

	    	$UPDATESTARTER = mysqli_query($conn, "UPDATE db_winningresults SET starter = '".$SETSTARTER['random_prize']."', date_insert = '".$TIMESTAMP."' WHERE date_release = '".$DATE."'");

	    	if($UPDATESTARTER) {
	    		echo "STARTER (UPDATE) : ".$SETSTARTER['random_prize']." <br />";
	    	}
	    	else {
	    		echo "STARTER : CAN'T UPDATE <br />";
	    	}
    	}
	    else {
	    	echo "STARTER TODAY : RESULT TODAY NOT UPDATE YET <br />";
	    }
    }
    else {
    	echo "STARTER TODAY : ".$GETDATA['starter']."<br />";
    }

    if($GETDATA['3rdPrize'] === '0000' && $GETDATA['starter'] !== '0000' && $GETDATA['consolation'] !== '0000') {
    	if($MINUTES >= 2) {
		    $RANDOM3RDPRIZE = mysqli_query($conn, "SELECT random_prize FROM ( SELECT LPAD(FLOOR(RAND() * 9999), 4, '0') AS random_prize ) AS 3rdPrizeRandom WHERE random_prize NOT IN (SELECT 3rdPrize FROM db_winningresults WHERE 3rdPrize IS NOT NULL) LIMIT 1");
		    $SET3RDPRIZE = mysqli_fetch_assoc($RANDOM3RDPRIZE);

	    	$UPDATE3RDPRIZE = mysqli_query($conn, "UPDATE db_winningresults SET 3rdPrize = '".$SET3RDPRIZE['random_prize']."', date_insert = '".$TIMESTAMP."' WHERE date_release = '".$DATE."'");

	    	if($UPDATE3RDPRIZE) {
	    		echo "3RD PRIZE (UPDATE) : ".$SET3RDPRIZE['random_prize']." <br />";
	    	}
	    	else {
	    		echo "3RD PRIZE : CAN'T UPDATE <br />";
	    	}
    	}
	    else {
	    	echo "3RD PRIZE TODAY : RESULT TODAY NOT UPDATE YET <br />";
	    }
    }
    else {
    	echo "3RD PRIZE TODAY : ".$GETDATA['3rdPrize']."<br />";
    }

    if($GETDATA['2ndPrize'] === '0000' && $GETDATA['3rdPrize'] !== '0000' && $GETDATA['starter'] !== '0000' && $GETDATA['consolation'] !== '0000') {
    	if($MINUTES >= 2) {
		    $RANDOM2NDPRIZE = mysqli_query($conn, "SELECT random_prize FROM ( SELECT LPAD(FLOOR(RAND() * 9999), 4, '0') AS random_prize ) AS 2ndPrizeRandom WHERE random_prize NOT IN (SELECT 2ndPrize FROM db_winningresults WHERE 2ndPrize IS NOT NULL) LIMIT 1");
		    $SET2NDPRIZE = mysqli_fetch_assoc($RANDOM2NDPRIZE);

	    	$UPDATE2NDPRIZE = mysqli_query($conn, "UPDATE db_winningresults SET 2ndPrize = '".$SET2NDPRIZE['random_prize']."', date_insert = '".$TIMESTAMP."' WHERE date_release = '".$DATE."'");

	    	if($UPDATE2NDPRIZE) {
	    		echo "2ND PRIZE (UPDATE) : ".$SET2NDPRIZE['random_prize']." <br />";
	    	}
	    	else {
	    		echo "2ND PRIZE : CAN'T UPDATE <br />";
	    	}
    	}
	    else {
	    	echo "2ND PRIZE TODAY : RESULT TODAY NOT UPDATE YET <br />";
	    }
    }
    else {
    	echo "2ND PRIZE TODAY : ".$GETDATA['2ndPrize']."<br />";
    }

    if($GETDATA['1stPrize'] === '0000' && $GETDATA['2ndPrize'] !== '0000' && $GETDATA['3rdPrize'] !== '0000' && $GETDATA['starter'] !== '0000' && $GETDATA['consolation'] !== '0000') {
    	if($MINUTES >= 2) {
	    	$UPDATE1STPRIZE = mysqli_query($conn, "UPDATE db_winningresults SET 1stPrize = '".$GETDATA['result']."', date_insert = '".$TIMESTAMP."' WHERE date_release = '".$DATE."'");

	    	if($UPDATE1STPRIZE) {
	    		echo "1ST PRIZE (UPDATE) : ".$GETDATA['result']." <br />";
	    	}
	    	else {
	    		echo "1ST PRIZE : CAN'T UPDATE <br />";
	    	}
    	}
	    else {
	    	echo "1ST PRIZE TODAY : RESULT TODAY NOT UPDATE YET <br />";
	    }
    }
    else {
    	echo "1ST PRIZE TODAY : ".$GETDATA['1stPrize']."<br />";
    }
?>