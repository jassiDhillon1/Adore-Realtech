<?php
include('header.php');
?>

<!--===== BREDCRM AREA STARTS =======-->
<div class="inner-main-hero-area">
    <div class="img1">
      <img src="assets/img/bg/1584110784684.jpg" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="inner-heading header-heading">
                <h2>News/Media </h2>
                <div class="space24"></div>
                <p><a href="index.php">Home <i class="fa-solid fa-angle-right"></i></a> <a href=""> News/Media </a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
<!--===== BREDCRM AREA ENDS =======-->






<section>
    <div class="container">
        <div class="row">
          <ul class="nav nav-pills mb-3 nv-tabs" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">NEWS COVERAGE
</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">VIDEO GALLERY
</button>
  </li>
  
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      
  <div class="blog3-section-area sp-pd">
    <div class="container">
      <div class="row">
          <?php 
           foreach($connect->query("SELECT * FROM blogs") as $list){ 
        ?>
        <div class="col-lg-4 col-md-6">
          <div class="blog-boxarea">
            <div class="img1 image-anime" style="border: 1px solid #2e4380;">
              <img src="<?=$baseUrl?>admin/<?=$list['images']?>" alt="">
            </div>
            <div class="content-area">
              <ul>
                <li><a href="#"><img src="<?=$baseUrl?>assets/img/icons/user.svg" alt=""> Adore Real Tech</a> <span> | </span></li>
                <li><a href="#"><img src="<?=$baseUrl?>assets/img/icons/calender.svg" alt=""><?=$list['date']?> </a></li>
              </ul>
              <div class="space20"></div>
              <a href="<?=$baseUrl?>blog/<?=$list['slug']?>.php"><?=$list['title']?></a>
              <div class="space24"></div>
              <a href="<?=$baseUrl?>blog/<?=$list['slug']?>.php" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>    
      
  </div>
  
  
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      
        <section class="video-section">
            <div class="container">
                <div class="row">
                    <?php 
                       foreach($connect->query("SELECT * FROM media") as $media){ 
                    ?>
                    <div class="col-md-4">
                        <div class="video-sec">
                            <div class="video-thumb" style="width: 100%; height:300px ">
                                <?= $media['media_vedio']?>
                                
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </section>
      
    </div>
 
</div>  
        </div>
    </div>
</section>




<!--===== BLOG AREA STARTS =======-->

  <!--===== BLOG AREA ENDS =======-->









<!--===== footer AREA  =======-->
<style>
    .tab-content>.active {
    display: contents;
}
</style>

<?php include('footer.php'); ?>
