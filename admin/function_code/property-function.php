<?php
session_start();
require_once "../include/connection.php";

// Module for the adding of the property
if (isset($_POST["prop_submit"])) {
    $propAmen = $_POST["amenities"];
    $propAmenities = json_encode($propAmen);
    $propTitle = $_POST["prop_title"];
    $propSlug = $_POST["prop_slug"];
    $propType = $_POST["prop_type"];
    $propUrl = $_POST["prop_url"];
    $propStatus = $_POST["prop_status"];
    $propTag = $_POST["prop_tag"];
    $propPrice = $_POST["prop_price"];
    $propArea = $_POST["prop_area"];
    $propLocation = $_POST["prop_location"];
    $propHrera = $_POST["prop_hrera"];
    $propBuilder = $_POST["prop_builder"];
    $propConfig = $_POST["prop_config"];
    $propAmenities = json_encode($propAmen);
    $propPhone ="+91 9266808080";
    $propEmail ="info@adorerealtech.com";
    $propWhats = "+91 9266808080";
    $prop_meta_title = $_POST["prop_meta_title"];
    $prop_meta_keyword = $_POST["prop_meta_keyword"];
    $metaDesc = $_POST["metaDesc"];
    $propDesc = $_POST["propDesc"];
    $vedio_url = $_POST['home_banner_vedio'];
    $vedio_active = $_POST['Show_vedio'];
    $sort = (int)$_POST['sort'];
    $propertyPrice = $_POST["propertyPrice"];
    $locationAdvantage = $_POST["locationAdvantage"];
    $h1tag = $_POST["h1tag"];
    $parent_location = $_POST['parent_location'];
    $selectedOptions = $_POST['selected_properties'];
    $selectedOptionsString = json_encode($selectedOptions);
    $keyFeature = $_POST["keyFeature"];
    if ($_POST["is_featured"] == "on") {
        $is_featured = 1;
    } else {
        $is_featured = 0;
    }

    if ($_FILES["payment_plan"]["name"] !== "") {
        $filename = $_FILES["payment_plan"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp","pdf"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $paymentplan = "uploads/properties/" . $new_name;
            $paymentplan_1 = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["payment_plan"]["tmp_name"],
                $paymentplan_1
            );
        } else {
            echo "something wrong1";
        }
    }
    if ($_FILES["prop_logo"]["name"] !== "") {
        $filename = $_FILES["prop_logo"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propLogo = "uploads/properties/" . $new_name;
            $propimg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["prop_logo"]["tmp_name"],
                $propimg
            );
        } else {
            echo "something wrong1";
        }
    }
    if ($_FILES["cover_img"]["name"] !== "") {
        $filename = $_FILES["cover_img"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propCover = "uploads/properties/" . $new_name;
            $propcimg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["cover_img"]["tmp_name"],
                $propcimg
            );
        } else {
            echo "something wrong2";
        }
    }
    if ($_FILES["site_plan"]["name"] !== "") {
        $filename = $_FILES["site_plan"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propSite = "uploads/properties/" . $new_name;
            $propSiteImg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["site_plan"]["tmp_name"],
                $propSiteImg
            );
        } else {
            echo "something wrong3";
        }
    }
    if ($_FILES["location_map"]["name"] !== "") {
        $filename = $_FILES["location_map"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propLocationMap = "uploads/properties/" . $new_name;
            $propLocationMapImg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["location_map"]["tmp_name"],
                $propLocationMapImg
            );
        } else {
            echo "something wrong4";
        }
    }
    if ($_FILES["brochure"]["name"] !== "") {
        $filename = $_FILES["brochure"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp", "pdf"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propBroc = "uploads/properties/" . $new_name;
            $propBrocPdf = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["brochure"]["tmp_name"],
                $propBrocPdf
            );
        } else {
            echo "something wrong5";
        }
    }
    $status = 1;
    // Validating slug address avilability
   // this code basic stops the code via calabrating //
    $sql1 = "select * from properties where prop_slug = :propSlug";
    $stmt1 = $connect->prepare($sql1);
    $p = ["propSlug" => $propSlug];
    $stmt1->execute($p);
    if ($stmt1->rowCount() == 0) {
        // Prepare the SQL statement
        $sql =
            "INSERT INTO properties (prop_title,prop_slug,prop_logo,prop_type,prop_url,prop_cover,prop_status,prop_tag,prop_price,prop_area,prop_location,hrera,prop_builder,prop_config,prop_site_plan,prop_location_map,prop_brochure,prop_amenities,prop_phone,prop_email,prop_whatsapp,prop_meta_title,prop_meta_keyword,prop_meta_desc,prop_desc,prop_price_list,prop_location_adv,prop_key_feature,is_featured,status,prop_payment_plan,parent_location,prop_h1_tag,sorting,releated_props,vedio_url,vedio_status)VALUES (:propTitle,:propSlug,:propLogo,:propType,:propUrl,:propCoverimg,:propStatus,:propTag,:propPrice,:propArea,:propLocation,:propHrera,:propBuilder,:propConfig,:propSite,:propLocationMap,:propBroc,:propAmenities,:propPhone,:propEmail,:propWhats,:prop_meta_title,:prop_meta_keyword,:metaDesc,:propDesc,:propertyPrice,:locationAdvantage,:keyFeature,:isFeature,:status,:paymentPlan,:parentLocation,:h1tag,:sort,:releated_props,:vedio_url,:vedio_active)";
        $stmt = $connect->prepare($sql);
        // Bind the parameters
        $stmt->bindParam(":propTitle", $propTitle);
        $stmt->bindParam(":propSlug", $propSlug);
        $stmt->bindParam(":propLogo", $propLogo);
        $stmt->bindParam(":propType", $propType);
        $stmt->bindParam(":propUrl", $propUrl);
        $stmt->bindParam(":propCoverimg", $propCover);
        $stmt->bindParam(":propStatus", $propStatus);
        $stmt->bindParam(":propTag", $propTag);
        $stmt->bindParam(":propPrice", $propPrice);
        $stmt->bindParam(":propArea", $propArea);
        $stmt->bindParam(":propLocation", $propLocation);
        $stmt->bindParam(":propHrera", $propHrera);
        $stmt->bindParam(":propBuilder", $propBuilder);
        $stmt->bindParam(":propConfig", $propConfig);
        $stmt->bindParam(":propSite", $propSite);
        $stmt->bindParam(":propLocationMap", $propLocationMap);
        $stmt->bindParam(":propBroc", $propBroc);
        $stmt->bindParam(":propAmenities", $propAmenities);
        $stmt->bindParam(":propPhone", $propPhone);
        $stmt->bindParam(":propEmail", $propEmail);
        $stmt->bindParam(":propWhats", $propWhats);
        $stmt->bindParam(":prop_meta_title", $prop_meta_title);
        $stmt->bindParam(":prop_meta_keyword", $prop_meta_keyword);
        $stmt->bindParam(":metaDesc", $metaDesc);
        $stmt->bindParam(":propDesc", $propDesc);
        $stmt->bindParam(":propertyPrice", $propertyPrice);
        $stmt->bindParam(":locationAdvantage", $locationAdvantage);
        $stmt->bindParam(":keyFeature", $keyFeature);
        $stmt->bindParam(":isFeature", $is_featured);
        $stmt->bindParam(":paymentPlan", $paymentplan);
        $stmt->bindParam(":parentLocation", $parent_location);
        $stmt->bindParam(":h1tag", $h1tag);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":sort", $sort);
        $stmt->bindParam(':vedio_url', $vedio_url);
        $stmt->bindParam(':vedio_active', $vedio_active);
         
         $stmt->bindParam(":releated_props", $selectedOptionsString);
        
        $stmt->execute();
        
        // Start of the module for the  floor plan //
        $last_insert = $connect->lastInsertId();
        $floorName = $_POST["floor_name"];
        $FloorImg = $_FILES["floor_image"];
        foreach ($floorName as $key => $value) {
            $lastid = $last_insert;
            $status = 1;
            $floorname = $floorName[$key];
            $FloorImg = $_FILES["floor_image"];
            if ($FloorImg["name"][$key] !== "") {
                $filename = $FloorImg["name"][$key];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $valid_extension = ["jpg", "jpeg", "png", "gif", "webp", "pdf"];
                if (in_array($extension, $valid_extension)) {
                    $new_name = rand() . "." . $extension;
                    $floor_image = "uploads/floorplans/" . $new_name;
                    $floor_image_upload = "../uploads/floorplans/" . $new_name;
                    $move_file = move_uploaded_file(
                        $FloorImg["tmp_name"][$key],
                        $floor_image_upload
                    );
                } else {
                    echo "something wrong";
                }
            }
            $sql =
                "INSERT INTO floor_plans (prop_id, floor_image, floor_name,fl_status) VALUES (:lastid,:floorname,:floorimage,:status)";
            $stmt = $connect->prepare($sql);
            // Bind the parameters
            $stmt->bindParam(":lastid", $lastid);
            $stmt->bindParam(":floorname", $floorname);
            $stmt->bindParam(":floorimage", $floor_image);
            $stmt->bindParam(":status", $status);

            $stmt->execute();
        }
        $galleryImg = $_FILES["gallery_image"]["name"];

        foreach ($galleryImg as $key => $value) {
            // Start of the gallery management //
            $lastid = $last_insert;
            $status = 1;

            $galleryImg = $_FILES["gallery_image"];
            if ($galleryImg["name"][$key] !== "") {
                $filename = $galleryImg["name"][$key];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $valid_extension = ["jpg", "jpeg", "png", "gif", "webp", "pdf"];
                if (in_array($extension, $valid_extension)) {
                    $new_name = rand() . "." . $extension;
                    $gallery_image = "uploads/gallery/" . $new_name;
                    $gallery_image_upload = "../uploads/gallery/" . $new_name;
                    $move_file = move_uploaded_file(
                        $galleryImg["tmp_name"][$key],
                        $gallery_image_upload
                    );
                } else {
                    echo "something wrong";
                }
            }
            $sql =
                "INSERT INTO property_gallery (prop_id, gallery_image,gl_status) VALUES (:lastid,:galleryImg,:status)";
            $stmt = $connect->prepare($sql);
            // Bind the parameters
            $stmt->bindParam(":lastid", $lastid);
            $stmt->bindParam(":galleryImg", $gallery_image);
            $stmt->bindParam(":status", $status);

            $stmt->execute();
        }

        header("Location: ../property-list.php");
        exit();
    } else {
        $msg = "Slug/Status is already registered";
        die($msg);
    }
}

