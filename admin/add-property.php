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
         <h4 class="mb-sm-0 font-size-18">Add Property</h4>
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
            <h4 class="card-title mb-4">Create Property </h4>
            <form method="post" action="function_code/property-function.php" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Property Title</label>
                        <input type="text" class="form-control" id="title" name="prop_title" placeholder="Enter Your Property Spec Title" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Slug</label>
                        <input type="text" class="form-control" id="slug" name="prop_slug" placeholder="Enter Property Status Slug">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Property Logo</label>
                        <input class="form-control" type="file" name="prop_logo" id="image-input1">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview1" src="assets/images/clients-3.jpeg" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Type</label>
                        <select class="form-select" name="prop_type">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM property_type ORDER BY id DESC") as $list){ 
                              ?>
                           <option value="<?= $list['id']?>"><?= $list['ptype_name']?></option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property URL</label>
                        <input type="text" class="form-control" id="slug" name="prop_url" placeholder="Enter Property URL">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Cover Image</label>
                        <input class="form-control" type="file" name="cover_img" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview2" src="assets/images/clients-3.jpeg" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Status</label>
                        <select class="form-select" name="prop_status">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM property_status ORDER BY id DESC") as $list){ 
                              ?>
                           <option value="<?= $list['id']?>"><?= $list['status_name']?></option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Tag Line</label>
                        <input type="text" class="form-control" id="slug" name="prop_tag" placeholder="Enter Tag Line">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Price</label>
                        <input type="text" class="form-control" id="slug" name="prop_price" placeholder="Property Price">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Area</label>
                        <input type="text" class="form-control" id="slug" name="prop_area" placeholder="Property Area">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Location</label>
                        <select class="form-select" name="prop_location">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM locations ORDER BY id DESC") as $list){ 
                              ?>
                           <option value="<?= $list['id']?>"><?= $list['loct_name']?></option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">HRERA</label>
                        <input type="text" class="form-control" id="slug" name="prop_hrera" placeholder="Enter HRERA">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Select Developer/Builder</label>
                        <select class="form-select" name="prop_builder">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM builders ORDER BY id DESC") as $list){ 
                              ?>
                           <option selected value="<?= $list['id']?>"><?= $list['bldr_title']?></option>
                           <?php }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Configurations (1Bhk,2Bhk, Retail Shop)</label>
                        <input type="text" class="form-control" id="slug" name="prop_config" placeholder="Select Configuration">
                     </div>
                  </div>
                  
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Site Plan</label>
                        <input class="form-control" type="file" name="site_plan" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Location Map</label>
                        <input class="form-control" type="file" name="location_map" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Brochure</label>
                        <input class="form-control" type="file" name="brochure" id="image-input2">
                     </div>
                  </div>
                   <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Payment Plan</label>
                        <input class="form-control" type="file" name="payment_plan" id="">
                     </div>
                  </div>
                  <div class="row">
                     <label for="formFile" class="form-label">Select Amenities</label>
                      <?php  foreach($connect->query("SELECT * FROM property_spec ORDER BY id DESC") as $list){ ?>
                     <div class="mb-3 col-md-3">
                        <div class="form-check form-check-right">
                          
                           <input class="form-check-input" name="amenities[]" type="checkbox" id="customCheckcolor2" value="<?= $list['id']?>">
                           <label class="form-check-label" for="formCheckRight2"><?= $list['spec_name']?></label>
                           
                        </div>
                     </div>
                     <?php }?>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Phone</label>
                        <input type="text" class="form-control" value="9266808080" readonly name="prop_phone" placeholder="Enter Phone">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Email</label>
                        <input type="text" class="form-control" value="info@adorerealtech.com" disable readonly name="prop_email" placeholder="Enter Email">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Whatsapp</label>
                        <input type="text" class="form-control" value="9266808080" readonly name="prop_whats" placeholder="Enter Whatsapp">
                     </div>
                  </div>
                  
                    <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Home Banner Vedio</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="home_banner_vedio" rows="3"></textarea>
                        </div>

                     </div>
                  </div>
                  
                  <div class="col-md-12">
                      <div class="mb-3">
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="Show_vedio">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Is vedio Active</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">For H1 Tag</label>
                        <input type="text" class="form-control" id="" name="h1tag" placeholder="Enter Keywords for H1">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="slug" name="prop_meta_title" placeholder="Enter Property Meta Title">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Meta Keyword</label>
                        <input type="text" class="form-control" id="slug" name="prop_meta_keyword" placeholder="Enter Property Meta Keywords">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                        <textarea class="form-control" name="metaDesc" id="exampleFormControlTextarea1"  rows="3"></textarea>
                     </div>
                  </div>
                  
                  <div class="col-md-12 card p-3" id="floor_box">
                      <div class="row mb-3" id="property_floor_1">
                          <div class="col-md-6">
                            <label for="formFile" class="form-label">Floor Image</label>
                            <input class="form-control" type="file" name="floor_image[]" onchange="validateFileSize(this)" id="image-input2">
                          </div>
                          <div class="col-md-6">
                            <label for="formFile" class="form-label">Floor Name</label>
                            <input class="form-control" type="text" name="floor_name[]" id="image-input2" placeholder="Enter Floor Name">
                          </div>
                           <div class="col-md-6 pt-3">
                            <button class="btn btn-success btn-sm" type="button" onclick="add_more();">Add More</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 card p-3" id="gallery_box">
                      <div class="row mb-3" id="property_gallery_1">
                          <div class="col-md-6">
                            <label for="formFile" class="form-label">Gallery Image</label>
                            <input class="form-control" type="file" name="gallery_image[]" onchange="validateFileSize(this)" id="image-input2">
                          </div>
                          
                           <div class="col-md-6 pt-3">
                            <button class="btn btn-success btn-sm mt-2" type="button" onclick="add_more_gallery();">Add More</button>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Property Description</label>
                        <textarea class="form-control" name="propDesc" id="exampleFormControlTextarea1" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Property Price List</label>
                        <textarea class="form-control" name="propertyPrice" id="exampleFormControlTextarea1" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Location Advantages</label>
                        <textarea class="form-control" name="locationAdvantage" id="exampleFormControlTextarea1" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Key Features</label>
                        <textarea class="form-control" name="keyFeature" id="exampleFormControlTextarea1" rows="3"></textarea>
                     </div>
                  </div>
                  
                    <div class="col-md-6">
                      <div class="mb-3">
                        
                        <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Sort Number</label>
                        <input type="number" class="form-control"   name="sort" placeholder="Enter Sorting Number">
                     </div>
                     </div>
                     </div>
                     
                           <div class="col-md-6">
                      <div class="mb-3">
                     <label for="select_options">Select Properties:</label>
                        <select name="selected_properties[]" id="select_options" class="form-select" multiple>
                            <?php 
                                foreach($connect->query("SELECT * FROM `properties` WHERE status = '1'") as $prop){
                            ?>
                            <option value="<?= $prop['p_id']?>"><?= $prop['prop_title']?></option>
                     <?php 
                                }
                     ?>
                        </select>
    
    </div>
    </div>
                  <div class="col-md-6">
                      <div class="mb-3">
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="is_featured">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Is Featured</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <button type="submit" name="prop_submit" class="btn btn-primary w-md">Submit</button>
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