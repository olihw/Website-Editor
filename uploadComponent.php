<?php
$componentName = $_POST["componentName"];
$company = $_POST['company'];
if(!is_dir("Components/".$componentName)) {
    mkdir("Components/".$componentName);
}
$target_dir = "Components/".$componentName."/";
$target_file = $target_dir . basename($_FILES["componentUploaded"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$componentLocation = $target_file;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "html" && $imageFileType != "php") {
    echo "Sorry, only HTML or PHP files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["componentUploaded"]["tmp_name"], $target_file)) {
        echo "The file ". $target_file . " has been uploaded.";

		$con = mysqli_connect("localhost", "maoh3", "9P1SYmEK4I")or die(mysql_error());
		mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
		$query = mysqli_query($con, "INSERT INTO component (`Company`, `Component Name`, `Component location`) VALUES ('$company', '$componentName', '$componentLocation')");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>