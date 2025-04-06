<?php include('header.php');

if (isset($_POST['searchNow'])) {
    $pname = $_POST['prop_name'];
    $prop_location = $_POST['location'];
    $prop_builder = $_POST['builder'];
  
    if($pname !='' and $prop_location !='' and $prop_builder !=''){
        
    $stmt = $connect->prepare("SELECT * FROM properties INNER JOIN builders ON properties.prop_builder = builders.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id  WHERE prop_title LIKE :title AND properties.prop_builder = :type AND prop_location = :location");

    $stmt->execute([
        'title' => '%' . $pname . '%',
        'type' => $prop_builder,
        'location' => $prop_location
    ]);

    }
    if($prop_builder !='' or $pname =='' or $prop_location ==''){
        $stmt = $connect->prepare("SELECT * FROM properties LEFT JOIN builders ON properties.prop_builder = builders.id LEFT JOIN locations ON properties.prop_location = locations.id LEFT JOIN property_status ON properties.prop_status = property_status.id  WHERE properties.prop_builder = :type");

        $stmt->execute([
            'type' => $prop_builder,
        ]);
    }
    if($pname !='' or $prop_location =='' or $prop_builder ==''){

        $stmt = $connect->prepare("SELECT * FROM properties LEFT JOIN builders ON properties.prop_builder = builders.id LEFT JOIN locations ON properties.prop_location = locations.id LEFT JOIN property_status ON properties.prop_status = property_status.id  WHERE properties.prop_title LIKE :title");

        $stmt->execute([
            'title' => '%' . $pname . '%',
        ]);
    }
    $row = $stmt->rowCount();
    
}
// if (isset($_POST['searchNow'])) {
//     $pname = $_POST['prop_name'];
//     $prop_location = $_POST['location'];
//     $prop_builder = $_POST['builder'];
  
//     if($pname !='' and $prop_location !='' and $prop_builder !=''){
        
//     $stmt = $connect->prepare("SELECT * FROM properties INNER JOIN builders ON properties.prop_builder = builders.id INNER JOIN locations ON properties.prop_location = locations.id INNER JOIN property_status ON properties.prop_status = property_status.id  WHERE prop_title LIKE :title AND properties.prop_builder = :type AND prop_location = :location");

//     $stmt->execute([
//         'title' => '%' . $pname . '%',
//         'type' => $prop_builder,
//         'location' => $prop_location
//     ]);

//     }
//     if($prop_builder !='' or $pname =='' or $prop_location ==''){
//         $stmt = $connect->prepare("SELECT * FROM properties LEFT JOIN builders ON properties.prop_builder = builders.id LEFT JOIN locations ON properties.prop_location = locations.id LEFT JOIN property_status ON properties.prop_status = property_status.id  WHERE properties.prop_builder = :type");

//         $stmt->execute([
//             'type' => $prop_builder,
//         ]);
//     }
//     if($pname !='' or $prop_location =='' or $prop_builder ==''){

//         $stmt = $connect->prepare("SELECT * FROM properties LEFT JOIN builders ON properties.prop_builder = builders.id LEFT JOIN locations ON properties.prop_location = locations.id LEFT JOIN property_status ON properties.prop_status = property_status.id  WHERE properties.prop_title LIKE :title");

//         $stmt->execute([
//             'title' => '%' . $pname . '%',
//         ]);
//     }
//     $row = $stmt->rowCount();
    
// }

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
                <div class="overlay">
                    <img src="<?=$baseUrl?>assets/icons/Stamp.svg" alt="" class="overlay-image">
                </div>
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
                                <p><?php echo implode(' ', array_slice(explode(' ', $list['prop_desc']), 0, 10)) . '...'; ?></p>
                                <div class="btn-area1 mt-3 aos-init" data-aos="fade-left" data-aos-duration="1200">
                                    <a href="<?=$baseUrl?>property/<?=$list['prop_slug']?>.php" class="abt-btn4 view">View More <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 position-relative">
                <img src="<?=$baseUrl?>admin/<?=$list['prop_cover']?>" alt="">
                <div class="overlay">
                    <img src="<?=$baseUrl?>assets/icons/Stamp.svg" alt="" class="overlay-image">
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php }?>
    </div>
</div>

<?php include('footer.php')?>