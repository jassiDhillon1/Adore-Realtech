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
               <h4 class="mb-sm-0 font-size-18">Blog List</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Blog List</a></li>
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
                           <th>S.No</th>
                           <th>Blog Title</th>
                           <th>Cover Image</th>
                          
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($connect->query("SELECT * FROM blogs ORDER BY id DESC") as $list){ 
                           ?>
                        <tr>
                           <td><?=$list['id']?> </td>
                         
                           <td><?= $list['title']?></td>
                           <td><img src="<?= $list['images']?>" class="img-fluid" width="100px" height:"100px"></td>
                          
                           <td><?= date('d M Y', strtotime($list['created_at']))?></td>
                           <td class="d-flex justify-content-center">
                               <!--<a class="btn btn-primary mx-1" href="blog/<?=$list['slug']?>.php">View</a>-->
                              <form action="edit-blog.php" method="post">
                                 <input type="hidden" name="edit_bid" value="<?=$list['id']?>" />
                                 <button class="btn btn-success mx-1" name="blog_edit_btn" type="submit"><i
                                    class="bx bx-edit"></i> Edit</button>
                              </form>
                              <form action="function_code/blog-function.php" method="post">
                                 <input type="hidden" name="prid" value="<?=$list['id']?>" />
                                 <button class="btn btn-danger btn-delete mx-1" onclick="return confirm('Are you sure to delete this record!');" name="delete_btn"
                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                              </form>
                             
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