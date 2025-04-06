<?php
session_start();
require_once '../include/connection.php';


    // Module for the updation of the brand
    if(isset($_POST['pop_update'])){   
        $pop_title= $_POST['pop_title'];
        $polid = $_POST['polid'];
       
        
        $sql = "UPDATE home_popup SET parent_heading=:parent_heading WHERE pop_id=:id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':parent_heading', $pop_title);
          
            $stmt->bindParam(':id',$polid);
            $stmt->execute();
            header('Location: ../list-popup.php');
            exit;
            }else{
                $msg = 'Email address already registered';
            }


 
        // Module for the status updation of the brand 
        if(isset($_POST['pop_status_btn'])){
            $id = $_POST['poid'];
            $statement = $connect->prepare("UPDATE home_popup SET pop_status = 0 WHERE pop_id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../list-popup.php');
            }
        }
if(isset($_POST['pop_status_btn1'])){
    $id = $_POST['poid'];
    $statement = $connect->prepare("UPDATE home_popup SET pop_status = 1 WHERE pop_id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
        header('Location: ../list-popup.php');
    }
}




if(isset($_POST['document_submit'])){
    
    if ($_FILES["document_file"]["name"] !== "") {
       $filename = $_FILES["document_file"]["name"];
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       $valid_extension = ["pdf"];
       
       if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $locationlogo = "uploads/documents/".$new_name;
            $locationimg = "../uploads/documents/" . $new_name;
            $move_file = move_uploaded_file(
               $_FILES["document_file"]["tmp_name"],
               $locationimg
            );
          
        }else{
            echo "something wrong";
        }
        
        
        
            $status = 1;
            $prop_id = $_POST['pop_id'];
            $document_name = $_POST['document_name'];
            $sql = "INSERT INTO home_popup_document (document_name, document_path, status, popup_id) VALUES (:document_name,:document_path,:status,:property_id)";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':document_path', $locationlogo);
            $stmt->bindParam(':document_name', $document_name);
            $stmt->bindParam(':property_id', $prop_id);
            $stmt->bindParam(':status', $status);
          

        $stmt->execute();
    // die();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}


// Module for the removing of the brand
if (isset($_POST["pdid_delete_btn"])) {
    $id = $_POST["pdid"];
    $statement = $connect->prepare("DELETE FROM home_popup_document WHERE pd_id=:id");
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

// Module for the status updation of the brand
if (isset($_POST["pdid_status_btn"])) {
    $id = $_POST["pdid"];
    $statement = $connect->prepare(
        "UPDATE home_popup_document SET status = 0 WHERE pd_id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
if (isset($_POST["pdid_status_btn1"])) {
    $id = $_POST["pdid"];
    $statement = $connect->prepare(
        "UPDATE home_popup_document SET status = 1 WHERE pd_id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}


?>