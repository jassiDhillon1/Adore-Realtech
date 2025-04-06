<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['home_about_submit'])) {
   if ($_FILES["home_about_image"]["name"] !== "") {

       $filename = $_FILES["home_about_image"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/about/".$new_name;
            $locationimg = "../uploads/about/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["home_about_image"]["tmp_name"],
               $locationimg
            );
          
        }else{
            echo "something wrong";
        }
    }
    
            $status = 1;
            $image_alt = $_POST['home_about_alt'];
            $image_text = $_POST['home_about_text'];
            $home_about_heading = $_POST['home_about_heading'];
        // Prepare the SQL statement
            $sql = "INSERT INTO home_about (about_image, about_image_alt,about_image_text,home_about_image_head, status) VALUES (:about_image,:about_image_alt,:about_image_text,:home_about_heading,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':about_image', $locationlogo);
            $stmt->bindParam(':about_image_alt', $image_alt);
            $stmt->bindParam(':about_image_text', $image_text);
             $stmt->bindParam(':home_about_heading', $home_about_heading);
            $stmt->bindParam(':status', $status);
          

        $stmt->execute();
   
   
           if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stat_name']) && isset($_POST['stat_value'])) {
            $stat_names = $_POST['stat_name'];
            $stat_values = $_POST['stat_value'];
        
            // Prepare insert statement
            $query = "INSERT INTO home_stats (stat_name, stat_value) VALUES (:stat_name, :stat_value)";
            $stmt = $connect->prepare($query);
        
            // Execute the insert for each stat
            for ($i = 0; $i < count($stat_names); $i++) {
                $stmt->execute([
                    ':stat_name' => $stat_names[$i],
                    ':stat_value' => $stat_values[$i],
                ]);
            }
   
           }
        header('Location: ../list-about.php');
        exit;
       
   }


    // Module for the updation of the brand
    if(isset($_POST['home_about_update'])){ 
        
          $id = $_POST['about_id'];
          if ($_FILES["home_about_image"]["name"] !== "") {

               $filename = $_FILES["home_about_image"]["name"];
               $extension = pathinfo($filename, PATHINFO_EXTENSION);
               $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
               
               if (in_array($extension, $valid_extension)) {
                    $new_name = rand() . "." . $extension;
                    $locationlogo = "uploads/about/".$new_name;
                    $locationimg = "../uploads/about/" . $new_name;
                    $move_file = move_uploaded_file(
                       $_FILES["home_about_image"]["tmp_name"],
                       $locationimg
                    );
                  
                }else{
                    echo "something wrong";
                }
            }else{
                
                 $locationlogo = $_POST['home_about_image_main'];
                 
            }
        
            $status = 1;
            $image_alt = $_POST['home_about_alt'];
            $image_text = $_POST['home_about_text'];
            $home_about_heading = $_POST['home_about_heading'];
            
            $vedio_url = $_POST['home_banner_vedio'];
            $vedio_active = $_POST['Show_vedio'];
            
                
            $sql = "UPDATE home_about SET about_image=:about_image, about_image_text=:about_image_text, about_image_alt=:about_image_alt,about_image_alt=:about_image_alt,home_about_image_head=:home_about_image_head,status=:status,vedio_url=:vedio_url,vedio_status=:vedio_active WHERE id=:id";
            $stmt = $connect->prepare($sql);
       
           // Bind the parameters
            $stmt->bindParam(':about_image', $locationlogo);
            $stmt->bindParam(':about_image_alt', $image_alt);
            $stmt->bindParam(':about_image_text', $image_text);
             $stmt->bindParam(':home_about_image_head', $home_about_heading);
             $stmt->bindParam(':vedio_url', $vedio_url);
             $stmt->bindParam(':vedio_active', $vedio_active);
            $stmt->bindParam(':status', $status);
             $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            
           
            header('Location: ../list-about.php');
            exit;
            }else{
                $msg = 'Email address already registered';
            }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['bnid'];
            $statement = $connect->prepare("DELETE FROM home_about WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../list-about.php');
            }
        }
        
        
         // Module for the removing of the brand    
        if(isset($_POST['sid_delete_btn'])){
            $id = $_POST['sid'];
            $statement = $connect->prepare("DELETE FROM home_stats WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../list-stats.php');
            }
        }
        
 // Module for the status updation of the brand 
        if(isset($_POST['sid_status_btn'])){
            $id = $_POST['sid'];
            $statement = $connect->prepare("UPDATE home_stats SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../list-stats.php');
            }
        }
        if(isset($_POST['sid_status_btn1'])){
            $id = $_POST['sid'];
            $statement = $connect->prepare("UPDATE home_stats SET status = 1 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                
                header('Location: ../list-stats.php');
            }
        }
        // Module for the status updation of the brand 
        if(isset($_POST['bnid_status_btn'])){
            $id = $_POST['bnid'];
            $statement = $connect->prepare("UPDATE home_about SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../list-about.php');
            }
        }
        if(isset($_POST['bnid_status_btn1'])){
            $id = $_POST['bnid'];
            $statement = $connect->prepare("UPDATE home_about SET status = 1 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                
                header('Location: ../list-about.php');
            }
        }
        
        if(isset($_POST['stats_update'])){
              $stat_names = $_POST['stat_name'];
              $stat_values = $_POST['stat_value'];
              $stat_id = $_POST['stat_id'];
        
            // Prepare insert statement
            $query = "UPDATE home_stats SET stat_name = :stat_name, stat_value = :stat_value WHERE id = :id";
            $stmt = $connect->prepare($query);
            $stmt->execute([
                    ':stat_name' => $stat_names,
                    ':stat_value' => $stat_values,
                    ':id' => $stat_id
                ]);
                // Execute the insert for each stat
               header('Location: ../list-stats.php');
        }
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stats_add'])) {
            $stat_names = $_POST['stat_name'];
            $stat_values = $_POST['stat_value'];
            $query = "INSERT INTO home_stats (stat_name, stat_value) VALUES (:stat_name, :stat_value)";
            $stmt = $connect->prepare($query);
                $stmt->execute([
                    ':stat_name' => $stat_names,
                    ':stat_value' => $stat_values,
                ]);
     
            header('Location: ../list-stats.php');
        }
?>