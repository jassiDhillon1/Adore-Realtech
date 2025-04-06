<?php
session_start();
require_once '../include/connection.php';

if (isset($_POST['media_submit'])) {
    $statement = $connect->prepare('INSERT INTO media (media_vedio, media_text) values(:media_vedio, :media_text)');
    $data = $statement->execute([
        'media_vedio' => $_POST['media_vedio'],
        'media_text' => $_POST['media_text'],
       
    ]);
      header('Location: ../media-list.php');
      exit;
}
if (isset($_POST['media_update'])) {
    $statement = $connect->prepare('UPDATE media SET media_vedio = :media_vedio, media_text = :media_text WHERE id = :id');
    $data = $statement->execute([
        'media_vedio' => $_POST['media_vedio'],
        'media_text' => $_POST['media_text'],
        'id' => $_POST['mid'],
    ]);
    header('Location: ../media-list.php');
    exit;
}



// Module for the removing of the brand    
        if(isset($_POST['mid_delete_btn'])){
            $id = $_POST['mid'];
            $statement = $connect->prepare("DELETE FROM media WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
              header('Location: ../media-list.php');
            }
        }


        // Module for the status updation of the brand 
        if(isset($_POST['mid_status_btn'])){
            $id = $_POST['mid'];
            $statement = $connect->prepare("UPDATE media SET status = 0 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                header('Location: ../media-list.php');
            }
        }
        if(isset($_POST['mid_status_btn1'])){
            $id = $_POST['mid'];
            $statement = $connect->prepare("UPDATE media SET status = 1 WHERE id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
                
                header('Location: ../media-list.php');
            }
        }