// Module for the updation of the brand

if (isset($_POST["prop_update"])) {
    $propTitle = $_POST["prop_title"];
    $propSlug = $_POST["prop_slug"];
    $propType = $_POST["prop_type"];
    $propUrl = $_POST["prop_url"];
    $propStatus = $_POST["prop_status"];
    $propTag = $_POST["prop_tag"];
    $propPrice = $_POST["prop_price"];
    $propArea = $_POST["prop_area"];
    $propLocation = $_POST["prop_location"];
    $propHrera = $_POST["prop_hrera"];
    $propBuilder = $_POST["prop_builder"];
    $propConfig = $_POST["prop_config"];
    $propAmen = $_POST["amenities"];
    $propAmenities = json_encode($propAmen);
    $propPhone ="+91 9266808080";
    $propEmail ="info@adorerealtech.com";
    $propWhats = "+91 9266808080";
    $prop_meta_title = $_POST["prop_meta_title"];
    $prop_meta_keyword = $_POST["prop_meta_keyword"];
    $metaDesc = $_POST["metaDesc"];
    $propDesc = $_POST["propDesc"];
    $propertyPrice = $_POST["propertyPrice"];
    $parent_location = $_POST['parent_location'];
    $h1tag = $_POST["h1tag"];
    $locationAdvantage = $_POST["locationAdvantage"];
    $keyFeature = $_POST["keyFeature"];
    $sort = (int)($_POST['sort']);
    
     $vedio_url = $_POST['home_banner_vedio'];
            $vedio_active = $_POST['Show_vedio'];
     $selectedOptions = $_POST['selected_properties'];
    $selectedOptionsString = json_encode($selectedOptions);
    $status = 1;
    $id = $_POST['peid'];
    if (isset($_POST["is_featured"]) && $_POST["is_featured"] == "on") {
        $is_featured = 1;
    } else {
        $is_featured = 0;
    }

if ($_FILES["payment_plan"]["name"] !== "") {
        $filename = $_FILES["payment_plan"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $paymentplan = "uploads/properties/" . $new_name;
            $paymentplan_1 = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["payment_plan"]["tmp_name"],
                $paymentplan_1
            );
                //  die($paymentplan);
        } else {
            echo "something wrong1";
        }
    }else{
          $paymentplan = $_POST['payment_plan_update']; 
        //   die($paymentplan);
    }

    if ($_FILES["prop_logo"]["name"] !== "") {
        $filename = $_FILES["prop_logo"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propLogo = "uploads/properties/" . $new_name;
            $propimg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["prop_logo"]["tmp_name"],
                $propimg
            );
        } else {
            echo "Please Upload Correct format.";
        }
    }else{
        $propLogo = $_POST['prop_logo_update'];
    }
    if ($_FILES["cover_img"]["name"] !== "") {
        $filename = $_FILES["cover_img"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propCover = "uploads/properties/" . $new_name;
            $propcimg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["cover_img"]["tmp_name"],
                $propcimg
            );
        } else {
            echo "something wrong2";
        }
    }else{
       $propCover = $_POST['cover_img_update']; 
    }

    //
    if ($_FILES["site_plan"]["name"] !== "") {
        $filename = $_FILES["site_plan"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propSite = "uploads/properties/" . $new_name;
            $propSiteImg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["site_plan"]["tmp_name"],
                $propSiteImg
            );
            
       
        } else {
            echo "something wrong3";
        }
    }else{
        $propSite = $_POST['site_plan_update'];
    }

    if ($_FILES["location_map"]["name"] !== "") {
        $filename = $_FILES["location_map"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propLocationMap = "uploads/properties/" . $new_name;
            $propLocationMapImg = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["location_map"]["tmp_name"],
                $propLocationMapImg
            );
        } else {
            echo "something wrong4";
        }
    }else{
        $propLocationMap = $_POST['location_map_update'];
    }
    //
    if ($_FILES["brochure"]["name"] !== "") {
        $filename = $_FILES["brochure"]["name"];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = ["jpg", "jpeg", "png", "gif", "webp", "pdf"];

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $propBroc = "uploads/properties/" . $new_name;
            $propBrocPdf = "../uploads/properties/" . $new_name;
            $move_file = move_uploaded_file(
                $_FILES["brochure"]["tmp_name"],
                $propBrocPdf
            );
        } else {
            echo "something wrong5";
        }
    }else{
        $propBroc = $_POST['brochure_update'];
    }
    $sql = "UPDATE properties SET prop_title=:propTitle, prop_slug=:propSlug,prop_logo=:propLogo,prop_type=:propType,prop_url=:propUrl,prop_cover=:propCoverimg,prop_status=:propStatus,prop_tag=:propTag,prop_price=:propPrice,prop_area=:propArea,prop_location=:propLocation,hrera=:propHrera,prop_builder=:propBuilder,prop_config=:propConfig,prop_site_plan=:propSite,prop_location_map=:propLocationMap,prop_brochure=:propBroc,prop_amenities=:propAmenities,prop_phone=:propPhone,prop_email=:propEmail,prop_whatsapp=:propWhats,prop_meta_title=:prop_meta_title,prop_meta_keyword=:prop_meta_keyword,prop_meta_desc=:metaDesc,prop_desc=:propDesc,prop_price_list=:propertyPrice,prop_location_adv=:locationAdvantage,prop_key_feature=:keyFeature,is_featured=:isFeature,status=:status,parent_location=:parentLocation,prop_payment_plan=:paymentPlan, prop_h1_tag=:h1tag, sorting=:sort, releated_props=:releated_props,vedio_url=:vedio_url,vedio_status=:vedio_active WHERE p_id=:id";
    $stmt = $connect->prepare($sql);
    // Bind the parameters
        $stmt->bindParam(":propTitle", $propTitle);
        $stmt->bindParam(":propSlug", $propSlug);
        $stmt->bindParam(":propLogo", $propLogo);
        $stmt->bindParam(":propType", $propType);
        $stmt->bindParam(":propUrl", $propUrl);
        $stmt->bindParam(":propCoverimg", $propCover);
        $stmt->bindParam(":propStatus", $propStatus);
        $stmt->bindParam(":propTag", $propTag);
        $stmt->bindParam(":propPrice", $propPrice);
        $stmt->bindParam(":propArea", $propArea);
        $stmt->bindParam(":propLocation", $propLocation);
        $stmt->bindParam(":propHrera", $propHrera);
        $stmt->bindParam(":propBuilder", $propBuilder);
        $stmt->bindParam(":propConfig", $propConfig);
        $stmt->bindParam(":propSite", $propSite);
        $stmt->bindParam(":propLocationMap", $propLocationMap);
        $stmt->bindParam(":propBroc", $propBroc);
        $stmt->bindParam(":propAmenities", $propAmenities);
        $stmt->bindParam(":propPhone", $propPhone);
        $stmt->bindParam(":propEmail", $propEmail);
        $stmt->bindParam(":propWhats", $propWhats);
        $stmt->bindParam(":prop_meta_title", $prop_meta_title);
        $stmt->bindParam(":prop_meta_keyword", $prop_meta_keyword);
        $stmt->bindParam(":metaDesc", $metaDesc);
        $stmt->bindParam(":propDesc", $propDesc);
        $stmt->bindParam(":propertyPrice", $propertyPrice);
        $stmt->bindParam(":locationAdvantage", $locationAdvantage);
        $stmt->bindParam(":keyFeature", $keyFeature);
        $stmt->bindParam(":isFeature", $is_featured);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":paymentPlan", $paymentplan);
        $stmt->bindParam(":h1tag", $h1tag);
           $stmt->bindParam(':vedio_url', $vedio_url);
             $stmt->bindParam(':vedio_active', $vedio_active);
        $stmt->bindParam(":parentLocation", $parent_location);
        $stmt->bindParam(":sort", $sort);
         $stmt->bindParam(":releated_props", $selectedOptionsString);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("Location: ../property-list.php");
        exit();
} else {
    $msg = "Email address already registered";
}

