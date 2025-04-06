<?php include('header.php');


if (isset($_POST['searchNow'])) {
   
       $prop_name = $_POST['propertyname']; 
       $sql = "SELECT properties.*, builders.bldr_title, locations.loct_name, property_status.status_name FROM properties INNER JOIN builders ON properties.prop_builder = builders.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id WHERE properties.p_id = '$prop_name'  ORDER BY properties.sorting ASC";
       $stmt = $connect->prepare($sql);
       $stmt->execute($queryParams);
       $row = $stmt->rowCount();
       
       
    
//     $prop_type = $_POST['propertytype'];
//     $prop_location = $_POST['location1'];
//     $prop_status = $_POST['status'];

//     $whereConditions = [];
//     $queryParams = [];

  


//     if (!empty($prop_type)) {
        
        
        
//         $whereConditions[] = "properties.prop_type = :type";
//         $queryParams[':type'] = $prop_type;
//     }
    
//     // Check if location is provided
//     if (!empty($prop_location)) {
       
//         $whereConditions[] = "properties.prop_location = :location";
//         $queryParams[':location'] = $prop_location;
//     }

//     // Check if builder is provided
//     if (!empty($prop_status)) {
//         $whereConditions[] = "properties.prop_status = :status";
//         $queryParams[':status'] = $prop_status;
//     }

//     // Ensure at least one condition is provided
//     if (empty($whereConditions)) {
//         die("Please provide at least one search filter (project name, location, or builder).");
//     }

//     // Build the WHERE clause
//     $whereClause = "WHERE " . implode(" AND ", $whereConditions);

//     // Final SQL query with the joined tables
    
  
//     // echo "SELECT properties.*, builders.bldr_title, locations.loct_name, property_status.status_name FROM properties INNER JOIN builders ON properties.prop_builder = builders.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id $whereClause";

//     $sql = "SELECT properties.*, builders.bldr_title, locations.loct_name, property_status.status_name FROM properties INNER JOIN builders ON properties.prop_builder = builders.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id $whereClause ORDER BY properties.sorting ASC";

//     // Prepare the query
    
    
//     // echo $sql;
//     $stmt = $connect->prepare($sql);

//     // Execute the query with the parameters
//     $stmt->execute($queryParams);

//     // Get the result row count
//     $row = $stmt->rowCount();
}

?>

<!--===== HERO AREA STARTS =======-->
<div class="inner-main-hero-area">
    <div class="img1">
      <img src="<?= $baseUrl?>assets/img/bg/bredcurm-2.jpg" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="inner-heading header-heading">
                <h2>Searched Property</h2>
                <div class="space24"></div>
                <p><a href="<?= $baseUrl?>">Home <i class="fa-solid fa-angle-right"></i></a> <a href="javascript:void(0);">Searched Property</a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->

<div class="apartment6-section-area sp6 listing">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="apartmrnt-header text-center heading6 space-margin60">
                    <h2 class="text-anime-style-3" style="perspective: 400px;"><div class="split-line" style="display: block; text-align: center; position: relative;"><div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">T</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">h</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">e</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">L</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">e</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">g</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">c</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">y</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">w</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">e</div></div> <div style="position:relative;display:inline-block;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">c</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">a</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">r</div><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">y</div></div></div></h2>
                </div>
            </div>
        </div>
        <?php 
            $counter = 0;
            foreach($stmt as $list){
                $isOdd = ($counter % 2 != 0);
                $counter++;
        ?>
        <?php if ($isOdd): ?>
        <div class="row center-project d-flex align-items-center">
            <div class="col-xl-7 col-lg-7 col-md-12 position-relative">
                <img src="<?=$baseUrl?>admin/<?=$list['prop_cover']?>" alt="">
                <?php if($list['prop_status']== '9') {?>
                <div class="overlay">
                    <img src="<?=$baseUrl?>assets/icons/Stamp.svg" alt="" class="overlay-image">
                </div>
                <?php }else{}?>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 ">
                <div class="row">
                    <div class="option-name-inner crd" style="left: -30%;">
                        <div class="col-md-3 align-self-center">
                            <div class="option-content">
                                <img class="crd-logo" src="<?=$baseUrl?>admin/<?=$list['prop_logo']?>">
                            </div>
                        </div>
                        <div class="col-md-9 p-2">
                            <div class="option-meta crd-price-area option-content">
                                <h4><?=$list['prop_title']?></h4>
                                <ul>
                                    <li class="option-lokate"><span><i class="fa-solid fa-location-dot"></i> <?=$list['loct_name']?></span> </li>
                                </ul>
                                <p><?php echo implode(' ', array_slice(explode(' ', $list['prop_desc']), 0, 10)) . '...'; ?> </p>
                                <div class="btn-area1 mt-3 aos-init" data-aos="fade-left" data-aos-duration="1200">
                                    <a href="<?=$baseUrl?>property/<?=$list['prop_slug']?>.php" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="row center-project d-flex align-items-center">
            <div class="col-xl-5 col-lg-5 col-md-12 ">
                <div class="row">
                    <div class="option-name-inner crd" style="right: 30%;">
                        
                        <div class="col-md-9 p-2">
                            <div class="option-meta crd-price-area option-content">
                                <h4><?=$list['prop_title']?></h4>
                                <ul>
                                    <li class="option-lokate"><span><i class="fa-solid fa-location-dot"></i> <?=$list['loct_name']?></span> </li>
                                </ul>
                                <p><?php echo implode(' ', array_slice(explode(' ', $list['prop_desc']), 0, 10)) . '...'; ?></p>
                                <div class="btn-area1 mt-3 aos-init" data-aos="fade-left" data-aos-duration="1200">
                                    <a href="<?=$baseUrl?>property/<?=$list['prop_slug']?>.php" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 align-self-center">
                            <div class="option-content">
                                <img class="crd-logo" src="<?=$baseUrl?>admin/<?=$list['prop_logo']?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 position-relative">
                <img src="<?=$baseUrl?>admin/<?=$list['prop_cover']?>" alt="">
                <?php if($list['prop_status']== '9') {?>
                <div class="overlay overlay-left">
                    <img src="<?=$baseUrl?>assets/icons/Stamp.svg" alt="" class="overlay-image">
                </div>
                <?php }else{}?>
            </div>
        </div>
        <?php endif; ?>
        <?php }?>
    </div>
</div>

<?php include('footer.php')?>