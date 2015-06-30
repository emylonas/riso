<?php
session_start();
$_SESSION['colid'] = 38;
define("ABS_PATH", $_SERVER['DOCUMENT_ROOT']);
include("../dependencies/functions.php");
getHeader("","View the Panorama");
?>
	<div class="container">
		<div class="span12">
		  <h4>The Heroic Life and Career of Garibaldi &ndash; Side 1</h4>
		  <br/>
		  <OBJECT style="padding-left:60px;" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" WIDTH="780" HEIGHT="520">
		    <PARAM NAME=movie VALUE="side1.swf">
		    <PARAM NAME=loop VALUE=false>
		    <PARAM NAME=menu VALUE=false>
		    <PARAM NAME=quality VALUE="autohigh">
		    <PARAM NAME=wmode VALUE=opaque>
		    <EMBED src="side1.swf" loop=false menu=false quality="autohigh" wmode=opaque WIDTH="780" HEIGHT="520" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">    </EMBED>
		  </OBJECT>
			<br>
			<br>
			<div class="row">
				<div class="span8 offset2">
					<p style="text-align:justify;"><strong>Help:</strong> The inner left and right arrows move through the panorama scenes, the outer arrows to move to the first and the last scene. The speaker icon on the right turns on narration; the one on the left turns on musical accompaniment. Click the speaker icons again to turn off.</p>
					<br>
					<div style="text-align:center">
						<a class="btn" href="side2.php">View Side 2 of the Panorama</a>
					</div>
		 		</div>
			</div>
	</div>	

	</div>
	<br><br>
	<?footer()?>
	</body>
</html>
