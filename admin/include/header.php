<?php 

$baseUrl = "https://adore.advertindia.co.in/admin/";
    require 'include/connection.php';
    session_start();
    if (!isset($_SESSION['fname'])) {
        header('location:auth/login.php');
    }
    
    
    /* Code for managing the builder function  */

    if(isset($_POST['Builder_edit_btn'])){
        $id = $_POST['blid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM builders WHERE id=?");
        $stmt1->execute([$id]);
        $builder = $stmt1->fetch();
    
    }
     /* Code for managing the builder function  */

    if(isset($_POST['location_edit_btn'])){
        $id = $_POST['llid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM locations WHERE id=?");
        $stmt1->execute([$id]);
        $location = $stmt1->fetch();
        
    }
    /* Code for managing the property type function  */

    if(isset($_POST['pt_edit_btn'])){
        $id = $_POST['plid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM property_type WHERE id=?");
        $stmt1->execute([$id]);
        $proptype = $stmt1->fetch();
        
    }
    
    /* Code for managing the Property Status function  */

    if(isset($_POST['ps_edit_btn'])){
        $id = $_POST['psid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM property_status WHERE id=?");
        $stmt1->execute([$id]);
        $propstatus = $stmt1->fetch();
        
    }
    
    /* Code for managing the Property Status function  */
    if(isset($_POST['psc_edit_btn'])){
        $id = $_POST['psid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM property_spec WHERE id=?");
        $stmt1->execute([$id]);
        $propspec = $stmt1->fetch();
        
       
    }
    /* Gallery Management */
   if(isset($_REQUEST['pgid'])){
    
        $id = $_REQUEST['pgid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM property_gallery WHERE prop_id=?");
        $stmt1->execute([$id]);
        $propgallery = $stmt1->fetch();
       
         
     
    }
    if(isset($_REQUEST['pfid'])){
    
        $id = $_REQUEST['pfid'];
        // die($id);
        $stmt1 = $connect->prepare("SELECT * FROM floor_plans WHERE prop_id=?");
        $stmt1->execute([$id]);
        $propfloor = $stmt1->fetch();
       
         
     
    }
    if(isset($_GET['pdid'])){
    
        $id = $_GET['pdid'];
        $stmt1 = $connect->prepare("SELECT * FROM document WHERE property_id=?");
        $stmt1->execute([$id]);
        $document = $stmt1->fetch();
        
     
       
    }
     if(isset($_POST['property_edit_btn'])){
        $id = $_POST['edit_pid'];
        
        $stmt1 = $connect->prepare("SELECT * FROM properties WHERE p_id=?");
        $stmt1->execute([$id]);
        $propData = $stmt1->fetch();
       
         
     
    }
    if(isset($_POST['blog_edit_btn'])){
        $id = $_POST['edit_bid'];
        // die($id);
         $stmt1 = $connect->prepare("SELECT * FROM blogs WHERE id=?");
         $stmt1->execute([$id]);
         $blogData = $stmt1->fetch();
        //  echo $blogData['meta_title'];
        //  die();
    }
    
    if(isset($_POST['banner_edit_button'])){
        $id = $_POST['bnid'];
        // die($id);
         $stmt1 = $connect->prepare("SELECT * FROM home_banner WHERE id=?");
         $stmt1->execute([$id]);
         $bannerData = $stmt1->fetch();
        //  echo $blogData['meta_title'];
        //  die();
    }


     if(isset($_POST['abt_edit_button'])){
            $id = $_POST['abt_id'];
            // die($id);
             $stmt1 = $connect->prepare("SELECT * FROM `home_about` WHERE id=?");
             $stmt1->execute([$id]);
             $aboutData = $stmt1->fetch();
            
        }
        
         if(isset($_POST['stat_edit_button'])){
            $id = $_POST['sid'];
            // die($id);
             $stmt1 = $connect->prepare("SELECT * FROM `home_stats` WHERE id=?");
             $stmt1->execute([$id]);
             $statId = $stmt1->fetch();
            
        }
        
        if(isset($_POST['mid_edit_button'])){
             $id = $_POST['mid'];
             $stmt1 = $connect->prepare("SELECT * FROM `media` WHERE id=?");
             $stmt1->execute([$id]);
             $media = $stmt1->fetch();
            
        }
        
         if(isset($_POST['pop_edit_button'])){
             $id = $_POST['popid'];
             $stmt1 = $connect->prepare("SELECT * FROM `home_popup` WHERE pop_id=?");
             $stmt1->execute([$id]);
             $pop = $stmt1->fetch();
            
        }
?>
<!doctype html>
<html lang="en">    
<head>
        
        <meta charset="utf-8" />
        <title>Adore Real Tech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
         <script src="assets/ckeditor/ckeditor.js"></script>
         <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
             <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>

    <body data-sidebar="dark" data-layout-mode="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt="" style="height: 66px;
    background: white;
    padding: 4px;
    border-radius: 3px;
    margin-top: 16px;">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= $baseUrl?>assets/images/logo/adore_logo.png" alt="" style="height: 66px;
    background: white;
    padding: 4px;
    border-radius: 3px;
    margin-top: 16px;">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <!--<form class="app-search d-none d-lg-block">-->
                        <!--    <div class="position-relative">-->
                        <!--        <input type="text" class="form-control" placeholder="Search...">-->
                        <!--        <span class="bx bx-search-alt"></span>-->
                        <!--    </div>-->
                        <!--</form>-->
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                        

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--<img class="rounded-circle header-profile-user" src="../img/dummy-admin.png"-->
                                <!--    alt="Header Avatar">-->
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Adore Real Tech</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="auth/logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="bx bx-cog bx-spin"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>
