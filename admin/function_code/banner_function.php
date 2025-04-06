<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['banner_submit'])) {
   if ($_FILES["banner_image"]["name"] !== "") {

       $filename = $_FILES["banner_image"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/banners/".$new_name;
            $locationimg = "../uploads/banners/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["banner_image"]["tmp_name"],
               $locationimg
            );
          
        }else{
            echo "something wrong";
        }
    }
    
            $status = 1;
            $banner_alt = $_POST['banner_alt_tag'];
        // Prepare the SQL statement
            $sql = "INSERT INTO home_banner (banner_path, banner_alt, status) VALUES (:banner_path,:banner_alt,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':banner_path', $locationlogo);
            $stmt->bindParam(':banner_alt', $banner_alt);
            $stmt->bindParam(':status', $status);
          

        $stmt->execute();
    // die();
        header('Location: ../banner-list.php');
        exit;
       
   }


    // Module for the updation of the brand
    if(isset($_POST['banner_update'])){   
      
        $id = $_POST['banner_id'];
          $banner_alt = $_POST['banner_alt_tag'];
         if ($_FILES["banner_image"]["name"] !== "") {
            $filename = $_FILES["banner_image"]["name"];
           $extension = pathinfo($filename, PATHINFO_EXTENSION);
           $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
           
           if (in_array($extension, $valid_extension)) {
                $new_name = rand() . "." . $extension;
                $locationlogo = "uploads/banners/".$new_name;
                $locationimg = "../uploads/banners/" . $new_name;
                $move_file = move_uploaded_file(
                   $_FILES["banner_image"]["tmp_name"],
                   $locationimg
                );
              
                  
                }else{
                    echo "something wrong";
                }
            }else{
                
                 $locationlogo = $_POST['banner_image_main'];
                 
            }
        

        
        $status = 1;
        $sql = "UPDATE home_banner SET banner_path=:banner_path, banner_alt=:banner_alt,status=:status WHERE id=:id";
        $stmt = $connect->prepare($sql);
       
           // Bind the parameters
             $stmt->bindParam(':banner_path', $locationlogo);
            $stmt->bindParam(':banner_alt', $banner_alt);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            
           
            header('Location: ../banner-list.php');
            exit;
            }else{
                $msg = 'Email address already registered';
            }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['bnid'];
            $statement = $connect->prepare("DELETE FROM home_banner WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../banner-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['bnid_status_btn'])){
            $id = $_POST['bnid'];
            $statement = $connect->prepare("UPDATE home_banner SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../banner-list.php');
            }
        }
        
if(isset($_POST['bnid_status_btn1'])){
    $id = $_POST['bnid'];
    $statement = $connect->prepare("UPDATE home_banner SET status = 1 WHERE id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
        header('Location: ../banner-list.php');
    }
}


?>