<?php
	$template = $_POST['template'];
	$templatelocation = $_POST['locationName'];

	$template = str_replace('<div class="dragable"></div>', "", $template);
	$template = str_replace('<i class="delete-section">X</i>', "", $template);
$template = str_replace('Click here to Upload Image', "", $template);
	// if(!is_dir("temp/".$templateName)) {
 //    	mkdir("temp/".$templateName); // add company into this as well
	// }
	$file = fopen("temp/".$templatelocation, "w"); //will need to be changed to include company name as well as test page.
	fwrite($file, $template);
	fclose($file);
	echo json_encode("temp/".$templatelocation);
?>