<?php
require_once("common.php");
$submit = $_POST['submit'];
if(isset($submit) && $submit == "submit") {
    // 
    $blog['blog_title'] = $_POST['blog_title'];
    $blog['blog_description'] = $_POST['blog_description'];
    $blog['tags'] = $_POST['tags'];
    $blog['bimage'] = $_POST['bimage'];


    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["bimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["bimage"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["bimage"]["size"] > 100000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["bimage"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["bimage"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    //Create Blog
    $blogID = createBlog($blog);
} 


if(isset($_GET["bid"])) {
    $blogData = getBlog($_GET["bid"]);
}

require_once("content/blog_action.html.php");

