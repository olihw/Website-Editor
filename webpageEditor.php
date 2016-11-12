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
	        console.log(html);
	        html = html.replace(/( ?:\\[rnt]|[\r\n\t]+)+/g, "");
	        $(".htmlContainer").append(getStyles(html));
	        var sections = splitSections(html);
	        $(".htmlContainer").append(sections);
	        document.getElementById('container').contentWindow.document.write(getStyles(html));
	        document.getElementById('container').contentWindow.document.write(sections[0].outerHTML);
	        document.getElementById('container').contentWindow.document.write(sections[1].outerHTML);
	        document.getElementById('container').contentWindow.document.write(sections[2].outerHTML);
	    });

	    function splitSections (html) {
	    	html = html.substring(1,html.length-1);
	    	var elements = $(html);
	    	var sections = [];
	    	for(i=0;i<elements.length;i++) {
	    		if(elements[i].tagName == "SECTION") {
	    			sections.push(elements[i]);
	    		}
	    	}
	    	return sections;
	    }

	    function getStyles (html) {
	    	html = html.substring(1,html.length-1);
	    	var elements = $(html);
	    	for(i=0;i<elements.length;i++) {
	    		if(elements[i].tagName == "STYLE") {
	    			return "<style type='text/css'>" + elements[i].innerHTML + "</style>";
	    		}
	    	}
	    }
	});
</script>
<style type="text/css">
	.htmlContainer section {
		border: dashed; 1px;
		border-color: black;
		margin: 5px;
	}
</style>
</head>
<body>
<section><h1>TESTET</h1></section>
<div class="htmlContainer"></div>
<section><h1>TESTET</h1></section>
<iframe id="container"></iframe>
</body>
</html> 