<?php

    $target_dir = "upload/";
    
    // Using basename() to extract only the filename part of the path
    // This helps to prevent directory traversal attacks and ensures a safe filename
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);

    // print_r($target_dir);
    // echo "<br>";
    $uploadOk = 1;
    //The PATHINFO_EXTENSION constant tells pathinfo() to return only the extension part of the file path.
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Get the lowercase file extension of the uploaded file

   // Check if image file is a actual image or fake image
    if(isset($_POST['submit'])){
        // Use getimagesize() to check if the uploaded file is an image
        $check = getimagesize($_FILES["fileUpload"]["tmp_name"]);

        if($check !== false) {
            // If the file is an image, print its MIME type
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1; // Set $uploadOk flag to indicate the file is okay to upload
        } else {
            // If the file is not an image, indicate and set $uploadOk flag to 0
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    if($uploadOk == 0){
        echo "Sorry,  your file was not uploadded";
    }else{
        if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$target_file)){
            echo "The file " . htmlspecialchars(basename($_FILES['fileUpload']["name"]) . " has been uploaded");
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
