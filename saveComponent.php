<?php
	$template = $_POST['template'];
	$templatelocation = $_POST['locationName'];
	$templateName = $_POST['name'];
	$templateID = $_POST['templateID']; //hardcoded atm will need to be passed through from iframeEditor.php

	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	
	$query = mysqli_query($con, "Select * from component WHERE `Component ID` = '".$templateID."' ORDER BY `Date/Time` DESC LIMIT 1");

	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);
		$versionNumber = $row['Version Number']+1;
	}

	$query = mysqli_query($con, "INSERT INTO component (TemplateID, `Version Number`, `Date/Time`) VALUES ('$templateID', '$versionNumber', '$date')");
	mkdir("Components/".$templateName."/".$versionNumber);
	$file = fopen("Components/".$templateName."/".$versionNumber."/".$templatelocation, "w"); //will need to be changed to include company name as well as test page.
	fwrite($file, $template);
	fclose($file);


	echo json_encode("Components/".$templateName."/".$versionNumber."/".$templatelocation);
	
?>