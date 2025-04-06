<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if(isset($_POST['prop_status_submit'])) {
    
    $prop_status_name= $_POST['prop_status_name'];
    $prop_status_slug = $_POST['prop_status_slug'];
    $status = 1;
    // Validating slug address avilability
    
    $sql1 = 'select * from property_status where status_slug = :prop_status_slug';
    $stmt1 = $connect->prepare($sql1);
    $p = ['prop_status_slug'=>$prop_status_slug];
    $stmt1->execute($p);
    if($stmt1->rowCount() == 0){
        // Prepare the SQL statement
            $sql = "INSERT INTO property_status (status_name, status_slug,status) VALUES (:prop_status_title,:prop_status_slug,:status)";
            $stmt = $connect->prepare($sql);
        // Bind the parameters
            $stmt->bindParam(':prop_status_title', $prop_status_name);
            $stmt->bindParam(':prop_status_slug', $prop_status_slug);
            $stmt->bindParam(':status', $status);

        $stmt->execute();
       
        header('Location: ../property-status-list.php');
        exit;
        }else{
            $msg = 'Slug/Status is already registered';
            die($msg);
        }
   }


    // Module for the updation of the brand
    if(isset($_POST['prop_status_update'])){   
            $prop_status_name= $_POST['prop_status_name'];
            $prop_status_slug = $_POST['prop_status_slug'];
            $status = 1;
            $id = $_POST['psid'];
            $sql = "UPDATE property_status SET status_name=:prop_status_title, status_slug=:prop_status_slug,status=:status WHERE id=:id";
            $stmt = $connect->prepare($sql);
           
               // Bind the parameters
                $stmt->bindParam(':prop_status_title', $prop_status_name);
                $stmt->bindParam(':prop_status_slug', $prop_status_slug);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
                header('Location: ../property-status-list.php');
                exit;
                }else{
                    $msg = 'Email address already registered';
                }


    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("DELETE FROM property_status WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-status-list.php');
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['pt_status_btn'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("UPDATE property_status SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-status-list.php');
            }
                }
        if(isset($_POST['pt_status_btn1'])){
            $id = $_POST['psid'];
            $statement = $connect->prepare("UPDATE property_status SET status = 1 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../property-status-list.php');
            }
        }


?>