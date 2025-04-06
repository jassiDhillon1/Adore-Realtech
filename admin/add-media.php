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
         <h4 class="mb-sm-0 font-size-18">Add Media</h4>
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
            <h4 class="card-title mb-4">Add Media</h4>
            <form method="post" action="function_code/media-function.php" enctype="multipart/form-data">
               <div class="row">
                  
                  
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Youtube I Frame</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="media_vedio" rows="2"></textarea>
                        </div>

                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Media Text</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="media_text" rows="3"></textarea>
                        </div>

                     </div>
                  </div>
                  
                 
                  
                    
               </div>

               <div>
                  <button type="submit" name="media_submit" class="btn btn-primary w-md">Submit</button>
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
<script>
$(document).ready(function() {
    // Add new row for stat name and value
    $(document).on('click', '.add-more', function() {
        const newRow = `
            <div class="inner_stats row mb-3">
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="stat_name[]" placeholder="Enter stat name" required>
                </div>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="stat_value[]" placeholder="Enter stat value" required>
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove">Delete</button>
                </div>
            </div>`;
        $('#statsWrapper').append(newRow);
    });

    // Remove row
    $(document).on('click', '.remove', function() {
        $(this).closest('.inner_stats').remove();
    });
});
</script>