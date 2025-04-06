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
         <h4 class="mb-sm-0 font-size-18">Edit Banner</h4>
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
            <h4 class="card-title mb-4">Edit Banner</h4>
            <form method="post" action="function_code/banner_function.php" enctype="multipart/form-data">
               <div class="row">
                  
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Banner Image</label>
                        <input class="form-control" type="file" name="banner_image" id="image-input1">
                        <input class="form-control" type="text" name="banner_image_main" value="<?= $bannerData['banner_path']?>" hidden id="image-input1">
                        <input class="form-control" type="text" name="banner_id" value="<?= $bannerData['id']?>" hidden id="image-input1">

                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Banner Alt Tag</label>
                        <input type="text" class="form-control" id="" value="<?= $bannerData['banner_alt']?>" name="banner_alt_tag">

                     </div>
                  </div>
                  
                  <div class="col-md-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview1" src="<?= $bannerData['banner_path']?>" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
               </div>
               <div>
                  <button type="submit" name="banner_update" class="btn btn-primary w-md">Submit</button>
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