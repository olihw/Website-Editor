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
	.promptSave {
		position: relative;
		top: -50%;
		display: none;
		background-color: rgb(255,255,255);
		padding: 20px;
		width: 300px;
		margin: 0 auto;
	}
</style>
<body>
	<div id="htmlContainer" class="htmlContainer template"></div>
	<div class="editor">
		<p>Text editor</p>
		<button class='textSizeUp'>Font up</button>
		<button class='textSizeDown'>Font down</button>
		<button class="left">Left</button>
		<button class="center">center</button>
		<button class="right">right</button>
		<p class=currentFontSize></p>
		<textarea  class="text-input"></textarea>
	</div>
	<button class="previewPage">Preview</button>
	<button class="savePage">SAVE</button>
	<button class="downloadPage">Download</button>
	<div class="promptSave">
		<p>Do you wish to save before you download?</p>
		<button class="yesSave">Yes</button>
		<button class="noSave">No</button>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="plugins/Sortable.js"></script>
<script>
	$(document).ready(function() {
		var templateLocation;
		var templateID;
		var templateName;
		var versionNumber = 1;
		if(location.hash.substring(1).indexOf('||') == -1) {
			templateName = location.hash.substring(1);
		} else {
			templateName = location.hash.substring(1).split('||')[0];
			versionNumber = location.hash.substring(1).split('||')[1];
		}
		$.ajax({ //get more information and pass it all through.
			url: "retrieveTemplates.php",
			data: {
				template: templateName,
				version: versionNumber
			},
			type: 'post',
			success: function(response){
				var responseParsed = JSON.parse(response);
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200) {
						$("#htmlContainer").append(this.responseText);
						afterLoad();	
					}
				}
				xhttp.open("get",responseParsed.location, true);
				xhttp.send();
			

				var templateArray = responseParsed.location.split('/');
				templateLocation = templateArray[templateArray.length-1];
				templateID = responseParsed.id;
				console.log(templateID);
			}});

		$(".savePage").click(function(){
			savePages();
		});

		$(".previewPage").click(function(){
			previewPages();
		});

		$(".downloadPage").click(function(){
			$(".promptSave").show();
		});

		$(".yesSave").click(function(){
			$(".promptSave").hide();
			savePages(1);
		});

		$(".noSave").click(function(){
			$(".promptSave").hide();
			previewPages(1); 
		});


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
				e.stopPropagation();
				if(e.keyCode == '13') {
					if($(".text-input").val() == '') {

					} else {
						$(currentComponent).text($(".text-input").val());
						$(".editor").hide();
						unbindEditor();
					}
				}
			});
		}

		function unbindEditor () {
			$(".text-input").unbind('keypress');
			$(".textSizeDown").unbind('click');
			$(".textSizeUp").unbind('click');
			$(".left").unbind('click');
			$(".center").unbind('click');
			$(".right").unbind('click');
		}

		function fontSize(currentComponent, up) {
			var currentFontSize = currentComponent.css('font-size');
			var adjustment = parseInt(currentFontSize.split('px')[0])-1+'px'
			
			if(up) {
				adjustment = parseInt(currentFontSize.split('px')[0])+1+'px'
			}
			
			currentComponent.css('font-size', adjustment);
			currentFontSize = adjustment;
			$(".currentFontSize").text(currentFontSize);
		}

		function afterLoad() {
			var container = document.getElementById('htmlContainer');
			$('section').append('<div class="dragable"></div>')
			var sortable = Sortable.create(container,{
				handle: ".dragable",
				animation: 150
			});
			//$("#htmlContainer").append('<button class="preview">Preview</button>')
			$("h1, span").bind('click',function(event){
				event.stopPropagation();

				var currentComponent = $(this);
				console.log(currentComponent);
				var currentText = $(this).text();
				var currentFontSize = currentComponent.css('font-size');
				$(".text-input").val("");	
				$(".text-input").val(currentText);
				$(".currentFontSize").text(currentFontSize);				
				$(".editor").show();

				$('.textSizeDown').bind('click', function(){
					fontSize(currentComponent, false);
				});

				$('.textSizeUp').bind('click', function(){
					fontSize(currentComponent, true);
				});

				$('.left').bind('click', function(){
					currentComponent.css('text-align', 'left');
				});

				$('.center').bind('click', function(){
					currentComponent.css('text-align', 'center');
				});

				$('.right').bind('click', function(){
					currentComponent.css('text-align', 'right');
				});

				keypress(currentComponent);
			});
		}

		function savePages(downloadable) {
			var page = $(".htmlContainer")[0].innerHTML;
			$.ajax({
			url: "saveTemplates.php",
			data: {
				template: page,
				locationName: templateLocation,
				name: templateName,
				templateID: templateID
			},
			type: 'post',
			success: function(response){
				if(downloadable) {
					console.log(JSON.parse(response));
					downloadFile(JSON.parse(response).location);
				} else {
					
				}
			}});
		}

		function previewPages(downloadable) {
			var page = $(".htmlContainer")[0].innerHTML;
			$.ajax({
			url: "previewTemplates.php",
			data: {
				template: page,
				locationName: templateLocation,
			},
			type: 'post',
			success: function(response){
				if(downloadable) {
					downloadFile(JSON.parse(response));
				} else {
					window.open(JSON.parse(response),'_blank');
				}
			}});
		}
  
		function downloadFile(filelocation) {
			$.ajax({
			url: "downloadFile.php",
			data: {
				location: filelocation,
				templateName: templateLocation
			},
			type: 'post',
			success: function(response){
				window.location.assign(JSON.parse(response));
			}});
		}
	});
</script>