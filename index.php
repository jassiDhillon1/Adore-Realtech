<?php 
include('header.php')
?>


<?php
      foreach($connect->query("SELECT * FROM `home_about` LIMIT 1") as $aboutdata){
          
          if($aboutdata['vedio_status'] == 'on'){
?>
<!--video-area-->


<div class="main-hero-area">
    <div class="video-container">
        <?= $aboutdata['vedio_url']?>
    </div>
</div>
<!--video-end-->
<?php } else {?>
<div class="header-carousel-area2 owl-carousel">
    
    <?php
      foreach($connect->query("SELECT * FROM `home_banner`") as $banner){
    ?>
    <div class="main-hero-area">
      <div class="img1">
        <img src="<?= $baseUrl?>admin/<?= $banner['banner_path']?>" alt="">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-5 offset-lg-6">
   
          </div>
          
        </div>
      </div>
    </div>
    <?php } ?>
  

</div>

<?php } }?>

<!--===== HERO AREA ENDS =======-->



<!--===== PROPERTY AREA STARTS =======-->
<div class="property3-section-area sp6">
    <div class="container">
        
        <?php
      foreach($connect->query("SELECT * FROM `home_about`") as $about){
    ?>
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="property-images-area">
                  
                    <div class="reveal image-anime lg">
                        <img src="<?= $baseUrl?>admin/<?= $about['about_image']?>" alt="">
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-9">
                <div class="property-content heading3">
                    <!--<h5 data-aos="fade-left" data-aos-duration="800">About Us</h5>-->
                    <!--<div class="space20"></div>-->
                    <h2 class="text-anime-style-3"><?= $about['home_about_image_head']?></h2>
                    <div class="space16"></div>
                   <p data-aos="fade-left" data-aos-duration="900">
                      <span id="text-preview">
                        <?= implode(' ', array_slice(explode(' ', $about['about_image_text']), 0, 50)); ?>...
                      </span>
                      <span id="text-full" style="display: none;">
                        <?= $about['about_image_text']; ?>
                      </span>
                      <a href="javascript:void(0)" id="toggle-text" onclick="toggleText()">Read More</a>
                    </p>
                    <div class="space16"></div>
                    <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
                        <a href="about.php" class="abt-btn4">Know More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!--===== PROPERTY AREA ENDS =======-->

<div class="blog3-section-area  just-countr-pd pt-0">
    <div class="container">

  <div class="row">
 <?php
      foreach($connect->query("SELECT * FROM `home_stats`") as $aboutstat){
    ?>
    <div class="four col-md-3">
      <div class="counter-box colored">
        <span class="counter"><?= $aboutstat['stat_value']?></span>
        <p><?= $aboutstat['stat_name']?></p>
      </div>
    </div>
    <?php } ?>
    <!--<div class="four col-md-3">-->
    <!--  <div class="counter-box">-->
    <!--    <span class="counter">16</span>-->
    <!--    <p>Projects Executed</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="four col-md-3">-->
    <!--  <div class="counter-box">-->
    <!--    <span class="counter">75</span>-->
    <!--    <p>Lakh sq.ft. Land Bank</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="four col-md-3">-->
    <!--  <div class="counter-box">-->
    <!--    <span class="counter">12.98</span>-->
    <!--    <p>Million sq.ft. Projects Total Built-up Area</p>-->
    <!--  </div>-->
    <!--</div>-->
  </div>
</div>
</div>


<!----------------->
<div class="case1-section-area sp-pb" style="background-color: #F9F9F9;">
  <div class="container-fluid p-0">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="apartmrnt-header text-center heading6 space-margin60">
            <!--<h5 data-aos="fade-left" data-aos-duration="800">Our Project</h5>-->
            <div class="space20"></div>
            <h2 class="text-anime-style-3">One For Every Facet Of Life</h2>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-lg-12 p-0" data-aos="zoom-out" data-aos-duration="1200">
          <div class="cs_case_study_1_list">
            
            <div class="cs_case_study cs_style_1 cs_hover_active active" data-aos="fade-up" data-aos-duration="800">
              <a href="<?=$baseUrl?>list/residential.php" class="cs_case_study_thumb cs_bg_filed"></a>
              <div class="content-area1">
                <a href="<?=$baseUrl?>list/residential.php">Residentail</a>
              </div>
              <div class="content-area">
                <a href="<?=$baseUrl?>list/residential.php">Residentail</a>
              </div>
            </div>
            
            <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="900">
              <a href="<?=$baseUrl?>list/commercial.php" class="cs_case_study_thumb cs_case_study_thumb2 cs_bg_filed"></a>
              <div class="content-area1">
                <a href="<?=$baseUrl?>list/commercial.php">Commercial</a>
              </div>
              <div class="content-area">
                <a href="<?=$baseUrl?>list/commercial.php">Commercial</a>
              </div>
            </div>
            <div class="cs_case_study cs_style_1 cs_hover_active" data-aos="fade-up" data-aos-duration="1000">
              <a href="<?=$baseUrl?>list/industrial.php" class="cs_case_study_thumb cs_case_study_thumb3 cs_bg_filed"></a>
              <div class="content-area1">
                <a href="<?=$baseUrl?>list/industrial.php">Industrial</a>
              </div>
              <div class="content-area">
                <a href="<?=$baseUrl?>list/industrial.php">Industrial</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!----------------------->

<!--===== SERVICE AREA STARTS =======-->
<!--<div class="service3-section-area sp1">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-6 m-auto">-->
<!--                <div class="heading3 text-center space-margin60">-->
<!--                    <h5 data-aos="fade-left" data-aos-duration="800">Our Collection</h5>-->
<!--                    <div class="space20"></div>-->
<!--                    <h2 class="text-anime-style-3 text-white">The Legacy we carry</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="800">-->
<!--                <div class="amenities-boxarea">-->
<!--                    <div class="img1">-->
<!--                        <img src="assets/images/ready-in.jpeg" alt="">-->
<!--                    </div>-->
<!--                    <div class="space32"></div>-->
<!--                    <div class="content-area">-->
<!--                        <a href="" class="text-white">Ready To Move- in Projects</a>-->
<!--                        <div class="space18"></div>-->
<!--                        <p class="text-white">Discover the epitome of luxury living at Luxury, every detail .</p>-->
<!--                        <h3>01</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="1000">-->
<!--                <div class="space40 d-lg-block d-none"></div>-->
<!--                <div class="amenities-boxarea">-->
<!--                    <div class="img1">-->
<!--                        <img src="assets/images/appartmnt.webp" alt="">-->
<!--                    </div>-->
<!--                    <div class="space32"></div>-->
<!--                    <div class="content-area">-->
<!--                        <a href="" class="text-white">New Launch</a>-->
<!--                        <div class="space18"></div>-->
<!--                        <p class="text-white">Explore our meticulously best <br class="d-lg-block d-block"> designed spaces and indulge.-->
<!--                        </p>-->
<!--                        <h3>02</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="1100">-->
<!--                <div class="amenities-boxarea">-->
<!--                    <div class="img1">-->
<!--                        <img src="assets/images/underconstruction.jpeg" alt="">-->
<!--                    </div>-->
<!--                    <div class="space32"></div>-->
<!--                    <div class="content-area">-->
<!--                        <a href="" class="text-white">Under Construction Projects</a>-->
<!--                        <div class="space18"></div>-->
<!--                        <p class="text-white">Uncover the essence of luxury <br class="d-lg-block d-block"> as you explore our exclusive.-->
<!--                        </p>-->
<!--                        <h3>03</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="1200">-->
<!--                <div class="space40 d-lg-block d-none"></div>-->
<!--                <div class="amenities-boxarea">-->
<!--                    <div class="img1">-->
<!--                        <img src="assets/images/luxary.webp" alt="">-->
<!--                    </div>-->
<!--                    <div class="space32"></div>-->
<!--                    <div class="content-area">-->
<!--                        <a href="" class="text-white">Luxury Appartments</a>-->
<!--                        <div class="space18"></div>-->
<!--                        <p class="text-white">Step into sophistication and <br class="d-lg-block d-block"> serenity at new construction.-->
<!--                        </p>-->
<!--                        <h3>04</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--===== SERVICE AREA ENDS =======-->

<!--===== ABOUT AREA STARTS =======-->
<div class="apartment6-section-area sp6">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="apartmrnt-header text-center heading6 space-margin60">
            <!--<h5 data-aos="fade-left" data-aos-duration="800">recent added Projects</h5>-->
            <!--<div class="space20"></div>-->
            <h2 class="text-anime-style-3">The Legacy we carry</h2>
          </div>
        </div>
      </div>
      <?php 
            $counter = 0;
            foreach($connect->query("SELECT * FROM properties INNER JOIN property_type ON properties.prop_type = property_type.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id WHERE properties.status = 1 AND is_featured = 1 ORDER BY properties.sorting ASC") as $list){ 
                $isOdd = ($counter % 2 != 0);
                $counter++;
        ?>
        <?php if ($isOdd): ?>
        <div class="row center-project d-flex align-items-center">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 position-relative order-1 order-xs-1">
                <img src="<?=$baseUrl?>admin/<?=$list['prop_cover']?>" alt="">
                <?php if($list['prop_status']== '9') {?>
                <div class="overlay">
                    <img src="<?=$baseUrl?>assets/icons/Stamp.svg" alt="" class="overlay-image">
                </div>
                <?php }else{}?>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12  order-2 order-xs-2">
                <div class="row">
                    <div class="option-name-inner crd" style="left: -30%;">
                        <div class="col-md-3 align-self-center  xs-align-self-left  order-1 order-xs-2">
                            <div class="option-content">
                                <img class="crd-logo" src="<?=$baseUrl?>admin/<?=$list['prop_logo']?>">
                            </div>
                        </div>
                        <div class="col-md-9 p-2  order-2 order-xs-1">
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
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12  order-1 order-xs-2">
                <div class="row">
                    <div class="option-name-inner crd" style="right: 30%;">
                        
                        <div class="col-md-9 p-2  order-1 order-xs-1">
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
                        <div class="col-md-3 align-self-center  xs-align-self-left  order-2 order-xs-2">
                            <div class="option-content">
                                <img class="crd-logo" src="<?=$baseUrl?>admin/<?=$list['prop_logo']?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12  order-2 order-xs-1 position-relative">
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
<!--      <div class="row">-->
<!--            <div class="row center-project d-flex align-items-center">-->
<!--                <div class="col-xl-7 col-lg-7 col-md-12">-->
<!--                    <div class="option-image">-->
<!--                        <img src="assets/images/property/project-1.jpg-->
<!--" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-5 col-lg-5 col-md-12 ">-->
<!--                    <div class="row">-->
                        
                            
<!--                    <div class="option-name-inner crd" style="left: -30%;">-->
<!--                        <div class="col-md-3 align-self-center">-->
<!--                        <div class="option-content">-->
<!--                            <img class="crd-logo" src="assets/images/crd-img/Select Premia SEC 76 FARIDABAD.png">-->
                           
<!--                        </div>-->
<!--                    </div>-->
                
                        
                        
<!--                        <div class="col-md-9 p-2">-->
                              
<!--                               <div class="option-meta crd-price-area option-content">-->
<!--                                    <h4>The Select Premia</h4>-->
                          
<!--                                <ul>-->
                                    
<!--                                    <li class="option-lokate"><span><i class="fa-solid fa-location-dot"></i> Sector 76,  Faridabad</span> </li>-->
<!--                                </ul>-->
                                
<!--                            <p>Adore The Select Premia Sector 76 Faridabad | Luxurious Residential Apartments  ....</p>-->
<!--                            <div class="btn-area1 mt-3" data-aos="fade-left" data-aos-duration="1200">-->
<!--                                <a href="" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>-->
<!--                            </div>-->
<!--                            </div>-->
                               
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    </div>-->
<!--                    </div>-->
<!--            </div>-->
            
<!--            <div class="row center-project d-flex align-items-center">-->
<!--                <div class="col-xl-5 col-lg-5 col-md-12 ">-->
<!--                    <div class="row">-->
                        
                            
<!--                    <div class="option-name-inner crd" style="right: 30%;">-->
                        
                        
                        
<!--                                    <div class="col-md-9 p-2">-->
                              
<!--                               <div class="option-meta crd-price-area option-content">-->
<!--                                    <h4>The Select Premia</h4>-->
                          
<!--                                <ul>-->
                                    
<!--                                    <li class="option-lokate"><span><i class="fa-solid fa-location-dot"></i> Sector 77,  Gurugram</span> </li>-->
<!--                                </ul>-->
                                
<!--                            <p>Adore The Select Premia Sector 77 Gurugram Mid High Rise Apartments 3, 3.5 & 4 BHK  ....</p>-->
<!--                            <div class="btn-area1 mt-3" data-aos="fade-left" data-aos-duration="1200">-->
<!--                                <a href="" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>-->
<!--                            </div>-->
<!--                            </div>-->
                               
<!--                            </div>-->
                        
<!--                             <div class="col-md-3 align-self-center" style="text-align:right">-->
<!--                        <div class="option-content">-->
<!--                            <img class="crd-logo" src="assets/images/crd-img/Select Premia SEC 77 GURUGRAM logo.png">-->
                           
<!--                        </div>-->
<!--                    </div>-->
                        
                        
                        
                        
<!--                        </div>-->
<!--                    </div>-->
<!--                    </div>-->
<!--                <div class="col-xl-7 col-lg-7 col-md-12">-->
<!--                    <div class="option-image">-->
<!--                        <img src="assets/images/property/project-2.jpg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            
            
<!--            <div class="row center-project d-flex align-items-center">-->
<!--                <div class="col-xl-7 col-lg-7 col-md-12">-->
<!--                    <div class="option-image">-->
<!--                        <img src="assets/images/property/project-3.jpg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xl-5 col-lg-5 col-md-12 ">-->
<!--                    <div class="row">-->
                        
                            
<!--                    <div class="option-name-inner crd" style="left: -30%;">-->
                        
                        
<!--                         <div class="col-md-3 align-self-center">-->
<!--                        <div class="option-content">-->
<!--                            <img class="crd-logo" src="assets/images/crd-img/Samriddhi logo.png">-->
                           
<!--                        </div>-->
<!--                    </div>-->
                
                        
                        
<!--                        <div class="col-md-9 p-2">-->
                              
<!--                               <div class="option-meta crd-price-area option-content">-->
<!--                                    <h4>Adore Samriddhi</h4>-->
                          
<!--                                <ul>-->
                                    
<!--                                    <li class="option-lokate"><span><i class="fa-solid fa-location-dot"></i> Sector 89,  Faridabad</span> </li>-->
<!--                                </ul>-->
                                
<!--                            <p>Adore Samriddhi is an affordable group housing project located in Sector 89 Faridabad, offering ...</p>-->
<!--                            <div class="btn-area1 mt-3" data-aos="fade-left" data-aos-duration="1200">-->
<!--                                <a href="" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>-->
<!--                            </div>-->
<!--                            </div>-->
                               
<!--                            </div>-->
                        
                        
<!--                        </div>-->
<!--                    </div>-->
<!--                    </div>-->
<!--            </div>-->
        
          <!--<div class="btn-area1 project-area mt-3" data-aos="fade-left" data-aos-duration="1200">-->
          <!--                      <a href="" class="header-btnnew">View All <i class="fa-solid fa-arrow-right"></i></a>-->
          <!--                  </div>-->
      </div>
    </div>
  </div>
<!--===== ABOUT AREA ENDS =======-->


<div class="property4-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 m-auto">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="property-header heading4">
                            <h5 data-aos="fade-left" data-aos-duration="800" class="aos-init">Why Adore Real Tech</h5>
                            <div class="space20"></div>
                            <h2 class="text-anime-style-3">A reputation that is built on delivering quality projects.</h2>
                            <div class="space16"></div>
                            <p data-aos="fade-left" data-aos-duration="1000" class="aos-init">Our years of experience and our constant pledge towards delivering the highest quality standard to our clients makes us one of the trustworthy names in the real estate market. </p>
                            <div class="space6"></div>
                            <ul data-aos="fade-left" data-aos-duration="1100" class="aos-init">
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; Great value appreciation</span> </li>
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; Architectural excellence</span> </li>
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; Smooth & hassle-free sales</span> </li>
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; Trust of timely delivery</span> </li>
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; State-of-the-art engineering</span> </li>
                                <li><span><i class="fa-solid fa-check-double"></i> &nbsp; Strategic associations</span> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="property-images-area">
                            <div class="img1 reveal image-anime "
                                style="opacity: 1; visibility: inherit; translate: none; rotate: none; scale: none; transform: translate(0px, 0px);width:590px; ">
                                <img src="assets/images/property-im2.png" alt=""
                                    style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);height:580px;">
                            </div>
                            <!--<div class="img2 aos-init" data-aos="fade-down" data-aos-duration="1000">-->
                            <!--    <img src="assets/images/21.jpg" alt="">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===== TESTIMONIAL AREA STARTS =======-->
<!--<div class="testimonial3-section-area sp6">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-5">-->
<!--                <div class="testimonia-header heading3">-->
<!--                    <h5 data-aos="fade-left" data-aos-duration="800">client feedback</h5>-->
<!--                    <div class="space20"></div>-->
<!--                    <h2 class="text-anime-style-3">Hear What Our Client Say About Property</h2>-->
<!--                    <div class="space16"></div>-->
<!--                    <div class="space32"></div>-->
<!--                </div>-->
<!--                <div class="testimonial-video-area" data-aos="zoom-in-up" data-aos-duration="1000">-->
<!--                    <div class="img1">-->
<!--                        <img src="assets/images/happyhomesexclusive.jpg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-1"></div>-->
<!--            <div class="col-lg-6">-->
<!--                <div class="testimonial-arrow-area" data-aos="zoom-in-up" data-aos-duration="1000">-->
<!--                    <div class="testimonial3-vertical-slider">-->
<!--                        <div class="testimonial-vertical">-->
<!--                            <div class="verical-boxarea">-->
<!--                                <div class="images-area">-->
<!--                                    <div class="img1">-->
<!--                                        <img src="assets/images/user.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <a href="#">- Pardeep Narwal</a>-->
<!--                                        <p>Happy Client</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="quito">-->
<!--                                    <img src="assets/img/icons/quoto-icon2.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="space24"></div>-->
                            <!--<span>Highly recommend Suite Luxury Suite Villa!</span>-->
<!--                            <div class="space16"></div>-->
<!--                            <p>“Adore Real Tech made my home-buying experience enjoyable and stress-free. Highly recommended for everyone!” </p>-->
<!--                            <div class="space24"></div>-->
<!--                            <ul>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="testimonial-vertical">-->
<!--                            <div class="verical-boxarea">-->
<!--                                <div class="images-area">-->
<!--                                    <div class="img1">-->
<!--                                        <img src="assets/images/user.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <a href="#">- Anjali Singh</a>-->
<!--                                        <p>Happy Client</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="quito">-->
<!--                                    <img src="assets/img/icons/quoto-icon2.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="space24"></div>-->
                            <!--<span>Unforgettable Experience Of Luxury & Comfort!</span>-->
<!--                            <div class="space16"></div>-->
<!--                            <p>"Exceptional service and dedication! Adore Real Tech helped me find my perfect home quickly.”</p>-->
<!--                            <div class="space24"></div>-->
<!--                            <ul>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <div class="testimonial-vertical">-->
<!--                            <div class="verical-boxarea">-->
<!--                                <div class="images-area">-->
<!--                                    <div class="img1">-->
<!--                                        <img src="assets/images/user.jpg" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <a href="#">- Nitin Garg</a>-->
<!--                                        <p>Happy Client</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="quito">-->
<!--                                    <img src="assets/img/icons/quoto-icon2.svg" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="space24"></div>-->
                            <!--<span>Highly recommend Suite Luxury Suite Villa!</span>-->
<!--                            <div class="space16"></div>-->
<!--                            <p>“Professional, knowledgeable, and attentive! Adore Real Tech exceeded my expectations during my home search.” </p>-->
<!--                            <div class="space24"></div>-->
<!--                            <ul>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                                <li><i class="fa-solid fa-star"></i></li>-->
<!--                            </ul>-->
<!--                        </div>                        -->
<!--                    </div>-->
<!--                    <div class="testimonial-arrows">-->
<!--                        <div class="testimonial-prev-arrow">-->
<!--                            <button><i class="fa-solid fa-angle-up"></i></button>-->
<!--                        </div>-->
<!--                        <div class="testimonial-next-arrow">-->
<!--                            <button><i class="fa-solid fa-angle-down"></i></button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--===== TESTIMONIAL AREA ENDS =======-->

<!--===== OTHERS AREA STARTS =======-->
<!--<div class="others3-section-area sp5">-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center">-->
<!--            <div class="col-lg-5">-->
<!--                <div class="images-area">-->
<!--                    <div class="img1 image-anime reveal">-->
<!--                        <img src="assets/img/all-images/others/others-img11.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="img2 image-anime reveal">-->
<!--                        <img src="assets/img/all-images/others/others-img12.png" alt="">-->
<!--                    </div>-->
<!--                    <div class="elements">-->
<!--                        <img src="assets/img/elements/elements8.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-1"></div>-->
<!--            <div class="col-lg-5">-->
<!--                <div class="others-header heading3">-->
<!--                    <h5 data-aos="fade-left" data-aos-duration="800">schedule a tour</h5>-->
<!--                    <div class="space20"></div>-->
<!--                    <h2 class="text-anime-style-3">Looking for a dream property?</h2>-->
<!--                    <div class="space16"></div>-->
<!--                    <p data-aos="fade-left" data-aos-duration="1000">Uncover your dream property—a tranquil haven with stunning views, spacious living areas, and beautiful gardens. Perfect for relaxation or entertaining, it offers modern amenities in a vibrant location. Your sanctuary awaits!</p>-->
                    <!--<div class="space24"></div>-->
                    <!--<div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">-->
                    <!--    <a href="" class="header-btn3">Get In Touch</a>-->
                    <!--</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--===== OTHERS AREA ENDS =======-->

<!--===== BLOG AREA STARTS =======-->
 
<!--===== BLOG AREA ENDS =======-->

<!--<div class="gallery6-section-area sp6">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-5 m-auto">-->
<!--          <div class="gallery-header text-center heading6 space-margin60">-->
<!--            <h5 data-aos="fade-left" data-aos-duration="800">Our Gallery</h5>-->
<!--            <div class="space20"></div>-->
<!--            <h2 class="text-anime-style-3">Our Property Gallery</h2>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="space40"></div>-->
<!--    <div class="wrapper">-->
<!--      <div class="center-slider">-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--              <img src="assets/images/gallery/1 (1).png" alt="">-->
<!--              <div class="icons">-->
<!--                <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--              <img src="assets/images/gallery/1 (2).png" alt="">-->
<!--              <div class="icons">-->
<!--                <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--            <img src="assets/images/gallery/1.png" alt="">-->
<!--            <div class="icons">-->
<!--              <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--            <img src="assets/images/gallery/2.png" alt="">-->
<!--            <div class="icons">-->
<!--              <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--              <img src="assets/images/gallery/3 (1).png" alt="">-->
<!--              <div class="icons">-->
<!--                <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div>-->
<!--            <div class="img1">-->
<!--              <img src="assets/images/gallery/3.png" alt="">-->
<!--              <div class="icons">-->
<!--                <a href=""><i class="fa-solid fa-arrow-right"></i></a>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--    </div>-->
<!--  </div>-->




<!--pop---up--on---load---->
<!--<div class="onload-popup">-->
    
<!--      <div id="popUpForm">-->
<!--    <div id="popContainer">-->
<!--    <div id="close">X</div><br>-->
<!--    <div class="img">-->
<!--          <img src="assets/images/banner-2.jpg">-->
<!--    </div>-->
<!--  </div>-->
<!--  </div>-->
<!-- </div>-->


<!-- modal on load -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
<!--  Launch demo modal-->
<!--</button>-->

<!-- Modal -->
<!--<div class="modal  fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-download">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-body down_modal">-->
<!--        <h1 class="dyn_mod_head" id="exampleModalLabel">Adore Fantasy Street, Sector 79 Faridabad</h1>-->
<!--        <button type="button" class="btn-close mod_cloose" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            <div class="row">-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-12">-->
<!--                    <div class="down_box">-->
<!--                        <span><img src="assets/images/pdf.png" height="40px" width="auto"></span> -->
<!--                        <span class="new_pproj"><b>New Project</b></span>-->
<!--                        <a class="down"><i class="fa-solid fa-download"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<?php 

$id = 1;
// Fetch the popup details
$stmt6 = $connect->prepare("SELECT * FROM `home_popup` WHERE pop_status=?");
$stmt6->execute([$id]);
$doc = $stmt6->fetch();

if ($doc): // Check if there is data for the modal
?>
<div class="modal fade" id="download_modal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-download">
    <div class="modal-content">
      <div class="modal-body down_modal">
        <h1 class="dyn_mod_head" id="downloadModalLabel"><?= $doc['parent_heading'] ?></h1>
        <button type="button" class="btn-close mod_cloose" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row">
          <?php 
          $doc_id = $doc['pop_id'];
          
        //   echo $doc_id;
          $documents = $connect->query("SELECT * FROM `home_popup_document` WHERE popup_id = '$doc_id' AND status = '1'");
          if ($documents->rowCount() > 0): // Check if there are documents
            foreach ($documents as $data): ?>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="down_box">
                  <span><img src="<?= $baseUrl ?>assets/images/pdf.png" height="40px" width="auto"></span>
                  <span class="new_pproj"><b><?= $data['document_name'] ?></b></span>
                  <a class="down" href="<?= $baseUrl ?>admin/<?= $data['document_path'] ?>"><i class="fa-solid fa-download"></i></a>
                </div>
              </div>
          <?php 
            endforeach;
          else: // No documents available
          ?>
            <div class="col-12">
              <p>No data available.</p>
            </div>
          <?php 
          endif; 
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
endif; // End of $doc check
?>







<?php 
include('footer.php')
?>

<script>
  window.onload = function() {
    const modal = new bootstrap.Modal(document.getElementById('download_modal'));
    modal.show();
  };
</script>

<script>
  function toggleText() {
    const preview = document.getElementById('text-preview');
    const fullText = document.getElementById('text-full');
    const toggleLink = document.getElementById('toggle-text');

    if (fullText.style.display === 'none') {
      preview.style.display = 'none';
      fullText.style.display = 'inline';
      toggleLink.textContent = 'Read Less';
    } else {
      preview.style.display = 'inline';
      fullText.style.display = 'none';
      toggleLink.textContent = 'Read More';
    }
  }
</script>