<?php
	date_default_timezone_set("Asia/Jakarta");
	
	$servername = "localhost";
	// $username = "root";
	// $password = "";
	// $database = "arsenalottery";
	$username = "arsetudh_arsenal";
	$password = "XDQLwBvyYQZd";
	$database = "arsetudh_arsenal";
	$adminroot = "admin-panel";

	$conn = new mysqli($servername, $username, $password, $database);

	if ($conn->connect_error) {
	    die(include ("pages/page_error.php"));
	}

	if(isset($_GET['menu'])){
		$menu = $_GET['menu'];
	} else {
		$menu = "";
	}

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = "";
	}

	function BaseURL() {
		global $adminroot;
		
		$host = stripslashes($_SERVER['HTTP_HOST']);
		$url = $_SERVER['REQUEST_URI'];
		$split = explode("/", $url);
		$htdocs = $split['1'];

		if($host == "localhost") {
    		$admin = $split['2'];
	
			if($admin == $adminroot) {
				$result = "http://$host/$htdocs/$admin";
			}
			else {
				$result = "http://$host/$htdocs";
			}
		}
		else {
			if($htdocs == $adminroot) {
				$result = "http://$host/$htdocs";
			}
			else {
				$result = "http://$host";
			}
		}

		return $result;
	}

	function setuserid() {
		global $conn;

	    $e_username = $_SESSION['username'];
	    $e_password = $_SESSION['password'];
	    $setquerydata = mysqli_query($conn, "select * from db_useradmin where username='$e_username' and password='$e_password'");
	    $querydata = mysqli_fetch_array($setquerydata);
	    return $querydata['id'];
	}

	function setuserdata($requestfield) {
		global $conn;

	    $e_username = $_SESSION['username'];
	    $e_password = $_SESSION['password'];
	    $setquerydata = mysqli_query($conn, "select * from db_useradmin where username='$e_username' and password='$e_password'");
	    $querydata = mysqli_fetch_array($setquerydata);
	    return $querydata[$requestfield];
	}

	function ConvertDay($Day) {
		if($Day == "Monday"){
			return "Senin";
		}

		elseif($Day == "Tuesday"){
			return "Selasa";
		}

		elseif($Day == "Wednesday"){
			return "Rabu";
		}

		elseif($Day == "Thursday"){
			return "Kamis";
		}

		elseif($Day == "Friday"){
			return "Jumat";
		}

		elseif($Day == "Saturday"){
			return "Sabtu";
		}

		elseif($Day == "Sunday"){
			return "Minggu";
		}

		else{
			return date('l');
		}
	}

	function ordinal($num) {
	    $ones = $num % 10;
	    $tens = floor($num / 10) % 10;
	    if ($tens == 1) {
	        $suff = "th";
	    } else {
	        switch ($ones) {
	            case 1 : $suff = "st"; break;
	            case 2 : $suff = "nd"; break;
	            case 3 : $suff = "rd"; break;
	            default : $suff = "th";
	        }
	    }
	    return $num . $suff;
	}

	function convertdate($e_date) {
	    $split = explode(" ", $e_date);
	    $e_date = $split[0];
	    
	    if (!empty($split[1])) {
	        $e_time = $split[1];
	    }

	    $split2 = explode("-", $e_date);
	    $e_month = $split2[1];

	    switch ($e_month) {
	        case "01":
	            $month_name = "Jan";
	        break;
	        case "02":
	            $month_name = "Feb";
	        break;
	        case "03":
	            $month_name = "Mar";
	        break;
	        case "04":
	            $month_name = "Apr";
	        break;
	        case "05":
	            $month_name = "Mei";
	        break;
	        case "06":
	            $month_name = "Jun";
	        break;
	        case "07":
	            $month_name = "Jul";
	        break;
	        case "08":
	            $month_name = "Aug";
	        break;
	        case "09":
	            $month_name = "Sep";
	        break;
	        case "10":
	            $month_name = "Oct";
	        break;
	        case "11":
	            $month_name = "Nov";
	        break;
	        case "12":
	            $month_name = "Dec";
	        break;
	    }

	    $date_convert = $month_name." ".ordinal((int)$split2[2])." ".$split2[0];
	    
	    return $date_convert;
	}
?>