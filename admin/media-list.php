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
                        <h4 class="mb-sm-0 font-size-18">Media List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Media</a></li>
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
                                class="table table-responsive table-striped table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                         <th>Media</th>
                                        <th>Media Text</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php 
                                    $i = 1;
                              foreach($connect->query("SELECT * FROM media") as $list){ 
                             ?>
                                    <tr>
                                        <td><?= $i?> </td>
                                       
                                        <td ><?= $list['media_vedio'] ?> </td>
                                         <td><?= $list['media_text'] ?></td>
                                        <?php if($list['status'] == 1){?>
                                        <td class="text-success"><i class="bx bx-wifi"></i> Active</td>
                                        <?php }else{?>
                                        <td class="text-danger"><i class="bx bx-wifi-off"></i> Not Active</td>
                                        <?php }?>
                                        <td class="d-flex justify-content-center">
                                            <form action="edit-media.php" method="post">
                                                <input type="hidden" name="mid" value="<?=$list['id']?>" />
                                                <button class="btn btn-success mx-1" name="mid_edit_button" type="submit"><i
                                                        class="bx bx-edit"></i> Edit</button>
                                            </form>
                                            <form action="function_code/media-function.php" method="post">
                                                <input type="hidden" name="mid" value="<?=$list['id']?>" />
                                                <button class="btn btn-danger btn-delete mx-1" onclick="return confirm('Are you sure to delete this record!');" name="mid_delete_btn"
                                                    type="submit"><i class="bx bx-trash-alt"></i> Delete</button>
                                            </form>

 
                                            <?php if($list['status'] == 1){?>
                                            <form action="function_code/media-function.php" method="post">
                                                <input type="hidden" name="mid" value="<?=$list['id']?>" />
                                                <button class="btn btn-warning mx-1" name="mid_status_btn" type="submit"><i
                                                        class="bx bx-wifi-off"></i> Status Update</button>
                                            </form>
                                            <?php } else{?>
                                            <form action="function_code/media-function.php" method="post">
                                                <input type="hidden" name="mid" value="<?=$list['id']?>" />
                                                <button class="btn btn-dark mx-1" name="mid_status_btn1" type="submit"><i
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
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php include('include/themesetting.php');?>
    <?php include('include/footer.php');?>