<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['prop_spec_submit'])) {
    
    $prop_spec_name= $_POST['prop_spec_name'];
    $prop_spec_slug = $_POST['prop_spec_slug'];
    if ($_FILES["spec_logo"]["name"] !== "") {

       $filename = $_FILES["spec_logo"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $speclogo = "uploads/amenities/".$new_name;
            $specimg = "../uploads/amenities/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["spec_logo"]["tmp_name"],
               $specimg
            );
          
        }else{
            echo "something wrong";
        }
    }
    $status = 1;
    // Validating slug address avilability
    
    $sql1 = 'select * from property_spec where spec_slug = :prop_status_slug';
    $stmt1 = $connect->prepare($sql1);
    $p = ['prop_status_slug'=>$prop_status_slug];
    $stmt1->execute($p);
    if($stmt1->rowCount() == 0){
        // Prepare the SQL statement
            $sql = "INSERT INTO property_spec (spec_name,spec_slug,spec_image,status) VALUES (:prop_spec_title,:prop_spec_slug,:prop_spec_image,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':prop_spec_title', $prop_spec_name);
            $stmt->bindParam(':prop_spec_slug', $prop_spec_slug);
            $stmt->bindParam(':prop_spec_image', $speclogo); 
            $stmt->bindParam(':status', $status);

        $stmt->execute();
       
        header('Location: ../property-spec-list.php');
        exit;
        }else{
            $msg = 'Slug/Status is already registered';
            die($msg);
        }
   }


    // Module for the updation of the brand
    if(isset($_POST['prop_spec_update'])){   
           $prop_spec_name= $_POST['prop_spec_name'];
           $prop_spec_slug = $_POST['prop_spec_slug'];
           
           if ($_FILES["spec_logo"]["name"] !== "") {

           $filename = $_FILES["spec_logo"]["name"];
           $extension = pathinfo($filename, PATHINFO_EXTENSION);
           $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
           if (in_array($extension, $valid_extension)) {
                $new_name = rand() . "." . $extension;
                $speclogo = "uploads/amenities/".$new_name;
                $specimg = "../uploads/amenities/" . $new_name;
                $move_file = move_uploaded_file(
                   $_FILES["spec_logo"]["tmp_name"],
                   $specimg
                );
              
            }else{
             
            }
        }else{
            $speclogo = $_POST['spec_logo_update'];
        }
           
           
            $status = 1;
            $id = $_POST['psid'];
            $sql = "UPDATE property_spec SET spec_name=:prop_spec_title, spec_slug=:prop_spec_slug,spec_image=:prop_spec_image,status=:status WHERE id=:id";
            $stmt = $connect->prepare($sql);
           
               // Bind the parameters
                $stmt->bindParam(':prop_spec_title', $prop_spec_name);
                $stmt->bindParam(':prop_spec_slug', $prop_spec_slug);
                $stmt->bindParam(':prop_spec_image', $speclogo); 
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                header('Location: ../property-spec-list.php');
                exit;
                }else{
                    $msg = 'Email address already registered';
                }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("DELETE FROM property_spec WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-spec-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['ps_status_btn'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("UPDATE property_spec SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-spec-list.php');
            }
                }
        if(isset($_POST['ps_status_btn1'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("UPDATE property_spec SET status = 1 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-spec-list.php');
            }
        }


?>