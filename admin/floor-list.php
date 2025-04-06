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
               <h4 class="mb-sm-0 font-size-18">Property Floor List</h4>
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
            <div class="card">
               <form method="post" action="function_code/floor-function.php" enctype="multipart/form-data">
                  <div class="card-body">
                     <div class="col-md-12 card p-3" id="floor_box">
                        <div class="row mb-3" id="property_floor_1">
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Floor Image</label>
                                 <input hidden type="text" name="prop_id" value="<?= $_GET['pfid']?>">
                                <input class="form-control" type="file" name="floor_image[]" onchange="validateFileSize(this)" id="image-input2">
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Floor Name</label>
                                <input class="form-control" type="text" name="floor_name[]"  id="image-input2" placeholder="Enter Floor Name">
                            </div>
                            <div class="col-md-6 pt-3">
                                <button class="btn btn-success btn-sm" type="button" onclick="add_more();">Add More</button>
                            </div>
                          </div>
                      </div>
                     <div class="col-md-2">
                        <button type="submit" name="update-gallery" class="btn btn-primary mt-3">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="card">
               <div class="card-body">
                  <table id="datatable-buttons"
                     class="table table-responsive table-striped table-bordered dt-responsive nowrap w-100 text-center">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Property Name</th>
                           <th>Floor Image</th>
                           <th>Floor Name</th>
                           <th>status</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $pfid = $_GET['pfid'];
                        //   die($pfid);
                           foreach($connect->query("SELECT * FROM floor_plans INNER JOIN properties ON floor_plans.prop_id = properties.p_id WHERE properties.p_id = '$pfid' ") as $list){ 
                               
                               
                            //   echo $list['floor_name'];
                           ?>
                        <tr>
                           <td><?=$list['id']?> </td>
                           <td><?=$list['prop_title']?> </td>
                           <td><img src="<?=$list['floor_name']?>" class="img-fluid" width="100px" height:"100px"></td>
                            <td><?=$list['floor_image']?> </td>
                           <?php if($list['fl_status'] == 1){?>
                           <td class="text-success"><i class="bx bx-wifi"></i> Active</td>
                           <?php }else{?>
                           <td class="text-danger"><i class="bx bx-wifi-off"></i> Not Active</td>
                           <?php }?>
                           <td><?= date('d M Y', strtotime($list['created_at']))?></td>
                           <td class="d-flex justify-content-center">
                              <form action="function_code/floor-function.php" method="post">
                                 <input type="hidden" name="pfid" value="<?=$list['flr_id']?>" />
                                 <button class="btn btn-danger btn-delete mx-1" name="delete_btn"
                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                              </form>
                              <?php if($list['fl_status'] == 1){?>
                              <form action="function_code/floor-function.php" method="post">
                                 <input type="hidden" name="pfid" value="<?=$list['flr_id']?>" />
                                 <button class="btn btn-warning mx-1" name="pf_status_btn" type="submit"><i
                                    class="bx bx-wifi-off"></i> Status Update</button>
                              </form>
                              <?php } else{?>
                              <form action="function_code/floor-function.php" method="post">
                                 <input type="hidden" name="pfid" value="<?=$list['flr_id']?>" />
                                 <button class="btn btn-dark mx-1" name="pf_status_btn1" type="submit"><i
                                    class="bx bx-wifi"></i> Status Update</button>
                              </form>
                              <?php }?>
                           </td>
                        </tr>
                        <?php } ?>
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