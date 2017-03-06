<?php
	$company = $_SESSION['company'];

	$con = mysqli_connect("localhost", "root", "root")or die(mysql_error());
	mysqli_select_db($con ,"c452project")or die("Cannot connect to database");
	
	$queryString = "Select * from component INNER JOIN users ON component.`Company` = users.Company WHERE `Company` = '".$company."'";

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