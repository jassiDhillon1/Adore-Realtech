<?php
include('header.php');
?>
<!--===== HERO AREA STARTS =======-->
<div class="inner-main-hero-area">
    <div class="img1">
      <img src="<?=$baseUrl?>assets/img/all-images/hero/photo-1603521097795-3b798129197f.jpeg" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="inner-heading header-heading">
                <h2>News Details</h2>
                <div class="space24"></div>
                <p><a href="<?=$baseUrl?>">Home <i class="fa-solid fa-angle-right"></i></a> <a href=""> <?= $lsit['title'] ?></a></p>
            </div>
        </div>
      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->



<!--===== BLOG AREA STARTS =======-->
<div class="blog-details-leftarea sp6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-author-area pdright">
                    <div class="img1" >
                        <img src="<?=$baseUrl?>admin/<?= $lsit['images'] ?>" alt="">
                    </div>
                    <div class="space40"></div>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-tag"></i> Adore Real Tech</a> <span> | </span></li>
                        <li><a href="#"><i class="fa-solid fa-calendar-days"></i> <?= $lsit['date'] ?></a> <span> | </span></li>
                    </ul>
                    <div class="space32"></div>
                    <h2><?= $lsit['title'] ?></h2>
                    <div class="space20"></div>
                    <?= $lsit['description'] ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-details-left">
                    <div class="category-area">
                        <h3>Our Blog</h3>
                        <div class="space8"></div>
                        <ul>
                            <?php 
                               foreach($connect->query("SELECT * FROM blogs LIMIT 5") as $list){ 
                            ?>
                            <li><a href="<?=$baseUrl?>blog/<?=$list['slug']?>.php"><span><?=$list['title']?></span> <span><i class="fa-solid fa-angle-right"></i></span></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="space40"></div>
                    <div class="tags-area">
                        <h3>Popular Tags</h3>
                        <div class="space16"></div>
                        <ul>
                            <li><a href="#">#Real Estate</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== BLOG AREA ENDS =======-->

<?php
include('footer.php');
?>