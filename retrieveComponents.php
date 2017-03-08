<?php
	$con = mysqli_connect("localhost", "root", "root", "c452project")or die(mysql_error());
	$query = mysqli_query($con, "Select * from component"); // include company id
	
	$components = "";
	while($row = mysqli_fetch_array($query)) {
		if($components !="") {
			$components .= ",";
		}
		$components .= '{"componentName":"' . $row['Component Name'] . '",';
		$components .= '"componentLocation":"' . $row['Component location'] . '"}';
	}
 

	$components = '{"components":['.$components.']}'; 
	// error_log($num_rows, 0);
	echo $components;
?>