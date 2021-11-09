<?php
    session_start();
    require_once ("../config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <link rel="shortcut icon" href="<?php echo BaseURL() ?>/images/favicon.png">

    <link href="<?php echo BaseURL() ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/editor/external/google-code-prettify/prettify.css?v=0.0.1" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/editor/index.css?v=0.0.1" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?php echo BaseURL() ?>/css/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BaseURL() ?>/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BaseURL() ?>/css/select/select2.min.css" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo BaseURL() ?>/css/default.css?v=0.0.1" rel="stylesheet">
    <link href="<?php echo BaseURL() ?>/css/progressbar/bootstrap-progressbar-3.3.0.css" rel="stylesheet" type="text/css">
    <link href="<?php echo BaseURL() ?>/plugins/data-tables/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">

    <script src="<?php echo BaseURL() ?>/js/jquery.min.js"></script>
    <script src="<?php echo BaseURL() ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo BaseURL() ?>/js/nprogress.js"></script>
    <script src="<?php echo BaseURL() ?>/js/jasny-bootstrap.min.js"></script>
    <script src="<?php echo BaseURL() ?>/lib/script/jquery.form.js"></script>
    <script src="<?php echo BaseURL() ?>/plugins/data-tables/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTables').DataTable();
        })
    </script>
</head>
<body class="nav-md">
    <?php
    if(isset($_SESSION['username']) and isset($_SESSION['password'])){
        if(isset($_GET['menu'])){
            $menu = $_GET['menu'];
        }
        else{
            $menu = "";
        }
        if($menu == "server-error"){
            include ("pages/page_error_database.php");
        }
        else if($menu == "error-page"){
            include ("pages/page_error.php");
        }
        else{
            include ("pages/page.php");
        }
    }
    else {
        include ("login.php");
    }
    include ("javascript.php");
    ?>
</body>
</html>