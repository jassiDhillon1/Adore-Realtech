<?php
include('header.php');


$link = $_SERVER['REQUEST_URI'];
$link_array = explode('/',$link);

$data = $link_array[2];

$type = explode('.',$data);

$prop_slug = $type[0] ;

    
    
    $stmt = $connect->prepare("SELECT * FROM property_type WHERE ptype_slug=?");
    $stmt->execute([$prop_slug]); 
    $property = $stmt->fetch();
    $pt_id = $property['id'];
    
   $query = $connect->prepare("SELECT * FROM properties WHERE prop_type=? ");
   $query->execute([$pt_id]);
   $profdvdfsdcs = $query->fetch();
   $row = $query->rowCount();
   
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
                <h2><?= $property['ptype_name'];?> Projects</h2>
                <div class="space24"></div>
                <p><a href="<?= $baseUrl?>">Home <i class="fa-solid fa-angle-right"></i></a> <a href=""><?= $property['ptype_name'];?> Projects</a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->


<!------search---filter------>

<div class="about1-section-area sp1 bg1">
    <div class="container-fulid">
      <div class="row align-items-center">
        <div class="col-lg-12">
        <div class="search-options-btn-area3 bg-grea">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="search-section new-search search-area">
                 <p class="b-left vert-move-btn2"></p>
               <div class="container search-bar">
                  <div class="search-section-area">
                     <div class="search-area-inner">
                        <div class="search-contents">
                            <form method="post" action="<?= $baseUrl?>search.php">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields">
                                                 <select class="selectpicker search-fields" name="propertyname" tabindex="null">
                                                    <option value=''>Select Project</option>
                                                    <?php 
                                                        foreach($connect->query("SELECT * FROM properties WHERE prop_type = '$pt_id' ORDER BY prop_title ASC") as $bul){
                                                        ?>
                                                        <option value="<?= $bul['p_id']?>"><?= $bul['prop_title']?></option>   
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                 
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" name="searchNow" class="search-button"><img src="assets/img/icons/search-icon1.svg" alt=""> &nbsp;Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
                <p class="b-down vert-move-btn"></p>
            </div>
         </div>
      </div>
   </div>
</div>    
        </div>
       
      </div>
    </div>
</div>



<!-------Nav---Tabs------->






<!-----properties-------->

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
            foreach($connect->query("SELECT * FROM properties INNER JOIN property_type ON properties.prop_type = property_type.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id WHERE prop_type = '$pt_id' AND properties.status = 1 ORDER BY properties.sorting ASC") as $list){ 
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
    </div>
</div>







<!--===== CONTACT AREA ENDS =======-->


<?php
include('footer.php');
?>