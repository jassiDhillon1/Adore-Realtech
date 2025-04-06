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
                         <input type="text" hidden value="<?= $propData['p_id']?>" name="peid">
                        <label for="formrow-firstname-input" class="form-label">Property Title</label>
                        <input type="text" class="form-control" value="<?= $propData['prop_title']?>" id="title" name="prop_title" placeholder="Enter Your Property Spec Title" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Slug</label>
                        <input type="text" class="form-control" value="<?= $propData['prop_slug']?>" id="slug" name="prop_slug" placeholder="Enter Property Status Slug">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Property Logo</label>
                        <input class="form-control" type="file" name="prop_logo" id="image-input1">
                        <input class="form-control" type="text" hidden value="<?= $propData['prop_logo']?>" name="prop_logo_update" id="image-input1">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview1" src="<?= $propData['prop_logo']?>" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <?php
                  
                //   echo "Hii";
           $str = $propData['prop_type'];
	
// Using str_replace() function
// to removes all whitespaces
$prop_type = str_replace(' ', '', $str);

                  ?>
                  
          
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Type</label>
                        <select class="form-select" name="prop_type">
                               
                           <option>Choose</option>
                       
                           <?php  foreach($connect->query("SELECT * FROM property_type ORDER BY id DESC") as $list){
                             
                              
                              if($prop_type == $list['id']){
                              ?>
                           <option value="<?= $list['id']?>" selected><?= $list['ptype_name']?></option>
                           <?php }else{
                          
                           ?>
                           <option value="<?= $list['id']?>"><?= $list['ptype_name']?></option>
                           <?php } }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property URL</label>
                        <input type="text" class="form-control prop_title" value="<?= $propData['prop_url']?>"  id="slug" name="prop_url" placeholder="Enter Property URL">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Cover Image</label>
                        <input class="form-control" type="file" name="cover_img" id="image-input2">
                        <input class="form-control" type="text" hidden value="<?= $propData['prop_cover']?>" name="cover_img_update" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Image Preview</label>
                        <img id="image-preview2" src="<?= $propData['prop_cover']?>" width="100px" height="100px" style="border: 1px solid #80808040;" class="img-fluid">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Status</label>
                        <select class="form-select" name="prop_status">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM property_status ORDER BY id DESC") as $list){ 
                              if($propData['prop_status'] == $list['id']){ 
                              ?>
                           <option value="<?= $list['id']?>" selected><?= $list['status_name']?></option>
                           <?php }else{?>
                           <option value="<?= $list['id']?>"><?= $list['status_name']?></option>
                           <?php } }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Tag Line</label>
                        <input type="text" class="form-control" id="slug" name="prop_tag" value="<?= $propData['prop_tag']?>" placeholder="Enter Tag Line">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Price</label>
                        <input type="text" class="form-control" id="slug" name="prop_price" value="<?= $propData['prop_price']?>" placeholder="Property Price">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Area</label>
                        <input type="text" class="form-control" id="slug" name="prop_area" value="<?= $propData['prop_area']?>" placeholder="Property Area">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Property Location</label>
                        <select class="form-select" name="prop_location">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM locations ORDER BY id DESC") as $list){ 
                              if($propData['prop_location'] == $list['id']){
                               ?>
                           <option value="<?= $list['id']?>" selected><?= $list['loct_name']?></option>
                           <?php } else {?>
                           <option value="<?= $list['id']?>"><?= $list['loct_name']?></option>
                           <?php } }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">HRERA</label>
                        <input type="text" class="form-control" id="slug" name="prop_hrera" value="<?= $propData['hrera']?>" placeholder="Enter HRERA">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Select Developer/Builder</label>
                        <select class="form-select" name="prop_builder">
                           <option>Choose</option>
                           <?php  foreach($connect->query("SELECT * FROM builders ORDER BY id DESC") as $list){ 
                              if($propData['prop_builder'] == $list['id']){
                              ?>
                           <option value="<?= $list['id']?>" selected><?= $list['bldr_title']?></option>
                           <?php }else{?>
                           <option value="<?= $list['id']?>"><?= $list['bldr_title']?></option>
                           <?php } }?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Configurations (1Bhk,2Bhk, Retail Shop)</label>
                        <input type="text" class="form-control"  id="slug" value="<?= $propData['prop_config']?>" name="prop_config" placeholder="Select Configuration">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Site Plan</label>
                        <input class="form-control" type="file" name="site_plan" id="image-input2">
                        <input class="form-control" type="text" hidden name="site_plan_update" value="<?= $propData['prop_site_plan']?>" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Location Map</label>
                        <input class="form-control" type="file" name="location_map" id="image-input2">
                        <input class="form-control" type="text" hidden name="location_map_update" value="<?= $propData['prop_location_map']?>" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Brochure</label>
                        <input class="form-control" type="file" name="brochure" id="image-input2">
                        <input class="form-control" type="text" hidden name="brochure_update" value="<?= $propData['prop_brochure']?>" id="image-input2">
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="mb-3">
                        <label for="formFile" class="form-label">Payment Plan</label>
                        <input class="form-control" type="file" name="payment_plan" id="image-input2">
                        <input class="form-control" type="text" hidden name="payment_plan_update" value="<?= $propData['prop_payment_plan']?>" id="image-input2">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <label for="formFile" class="form-label">Select Amenities</label>
                     <div class="mb-3">
                        <div class="form-check form-check-right">
                           <?php  
                           $amenties_arry = (json_decode($propData['prop_amenities']));
                           foreach($connect->query("SELECT * FROM property_spec ORDER BY id DESC") as $list){ 
                           if(in_array($list['id'],$amenties_arry)){
                           ?>
                           <input class="form-check-input" name="amenities[]" type="checkbox" id="customCheckcolor2" value="<?= $list['id']?>" checked="">
                           <label class="form-check-label" for="formCheckRight2"><?= $list['spec_name']?></label>
                           <?php }
                           else{?>
                               <input class="form-check-input" name="amenities[]" type="checkbox" id="customCheckcolor2" value="<?= $list['id']?>">
                           <label class="form-check-label" for="formCheckRight2"><?= $list['spec_name']?></label>
                           <?php }
                           }?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="slug" name="prop_phone" value="<?= $propData['prop_phone']?>" placeholder="Enter Phone">
                     </div>
                  </div>
                  <input type="text" hidden name="parent_location" value="<?= $propData['parent_location']?>">
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Email</label>
                        <input type="text" class="form-control" id="slug" name="prop_email" value="<?= $propData['prop_email']?>"  placeholder="Enter Email">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Whatsapp</label>
                        <input type="text" class="form-control" id="slug" name="prop_whats" value="<?= $propData['prop_whatsapp']?>" placeholder="Enter Whatsapp">
                     </div>
                  </div>
                  
                  
                  
                  
                  
                  
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Home Banner Vedio</label>
                        <div class="mb-3">
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="home_banner_vedio" rows="3"><?= $propData['vedio_url']?></textarea>
                        </div>

                     </div>
                  </div>
                  
                  <div class="col-md-12">
                      <div class="mb-3">
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="Show_vedio" <?php echo ($propData['vedio_status'] == 'on') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Is vedio Active</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">For H1 Tag</label>
                        <input type="text" class="form-control" id="" name="h1tag" placeholder="Enter Keywords for H1" value="<?= $propData['prop_h1_tag']?>">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="slug" name="prop_meta_title" placeholder="Enter Property Meta Title" value="<?= $propData['prop_meta_title']?>">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Meta Keyword</label>
                        <input type="text" class="form-control" id="slug" name="prop_meta_keyword" placeholder="Enter Property Meta Keywords" value="<?= $propData['prop_meta_keyword']?>">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                        <textarea class="form-control" name="metaDesc" id="exampleFormControlTextarea1" value="" rows="3"><?=$propData['prop_meta_desc']?></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Property Description</label>
                        <textarea class="form-control" name="propDesc" id="exampleFormControlTextarea1" value= rows="3"><?=$propData['prop_desc']?></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Property Price List</label>
                        <textarea class="form-control" name="propertyPrice" id="exampleFormControlTextarea1" rows="3"><?=$propData['prop_price_list']?></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Location Advantages</label>
                        <textarea class="form-control" name="locationAdvantage" id="exampleFormControlTextarea1" rows="3"><?=$propData['prop_location_adv']?></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Key Features</label>
                        <textarea class="form-control" name="keyFeature" id="exampleFormControlTextarea1" rows="3"><?=$propData['prop_key_feature']?></textarea>
                     </div>
                  </div>
                   <div class="col-md-6">
                      <div class="mb-3">
                        
                        <div class="mb-3">
                        <label for="formrow-lastname-input" class="form-label">Sort Number</label>
                        <input type="number" class="form-control" value="<?= $propData['sorting'] ?>"  name="sort" placeholder="Enter Sorting Number">
                     </div>
                     </div>
                      <div class="col-md-6">
                      <div class="mb-3">
                     <label for="select_options">Select Properties:</label>
                     
                   <?php 
                        // Check if the 'releated_props' field is null, empty, or invalid JSON and set it to an empty array if so
                        $selectedProperties = [];
                        if (!empty($propData['releated_props'])) {
                            $decodedProps = json_decode($propData['releated_props'], true);
                            // Ensure the decoded data is an array before assigning
                            if (is_array($decodedProps)) {
                                $selectedProperties = $decodedProps;
                            }
                        }
                    ?>
                    <select name="selected_properties[]" id="select_options" class="form-select" multiple>
                        <?php 
                        // Fetch properties where status is '1' (active)
                        foreach($connect->query("SELECT * FROM `properties` WHERE status = '1'") as $prop) {
                            // Check if the current property ID is in the array of selected properties
                            $selected = (in_array($prop['p_id'], $selectedProperties)) ? 'selected' : '';
                        ?>
                            <option value="<?= $prop['p_id'] ?>" <?= $selected ?>><?= htmlspecialchars($prop['prop_title']) ?></option>
                        <?php 
                          }
                        ?>
                    </select>
    
    </div>
    </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <div class="form-check form-switch mb-3">
                             <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="is_featured" <?php echo ($propData['is_featured'] == 1) ? 'checked' : ''; ?>>
                           <label class="form-check-label" for="flexSwitchCheckDefault">Is Featured</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div>
                  <button type="submit" name="prop_update" class="btn btn-primary w-md">Submit</button>
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