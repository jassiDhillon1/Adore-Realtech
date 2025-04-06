<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['prop_type_submit'])) {
    
    if ($_FILES["prop_type_image"]["name"] !== "") {

       $filename = $_FILES["prop_type_image"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/propertytype/".$new_name;
            $locationimg = "../uploads/propertytype/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["prop_type_image"]["tmp_name"],
               $locationimg
            );
          
        }else{
            echo "something wrong";
        }
    }
    $imge_alt = $_POST['prop_type_alt'];
    
    $prop_type_name= $_POST['prop_type_name'];
    $prop_type_slug = $_POST['prop_type_slug'];
    
    
    $prop_type_parent = $_POST['prop_type_parent'];
    $status = 1;
    // Validating slug address avilability
    
    $sql1 = 'select * from property_type where ptype_slug = :prop_type_slug';
    $stmt1 = $connect->prepare($sql1);
    $p = ['prop_type_slug'=>$prop_type_slug];
    $stmt1->execute($p);
    if($stmt1->rowCount() == 0){
        // Prepare the SQL statement
            $sql = "INSERT INTO property_type (ptype_name, ptype_slug, ptype_parent,type_path,type_alt,status) VALUES (:prop_type_title,:prop_type_slug,:prop_type_parent,:type_path,:type_alt,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':prop_type_title', $prop_type_name);
            $stmt->bindParam(':prop_type_slug', $prop_type_slug);
            $stmt->bindParam(':type_path', $locationlogo);
            $stmt->bindParam(':type_alt', $prop_type_slug);
            $stmt->bindParam(':prop_type_parent', $prop_type_parent);
            $stmt->bindParam(':status', $status);

        $stmt->execute();
    
        header('Location: ../property-type-list.php');
        exit;
        }else{
            $msg = 'Slug/Brand is already registered';
            die($msg);
        }
   }


    // Module for the updation of the brand
    if(isset($_POST['prop_type_update'])){   
        
        if ($_FILES["prop_type_image"]["name"] !== "") {
           $filename = $_FILES["prop_type_image"]["name"];
           $extension = pathinfo($filename, PATHINFO_EXTENSION);
           $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
           
           if (in_array($extension, $valid_extension)) {
                $new_name = rand() . "." . $extension;
                $locationlogo = "uploads/propertytype/".$new_name;
                $locationimg = "../uploads/propertytype/" . $new_name;
                $move_file = move_uploaded_file(
                   $_FILES["prop_type_image"]["tmp_name"],
                   $locationimg
                );
              
            }else{
                echo "something wrong";
            }
        }else{
            $locationlogo = $_POST['prop_type_image_main'];
        }
        $imge_alt = $_POST['prop_type_alt'];
        
        
            $prop_type_name= $_POST['prop_type_name'];
            $prop_type_slug = $_POST['prop_type_slug'];
            $prop_type_parent = $_POST['prop_type_parent'];
            $status = 1;
            $id = $_POST['plid'];
            $sql = "UPDATE property_type SET ptype_name=:prop_type_title, ptype_slug=:prop_type_slug,ptype_parent=:prop_type_parent,status=:status,type_path=:type_path,type_alt=:type_path WHERE id=:id";
            $stmt = $connect->prepare($sql);
           
               // Bind the parameters
                $stmt->bindParam(':prop_type_title', $prop_type_name);
                $stmt->bindParam(':prop_type_slug', $prop_type_slug);
                $stmt->bindParam(':prop_type_parent', $prop_type_parent);
                $stmt->bindParam(':type_path', $locationlogo);
                $stmt->bindParam(':type_alt', $imge_alt);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                header('Location: ../property-type-list.php');
                exit;
                }else{
                    $msg = 'Email address already registered';
                }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['llid'];
            $statement = $connect->prepare("DELETE FROM property_type WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-type-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['pt_status_btn'])){
            $id = $_POST['plid'];
            $statement = $connect->prepare("UPDATE property_type SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-type-list.php');
            }
        }
if(isset($_POST['pt_status_btn1'])){
    $id = $_POST['plid'];
    $statement = $connect->prepare("UPDATE property_type SET status = 1 WHERE id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
        header('Location: ../property-type-list.php');
    }
}


?>