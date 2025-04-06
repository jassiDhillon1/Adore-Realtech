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
         <h4 class="mb-sm-0 font-size-18">Add Home About</h4>
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
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
            <h4 class="card-title mb-4">Add Home About</h4>
            <form method="post" action="function_code/home_about_function.php" enctype="multipart/form-data">
               <div class="row">
                  
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Home About Image</label>
                        <input class="form-control" type="file" name="home_about_image" id="image-input1">
                         <input class="form-control" type="text" hidden value="<?= $aboutData['about_image']?>" name="home_about_image_main" id="image-input1">
<input class="form-control" type="text" hidden value="<?= $aboutData['id']?>" name="about_id" id="image-input1">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Image Alternate</label>
                        <input class="form-control" type="text" value="<?= $aboutData['about_image_alt']?>" name="home_about_alt" id="image-input1">
                     </div>
                  </div>
                   <div class="col-md-6">
                     <div class="mb-3">
                        <img id="image-preview1" src="<?= $aboutData['about_image']?>" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Home About Heading</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="home_about_heading" rows="2"><?= $aboutData['home_about_image_head'] ?></textarea>
                        </div>

                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Home About Text</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="home_about_text" rows="3"><?= $aboutData['about_image_text'] ?></textarea>
                        </div>

                     </div>
                  </div>
                  
                  
                   <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Home Banner Vedio</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="home_banner_vedio" rows="3"><?= $aboutData['vedio_url']?></textarea>
                        </div>

                     </div>
                  </div>
                  
                  <div class="col-md-6">
                      <div class="mb-3">
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="Show_vedio" <?php echo ($aboutData['vedio_status'] == 'on') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Is vedio Active</label>
                        </div>
                     </div>
                  </div>
                  
                 
                  
                    
               </div>
             
               <div>
                  <button type="submit" name="home_about_update" class="btn btn-primary w-md">Submit</button>
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
