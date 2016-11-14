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
			var sections = splitSections(html);
			$(".htmlContainer").append(sections);
			$(".htmlContainer").append(getStyles(html));
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
					return "<style type='text/css'>" + addContainer(elements[i].innerHTML) + "</style>";
				}
			}
		}

		function addContainer (styles) {
			var css = styles.split('}');
			for(var style in css) {
				if(css[style] == ""){

				} else {
					css[style] = ".htmlContainer.template "+css[style]+"} ";
				}
			}
			return css.join().replace(/,/g,'');
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
<div class="htmlContainer template"></div>
</body>
</html> 