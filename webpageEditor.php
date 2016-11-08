<?php
	include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Webpage Editor</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$.ajax({
        url: 'retrieveTemplates.php',
        type: 'GET',
        dataType: "json"
	    }).done(function(data){
	        var html = JSON.stringify(data);
	        html = html.replace(/(?:\\[rnt]|[\r\n\t]+)+/g, "");
	        console.log(html);
	        $(".htmlContainer").append(html);
	    });

	    function splitSections (html) {
	    	var elements = $(html);
	    	var sections = [];

	    	for(i=0;i<elements.length;i++) {
	    		if(elements[i].tagName == "SECTION") {
	    			sections.push(elements[i]);
	    		}
	    	}
	    }
	});
</script>
</head>
<body>
<div class="htmlContainer"></div>
</body>
</html> 