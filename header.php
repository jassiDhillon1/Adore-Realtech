<?php 
session_start();

require 'admin/include/connection.php';
$baseUrl = 'https://adore.advertindia.co.in/';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
         $url.= $_SERVER['HTTP_HOST'];  
         $url.= $_SERVER['REQUEST_URI'];    

$link = $_SERVER['PHP_SELF'];

$link_array = explode('/',$link);
$page = end($link_array);

if(isset($_GET['bid'])){
    $id=$_GET['bid'];
    $stmts = $connect->prepare("SELECT * FROM blogs WHERE slug=?");
    $stmts->execute([$id]); 
    $lsit = $stmts->fetch();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adore Real Tech</title>

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="<?= $baseUrl?>assets/images/favicon.png" type="image/x-icon">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/aos.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/mobile.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/owlcarousel.min.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/sidebar.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/slick-slider.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="<?= $baseUrl?>assets/css/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <!--=====  JS SCRIPT LINK =======-->
    <script src="<?= $baseUrl?>assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>

<body class="homepage4-body">

    <!--===== PROGRESS STARTS=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </div>
    <!--===== PROGRESS ENDS=======-->

    <!--=====HEADER START=======-->
    <header>
        <div class="header-area homepage4 header header-sticky d-none d-lg-block " id="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-elements">
                            <div class="site-logo">
                                <a href="<?= $baseUrl?>"><img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt=""></a>
                            </div>
                            <div class="main-menu">
                                <ul>
                                    <li><a href="<?= $baseUrl?>">Home</a></li>
                                    <li><a href="<?= $baseUrl?>about-us.php">About Us</a></li>
                                    <li><a href="javascript:void(0);">Projects <i class="fa-solid fa-angle-down"></i></a>
                                        <ul class="dropdown-padding">
                                            <?php 
                                               foreach($connect->query("SELECT * FROM property_type") as $list){ 
                                            ?>
                                            <li class="menu-small"><a href="<?=$baseUrl?>list/<?=$list['ptype_slug']?>.php"><?=$list['ptype_name']?> </a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                    <li><a href="<?= $baseUrl?>career.php">Career </a></li>
                                    <li><a href="<?= $baseUrl?>blog.php">News/Media </a></li>
                                    <li><a href="<?= $baseUrl?>contact.php">Contact Us</a></li>
                                    <li><a href="<?= $baseUrl?>customer-support.php">Customer-Support</a></li>
                                     
                                </ul> 
                                
                                
                                
                            </div>
                            <div class="btn-area4">
                                <div class="search-icon header__search header-search-btn">
                                    <a href="#"> <span></span><img src="<?= $baseUrl?>assets/img/icons/search-icon1.svg" alt=""></a>
                                </div>
                            </div>

                            <div class="header-search-form-wrapper">
                                <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
                                <div class="header-search-container">
                                    <form role="search" action="<?=$baseUrl?>searched.php" method="post" class="search-form">
                                        <input type="text" class="search-field" placeholder="Search Properties…" value="" name="prop_name">
                                        <button type="submit" name="searchNow" class="search-submit"><img src="<?= $baseUrl?>assets/img/icons/search-icon1.svg" alt=""></button>
                                    </form>
                                </div>
                            </div>
                            <div class="body-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=====HEADER END =======-->

    <!--===== MOBILE HEADER STARTS =======-->
    <div class="mobile-header mobile-haeder4 d-block d-lg-none">
        <div class="container-fluid">
            <div class="col-12">
                <div class="mobile-header-elements">
                    <div class="mobile-logo">
                        <a href="<?= $baseUrl?>"><img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt=""></a>
                    </div>
                    <div class="mobile-nav-icon dots-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-sidebar mobile-sidebar4">
        <div class="logosicon-area">
            <div class="logos">
                <img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt="">
            </div>
            <div class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="mobile-nav mobile-nav1">
            <ul class="mobile-nav-list nav-list1">
                <li><a href="<?= $baseUrl?>">Home </a></li>
                <li><a href="<?= $baseUrl?>about-us.php">About</a></li>
                <li><a href="javascript:void(0);">Projects</a>
                    <ul class="sub-menu">
                        <?php 
                            foreach($connect->query("SELECT * FROM property_type") as $list){ 
                        ?>
                        <li class="menu-small"><a href="<?=$baseUrl?>list/<?=$list['ptype_slug']?>.php"><?=$list['ptype_name']?> </a></li>
                        <?php }?>
                        <!--<ul class="small-menu">-->
                        <!--    <li><a href="#">Luxury Projects</a></li>-->
                        <!--    <li><a href="#">Affordable Housing</a></li>-->
                        <!--</ul>-->
                        <!--<li class="menu-small"><a href="#">Commercial</a></li>-->
                        <!--<li class="menu-small"><a href="#">Industrial</a></li>-->
                    </ul>
                </li>
                <li><a href="<?= $baseUrl?>career.php">Career</a></li>
                <li><a href="<?= $baseUrl?>blog.php">News/Media</a></li>
                <li><a href="<?= $baseUrl?>contact.php">Contact Us</a></li>
                <li><a href="<?= $baseUrl?>customer-support.php">Customer-Support</a></li>
            </ul>
        </div>
    </div>
    <!--===== MOBILE HEADER STARTS =======-->