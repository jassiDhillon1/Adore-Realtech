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
            <h4 class="mb-sm-0 font-size-18">Add Blog</h4>
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
               <h4 class="card-title mb-4">Add Blog</h4>
               <form method="post" action="function_code/blog-function.php" enctype = "multipart/form-data">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-firstname-input" class="form-label">Blog Title</label>
                           <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Blog  Title" required="">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-lastname-input" class="form-label">Blog Slug</label>
                           <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Blog Slug">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="mb-3">
                           <label for="formFile" class="form-label">Blog Image</label>
                           <input class="form-control" type="file" name="filename_blog" id="image-input1">
                        </div>
                     </div>
                     
                     <div class="col-sm-6">
                        <div class="mb-3">
                           <label for="formrow-email-input" class="form-label">Image Preview</label>
                           <img id="image-preview1" src="assets/images/clients-3.jpeg" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-password-input" class="form-label">Image Alt</label>
                           <input type="text" class="form-control" name="imagealt" id="formrow-password-input" placeholder="Enter Image Alt" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-inputCity" class="form-label">Tag</label>
                           <input type="text" class="form-control" name="tags" id="formrow-inputCity" placeholder="Enter Image Tag">
                        </div>
                     </div>
                     
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-inputCity" class="form-label">Meta Title</label>
                           <input type="text" class="form-control" name="meta_title" id="formrow-inputCity" placeholder="Enter Your Living City">
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                           <label for="formrow-inputCity" class="form-label">Meta Keyword</label>
                           <input type="text" class="form-control" name="meta_keyword" id="formrow-inputCity" placeholder="Enter Your Living City">
                        </div>
                     </div>
                     <div class="col-md-12">
                         <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                         <textarea class="form-control" name="metaDesc" id="exampleFormControlTextarea1" name="meta_description" rows="3" ></textarea>
                     </div>

                     <div class="col-md-12">
                         <label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
                         <textarea class="form-control"  id="exampleFormControlTextarea1" name="ShortDesc" rows="3" ></textarea>
                     </div> 
                     <div class="col-md-12">
                         <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                         <textarea class="form-control" id="exampleFormControlTextarea1" name="blog_description" rows="3" ></textarea>
                     </div> 
                  </div>
            </div>
            <div>
            <button type="submit" class="btn btn-primary w-md" name="add_submit">Submit</button>
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