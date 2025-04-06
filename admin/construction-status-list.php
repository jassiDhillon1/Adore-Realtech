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
               <h4 class="mb-sm-0 font-size-18">Property Construction Status</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Property Construction List</a></li>
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
                                <label for="stat_name" class="form-label">Construction Title</label>
                                <input class="form-control" type="text" name="construction_title" placeholder="Construction Title">
                                <input class="form-control" type="text" hidden name="prop_id" value="<?= $_GET['psid'] ?>" placeholder="Enter Document Name">
                            </div>
                           
                        </div >
                         
                       <div class="mt-3">
                          <button type="submit" name="construction_title_submit" class="btn btn-primary w-md">Submit</button>
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
                           <th>Upload Construction Image</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                            $pdid =  $_GET['psid'];
                            $i = 1;
                           foreach($connect->query("SELECT * FROM `construction_title` WHERE construction_prop_id='$pdid'") as $list){ 
                               
                               
                            //   echo $list['floor_name'];
                           ?>
                        <tr>
                           <td ><?= $i?> </td>
                           <td><?=$list['construction_title']?> </td>
                          
                          <td><a href="construction-list.php?psid=<?= $pdid ?>"><button class="btn btn-info mx-1 ">Project Status</button></a> </td>
                         
                           <td class="d-flex justify-content-center">
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="pcsid" value="<?=$list['id']?>" />
                                 <button class="btn btn-danger btn-delete mx-1" name="pcsid_delete_btn"
                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                              </form>
                             
                             <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?=$list['id']?>">
                                  Edit
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_<?=$list['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Construction Title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <form method="post" class="mt-4" action="function_code/property-function.php" enctype="multipart/form-data">
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <label for="stat_name" class="form-label">Construction Title</label>
                                                <input class="form-control" type="text" value="<?=$list['construction_title']?>" name="construction_title" placeholder="Construction Title">
                                                <input class="form-control" type="text" hidden name="const_id" value="<?=$list['id']?>" placeholder="Enter Document Name">
                                            </div>
                                           
                                        </div >
                                         
                                       <div class="mt-3">
                                          <button type="submit" name="construction_title_update" class="btn btn-primary w-md">Submit</button>
                                       </div>
                                    </form>
                                      </div>
                                      <div class="modal-footer d-none">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
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
