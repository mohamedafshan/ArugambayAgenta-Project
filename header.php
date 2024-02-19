<?php
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $url));
$countDir = count($urlParts);

$backs = $countDir-2;
if($backs == 1){
$dirBack = '../';
} else if($backs == 2){
$dirBack = '../../';
} else if($backs == 3){
$dirBack = '../../../';
} else if($backs == 4){
$dirBack = '../../../../';
} else if($backs == 5){
$dirBack = '../../../../../';
} else if($backs == 6){
$dirBack = '../../../../../../';
} else{
$dirBack = '/';
}
?>
<head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Adventure, Tours, Travel">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>Gowilds - Tours and Travel HTML Template</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo $dirBack; ?> assets/images/favicon.ico" type="image/png">
        <!--====== Google Fonts ======-->
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!--====== Flaticon css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/fonts/flaticon/flaticon_gowilds.css">
        <!--====== FontAwesome css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/fonts/fontawesome/css/all.min.css">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--====== magnific-popup css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/magnific-popup/dist/magnific-popup.css">
        <!--====== Slick-popup css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/slick/slick.css">
        <!--====== Jquery UI css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/jquery-ui/jquery-ui.min.css">
        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/nice-select/css/nice-select.css">
        <!--====== Animate css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/vendor/animate.css">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/css/default.css">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="<?php echo $dirBack; ?> assets/css/style.css">
    </head>
    <!--====== Start Header ======-->
<header class="header-area header-one black-bg mt-1">
            <!--====== Header Navigation ======-->
            <div class="header-navigation navigation-white">
                <div class="nav-overlay"></div>
                <div class="container-fluid">
                <div class="primary-menu">
                        <!--====== Site Branding ======-->
                        <div class="site-branding mt-20">
                            <a href="index.php" class="brand-logo"><img src="<?php echo $dirBack; ?> assets/images/logo/Arulogo_header.png"alt="Site Logo"></a>
                        </div>
                        <!--====== Nav Menu ======-->
                        <div class="nav-menu">
                            <!--====== Site Branding ======-->
                            <div class="mobile-logo mb-30 d-block d-xl-none">
                                <a href="index.php" class="brand-logo"><img src="" alt="Site Logo"></a>
                            </div>
                            <!--=== Nav Search ===-->
                            <div class="nav-search mb-30 d-block d-xl-none ">
                                <form>
                                    <div class="form_group">
                                        <input type="email" class="form_control" placeholder="Search Here" name="email" required>
                                        <button class="search-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!--====== main Menu ======-->
                            <nav class="main-menu">
                                <ul>
                                    <li class="menu-item"><a href="index.php">Home</a>
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Tours</a>
                                        <ul class="sub-menu">
                                            <li><a href="wildlife&eco.php">Wildlife & Eco Tours</a></li>
                                            <li><a href="experiential.php">Experiential </a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children"><a href="surfing.php">Surfing</a>
                                        
                                    </li>
                                    <li class="menu-item has-children"><a href="must_see.php">Must See</a>
                                       
                                    </li>
                                    <li class="menu-item has-children"><a href="#">Ride with us</a>
                                       
                                    </li>

                                    <li class="menu-item has-children"><a href="#">Our Giving Back</a>
                                       
                                    </li>
                                      <li class="menu-item has-children"><a href="contact.php">Contact Us</a>
                                       
                                    </li>
                                </ul>
                            </nav>
                            <!--====== Menu Button ======-->
                            <!-- <div class="menu-button mt-40 d-xl-none">
                                <a href="contact.php" class="main-btn secondary-btn">Book Now<i class="fas fa-paper-plane"></i></a>
                            </div> -->
                        </div>
                        <!--====== Nav Right Item ======-->
                        <div class="nav-right-item">
                            <!-- <div class="menu-button d-xl-block d-none">
                                <a href="contact.php" class="main-btn primary-btn">Book Now<i class="fas fa-paper-plane"></i></a>
                            </div> -->
                            <div class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</header><!--====== End Header ======-->