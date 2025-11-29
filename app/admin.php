<?php
// admin.php

session_start();

if (!isset($_COOKIE['session_token'])) {
    header('Location: index.php');
    exit();
}

$config = require 'login-config.php';

$session_token = $_COOKIE['session_token'];
$expected_token = hash("sha256",($config['username'].$config['otp']));

if ($session_token !== $expected_token) {
    header('Location: logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratie - Hogeschool PXL</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style2.css">
    <style>
        @font-face {
            font-family: 'HelveticaNeueLTCom-HvEx';
            font-display: swap;
            src: url('neue-helvetica-bold-extended.woff2') format('woff2');
        }
        .nav_lijn {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }
        #top {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 101;
        }
        .logo {
            padding-top: 50px;
        }
        .hero-banner {
            width: 100%;
            height: 465px;
            background-image: url('background_1920x465.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div id="header">
        <div class="container" id="top">
            <div class="inner_container">
                <div class="search">
                    <div class="customselect activities">
                        <div class="listbox_title">
                            <span title="Overzicht" class="listbox_selected activities">Overzicht</span>
                            <svg class="dropDownSvgLayout"><polygon class="listbox-arrow" fill="#FFFFFF" points="2.68,5.811 0,3.4 0,0.03 3.04,2.77 3.98,3.62 4.01,3.6 4.96,2.74 8,0 8,3.37 5.32,5.779 5.3,5.8 5.31,5.811 3.99,7 "></polygon></svg>
                        </div>
                        <ul class="listbox_content activities">
                            <li title="Alle opleidingen"><a href="#">Alle opleidingen</a></li>
                            <li title="ProfDoc"><a href="#">ProfDoc</a></li>
                            <li title="Urgenties voor huisartsen en haio's"><a href="#">Urgenties voor huisartsen en haio's</a></li>
                            <li title="Endometriose binnenstebuiten gekeerd"><a href="#">Endometriose binnenstebuiten gekeerd</a></li>
                            <li title="Ontmoetings- en inspiratiemomenten aanvangsbegeleiding BaO (basisonderwijs)"><a href="#">Ontmoetings- en inspiratiemomenten aanvangsbegeleiding BaO (basisonderwijs)</a></li>
                            <li title="ANTIWITWAS EN KWALITEITSTOETSING"><a href="#">ANTIWITWAS EN KWALITEITSTOETSING</a></li>
                            <li title="Didactische basis: Taalontwikkelend lesgeven"><a href="#">Didactische basis: Taalontwikkelend lesgeven</a></li>
                            <li title="DEONTOLOGIE VOOR ACCOUNTANTS"><a href="#">DEONTOLOGIE VOOR ACCOUNTANTS</a></li>
                        </ul>
                    </div>
                    <div class="congress_login"><a title="Afmelden" href="logout.php">Afmelden</a></div>
                    <div class="languages"><a title="Nederlands" href="#">NL</a> | <a title="Français" href="#">FR</a> | <a title="English" href="#">EN</a></div>
                </div>
            </div>
        </div>
        <div class="nav_lijn">
            <div class="container" id="nav1_container">
                <div class="inner_container">
                    <div class="logo">
                        <a title="Logo" href="https://www.pxl.be"><img alt="School logo" src="https://www.hogeschoolpxl.be/img/logo_98.png" height="100" width="100"></a>
                    </div>
                    <div class="nav">
                        <ul class="nav_list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav2_lijn">
            <div class="container" id="nav2_container">
                <div class="nav2">
                    <ul class="nav2_list">
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-banner"></div>

    <div class="container" id="content_outer_container">
        <div class="content_inner_top transp-white" style="background: rgba(255, 255, 255, 0.8) !important;">
            <div class="block-title clearfix">
                <h1 title="Administratie">Administratie</h1>
            </div>
        </div>
        <div class="content_inner_container">
            <div id="content">
                <div class="success-message">
                    U bent succesvol aangemeld!
                </div>

                <div class="block">
                    <div class="title">
                        <h2 title="Welcome">Welcome to the administrative area</h2>
                    </div>
                    <div class="content">
                        <p>You have successfully authenticated</p>

                        <div class="form-row">
                            <a href="logout.php" class="btn-green" title="Afmelden">Afmelden</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_lijn">
        <div class="container" id="footer_container">
            <div class="inner_container">
                <div class="footer clearfix">
                    <div class="contact_info">
                        <img class="logo" alt="logo pxl" src="https://www.hogeschoolpxl.be/img/logo_98.png" width="98" height="98">
                        <div class="footer_tekst">
                            <p>© Hogeschool PXL</p>
                            <p>Elfde-Liniestraat 24</p>
                            <p>B-3500 HASSELT</p>
                            <p>tel:+32 11 77 55 55</p>
                            <p><a href="mailto:pxl@pxl.be">pxl@pxl.be</a></p>
                        </div>
                        <div class="icons">
                            <a target="_blank" href="#"><img alt="facebook" src="https://www.hogeschoolpxl.be/img/social_media/Facebook.png"></a>
                            <a target="_blank" href="#"><img alt="instagram" src="https://www.hogeschoolpxl.be/img/social_media/Instagram.png"></a>
                            <a target="_blank" href="#"><img alt="linkedin" src="https://www.hogeschoolpxl.be/img/social_media/Linkedin.png"></a>
                            <a target="_blank" href="#"><img alt="snapchat" src="https://www.hogeschoolpxl.be/img/social_media/Snapchat.png"></a>
                            <a target="_blank" href="#"><img alt="twitter" src="https://www.hogeschoolpxl.be/img/social_media/twitter.png"></a>
                            <a target="_blank" href="#"><img alt="youtube" src="https://www.hogeschoolpxl.be/img/social_media/Youtube.png"></a>
                        </div>
                    </div>

                    <div class="quicklinks_box1 quicklinks">
                        <h3>PXL</h3>
                        <ul class="styled">
                            <li><a href="#">Bereikbaarheid</a></li>
                            <li><a href="#">Ik heb een vraag</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Pers</a></li>
                            <li><a href="#">Huisstijl</a></li>
                            <li><a href="#">Expertisecellen</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Bedrijven en organisaties</a></li>
                            <li><a href="#">Blijf op de hoogte</a></li>
                            <li><a href="#">Privacyverklaring</a></li>
                        </ul>
                    </div>

                    <div class="quicklinks_box2 quicklinks">
                        <h3>Departementen</h3>
                        <ul class="styled">
                            <li><a href="#">PXL-Business</a></li>
                            <li><a href="#">PXL-Digital</a></li>
                            <li><a href="#">PXL-Education</a></li>
                            <li><a href="#">PXL-Green &amp; Tech</a></li>
                            <li><a href="#">PXL-Healthcare</a></li>
                            <li><a href="#">PXL-MAD School of Arts</a></li>
                            <li><a href="#">PXL-Media &amp; Tourism</a></li>
                            <li><a href="#">PXL-Music</a></li>
                            <li><a href="#">PXL-People &amp; Society</a></li>
                        </ul>
                    </div>

                    <div class="quicklinks_box3 quicklinks">
                        <h3>Toekomstige Studenten</h3>
                        <ul class="styled">
                            <li><a href="#">PXL-opleidingen</a></li>
                            <li><a href="#">Brochures</a></li>
                            <li><a href="#">Infodagen</a></li>
                            <li><a href="#">Openlesdagen</a></li>
                            <li><a href="#">SID-in</a></li>
                            <li><a href="#">Info aanvragen</a></li>
                            <li><a href="#">Inschrijvingen</a></li>
                            <li><a href="#">Graduaatsopleidingen</a></li>
                        </ul>
                    </div>

                    <div class="quicklinks_box4 quicklinks">
                        <h3>Studenten</h3>
                        <ul class="styled">
                            <li><a href="#">PXL-Catering</a></li>
                            <li><a href="#">Jaarplanning</a></li>
                            <li><a href="#">Laptopdienst</a></li>
                            <li><a href="#">Stuvers</a></li>
                            <li><a href="#">Ondernemen</a></li>
                        </ul>
                    </div>

                    <div class="quicklinks_box5 quicklinks">
                        <h3>Personeel</h3>
                        <ul class="styled">
                            <li><a href="#">Webmail</a></li>
                            <li><a href="#">Huisstijl</a></li>
                            <li><a href="#">Personeelssite</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
