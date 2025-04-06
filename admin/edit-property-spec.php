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
         <h4 class="mb-sm-0 font-size-18">Edit Property Specification</h4>
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
            <h4 class="card-title mb-4">Edit Property Specification</h4>
            <form method="post" action="function_code/property-spec-function.php" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Property Specification Title</label>
                        <input type="text" name="psid" hidden value="<?= $propspec['id']?>">
                        <input type="text" class="form-control" id="title" value="<?= $propspec['spec_name']?>" name="prop_spec_name" placeholder="Enter Your Property Spec Title" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Specification Slug</label>
                        <input type="text" class="form-control" id="slug" name="prop_spec_slug" value="<?= $propspec['spec_slug']?>" placeholder="Enter Property Status Slug">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Specification Logo</label>
                          <input class="form-control" type="file" name="spec_logo" id="image-input1">
                        <input class="form-control" type="text" name="spec_logo_update" hidden id="image-input1" value="<?= $propspec['spec_image']?>"hidden>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview1" src="<?= $propspec['spec_image']?>" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  
               </div>
               <div>
                  <button type="submit" name="prop_spec_update" class="btn btn-primary w-md">Submit</button>
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