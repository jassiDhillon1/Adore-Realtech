<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['update-gallery'])) {
    
   $prop_id= $_POST['prop_id'];
 
   $status = 1;
  
    $galleryImg = $_FILES['gallery_image']['name'];
           
          
           foreach($galleryImg as $key =>$value){
          // Start of the gallery management //
               $lastid = $prop_id;
               $status = 1;
             
              $galleryImg = $_FILES['gallery_image'];
              if($galleryImg['name'][$key] !== "") {
                    $filename = $galleryImg['name'][$key];
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $valid_extension = ["jpg", "jpeg", "png", "gif", "webp","pdf"];
                    if(in_array($extension, $valid_extension)) {
                     $new_name = rand() . "." . $extension;
                     $gallery_image = "uploads/gallery/".$new_name;
                     $gallery_image_upload = "../uploads/gallery/" . $new_name;
                     $move_file = move_uploaded_file(
                         $galleryImg["tmp_name"][$key],$gallery_image_upload);
            
          }else{
             echo "something wrong";
          }
        
        $sql = "INSERT INTO property_gallery (prop_id, gallery_image,gl_status) VALUES (:lastid,:galleryImg,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':lastid', $prop_id);
            $stmt->bindParam(':galleryImg', $gallery_image);
            $stmt->bindParam(':status', $status);

        $stmt->execute();  
              }       
    }
          
         header('Location: ' . $_SERVER['HTTP_REFERER']);
         exit;
        }else{
           
        }
  



   

    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['pgid'];
            $statement = $connect->prepare("DELETE FROM property_gallery WHERE gl_id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
               header('Location: ' . $_SERVER['HTTP_REFERER']);
               exit;
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['pg_status_btn'])){
            $id = $_POST['pgid'];
           
            $statement = $connect->prepare("UPDATE property_gallery SET gl_status = 0 WHERE gl_id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
               header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
            }
        }
if(isset($_POST['pg_status_btn1'])){
    $id = $_POST['pgid'];
    $statement = $connect->prepare("UPDATE property_gallery SET gl_status = 1 WHERE gl_id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
       header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
    }
}


?>