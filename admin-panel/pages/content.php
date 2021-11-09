<?php
$menu = "";

if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}

if (!$menu) {
    include "home.php";
} else {
    if(setuserdata('role') == 1) {
        switch ($menu) {
            case "change-password":
                include "pages/change-password.php";
            break;

            case "profile":
                include "pages/profile.php";
            break;

            case "useradmin":
                include "pages/useradmin.php";
            break;

            case "results":
                include "pages/results.php";
            break;

            case "about":
                include "pages/about.php";
            break;
            
            case "responsible-gaming":
                include "pages/responsible-gaming.php";
            break;

            case "contact":
                include "pages/contact.php";
            break;
            
            default:
                include "pages/redirect.php";
            break;
        }
    } else {
        switch ($menu) {
            case "change-password":
                include "pages/change-password.php";
            break;

            case "profile":
                include "pages/profile.php";
            break;

            case "results":
                include "pages/results.php";
            break;
            
            default:
                include "pages/redirect.php";
            break;
        }
    }
}
?>
