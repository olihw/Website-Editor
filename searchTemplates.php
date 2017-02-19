<?php
	$con = mysqli_connect("localhost", "root", "root", "c452project")or die(mysql_error());
	$query = mysqli_query($con, "Select * from templates"); // include company id
	
	$templates = "";
	while($row = mysqli_fetch_array($query)) {
		$count = 0;
		if($templates !="") {
			$templates .= ",";
		}
		$templates .= '{"templateName":"' . $row['Template Name'] . '",';
		$templates .= '"templateLocation":"' . $row['Template location'] . '"';
		
		$query2 = mysqli_query($con, "Select * from templateversion where TemplateID = ".$row['Template ID']);
		$num_rows = mysqli_num_rows($query2);

		if($num_rows == 0) {
			$templates .= '}';
		}
		else {
			$templates .= ',"templateVersions":[';
		}
		while($row2 = mysqli_fetch_array($query2)) {
			$count++;
			$position = strpos($row['Template location'], strrchr($row['Template location'], "/"));
			$versionlocation = substr_replace($row['Template location'], "/".$row2['Version Number'], $position, 0);
			
			if($count == $num_rows) {
				$templates .= '{"version":'.$row2['Version Number'].',';
				$templates .= '"location":"'.$versionlocation.'"}';
				$templates .= ']}';
			}
			else {
				$templates .= '{"version":'.$row2['Version Number'].',';
				$templates .= '"location":"'.$versionlocation.'"},';
			}
		}
	}
 

	$templates = '{"templates":['.$templates.']}'; 
	// error_log($num_rows, 0);
	echo $templates;
?>