<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>
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
         <h4 class="mb-sm-0 font-size-18">Edit Stats</h4>
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
               <!-- <li class="breadcrumb-item active">Form Layouts</li> -->
            </ol>
         </div>
      </div>
   </div>
</div>
<!-- end page title -->
<div class="row">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title mb-4">Edit Stats</h4>
            <form method="post" action="function_code/home_about_function.php" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-sm-6">
                                <label for="stat_name" class="form-label">Stat Name</label>
                                <input class="form-control" type="text"  value="<?= $statId['stat_name']?>" name="stat_name" placeholder="Enter stat name">
                                <input class="form-control"  hidden type="text" value="<?= $statId['id']?>" name="stat_id" placeholder="Enter stat name">

                            </div>
                        <div class="col-sm-6">
                                <label for="stat_value" class="form-label">Stat Value</label>
                                <input class="form-control" type="text" value="<?= $statId['stat_value']?>" name="stat_value" placeholder="Enter stat value">
                            </div>
                  
               </div>
               <div class="mt-3">
                  <button type="submit" name="stats_update" class="btn btn-primary w-md">Submit</button>
               </div>
            </form>
         </div>
         <!-- end card body -->
      </div>
      <!-- end card -->
   </div>
   <!-- end col -->    
</div>
<?php include('include/themesetting.php');?>
<?php include('include/footer.php');?>