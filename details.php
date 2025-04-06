<?php
include('header.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM properties INNER JOIN property_type ON properties.prop_type = property_type.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id WHERE prop_slug=?");
    $stmt->execute([$id]); 
    $property = $stmt->fetch();
}
?>

<!--===== BREDCRM AREA STARTS =======-->
    <?php 
    $propid = $property['p_id'];
    ?>
    <?php
  if($property['vedio_status'] == 'on'){
?>

<div class="main-hero-area">
    <div class="video-container">
        <?= $property['vedio_url']?>
    </div>
</div>
<!--video-end-->
<?php } else {?>
<div class="header-carousel-area2 owl-carousel">

<!--video-area-->



    <div class="main-hero-area">
      <div class="img1">
        <img src="<?=$baseUrl?>admin/<?=$property['prop_cover']?>" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-5 offset-lg-6">
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
  <?php }?>
<!--===== BREDCRM AREA ENDS =======-->


<!---------header---------->

<section>
    
<div class="homepage3-body">
    
    <header>
    <div class="header-area homepage3 header header-sticky d-none d-lg-block sticky" id="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav id="navbar-example2" class="navbar">
            <div class="header-elements">
              <div class="site-logo">
                <a href="<?=$baseUrl?>"><img src="<?=$baseUrl?>admin/<?=$property['prop_logo']?>" alt=""></a>
              </div>
              <div class="main-menu">
                <ul>
                    
                     <?php 
                     
                     
                        $propidd = $property['p_id'];
                        $statement1 = $connect->query("SELECT * FROM floor_plans WHERE prop_id = '$propidd'");
                        $numRows1 = $statement1->rowCount();
                     
                        $statement2 = $connect->query("SELECT * FROM property_gallery WHERE prop_id = '$propidd'");
                        $numRows2 = $statement2->rowCount();
                        
                       if($property['prop_desc'] != ''){
                     
                     ?>
                    <li class="nav-item"><a href="#property" class="nav-link active"><span>About Property</span></a></li>
                    
                    <?php } if ($property['prop_amenities'] != ''){?>
                    <li class="nav-item"><a href="#amenities" class="nav-link"><span>Amenities</span></a></li>
                    
                    <?php } if($numRows1 > 1){ ?>
                    <li class="nav-item"><a href="#floor-plan" class="nav-link"><span>Floor Plan</span></a></li>
                    
                    <?php } if($property['prop_site_plan'] != '') {?>
                    <li class="nav-item"><a href="#site-plan" class="nav-link"><span>Site Plan</span></a></li>
                    
                    <?php } if($property['prop_location_map'] != '') {?>
                    <li class="nav-item"><a href="#map" class="nav-link"><span>Location Map</span></a></li>
                     <?php }  if($numRows2 > 1) {?>
                    <li class="nav-item"><a href="#projectgallery" class="nav-link"><span>Gallery</span></a></li>
                    
                    <?php } ?>
                </ul>
              </div>
              <div class="btn-area-author">
                <div class="search-icon header__search header-search-btn">
                  <a href="#"><img src="assets/img/icons/search-icon1.svg" alt=""> <span></span></a>
                </div>
              
              </div>

              <div class="header-search-form-wrapper">
                <div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
                <div class="header-search-container">
                    <form role="search" class="search-form">
                    <input type="search" class="search-field" placeholder="Search …" value="" name="s">
                    <button type="submit" class="search-submit"><img src="<?= $baseUrl?>assets/img/icons/search-icon1.svg" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="body-overlay"></div>
            </div>
        </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
    
</div>
</section>


<!-------end----header----->
<div class="project-single ">
            <div class="container-fluid">
                <div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="right-projects">
                            <div class="project-history">
                                <div class="project-name">
                                    <ul>
                                        <li class="title"><i class="fa-solid fa-home"></i> Adore <?=$property['prop_title']?></li>
                                        <li><i class="fa-solid fa-location-dot"></i>Location  <?=$property['loct_name']?></li>
                                        <li><i class="fa-regular fa-building"></i> Property Type : <?=$property['ptype_name']?></li>
                                        <li><i class="fa-solid fa-signal"></i> Status : <?=$property['status_name']?></li>
                                        <!--<li><i class="fa-solid fa-tag"></i>3.5 Cr. Onwards</li>-->
                                        <li><i class="fa-solid fa-expand"></i> Size: <?=$property['prop_area']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>        

