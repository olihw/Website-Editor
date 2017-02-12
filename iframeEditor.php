<title>Webpage Editor</title>
<style type="text/css">
	.htmlContainer section {
		border: dashed; 1px;
		border-color: black;
		margin: 5px;
		position: relative;
	}
	.editor {
		display: none;
	    position: absolute;
	    width: 500px;
	    margin: 10% 10%;
	    top: 0;
	    left: 0;
	    background-color: #FFF;
	    height: 300px;
	}
	.text-input {
		width: 100%;
		height: 100%;
	}
	.dragable {
		position: absolute;
		background-image: url('images/ic_pan_tool_black_24dp_1x.png');
		top: 0;
		left: 0;
		width: 24px;
		height: 24px;
		cursor: move;
  		cursor: -webkit-grabbing;
	}
</style>
<body>
	<div id="htmlContainer" class="htmlContainer template"></div>
	<div class="editor">
		<p>Text editor</p>
		<textarea  class="text-input"></textarea>
	</div>
	<button class="savePage">SAVE</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="plugins/Sortable.js"></script>
<script>
	$(document).ready(function() {
		var templateLocation;
		$.ajax({ //get more information and pass it all through.
			url: "retrieveTemplates.php",
			data: {
				template: location.hash.substring(1)
			},
			type: 'post',
			success: function(response){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						$("#htmlContainer").append(this.responseText);
						afterLoad();	
					}
				}
				xhttp.open("get",JSON.parse(response), true);
				xhttp.send();

				var templateArray = JSON.parse(response).split('/');
				templateLocation = templateArray[templateArray.length-1];

			}});

		$(".savePage").click(function(){
			var page = $(".htmlContainer")[0].innerHTML;
			$.ajax({
			url: "saveTemplates.php",
			data: {
				template: page,
				locationName: templateLocation,
				name: location.hash.substring(1)
			},
			type: 'post',
			success: function(response){
				alert("saved");
			}});
		})

		// function splitSections (html) {
		// 	html = html.substring(1,html.length-1);
		// 	var elements = $(html);
		// 	var sections = [];
		// 	for(i=0;i<elements.length;i++) {
		// 		if(elements[i].tagName == "SECTION") {
		// 			sections.push(elements[i]);
		// 		}
		// 	}
		// 	return sections;
		// }

		// function getStyles (html) {
		// 	html = html.substring(1,html.length-1);
		// 	var elements = $(html);
		// 	for(i=0;i<elements.length;i++) {
		// 		if(elements[i].tagName == "STYLE") {
		// 			return "<style type='text/css'>" + addContainer(elements[i].innerHTML) + "</style>";
		// 		}
		// 	}
		// }

		// function addContainer (styles) {
		// 	var css = styles.split('}');
		// 	for(var style in css) {
		// 		if(css[style] == ""){

		// 		} else {
		// 			css[style] = ".htmlContainer.template "+css[style]+"} ";
		// 		}
		// 	}
		// 	return css.join().replace(/,/g,'');
		// }

		function keypress (currentComponent) {
			$(".text-input").keypress(function(e){
				if(e.keyCode == '13') {
					if($(".text-input").val() == '') {

					} else {
						$(currentComponent).text($(".text-input").val());
						$(".editor").hide();
						$(".text-input").unbind('keypress');
					}
				}
			});
		}

		function afterLoad() {
			var container = document.getElementById('htmlContainer');
			$('section').append('<div class="dragable"></div>')
			var sortable = Sortable.create(container,{
				handle: ".dragable",
				animation: 150
			});
			//$("#htmlContainer").append('<button class="preview">Preview</button>')
			$("h1, span").click(function(){
				var currentComponent = $(this);
				var currentText = $(this).text();
				$(".text-input").val("");	
				$(".text-input").val(currentText);				
				$(".editor").show();

				keypress(currentComponent);
			});
		}
	});
</script>