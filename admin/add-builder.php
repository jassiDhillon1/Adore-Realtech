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
         <h4 class="mb-sm-0 font-size-18">Add Builder</h4>
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
            <h4 class="card-title mb-4">Create Builder</h4>
            <form method="post" action="function_code/builder-function.php" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Builder Title</label>
                        <input type="text" class="form-control" id="title" name="builder_name" placeholder="Enter Your Builder Title" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Builder Slug</label>
                        <input type="text" class="form-control" id="slug" name="builder_slug" placeholder="Enter Bulder Slug">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Builder Logo</label>
                        <input class="form-control" type="file" name="builderlogo" id="image-input1">
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview1" src="assets/images/clients-3.jpeg" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Meta Title</label>
                        <input class="form-control" type="text" name="meta_title" id="image-input1">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Meta Description</label>
                        <input class="form-control" type="text" name="meta_desc" id="image-input1">
                     </div>
                  </div>
               </div>
               <div>
                  <button type="submit" name="builder_submit" class="btn btn-primary w-md">Submit</button>
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