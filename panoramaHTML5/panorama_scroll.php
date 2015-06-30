<?php
session_start();
$_SESSION['colid'] = 38;
define("ABS_PATH", $_SERVER['DOCUMENT_ROOT']);
include("../dependencies/functions.php");
getHeader("","View the Panorama");
?>
	<h3 id="pageTitle">The Heroic Life &amp; Career of Garibaldi</h3>
	<div id="garibaldiHTML5">	
		<p id="currentSlideLabel" class="bar" style="display:none;">SCENE 1</p>

		<button id="jumpBack" class="imgInButton visible control" style="display:none;"><img src="./resources/back_arrow.png" alt="Back"></button>
		<button id="jumpForward" class="imgInButton visible control" style="display:none;"><img src="./resources/forward_arrow.png" alt="Forward"></button>

		<div id="playBar" class="bar visible control" style="display:none;">
			<button class="controlButton" id="startAnimationNoSound">▷ Silent</button>
			<button class="controlButton" id="startAnimationEnglish">▷ English</button>
			<button class="controlButton" id="startAnimationItalian">▷ Italian</button>
		</div>

		<div id="flipBar" class="bar visible control" style="display:none;">
			<button id="flip" class="controlButton">Other Side</button>	
		</div>
		
		<div id="stopBar" class="bar control" style="display:none;">
			<button class="controlButton" id="stopAnimation">Stop</button>
		</div>
		<div id="loadingOverlay" style="display:none;"></div>

		<div id="side1Canvas">
			<div id="side1NavImg" class="navImg">
				<p class="navImgHelp">Jump to Location</p>
				<img src="./side1/side1_navthumbnail_780x16.jpg" title="Click to jump to location.">
			</div>
			<canvas>
				Your browser does not support the HTML5 canvas tag.
			</canvas>
		</div>

		<div id="side2Canvas" style="display:none;">
			<div id="side2NavImg" class="navImg">
				<p id="side2NavImgHelp" class="navImgHelp">Jump to Location</p>
				<img src="./side2/side2_navthumbnail_634x16.jpg" title="Click to jump to location.">
			</div>
			<canvas>
				Your browser does not support the HTML5 canvas tag.
			</canvas>
		</div>
		
		<p class="instructions">The Panorama may take a moment to load. You can view the Panorama with narration in English or in Italian by clicking the appropriate language button (▷ English or ▷ Italian). The ▷ Silent button will scroll through the Panorama with no sound. The buttons disappear once the Panorama starts to scroll or when your mouse is no longer on the Panorama. To show the Stop button, move your mouse over the window. </p>
	</div>

	<br><br>
	<?footer()?>
	<script src="panorama_scroll.js"></script>
	<link href="panorama_scroll.css" rel="stylesheet" type="text/css">
	</body>
</html>
