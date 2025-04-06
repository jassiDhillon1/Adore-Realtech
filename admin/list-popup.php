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
               <h4 class="mb-sm-0 font-size-18">Home Popup List</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">>Home Popup List</a></li>
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
                     class="table table-responsive table-striped table-bordered dt-responsive nowrap w-100 text-center">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Heading</th>
                           <th>Upload Document</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($connect->query("SELECT * FROM home_popup ORDER BY pop_id DESC") as $list){ 
                           ?>
                        <tr>
                             <td><?=$list['pop_id']?> </td>
                           <td><?=$list['parent_heading']?> </td>
                           <td><a href="popup-document-list.php?poid=<?=$list['pop_id']?>"><button class="btn btn-info mx-1 ">Documents</button></a> </td>
                                <?php if($list['pop_status'] == 1){?>
                                        <td class="text-success"><i class="bx bx-wifi"></i> Active</td>
                                        <?php }else{?>
                                        <td class="text-danger"><i class="bx bx-wifi-off"></i> Not Active</td>
                                        <?php }?>
                                        <td class="d-flex justify-content-center">
                                            <form action="edit-popup.php" method="post">
                                                <input type="hidden" name="popid" value="<?=$list['pop_id']?>" />
                                                <button class="btn btn-success mx-1" name="pop_edit_button" type="submit"><i
                                                        class="bx bx-edit"></i> Edit</button>
                                            </form>
                                            <?php if($list['pop_status'] == 1){?>
                                            <form action="function_code/pop-function.php" method="post">
                                                <input type="hidden" name="poid" value="<?=$list['pop_id']?>" />
                                                <button class="btn btn-warning mx-1" name="pop_status_btn" type="submit"><i
                                                        class="bx bx-wifi-off"></i> Status Update</button>
                                            </form>
                                            <?php } else{?>
                                            <form action="function_code/pop-function.php" method="post">
                                                <input type="hidden" name="poid" value="<?=$list['pop_id']?>" />
                                                <button class="btn btn-dark mx-1" name="pop_status_btn1" type="submit"><i
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