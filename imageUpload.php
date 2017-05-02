<?php
$image = $_FILES["file"];

if($_POST['versionNumber'] == 1) {
    $target_dir = "Uploads/".$_POST["templateName"]."/";
} else {
    $target_dir = "Uploads/".$_POST["templateName"]."/".$_POST['versionNumber']."/";
}
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$templateLocation = $target_file;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "html" && $imageFileType != "php") {
//     echo "Sorry, only HTML or PHP files are allowed.";
//     $uploadOk = 0;
// }

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". $target_file . " has been uploaded.";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>