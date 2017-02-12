<?php
$templateName = $_POST["templateName"];
if(!is_dir("Uploads/".$templateName)) {
    mkdir("Uploads/".$templateName);
}
$target_dir = "Uploads/".$templateName."/";
$target_file = $target_dir . basename($_FILES["templateUploaded"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$templateLocation = $target_file;
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
    if (move_uploaded_file($_FILES["templateUploaded"]["tmp_name"], $target_file)) {
        echo "The file ". $target_file . " has been uploaded.";

		$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
		mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
		$query = mysqli_query($con, "INSERT INTO templates (`CompanyID`, `Template Name`, `Template location`) VALUES ('1', '$templateName', '$templateLocation')");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("location: search.php");
?>