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
               <h4 class="mb-sm-0 font-size-18">Subscribe List</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Subscribe List</a></li>
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
                           <th>Email</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           foreach($connect->query("SELECT * FROM subscribe ORDER BY id DESC") as $list){ 
                           ?>
                        <tr>
                           <td style="text-align:start;"><?=$list['email']?></td>
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