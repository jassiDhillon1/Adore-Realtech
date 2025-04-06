<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['location_submit'])) {
    
   $location_name= $_POST['location_name'];
   $location_slug = $_POST['location_slug'];
   $parent_location = $_POST['parentlocation'];
   if ($_FILES["locationlogo"]["name"] !== "") {

       $filename = $_FILES["locationlogo"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/locations/".$new_name;
            $locationimg = "../uploads/locations/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["locationlogo"]["tmp_name"],
               $locationimg
            );
          
        }else{
            echo "something wrong";
        }
    }
    
    $status = 1;
    // Validating slug address avilability
    
    $sql1 = 'select * from locations where loct_slug = :loct_slug';
    $stmt1 = $connect->prepare($sql1);
    $p = ['loct_slug'=>$location_slug];
    $stmt1->execute($p);
    if($stmt1->rowCount() == 0){
        // Prepare the SQL statement
            $sql = "INSERT INTO locations (loct_name, loct_slug, parent_loct, loct_image,status) VALUES (:loct_title,:loct_slug,:parent_loct,:loct_image,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':loct_title', $location_name);
            $stmt->bindParam(':loct_slug', $location_slug);
            $stmt->bindParam(':loct_image', $locationlogo);
            $stmt->bindParam(':parent_loct', $parent_location);
            $stmt->bindParam(':status', $status);

        $stmt->execute();
    
        header('Location: ../location-list.php');
        exit;
        }else{
            $msg = 'Slug/Brand is already registered';
            die($msg);
        }
   }


    // Module for the updation of the brand
    if(isset($_POST['location_update'])){   
        $location_name= $_POST['location_name'];
        $location_slug = $_POST['location_slug'];
        $id = $_POST['llid'];
        
         if ($_FILES["locationlogo"]["name"] !== "") {

        $filename = $_FILES["locationlogo"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/locations/".$new_name;
            $locationimg = "../uploads/locations/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["locationlogo"]["tmp_name"],
               $locationimg
            );
          
              
            }else{
                echo "something wrong";
            }
            }else{
                
                 $locationlogo = $_POST['locationImg'];
                 
            }
        

        
        $status = 1;
        $id = $_POST['llid'];
        $sql = "UPDATE locations SET loct_name=:loct_title, loct_slug=:loct_slug,parent_loct=:parent_loct,loct_image=:loct_image,status=:status WHERE id=:id";
        $stmt = $connect->prepare($sql);
       
           // Bind the parameters
            $stmt->bindParam(':loct_title', $location_name);
            $stmt->bindParam(':loct_slug', $location_slug);
            $stmt->bindParam(':loct_image', $locationlogo);
            $stmt->bindParam(':parent_loct', $parent_location);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            header('Location: ../location-list.php');
            exit;
            }else{
                $msg = 'Email address already registered';
            }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['llid'];
            $statement = $connect->prepare("DELETE FROM locations WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../location-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['loct_status_btn1'])){
            $id = $_POST['llid'];
            $statement = $connect->prepare("UPDATE locations SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../location-list.php');
            }
        }
if(isset($_POST['loct_status_btn1'])){
    $id = $_POST['llid'];
    $statement = $connect->prepare("UPDATE locations SET status = 1 WHERE id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
        header('Location: ../location-list.php');
    }
}


?>