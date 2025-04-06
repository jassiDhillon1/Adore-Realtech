<?php
include("connection.php");

if (isset($_POST['add_submit'])) {

    if ($_FILES['filename_blog']['name'] !== '') {
        $file_name = $_FILES['filename_blog']['name'];
        $file_temp = $_FILES['filename_blog']['tmp_name'];
        $file_size = $_FILES['filename_blog']['size'];
        $file_type = $_FILES['filename_blog']['type'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $valid_extension = array("jpg", "jpeg", "png", "gif", "webp");
        if (in_array($extension, $valid_extension)) {
            $new_name = rand().'.'.$extension;
            $image_path = "upload/blog/".$new_name;
            move_uploaded_file($file_temp, $image_path);
        }
    }

    $statement = $connect->prepare('INSERT INTO blogs (title, slug, images, tags, description, postedby, shortDesc, imagealt, category, meta_title, meta_description, meta_keyword, date) values(:title, :slug, :images, :tags, :blog_description, :postname, :shortDesc, :imgalt, :category, :meta_title, :meta_description, :meta_keyword, :date)');
    $data = $statement->execute([
        'title' => $_POST['title'],
        'slug' => $_POST['slug'],
        'shortDesc' => $_POST['ShortDesc'],
        'imgalt' => $_POST['imagealt'],
        'category' => $_POST['categories'],
        'images' => $image_path,
        'tags' => $_POST['tags'],
        'blog_description' => $_POST['blog_description'],
        'postname' => 'AAA International Travel',
        'meta_title' => $_POST['meta_title'],
        'meta_description' => $_POST['meta_description'],
        'meta_keyword' => $_POST['meta_keyword'],
        'date' => date("Y-m-d"),
    ]);
    if ($data) {
        echo "<script>window.location.href = 'list-blog.php'</script>";
    } else {
        echo "<script>window.location.href = 'add-blog.php'</script>";
    }
}

if (isset($_POST['update_submit'])) {

    if ($_FILES['filename_blog']['name'] !== '') {
        $filename = $_FILES['filename_blog']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $valid_extension = array("jpg", "jpeg", "png", "gif", "webp");
        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . '.' . $extension;
            $image_path = "upload/blog/" . $new_name;
            $move_file = move_uploaded_file($_FILES['filename_blog']['tmp_name'], $image_path);
        }
    } else {
        $image_path = $_POST['hidden_filename'];
    }

    $statement = $connect->prepare('UPDATE blogs SET title=:title, slug=:slug, images=:image, tags=:tags, description=:blog_description, postedby=:postname, shortDesc=:shortDesc, imagealt=:imgalt, date=:date, category=:category, meta_title=:meta_title,meta_description=:meta_description,meta_keyword=:meta_keyword WHERE id=:id');
    $updateData = $statement->execute([
        ':title' => $_POST['title'],
        ':slug' => $_POST['slug'],
        ':shortDesc' => $_POST['ShortDesc'],
        ':imgalt' => $_POST['imagealt'],
        ':image' => $image_path,
        ':tags' => $_POST['tags'],
        ':date' => $_POST['date'],
        ':category' => $_POST['categories'],
        ':blog_description' => $_POST['blog_description'],
        ':postname' => $_POST['author'],
        ':meta_title' => $_POST['meta_title'],
        ':meta_description' => $_POST['meta_description'],
        ':meta_keyword' => $_POST['meta_keyword'],
        ':id' => $_POST['bid'],
    ]);
    if ($updateData) {
        echo "<script>window.location.href = 'list-blog.php'</script>";
    } else {
        echo "Wrong data update";
    }
}