<!-----overview------->

<div class="apartment-details-left sp15" id="property">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="apartment-author-area pdright">
                    <!--<div class="img1">-->
                    <!--    <video class="elementor-video" src="assets/images/property/prop-vdo.mp4" autoplay="" loop="" muted="muted" playsinline="" controlslist="nodownload"></video>-->
                    <!--</div>-->
                      <div class="space40"></div>
                    <div class="detail-overvew h-3-heading heading3 detail-page">
                    <h3>Overview</h3>
                    <div class="space30"></div>
                    <p><?=$property['prop_desc']?></p>
                 
                    </div>
                    
                    
    
   <!------------------------------------------------------------------->
                    
                    
                    
                      <div class="space60"></div>
                    <?php
                    if($property['prop_amenities'] != ''){
                    
                    ?>
                    <div class="detail-amenities" id="amenities">
                          <h3 class="mb-3"> Amenities</h3>
                    <div class="space20"></div>
                    <!--<p>Apartments provide range of exceptional amenities designed to enhance the quality of life for its residents. Here’s a we have  list of the amenities offered:</p>-->
                    <div class="space20"></div>
                    <div class="row">
                        <?php 
                      $amenties_arry = (json_decode($property['prop_amenities']));
                       foreach($connect->query("SELECT * FROM property_spec ") as $pro){
                           if(in_array($pro['id'],$amenties_arry)){
                       ?>
                        <div class="col-lg-2 col-md-2">
                            <div class="list-area">
                                <div class="icons">
                                    <img src="<?=$baseUrl?>admin/<?=$pro['spec_image']?>" alt="">
                                </div>
                                <div class="text">
                                    <a href="#"> <?=$pro['spec_name']?> </a>
                                </div>
                            </div>
                        </div>
                        <?php } }?>
                        
                    </div>
                    
                    </div>
                    
                    <?php }?>
    <!---------------------------------------------------------------->
                    
                    
                    
                  <div class="space60"></div>
                  
                  
                  <?php 
                  $propidd = $property['p_id'];
                    $statement = $connect->query("SELECT * FROM floor_plans WHERE prop_id = '$propid'");
                    $numRows = $statement->rowCount();
                    if($numRows > 0){
                  
                  ?>
                    <div class="detail-overvew h-3-heading floor-paln" id="floor-plan">
                   
                    <h3>Floor Plans</h3>
                    
                    <div class="row">
                        <?php 
                            $propid = $property['p_id'];
                            foreach($connect->query("SELECT * FROM floor_plans WHERE prop_id = '$propid'") as $floor){ ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="images-area">
                                <h5><?=$floor['floor_image']?></h5>
                               <div class="img1">
                                   <a data-fancybox="gallery-images" href="<?=$baseUrl?>admin/<?=$floor['floor_name']?>">
                                       <img src="<?=$baseUrl?>admin/<?=$floor['floor_name']?>" alt="">
                                   </a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    
                    
                    <section class="" >
    

 <div class="">
      <div class="space60"></div>
      <?php if($property['prop_price_list'] != ''){?>
            <div class=" h-3-heading ">       
                    <div class="space10"></div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="images-area">
                               <div class="col-lg-12">
                            <?=$property['prop_price_list']?>
                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
      <?php }?>
</div>


</section>
                    
                    
                    </div>
                    <?php }?>
                    <div class="space60"></div>
                    
                    <?php  if($property['prop_site_plan'] != ''){?>
                    <div class="detail-overvew h-3-heading floor-paln" id="site-plan">
                        <h3>Site Plan</h3>
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-md-9">
                                <div class="images-area">
                                   <div class="img1">
                                       <a data-fancybox="siteplan-images" href="<?= $baseUrl?>admin/<?=$property['prop_site_plan']?>">
                                           <img style="height:auto !important" src="<?= $baseUrl?>admin/<?=$property['prop_site_plan']?>" alt="" />
                                       </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>






<div class="apartment-details-left " id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="apartment-author-area pdright">
                  
                    
                    <div class="detail-amenities downloads">
                          <h3 class="mb-3"> Downloads</h3>
                    <div class="space20"></div>
                    <div class="space20"></div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="list-area" type="button" class="btn btn-primary pop-upp" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="icons">
                                    <img src="<?= $baseUrl?>assets/icons/brochure.png" alt="">
                                </div>
                                <div class="text">
                                    <a href="<?= $baseUrl?>admin/<?=$property['prop_brochure']?>">Brochure</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    </div>
                  <div class="space90"></div>
                 
                </div>
            </div>
  
        </div>
    </div>
</div>

<?php 
$propidd = $property['p_id'];
$statement = $connect->query("SELECT * FROM document WHERE property_id = '$propidd' AND status = 1");
$numRows = $statement->rowCount();
if($numRows > 0){
?>
<div class="apartment-details-left " id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="apartment-author-area pdright">
                    <div class="detail-amenities downloads">
                        <h3 class="mb-3"> Project Documentation</h3>
                    <div class="space20"></div>
                    <div class="space20"></div>
                    <div class="row">
                        <?php 
                        $propid = $property['p_id'];
                        // echo "SELECT * FROM document WHERE property_id = '$propid' AND status = 1";
                        foreach($connect->query("SELECT * FROM document WHERE property_id = '$propid' AND status = 1") as $doc){ ?>
                        <div class="col-lg-3 col-md-3">
                            <div  class="documentation list-area">
                               
                                <div class="text">
                                    <a class="name" target="_blank" href="<?= $baseUrl?>admin/<?=$doc['document_path']?>"><?=$doc['document_name']?></a><i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        
                        <!--<div class="col-lg-3 col-md-3">-->
                        <!--    <div type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="documentation list-area" >-->
                               
                        <!--        <div class="text">-->
                        <!--            <a class="name" href="#">RERA Approval</a><i class="fas fa-arrow-right"></i>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="col-lg-3 col-md-3">-->
                        <!--    <div type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="documentation list-area" >-->
                               
                        <!--        <div class="text">-->
                        <!--            <a class="name" href="#">Building Plan</a><i class="fas fa-arrow-right"></i>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div><div class="col-lg-3 col-md-3">-->
                        <!--    <div type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="documentation list-area">-->
                               
                        <!--        <div class="text">-->
                        <!--            <a class="name" href="#">ENV. Clearance</a><i class="fas fa-arrow-right"></i>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                    
                    </div>
                  <div class="space90"></div>
                 
                </div>
            </div>
  
        </div>
    </div>
</div>

<?php }?>

<!--location--map-->

<div class="property-section-area sp1" id="map">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
        <div class="row">
          <div class="col-lg-6">
            <div class="property-header heading1">
              <h3 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Location Map</h3>
              <div class="space30"></div>
                <?=$property['prop_location_adv']?>
              
              <div class="space32"></div>
             
            </div>
          </div>

          <div class="col-lg-6">
            <div class="property-images-area">
              <div class="img1 reveal image-anime" style="opacity: 1; visibility: inherit; translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                <img src="<?= $baseUrl?>admin/<?=$property['prop_location_map']?>" alt="" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>









<?php

$propidd = $property['p_id'];
$statement = $connect->query("SELECT * FROM property_gallery WHERE prop_id = '$propidd'");
$numRows = $statement->rowCount();
if($numRows > 0){
    ?>
<div class="footer2-section-area h-3-heading mt-5" id="projectgallery">
  <div class="container ">
     <div class="row heading-container">
        <div class="col-md-6 left-heading1">
            <h3 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Project Gallery</h3>
        </div>
        <!--<div class="col-md-6 right-heading1">-->
        <!--    <h3 data-aos="fade-right" data-aos-duration="800" class="aos-init aos-animate">Construction Update</h3>-->
        <!--</div>-->
    </div>
              
    <div class="row">
      <div class="col-lg-12">
        <div class="footer-instagram-area">
            <div class="row">
              <div class="col-lg-12">
                <div class="instagram-posts-slider owl-carousel">
                        <?php 
                        $propid = $property['p_id'];
                        foreach($connect->query("SELECT * FROM property_gallery WHERE prop_id = '$propid'") as $gal){ ?>
                        <a href="<?=$baseUrl?>admin/<?=$gal['gallery_image']?>" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="<?=$baseUrl?>admin/<?=$gal['gallery_image']?>" alt="">
                            </div>
                          </div>
                      </a>
                      <?php }?>
                      
                       
                      
                      
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<?php 

$result = $connect->query("SELECT * FROM construction_title WHERE construction_prop_id = '$propid'");

// Get the row count
$rowCount = $result->rowCount();

// echo $rowCount;
if($rowCount != '0'){
?>
<div class="footer2-section-area h-3-heading" id="construction-updates">
  <div class="container detail-overvew mb-5">
     <div class="row heading-container">
        <div class="col-md-12 text-center">
            <h3 data-aos="fade-left" data-aos-duration="800" class="aos-init aos-animate">Construction Updates</h3>
        </div>
        <!--<div class="col-md-6 right-heading1">-->
        <!--    <h3 data-aos="fade-right" data-aos-duration="800" class="aos-init aos-animate">Construction Update</h3>-->
        <!--</div>-->
    </div>
              
    <div class="row">
      <div class="col-lg-12">
               <ul class="nav nav-pills mb-3 nv-tabs pt-3" id="pills-tab" role="tablist">
                   
                   
                   <?php 
                   $j=1;
                      foreach($connect->query("SELECT * FROM construction_title WHERE construction_prop_id = '$propid' ORDER BY id DESC") as $cons){ ?>
                   
                   ?>
                   
              <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo ($j == 1) ? 'active' : ''; ?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#detail_const<?= $cons['id'] ?>" type="button" role="tab" aria-controls="jan24" aria-selected="true"><?= $cons['construction_title'] ?></button>  </li>
  
  <?php 
    $j++;
  }?>
<!--  <li class="nav-item" role="presentation">-->
<!--    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#jun24" type="button" role="tab" aria-controls="jun24" aria-selected="false">Jun 2024-->
<!--</button>-->
<!--  </li>-->
  
  
</ul>

      </div>
    </div>
            
              
<div class="tab-content" id="pills-tabContent">
    <?php 
        $k=1;
        foreach($connect->query("SELECT * FROM construction_title WHERE construction_prop_id = '$propid'  ORDER BY id DESC") as $cons){ ?>
    
        <div class="tab-pane fade<?php echo ($k == 1) ? 'show active' : ''; ?>" id="detail_const<?= $cons['id'] ?>" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      
      <div class="row">
          <?php 
          
            $constmain = $cons['id'];
             foreach($connect->query("SELECT * FROM `construction` WHERE construction_title = '$constmain'") as $consimage){ ?>
      
        <div class="col-lg-4 col-md-6 mb-4">
             <a href="<?=$baseUrl?>admin/<?=$consimage['construction_image']?>" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="<?=$baseUrl?>admin/<?=$consimage['construction_image']?>" alt="">
                            </div>
                          </div>
                      </a>
        </div>
           
     <?php }?>
  
        </div>    
      
  </div>
  
    <?php 
    $k++;
  }?>
  <div class="tab-pane fade" id="jun24" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      
               <div class="row">
                   
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
                 
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
                 
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
                 
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
                 
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
                 
          <div class="col-md-4 mb-4">
                        <a href="assets/images/property/premia-ggn/img5.jpg" data-fancybox="gallery">
                          <div class="instagram-posts">
                            <div class="img1">
                              <img src="assets/images/property/premia-ggn/img5.jpg" alt="">
                            </div>
                          </div>
                      </a>
          </div>
          
      </div>
      
  </div>
 
</div>  
  
    
  </div>
</div>

<?php }?>
<!--===== FOOTER AREA ENDS =======-->

<!------form------>






<!---------------->


<div class="apartment-inner2-section-area sp7 bg1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="heading3 h-3-heading space-margin60 ">
                   
                    <div class="space20"></div>
                    <h3 data-aos="fade-right" data-aos-duration="800" class="aos-init aos-animate">Our Latest Properties</h3>
               
                </div>
            </div>
        </div>
      <div class="row">
        <?php 
// Check if 'releated_props' is null or empty, and set an empty array if so
$selectedProperties = !empty($property['releated_props']) ? json_decode($property['releated_props'], true) : [];

// If there are selected properties (not empty), proceed with the query
if (!empty($selectedProperties)) {
    // Convert the selected properties array into a comma-separated string for the SQL query
    $selectedIds = implode(",", $selectedProperties);

    $query = "
        SELECT * 
        FROM properties 
        INNER JOIN property_type ON properties.prop_type = property_type.id 
        INNER JOIN locations ON properties.prop_location = locations.id 
        INNER JOIN property_status ON properties.prop_status = property_status.id
        WHERE properties.p_id IN ($selectedIds)";  // Only select properties with IDs in the $selectedProperties array

    foreach($connect->query($query) as $list) { 
?>
        <div class="col-lg-4 col-md-6">
          <div class="apartment-boxarea">
            <div class="img1">
              <img src="<?=$baseUrl?>admin/<?=$list['prop_cover']?>" alt="">
            </div>
            <div class="content-area">
              <a href="#"><?=$list['prop_title']?></a>
              <div class="space16"></div>
              <ul>
               <li><a href="#"><i class="fa-solid fa-location-dot"></i><?=$list['loct_name']?></a></li>
              </ul>
            </div>
            <div class="arrow">
              <a href="<?=$baseUrl?>property/<?=$list['prop_slug']?>.php">View Details</a>
            </div>
          </div>
        </div>
<?php 
    }
} else {
    echo "No related properties available.";
}
?>


  
      </div>
    </div>
</div>



<!--<div class="footer fix-from">-->
<!--    <div class="apartment-details-left sp15">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12">-->
<!--                <div class="apartment-author-area">-->
<!--                     <div class="space40"></div>-->
<!--                    <h3>Book Site Visit</h3>-->
<!--                    <div class="space30"></div>-->
<!--    <section class="from">-->
<!--    <div class="container-fulid">-->
<!--        <form action="#" method="post">-->
<!--            <input type="hidden" name="url" value="#">-->
<!--        <div class="row shadow p-3 bg-body rounded">-->
<!--              <div class="col-sm-3 mb-4">-->
<!--                <label for="name" class="form-label fs-base">Name</label>-->
<!--                <input type="text" id="name" class="form-control form-control-lg" name="name" required="">-->
<!--                <div class="invalid-feedback">Please enter your name!</div>-->
<!--              </div>-->
            
<!--              <div class="col-sm-3 mb-4">-->
<!--                <label for="email" class="form-label fs-base">Email Address</label>-->
<!--                <input type="email" id="email" class="form-control form-control-lg" name="email" required="">-->
<!--                <div class="invalid-feedback">Please provide a valid email address!</div>-->
<!--              </div>-->
<!--              <div class="col-sm-3 mb-4">-->
<!--                <label for="number" class="form-label fs-base">Contact Number</label>-->
<!--                <input type="tel" id="number" class="form-control form-control-lg" name="number" minlength="10" maxlength="12" required="">-->
<!--                <div class="invalid-feedback">Please provide a valid phone number!</div>-->
<!--              </div>-->
<!--              <div class="col-sm-3 mb-4">-->
<!--               <button type="submit" name="submit" class="btn btn-primary btn-lg shadow-primary mt-35">Submit Details</button>-->
<!--               </div>-->
<!--            </div>-->
<!--            </form>-->
<!--    </div>-->
<!--</section>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->


    
<!--</div>-->

<!--</div>-->
<!--===== footer AREA  =======-->
<style>
   
i.fa-solid.fa-location-dot {
    padding-right: 10px;
}
</style>

<?php include('footer.php'); ?>

