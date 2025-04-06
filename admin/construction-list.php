<?php //include('include/role-middleware.php');?>
<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
       <!--start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0 font-size-18">Property Document List</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Property Floor List</a></li>
                     <!--<li class="breadcrumb-item active">Data Tables</li>-->
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row">
         <div class="col-12">
            <div class="card p-3">
                <form method="post" class="mt-4" action="function_code/property-function.php" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                             
                                <!--<input class="form-control" type="text" name="construction_title" placeholder="Construction Title">-->
                                  <div class="col-md-6">
                                     <div class="mb-3">
                                        <label for="formrow-lastname-input" class="form-label">Construction Title</label>
                                        <select class="form-select" name="construction_title">
                                           <option>Choose</option>
                                           
                                           <?php 
                                             $prop_id = $_GET['psid'];
                                           foreach($connect->query("SELECT * FROM construction_title WHERE construction_prop_id = '$prop_id' ORDER BY id DESC") as $list){ 
                                              ?>
                                           <option value="<?= $list['id']?>"><?= $list['construction_title']?></option>
                                           <?php }?>
                                        </select>
                                     </div>
                                  </div>
                                <input class="form-control" type="text" hidden name="prop_id" value="<?= $_GET['psid'] ?>" placeholder="Enter Document Name">
                            </div>
                           
                        </div >
                         <div id="imageWrapper" >
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-5">
                                    <label class="form-label">Upload Construction Image</label>
                                    <input class="form-control" type="file" name="construction_image[]" placeholder="Upload Image">
                                </div>
                                <div class="col-sm-5">
                                    <label class="form-label">Construction Image Alt</label>
                                    <input class="form-control" type="text" name="image_alt[]" placeholder="Enter Image Alternate">
                                </div>
                                <div class="col-sm-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-success add-more">Add More</button>
                                </div>
                            </div>
                        </div>
                       <div class="mt-3">
                          <button type="submit" name="construction_submit" class="btn btn-primary w-md">Submit</button>
                       </div>
                    </form>
            </div>
            <div class="card">
               <div class="card-body">
                  <table id="datatable-buttons"
                     class="table table-responsive table-striped table-bordered dt-responsive nowrap w-100 text-start">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Construction Title</th>
                           <th>Construction Path</th>
                           <th>status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $pdid = $_GET['psid'];
                        //   die($pfid);
                        
                        $i = 1;
                           foreach($connect->query("SELECT *,construction_title.construction_title as construction_title_name,construction.id as majorid FROM `construction` INNER JOIN construction_title ON construction_title.id = construction.construction_title WHERE construction.property_id='$pdid'") as $list){ 
                               
                               
                            //   echo $list['floor_name'];
                           ?>
                        <tr>
                           <td ><?= $i?> </td>
                           <td><?=$list['construction_title_name']?> </td>
                           <td><img src="<?=$list['construction_image']?>" class="img-fluid" width="100px" height:"100px"></td>
                           <?php if($list['status'] == 1){?>
                           <td class="text-success"><i class="bx bx-wifi"></i> Active</td>
                           <?php }else{?>
                           <td class="text-danger"><i class="bx bx-wifi-off"></i> Not Active</td>
                           <?php }?>
                         
                           <td class="d-flex justify-content-center">
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="pcid" value="<?=$list['majorid']?>" />
                                 <button class="btn btn-danger btn-delete mx-1" name="pcid_delete_btn"
                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                              </form>
                              <?php if($list['status'] == 1){?>
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="pcid" value="<?=$list['id']?>" />
                                 <button class="btn btn-warning mx-1" name="pcid_status_btn" type="submit"><i
                                    class="bx bx-wifi-off"></i> Status Update</button>
                              </form>
                              <?php } else{?>
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="pcid" value="<?=$list['id']?>" />
                                 <button class="btn btn-dark mx-1" name="pcid_status_btn1" type="submit"><i
                                    class="bx bx-wifi"></i> Status Update</button>
                              </form>
                              <?php }?>
                           </td>
                        </tr>
                        <?php
                        $i++;
                        } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php include('include/themesetting.php');?>
<?php include('include/footer.php');?>
<script>
$(document).ready(function() {
    // Add new row for image and alt text
    $(document).on('click', '.add-more', function() {
        const newRow = `
            <div class="row mb-3">
                <div class="col-sm-5">
                    <input class="form-control" type="file" name="construction_image[]" placeholder="Upload Image">
                </div>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="image_alt[]" placeholder="Enter Image Alternate">
                </div>
                <div class="col-sm-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove">Remove</button>
                </div>
            </div>`;
        $('#imageWrapper').append(newRow);
    });

    // Remove row
    $(document).on('click', '.remove', function() {
        $(this).closest('.row').remove();
    });
});
</script>