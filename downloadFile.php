<?php

	$filepath = $_POST["location"];
	$fileName = $_POST["templateName"];
	$fileName = substr($fileName,0,strrpos($fileName, "."));

    $zipname = 'temp/'.$fileName.'.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $zip->addFile($filepath);
    $zip->close();

    $filelocation = "temp/".$fileName.".zip";
    echo json_encode($filelocation);
?>