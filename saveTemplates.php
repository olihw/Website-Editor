<?php
	$template = $_POST['template'];
	$templatelocation = $_POST['locationName'];
	$templateName = $_POST['name'];
	$templateID = $_POST['templateID'];
	$versionName = $_POST['versionName'];
	$date = date('Y-m-d H:i:s');
	$versionNumber = 2;

	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	
	$query = mysqli_query($con, "Select * from templateversion WHERE `TemplateID` = '".$templateID."' ORDER BY `Date/Time` DESC LIMIT 1");

	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);
		$versionNumber = $row['Version Number']+1;
	}

	$query = mysqli_query($con, "INSERT INTO templateversion (TemplateID, `Version Number`, `Version name` , `Date/Time`) VALUES ('$templateID', '$versionNumber', '$versionName', '$date')");
	$template = str_replace('<div class="dragable"></div>', "", $template);
	mkdir("Uploads/".$templateName."/".$versionNumber);
	$file = fopen("Uploads/".$templateName."/".$versionNumber."/".$templatelocation, "w"); //will need to be changed to include company name as well as test page.
	fwrite($file, $template);
	fclose($file);


	echo json_encode("Uploads/".$templateName."/".$versionNumber."/".$templatelocation);
	
?>