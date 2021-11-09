<?php
    include ("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- <base href="http://example.com/" /> -->
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=980,initial-scale=.4, user-scalable=1" />
        <meta name="google" content="translate" />
        <meta name="keywords" content="ARSENAL Lottery, ARSENAL Pick4, ARSENAL Lottery, ARSENAL Pick4, Lotto, Lottery, Toto, Gambling" />
        <meta name="description" content="ARSENAL - Online Lottery 4 Digit" />
        
        <title>ARSENAL - Legal Lottery</title>
        
        <link rel="Shortcut Icon" href="<?= BaseURL(); ?>/images/logo.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?= BaseURL(); ?>/style.css?v=0.0.4" type="text/css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            <div id="header_wrapper">
                <div id="logo">
                    <a href="<?= BaseURL(); ?>"><img src="<?= BaseURL(); ?>/images/logo.png" width="120" /></a>
                </div>
                <div id="top_menu_wrapper">
                    <div id="top_menu">
                        <a href="<?= BaseURL(); ?>">Home</a>
                        <span class="top_menu_border"> &nbsp;|&nbsp; </span>
                        <a href="<?= BaseURL(); ?>/responsible">Responsible Gambling</a>
                        <span class="top_menu_border"> &nbsp;|&nbsp; </span>
                        <a href="<?= BaseURL(); ?>/about">About Us</a>
                        <span class="top_menu_border"> &nbsp;|&nbsp; </span>
                        <a href="<?= BaseURL(); ?>/contact">Contact Us</a>
                    </div>
                    <!--end top_menu-->
                </div>
                <!--end top_menu_wrapper-->
                <h2>ARSENAL</h2>
                <div id="main_menu_wrapper">
                    <div id="main_menu">
                        <ul>
                            <li <?php echo $menu == "sunday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/sunday/1">Sunday</a></li>
                            <li <?php echo $menu == "monday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/monday/1">Monday</a></li>
                            <li <?php echo $menu == "tuesday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/tuesday/1">Tuesday</a></li>
                            <li <?php echo $menu == "wednesday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/wednesday/1">Wednesday</a></li>
                            <li <?php echo $menu == "thursday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/thursday/1">Thursday</a></li>
                            <li <?php echo $menu == "friday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/friday/1">Friday</a></li>
                            <li <?php echo $menu == "saturday" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/saturday/1">Saturday</a></li>
                            <li <?php echo $menu == "live-draw" ? 'class="active"' : '' ?>><a href="<?= BaseURL(); ?>/live-draw">Live Draw</a></li>
                        </ul>
                    </div>
                    <!--end main_menu-->
                </div>
                <!--end main_menu_wrapper-->
            </div>
            <!--end header_wrapper-->
        </div>
        <!--end header-->
        <div id="main">
            <div id="main_wrapper">
                <?php include ("pages/variable.php"); ?>

                <div id="bottom_content">
                    <div id="bottom_content_1" style="text-align: center;">
                        <img src="<?= BaseURL(); ?>/images/wla-logo.png" width="100%" />
                    </div>
                    <div id="bottom_content_1">
                        <div id="box1_bottomcontent">
                            <img src="<?= BaseURL(); ?>/images/numbers.png" />
                            <h3><a href="live.cgi">What Numbers to buy</a></h3>
                            <p>Translate your inspirations into lucky 4D numbers!</p>
                        </div>
                        <!--end box1_bottomcontent-->
                        <div id="box2_bottomcontent">
                            <img src="<?= BaseURL(); ?>/images/coin_chest.png" />
                            <h3><a href="index.php">Big Jackpot Winnings</a></h3>
                            <p>Find out where Jackpot winners bought their tickets.</p>
                        </div>
                        <!--end box1_bottomcontent-->
                        <div id="box3_bottomcontent">
                            <img src="<?= BaseURL(); ?>/images/coins.png" />
                            <h3><a href="live.cgi">Did i win ?</a></h3>
                            <p>Check if your numbers have won any prize.</p>
                        </div>
                        <!--end box1_bottomcontent-->
                        <div id="box4_bottomcontent">
                            <img src="<?= BaseURL(); ?>/images/mobile.png" />
                            <h3><a href="index.php">Results on Mobile</a></h3>
                            <p>Get 4D results on mobile phone.</p>
                        </div>
                        <!--end box1_bottomcontent-->
                    </div>
                    <!--end bottom_content_1-->
                    <div id="bottom-top">
                        <div class="item"><img src="<?= BaseURL(); ?>/images/apple.png" /><a href="http://www.apple.com/iphone/from-the-app-store" target="blank">Get ARSENAL on iPhone</a></div>
                        <!--end item-->
                        <div class="item"><img src="<?= BaseURL(); ?>/images/android.png" /><a href="https://play.google.com/store" target="blank">Get ARSENAL on android</a></div>
                        <!--end item-->
                        <div class="item"><img src="<?= BaseURL(); ?>/images/email.png" /><a href="mailto:info@arsenalottery.com">Get 4D Results via Email</a></div>
                        <!--end item-->
                        <div class="item"><img src="<?= BaseURL(); ?>/images/hp.png" /><a href="#">Get 4D Results on Mobile Phone</a></div>
                        <!--end item-->
                    </div>
                    <!--end bottom-top-->
                </div>
                <!--end bottom_content-->
                <div id="footer">
                    Copyright © 2020 <a href="http://arsenalottery.com">arsenalottery.com</a> Corporation All Rights Reserved.<br />
                    Recommended browser: <img src="http://icons.veryicon.com/128/Application/Pacifica/browser%20google%20chrome.png" width="15" /> Google Chrome
                </div>
                <!--end footer-->
            </div>
            <!--end main_wrapper-->
        </div>
        <!--end main-->
        <script type="text/javascript">
            $("#slideshow > div:gt(0)").hide();
            setInterval(function () {
                $("#slideshow > div:first").fadeOut(1000).next().fadeIn(1000).end().appendTo("#slideshow");
            }, 3000);
        </script>
    </body>
</html>
