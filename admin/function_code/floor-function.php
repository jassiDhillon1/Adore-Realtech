<?php
session_start();
require_once '../include/connection.php';



// Module for the adding of the brand
if (isset($_POST['update-gallery'])) {
    // Retrieve form data
    $prop_id = $_POST['prop_id'];
    $status = 1;
    $floorName = $_POST['floor_name'];
    $FloorImg = $_FILES['floor_image'];

    // Loop through each floor name and associated image
    foreach ($floorName as $key => $value) {
        $floorname = $floorName[$key];

        // Check if the file for the current floor is not empty
        if ($FloorImg['name'][$key] !== "") {
            $filename = $FloorImg['name'][$key];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $valid_extension = ["jpg", "jpeg", "png", "gif", "webp", "pdf"];

            // Check if the file has a valid extension
            if (in_array($extension, $valid_extension)) {
                // Generate a unique name for the file
                $new_name = rand() . "." . $extension;
                $floor_image = "uploads/floorplans/" . $new_name;
                $floor_image_upload = "../uploads/floorplans/" . $new_name;

                // Move the uploaded file to the server
                $move_file = move_uploaded_file($FloorImg["tmp_name"][$key], $floor_image_upload);

                // Check if the file was successfully uploaded
                if ($move_file) {
                    // Prepare the SQL query to insert into the database
                    $sql = "INSERT INTO floor_plans (prop_id, floor_image, floor_name, fl_status) 
                            VALUES (:lastid, :floorname, :floorimage, :status)";
                    $stmt = $connect->prepare($sql);

                    // Bind the parameters
                    $stmt->bindParam(':lastid', $prop_id);
                    $stmt->bindParam(':floorname', $floorname);
                    $stmt->bindParam(':floorimage', $floor_image);
                    $stmt->bindParam(':status', $status);

                    // Execute the query
                    if ($stmt->execute()) {
                        // Optionally add a success message here
                    } else {
                        echo "Failed to insert into database for floor: " . $floorname;
                    }
                } else {
                    echo "Failed to upload file for floor: " . $floorname;
                }
            } else {
                echo "Invalid file type for floor: " . $floorname;
            }
        } else {
            echo "No file uploaded for floor: " . $floorname;
        }
    }

    // Redirect back after processing
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // No form submission detected
    echo "Form not submitted properly.";
}

  



   

    // Module for the removing of the brand    
        if(isset($_POST['delete_btn'])){
            $id = $_POST['pfid'];
            $statement = $connect->prepare("DELETE FROM floor_plans WHERE flr_id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
               header('Location: ' . $_SERVER['HTTP_REFERER']);
               exit;
            }
        }

        // Module for the status updation of the brand 
        if(isset($_POST['pf_status_btn'])){
            $id = $_POST['pfid'];
           
            $statement = $connect->prepare("UPDATE floor_plans SET fl_status = 0 WHERE flr_id=:id");
            $statement->bindParam(':id', $id);
            $del = $statement->execute();
            if($del){
               header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
            }
        }
if(isset($_POST['pf_status_btn1'])){
    $id = $_POST['pfid'];
    $statement = $connect->prepare("UPDATE floor_plans SET fl_status = 1 WHERE flr_id=:id");
    $statement->bindParam(':id', $id);
    $del = $statement->execute();
    if($del){
       header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
    }
}


?>