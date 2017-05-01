<title>Webpage Editor</title>
<style type="text/css">
	.htmlContainer section {
		border: dashed 1px;
		border-color: black;
		margin: 5px;
		position: relative;
	}
	.editor {
		display: none;
	    position: fixed;
	    width: 500px;
	    margin: 0 auto;
	    top: 20%;
	    right: 0;
	    left: 0;
	    background-color: #FFF;
	    height: 450px;
	    text-align: center;
	}
	.editor button {
		width: 48%;
		border: none;
    	background-color: white;
    	height: 40px;
	}
	.text-modifying {
		float: right;
		width: 30%;
	}
	.text-input {
		float:left;
		width: 70%;
		height: 86%;
	}
	.size-container, .alignment-container, .colour-container {
		border: solid 1px;
		margin-left: 4px;
	}
	.size-container {
		border-bottom: none;
	}
	.alignment-container button {
		width: 31%;
	}
	.alignment-container button i span {
	    width: 25px;
	    height: 2px;
	    background-color: black;
	    margin: 6px 0;
	    display: block;
	}
	.alignment-container .left span:first-child, .alignment-container .left span:last-child {
		width: 20px;
	}
	.alignment-container .right span:first-child, .alignment-container .right span:last-child {
		width: 20px;
		margin-left: 5px;
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
	.addComponent {
		float: right;
	}
	.componentMenu {
		display: none;
		height: 100px;
		width: 30%;
		text-align: center;
		position: fixed;
		top: 40%;
		background-color: white;
		left: 35%;
	}
	.componentMenu button {
		position: relative;
		top: 50%;
		transform: translateY(-50%);
	}
	.addNewComponentMenu {
		display: none;
		height: 100px;
		width: 30%;
		text-align: center;
		position: fixed;
		top: 40%;
		background-color: white;
		left: 35%;
	}
	.componentLibrary {
		display: none;
		height: 100px;
		width: 350px;
		text-align: center;
		position: fixed;
		top: 40%;
		background-color: white;
		left: 35%;
		overflow-y: scroll;
	}
	.component {
		margin: 0 20px;
	}
	.component .componentName {
		text-align: left;
		display: inline-block;
		padding-right: 30px;
	}

	.component .add {
		text-align: right;
		display: inline-block;
	}
	.down-arrow {
		transform: rotate(45deg);
		-webkit-transform: rotate(45deg);
	}
	.up-arrow {
		transform: rotate(-135deg);
	    -webkit-transform: rotate(-135deg);
	    margin-bottom: -5px;
	}
	.size-container button i {
		border: solid black;
		border-width: 0 3px 3px 0;
		padding: 3px;
		display: inline-block;
	}
	.font-size-title, .currentFontSize {
		display: inline-block;
	}
	.red {
		background-color: red;
	}
	.blue {
		background-color: blue;
	}
	.yellow {
		background-color: yellow;
	}
	.green {
		background-color: green;
	}
	.black {
		background-color: black;
	}
	.white {
		background-color: white;
	}
	.purple {
		background-color: purple;
	}
	.grey {
		background-color: grey;
	}
	.orange {
		background-color: orange;
	}
	.overlay {
		background-color: rgba(0,0,0,0.5);
	}
	.hexadecimal-input {
		width: 100%;
	}
	.colour-swatches span {
		width: 20px;
		height: 20px;
		display: inline-block;
	}
	.close-editor {
	    font-style: normal;
	    float: right;
	    margin: 10px;
	    cursor: pointer;
	}

</style>
<body>
	<div id="htmlContainer" class="htmlContainer template"></div>
	<div class="editor">
		<i class="close-editor">X</i>
		<p>Text editor</p>
		<div class="text-modifying">
			<div class="size-container">
				<p class="font-size-title">Font Size: </p><p class="currentFontSize"></p>
				<button class='textSizeUp'><i class="up-arrow"></i></button>
				<button class='textSizeDown'><i class="down-arrow"></i></button>
			</div>
			<div class="alignment-container">
				<p>Font Alignment</p>
				<button class="left"><i><span></span><span></span><span></span></i></button>
				<button class="center"><i><span></span><span></span><span></span></i></button>
				<button class="right"><i><span></span><span></span><span></span></i></button>
			</div>
			<div class="colour-container">
				<p>Font Colour</p>
				<div class="colour-swatches">
				<span class="red"></span>
				<span class="purple"></span>	
				<span class="blue"></span>	
				<span class="orange"></span>	
				<span class="green"></span>	
				<span class="yellow"></span>	
				<span class="white"></span>	
				<span class="grey"></span>
				<span class="black"></span>
				</div>
				<p class="hexadecimal-colour">Hexadecimal:</p>
				<input type="text" class="hexadecimal-input">
				<button class="colour-change">Apply</button>
			</div>
		</div>
		<textarea  class="text-input"></textarea>
	</div>
	<button class="previewPage">Preview</button>
	<button class="savePage">SAVE</button>
	<button class="downloadPage">Download</button>
	<button class="addComponent">Add component</button>
	<div class="promptSave">
		<p>Do you wish to save before you download?</p>
		<button class="yesSave">Yes</button>
		<button class="noSave">No</button>
	</div>
	<div class="componentMenu">
		<button class="componentLibraryBtn">Component Library</button>
		<button class="addNewComponent">Add new Component</button>
	</div>
	<div class="addNewComponentMenu">
		<form method="post" enctype="multipart/form-data" id="uploadComponent">
			<input type="hidden" class="company" name="company" value="">
			<input type="file" name="componentUploaded" id="componentUploaded">
			</br>componentName: 
			<input type="text" name="componentName" id="componentName">
			</br>
			<input type="submit" id="submit" name="submit" value="Upload component">
		</form>
	</div>
	<div ng-app="myApp" ng-controller="retrieveComponents">
		<div class="componentLibrary">
			<div class="component" ng-repeat="x in component">
				<p class="componentName">{{x.componentName}} <span>Preview</span></p><p class="add" ng-click="addComponent(x.componentLocation)">Add</p>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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
				console.log(response);
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
				$(".company").attr("value", window.frameElement.id.split(' ')[1]);
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

		$(".addComponent").click(function(){
			$(".componentMenu").show();
		});

		$(".addNewComponent").click(function(){
			$(".addNewComponentMenu").show();
			$(".componentMenu").hide();
		});

		$("#uploadComponent").submit(function(e){
			$.ajax({
				url: 'uploadComponent.php',
				type: 'POST',
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function(response) {
					$(".addNewComponentMenu").hide();
				}
			});
			e.preventDefault();
		})

		$(".componentLibraryBtn").click(function() {
			$(".componentLibrary").show();
			$(".componentMenu").hide();
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
				e.stopPropagation();
				if(e.keyCode == '13') {
					if($(".text-input").val() == '') {

					} else {
						$(currentComponent).text($(".text-input").val());
						$(".editor").hide();
						$("body").removeClass("overlay");
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
			$(".colour-change").unbind('click');
			$(".colour-swatches span").unbind('click');
			textEditBind();
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
			textEditBind();
		}

		function textEditBind() {
			$("h1, span").bind('click',function(event){
				event.stopPropagation();
				$("h1, span").unbind('click');
				$("body").addClass("overlay");
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

				$(".colour-change").bind('click', function() {
					var hexa = $(".hexadecimal-input").val();
					hexa = "#"+hexa;
					//error check needs to be added, regex and either 3 or 6 characters

					//changes colour of text
					currentComponent.css("color", hexa);

					//adds swatch to the list
					$(".colour-swatches").append("<span style='background-color:"+hexa+";'></span>");

					colourSwatch(currentComponent);

				});

				$(".close-editor").click(function() {
					if($(".text-input").val() == '') {

					} else {
						$(currentComponent).text($(".text-input").val());
						$(".editor").hide();
						$("body").removeClass("overlay");
						unbindEditor();
					}
				})

				colourSwatch(currentComponent);

				keypress(currentComponent);
			});
		}

		function colourSwatch(currentComponent) {
			$(".colour-swatches span").bind('click', function() {
				currentComponent.css("color", $(this).css("background-color"));
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

		// function addComponent() {
		// 	$.ajax({
		// 	url: "retrieveComponents.php",
		// 	data: {
		// 		componentName: $('.componentName'). 
		// 	},
		// 	type: 'post',
		// 	success: function(response){
		// 		window.location.assign(JSON.parse(response));
		// 	}});
		// }

	});

var app = angular.module('myApp', []);
	app.controller('retrieveComponents', function($scope, $http, $window) {
	    $http.get("retrieveComponents.php")
	    .then(function (response) {
	    	console.log(response);
	    	$scope.component = response.data.components;
	    });

	    $scope.addComponent = function(location) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					$("#htmlContainer").append(this.responseText);	
					$("section:last").append('<div class="dragable"></div>');
				}
			}
			xhttp.open("get",location, true);
			xhttp.send();
			$(".componentLibrary").hide();
			afterLoad();

	    }
	});
</script>
<script>

</script>