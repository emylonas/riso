<?php
session_start();
$_SESSION['colid'] = 38;
include 'dependencies/functions.php';
getHeader("","Sitemap");
?>
		<div class="container">
		 <div class="row">
			<div class="span8 offset2">
				<h1>Sitemap</h1>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="span4 offset2">
				
				<ul class="unstyled">
					<li><a href="/cds/garibaldi/"><p class="lead">Home</p></a></li>
				</ul>
				
				<ul class="unstyled">
					<li><a href="panoramaHTML5/panorama_scroll.php"><p class="lead">View the Panorama</p></a></li>
				</ul>

				<ul class="unstyled">
					<li><a href="resources.php"><p class="lead">Resources</p></a></li>
					<ul class="unstyled" style="padding-left: 20px; margin-top:-10px;">
						<li><a href="resources/portraits.php">Portraits of Garibaldi from the Anne S. K. Brown Collection</a></li>
						<li><a href="resources/illustrated_press.php">Garibaldi & the 19<sup>th</sup> Century Illustrated Press</a></li>
						<li><a href="resources/sheetmusic.php">Sheet Music from the Anne S.K. Brown Military Collection</a></li>
						<li><a href="http://library.brown.edu/cds/catalog/catalog.php?verb=search&task=setup&colid=38&type=basic">Search the Garibaldi Website</a></li>
						<li><a href="/cds/garibaldi/resources/pamphlets.php#q=">Pamphlets from the Harvard Risorgimento Collection</a></li>
					</ul>
				</ul>
				
				<ul class="unstyled">
					<li><a href="contact.php"><p class="lead">Contact</p></a></li>
				</ul>

			</div>
			
			<div class="span5">
				<ul class="unstyled">
					<li><a href="latest-scene"><p class="lead">Research The Panorama</p></a></li>
				</ul>

				<ul class="unstyled">
					<li><a href="behindthescenes.php"><p class="lead">Behind the Scenes</p></a></li>
					<ul class="unstyled" style="padding-left: 20px; margin-top:-10px;">
						<li><a href="./behindthescenes.php#tab1">Panorama Website</a></li>
						<li><a href="./behindthescenes.php#about">About</a></li>
						<li><a href="./behindthescenes.php#tab2">Digitization Process</a></li>
						<li><a href="./behindthescenes.php#tab3">Images</a></li>
						<li><a href="./behindthescenes.php#tab4">Video</a></li>
						<li><a href="./behindthescenes.php#tab5">Research Team</a></li>
					</ul>
				</ul>
			</div>
			
		</div>
		<br><br>
		</div>
		<?footer()?>
	</body>
</html>