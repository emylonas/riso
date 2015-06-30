<?php
session_start();
$_SESSION['colid'] = 38;
include 'dependencies/functions.php';
getHeader( '<link rel="stylesheet" href="./css/jquery.maximage.min.css" media="screen">', "Home" ) ?>
<div class="container">
	<div class="row" style="padding-top:50px; z-index:10;">
		<div class="span8 offset2 well" style="background-color:rgba(245,245,245,.5);">
			<p>
				<strong>The Garibaldi &amp; the Risorgimento Archive</strong>
			</p>
			<hr>
			The Garibaldi &amp; the Risorgimento digital archive seeks to provide a comprehensive resource for the interdisciplinary study and teaching of the life and deeds of one of the protagonists of the Italian unification process, Giuseppe Garibaldi (1807-1882). At the heart of this archive is a dynamic visualization of the Garibaldi panorama, a unique survival of a popular form of 19th-century public art.
		</div>
	</div>
</div>

<!--Maximage-->
<div id="maximage">
	<div class="first-item">
		<img src="./img/bg-1.jpg" alt="">
	</div>
	<div class="second-item">
		<img src="./img/digitization-main2.jpg" alt="">
	</div>
</div>


<?php footer();?>
<script src="js/jquery.cycle.all.min.js" type="text/javascript"></script>
<script src="js/jquery.maximage.min.js" type="text/javascript"></script>
<script type="text/javascript">
			$(function(){
				$('#maximage').maximage({
					cycleOptions: {
						fx:'fade',
						fit:'1',
						delay:'-.5',
						speed: 800,
						timeout: 8000,
						prev: '#arrow_left',
						next: '#arrow_right'
					},
					onFirstImageLoaded: function(){
						jQuery('#cycle-loader').hide();
						jQuery('#maximage').fadeIn('fast');
					}
				});
			});
</script>
</body>
</html>
