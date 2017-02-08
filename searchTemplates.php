<?php
	$con = mysqli_connect("localhost", "maoh3", "9P1SYmEK4I", "c452project")or die(mysql_error());
	$query = mysqli_query($con, "Select * from templates");
	
	$templates = "";
	while($row = mysqli_fetch_array($query)) {
		if($templates !="") {
			$templates .= ",";
		}
		$templates .= '{"templateName":"' . $row['Template Name'] . '",';
		$templates .= '"templateLocation":"' . $row['Template location'] . '"}';
	}

	$templates = '{"templates":['.$templates.']}';

	echo $templates;
?>