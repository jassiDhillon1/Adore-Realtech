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
         <h4 class="mb-sm-0 font-size-18">Edit Media</h4>
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
            <h4 class="card-title mb-4">Edit Media</h4>
            <form method="post" action="function_code/media-function.php" enctype="multipart/form-data">
               <div class="row">
                  
                  
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Youtube I Frame</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="media_vedio" rows="2"><?php echo $media['media_vedio'];?></textarea>
                          <input hidden type="text" value="<?= $media['id']?>" name="mid">
                        </div>

                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Media Text</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="media_text" rows="3"><?php echo strip_tags($media['media_text']);?></textarea>
                        </div>

                     </div>
                  </div>
                  
                 
                  
                    
               </div>

               <div>
                  <button type="submit" name="media_update" class="btn btn-primary w-md">Submit</button>
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