// Module for the removing of the brand
if (isset($_POST["delete_btn"])) {
    $id = $_POST["prid"];
    $statement = $connect->prepare("DELETE FROM properties WHERE p_id=:id");
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header("Location: ../property-list.php");
    }
}

// Module for the status updation of the brand
if (isset($_POST["prop_status_btn"])) {
    $id = $_POST["prid"];
    $statement = $connect->prepare(
        "UPDATE properties SET status = 0 WHERE p_id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
       header("Location: ../property-list.php");
    }
}
if (isset($_POST["prop_status_btn1"])) {
    $id = $_POST["prid"];
    $statement = $connect->prepare(
        "UPDATE properties SET status = 1 WHERE p_id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header("Location: ../property-list.php");
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
            $prop_id = $_POST['prop_id'];
            $document_name = $_POST['document_name'];
            $sql = "INSERT INTO document (document_name, document_path, status, property_id) VALUES (:document_name,:document_path,:status,:property_id)";
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
    $statement = $connect->prepare("DELETE FROM document WHERE id=:id");
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
        "UPDATE document SET status = 0 WHERE id=:id"
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
        "UPDATE document SET status = 1 WHERE id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}



if (isset($_POST['construction_submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['construction_image'])) {
        // Retrieve form data
        $constructionImages = $_FILES['construction_image'];
        $imageAlts = $_POST['image_alt'];
        $constructionTitle = $_POST['construction_title'];
        $propertyId = $_POST['prop_id'];
        
        // Prepare the insert query
        $query = "INSERT INTO construction (construction_title, property_id, construction_image, construction_image_alt) 
                  VALUES (:construction_title, :property_id, :image_path, :image_alt)";
        $stmt = $connect->prepare($query);

        // Loop through each file
        for ($i = 0; $i < count($constructionImages['name']); $i++) {
            // Get the file extension
            $fileExtension = pathinfo($constructionImages['name'][$i], PATHINFO_EXTENSION);

            // Generate a unique file name
            $imageName = uniqid('img_', true) . '.' . $fileExtension;

            // Define file paths
            $relativeFilePath = "uploads/construction/" . $imageName;
            $absoluteFilePath = "../" . $relativeFilePath;

            // Move the file to the target directory
            if (move_uploaded_file($constructionImages['tmp_name'][$i], $absoluteFilePath)) {
                // Execute the query with file path and alt text
                $stmt->execute([
                    ':construction_title' => $constructionTitle,
                    ':property_id' => $propertyId,
                    ':image_path' => $relativeFilePath,
                    ':image_alt' => $imageAlts[$i]
                ]);
            }
        }

        // Redirect to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}


if (isset($_POST["pcid_delete_btn"])) {
    $id = $_POST["pcid"];
    $statement = $connect->prepare("DELETE FROM construction WHERE id=:id");
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

// Module for the status updation of the brand
if (isset($_POST["pcid_status_btn"])) {
    $id = $_POST["pcid"];
    $statement = $connect->prepare(
        "UPDATE construction SET status = 0 WHERE id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
       header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
if (isset($_POST["pcid_status_btn1"])) {
    $id = $_POST["pcid"];
    $statement = $connect->prepare(
        "UPDATE construction SET status = 1 WHERE id=:id"
    );
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if (isset($_POST['construction_title_submit'])) {
   
        // Retrieve form data
      
        
        $constructionTitle = $_POST['construction_title'];
        $propertyId = $_POST['prop_id'];
        
        // Prepare the insert query
        $query = "INSERT INTO construction_title (construction_title, construction_prop_id) VALUES (:construction_title, :property_id)";
        $stmt = $connect->prepare($query);
                $stmt->execute([
                    ':construction_title' => $constructionTitle,
                    ':property_id' => $propertyId
                ]);
            
    

        // Redirect to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

if (isset($_POST['construction_title_update'])) {
   
        // Retrieve form data
      
        
        $constructionTitle = $_POST['construction_title'];
        $const_id = $_POST['const_id'];
        
        // Prepare the update query
        $query = "UPDATE construction_title SET construction_title = :construction_title WHERE id = :id";
        $stmt = $connect->prepare($query);
        $stmt->execute([
            ':construction_title' => $constructionTitle,
            ':id' => $const_id
        ]);
    

        // Redirect to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    
if (isset($_POST["pcsid_delete_btn"])) {
    $id = $_POST["pcsid"];
    $statement = $connect->prepare("DELETE FROM construction_title WHERE id=:id");
    $statement->bindParam(":id", $id);
    $del = $statement->execute();
    if ($del) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
?>