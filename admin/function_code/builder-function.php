<?php
session_start();
require_once '../include/connection.php';

// Module for the adding of the brand
if(isset($_POST['builder_submit'])) {
   $builder_name= $_POST['builder_name'];
   $builder_slug = $_POST['builder_slug'];
   $meta_title = $_POST['meta_title'];
   $meta_desc = $_POST['meta_desc'];
   
   if ($_FILES["builderlogo"]["name"] !== "") {

       $filename = $_FILES["builderlogo"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $builderlogo = "uploads/builders/".$new_name;
            $builderImg = "../uploads/builders/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["builderlogo"]["tmp_name"],
               $builderImg
            );
          
        }else{
            echo "something wrong";
        }
    }
    
    $status = 1;
    // Validating slug address avilability
    $sql1 = 'select * from builders where bldr_slug = :bldr_slug';
    $stmt1 = $connect->prepare($sql1);
    $p = ['bldr_slug'=>$builder_slug];
    $stmt1->execute($p);
    if($stmt1->rowCount() == 0){
        // Prepare the SQL statement
            $sql = "INSERT INTO builders (bldr_title, bldr_slug, bldr_logo,meta_title,meta_desc,status) VALUES (:bldr_title,:bldr_slug,:bldr_image,:meta_title,:meta_desc,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':bldr_title', $builder_name);
            $stmt->bindParam(':bldr_slug', $builder_slug);
            $stmt->bindParam(':bldr_image', $builderlogo);
            $stmt->bindParam(':meta_title', $meta_title);
            $stmt->bindParam(':meta_desc', $meta_desc);
            $stmt->bindParam(':status', $status);

        $stmt->execute();

        header('Location: ../builder-list.php');
        exit;
        }else{
            $msg = 'Slug/Brand is already registered';
            die($msg);
        }
   }


    // Module for the updation of the brand
    if(isset($_POST['builder_update'])){   
        $builder_name= $_POST['builder_name'];
        $builder_slug = $_POST['builder_slug'];
        $meta_title = $_POST['meta_title'];
        $meta_desc = $_POST['meta_desc'];
        $id = $_POST['blid'];
        
         if ($_FILES["builderlogo"]["name"] !== "") {

         $filename = $_FILES["builderlogo"]["name"];
         $extension = pathinfo($filename, PATHINFO_EXTENSION);
         $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];
           if (in_array($extension, $valid_extension)) {
                $new_name = rand() . "." . $extension;
                $builderlogo = "uploads/builders/".$new_name;
                $builderImg = "../uploads/builders/" . $new_name;
                $move_file = move_uploaded_file(
                   $_FILES["builderlogo"]["tmp_name"],
                   $builderImg
                );
              
            }else{
                echo "something wrong";
            }
            }else{
                
                 $builderlogo = $_POST['builderlogo_main'];
                 
            }
        

        
        $status = 1;
        $id = $_POST['blid'];
        $sql = "UPDATE builders SET bldr_title=:bldr_title, bldr_slug=:bldr_slug,bldr_logo=:bldr_image,status=:status,meta_title=:meta_title,meta_desc=:meta_desc WHERE id=:id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':bldr_title', $builder_name);
            $stmt->bindParam(':bldr_slug', $builder_slug);
            $stmt->bindParam(':bldr_image', $builderlogo);
            $stmt->bindParam(':meta_title', $meta_title);
            $stmt->bindParam(':meta_desc', $meta_desc);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            header('Location: ../builder-list.php');
            exit;
            }else{
                $msg = 'Email address already registered';
            }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['blid'];
            $statement = $connect->prepare("DELETE FROM builders WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../builder-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['bldr_status_btn'])){
            $id = $_POST['blid'];
            $statement = $connect->prepare("UPDATE builders SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../builder-list.php');
            }
        }
if(isset($_POST['bldr_status_btn1'])){
    $id = $_POST['blid'];
    $statement = $connect->prepare("UPDATE builders SET status = 1 WHERE id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
        header('Location: ../builder-list.php');
    }
}


?>