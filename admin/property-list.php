<?php //include('include/role-middleware.php');?>
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
               <h4 class="mb-sm-0 font-size-18">Property List</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Property List</a></li>
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
               <div class="card-body">
                  <table id="datatable-buttons"
                     class="table table-responsive table-striped table-bordered dt-responsive  w-100 text-center">
                     <thead>
                        <tr>
                           <th>Property Title</th>
                           <th>Property Type</th>
                           <th>Cover Image</th>
                           <th>Edit Gallery</th>
                           <th>Edit Floor</th>
                            <th>Edit Document</th>
                             <th>Edit Status</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($connect->query("SELECT * FROM properties INNER JOIN property_type ON property_type.id = properties.prop_type ORDER BY p_id DESC") as $list){ 
                           ?>
                        <tr>
                           <td><?=$list['prop_title']?> </td>
                           <td><?=$list['ptype_name']?></td>
                           <td><img src="<?= $list['prop_cover']?>" class="img-fluid" width="100px" height:"100px"></td>
                           <td><a href="gallery-list.php?pgid=<?=$list['p_id']?>"><button class="btn btn-primary mx-1 ">Gallery</button></a></td>
                           <td><a href="floor-list.php?pfid=<?=$list['p_id']?>"><button class="btn btn-success mx-1 ">Floor</button></a> </td>
                           <td><a href="document-list.php?pdid=<?=$list['p_id']?>"><button class="btn btn-info mx-1 ">Documents</button></a> </td>
                           <td><a href="construction-status-list.php?psid=<?=$list['p_id']?>"><button class="btn btn-danger mx-1 ">Project Status</button></a> </td>
                           <?php if($list['status'] == 1){?>
                           <td class="text-success"><i class="bx bx-wifi"></i> Active</td>
                           <?php }else{?>
                           <td class="text-danger"><i class="bx bx-wifi-off"></i> Not Active</td>
                           <?php }?>
                           <td class="d-flex justify-content-center">
                              <form action="edit-property.php" method="post">
                                 <input type="hidden" name="edit_pid" value="<?=$list['p_id']?>" />
                                 <button class="btn btn-success btn-sm mx-1" name="property_edit_btn" type="submit"><i
                                    class="bx bx-edit"></i> Edit</button>
                              </form>
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="prid" value="<?=$list['p_id']?>" />
                                 <button class="btn btn-sm btn-danger btn-delete mx-1" onclick="return confirm('Are you sure to delete this record!');" name="delete_btn"
                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                              </form>
                              <?php if($list['status'] == 1){?>
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="prid" value="<?=$list['p_id']?>" />
                                 <button class="btn btn-sm btn-warning mx-1" name="prop_status_btn" type="submit"><i
                                    class="bx bx-wifi-off"></i> Status Update</button>
                              </form>
                              <?php } else{?>
                              <form action="function_code/property-function.php" method="post">
                                 <input type="hidden" name="prid" value="<?=$list['p_id']?>" />
                                 <button class="btn btn-dark mx-1" name="prop_status_btn1" type="submit"><i
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