<?php
	if($menu == "sunday" || $menu == "monday" || $menu == "tuesday" || $menu == "wednesday" || $menu == "thursday" || $menu == "friday" || $menu == "saturday") {
		include ("pages/day.php");
	} elseif($menu == "live-draw") {
		include ("pages/live-draw.php");
	} elseif($menu == "responsible") {
		include ("pages/responsible.php");
	} elseif($menu == "about") {
		include ("pages/about.php");
	} elseif($menu == "contact") {
		include ("pages/contact.php");
	} elseif($menu == "live") {
		include ("pages/live.php");
	} elseif($menu == "page-error") {
		include ("pages/page-error.php");
	} elseif($menu == "") {
		include ("pages/home.php");
	} else {
		include ("pages/page-error.php");
	}
?>