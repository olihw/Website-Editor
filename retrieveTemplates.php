<?php
	$template = $_POST['template'];
	$version = $_POST['version'];

	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	
	$queryString = "Select * from templates INNER JOIN templateversion ON templates.`Template ID` = templateversion.TemplateID WHERE `Template Name` = '".$template."' && `Version Number` =".$version;

	if ($version == 1) {
		$queryString = "Select * from templates WHERE `Template Name` = '".$template."'";
	}

	$query = mysqli_query($con, $queryString);
	if (mysqli_num_rows($query)==1) {
		$row = mysqli_fetch_assoc($query);

		$arr = array('location' => $row['Template location'], 'id' => $row['Template ID']);
		
		if ($version != 1) {
			$position = strpos($row['Template location'], strrchr($row['Template location'], "/"));
			$versionlocation = substr_replace($row['Template location'], "/".$row['Version Number'], $position, 0);
			$arr = array('location' => $versionlocation, 'id' => $row['Template ID']);
		}
		

		echo json_encode($arr);
	} else {
		echo json_encode($template);
	}
?>