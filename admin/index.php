<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>


<?php 

  $query = "SELECT property_type.ptype_name, COUNT(properties.p_id) AS count 
              FROM properties 
              JOIN property_type ON properties.prop_type = property_type.id 
              GROUP BY properties.prop_type";
              
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Prepare data for chart
    $types = [];
    $counts = [];
    
    foreach ($results as $row) {
        $types[] = $row['ptype_name'];
        $counts[] = $row['count'];
    }

?>
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>Adore Real Tech Dashboard</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="../img/dummy-admin.png" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">Adore Real Tech</h5>
                                                <p class="text-muted mb-0 text-truncate">Real Estate company</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div style="width: 70%; margin: auto;">
    <canvas id="propertyBarChart"></canvas>
</div>
                            </div>
                            <!--<div class="col-xl-8">-->
                            <!--    <div class="row">-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="card mini-stats-wid">-->
                            <!--                <div class="card-body">-->
                            <!--                    <div class="d-flex">-->
                            <!--                        <div class="flex-grow-1">-->
                            <!--                            <p class="text-muted fw-medium">Orders</p>-->
                            <!--                            <h4 class="mb-0">1,235</h4>-->
                            <!--                        </div>-->

                            <!--                        <div class="flex-shrink-0 align-self-center">-->
                            <!--                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">-->
                            <!--                                <span class="avatar-title">-->
                            <!--                                    <i class="bx bx-copy-alt font-size-24"></i>-->
                            <!--                                </span>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="card mini-stats-wid">-->
                            <!--                <div class="card-body">-->
                            <!--                    <div class="d-flex">-->
                            <!--                        <div class="flex-grow-1">-->
                            <!--                            <p class="text-muted fw-medium">Revenue</p>-->
                            <!--                            <h4 class="mb-0">$35, 723</h4>-->
                            <!--                        </div>-->

                            <!--                        <div class="flex-shrink-0 align-self-center ">-->
                            <!--                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">-->
                            <!--                                <span class="avatar-title rounded-circle bg-primary">-->
                            <!--                                    <i class="bx bx-archive-in font-size-24"></i>-->
                            <!--                                </span>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="card mini-stats-wid">-->
                            <!--                <div class="card-body">-->
                            <!--                    <div class="d-flex">-->
                            <!--                        <div class="flex-grow-1">-->
                            <!--                            <p class="text-muted fw-medium">Average Price</p>-->
                            <!--                            <h4 class="mb-0">$16.2</h4>-->
                            <!--                        </div>-->

                            <!--                        <div class="flex-shrink-0 align-self-center">-->
                            <!--                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">-->
                            <!--                                <span class="avatar-title rounded-circle bg-primary">-->
                            <!--                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>-->
                            <!--                                </span>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                                <!-- end row -->
                            <!--</div>-->
                        </div>
                        <!-- end row -->


                        
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<?php include('include/themesetting.php');?>
<?php include('include/footer.php');?>