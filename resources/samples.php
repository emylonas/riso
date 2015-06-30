<?php
session_start();
$_SESSION['colid'] = 38;
include('../dependencies/functions.php');
getHeader("<link href='../css/samples.css' type='text/css' rel='stylesheet'>","Resources") ?>
	<div id="page">
	 <div class="container">
		<div class="row">
			<div class="span12">
				<h1>Resources</h1>
				<hr style="margin:-1px 0;">
			</div>
		</div>
		<div id="myCarousel" class="carousel slide">
			
			<div class="carousel-inner">
			 	<!--width of posts is 470px.. 470px multiplied by number of post -->
			 	<div class="active item">
					<div id="post1" class="post">
						<img src="../img/prints-bg.jpg" style="padding:5px;width:200px;float:left;"><br>
						<h2>Portraits from the Anne S. K. Brown Collection</h2>
						<p style="text-align:justify;padding-right:15px;">The prints available here are from the holdings of the Anne S. K. Brown Military Collection at Brown University Library. They are part of a graphic collection numbering over 14,000 prints, drawings, paintings and watercolors, in addition to over 12,000 printed books, and several thousand scrapbooks, sketchbooks, albums and portfolios <br><br><a href="portraits.php"><button class="btn btn-success">View Portraits</button></a></p>
					</div>

					<div id="post2" class="post">
						<img src="../img/newspaper-bg.jpg" style="padding:5px;width:200px;float:left;"><br>
						<h2>Garibaldi & the 19th Century Illustrated Press</h2>
						<p style="">The pictorial newspaper made its appearance in Europe in the early 19th century and by mid-century was well established. Leading papers including the Illustrated London News, l'Illustration, and the Illustrierte Leipzig, and in the United States, Leslie's and Harper's Weekly, were popular subscriptions with the middle and upper classes <br><br><a href="illustrated_press.php"><button class="btn btn-success">Read More About the Illustrated Press...</button></a></p>
						<br>
					</div>
				</div>
      
	      		<div class="item">
		        
			        <div id="post3" class="post">
			        	<h2>Read the Manuscript</h2>
			          <p>Some text about the manuscript</p>
			          <p><a href="manuscript.php"><button class="btn btn-success">Read the entire manuscript</button></a></p>
			        </div>
			        
			        <div id="post4" class="post">
			        	<h2>Pamphlets from the Harvard Risorgimento Collection</h2>
			          <p>Some text about the pamphlets</p>
			          <p><a href="pamphlets.php"><button class="btn btn-success">Read more about the pamphlets</button></a></p>
			        </div>

		     	</div>
			
				<div class="item">
					
					<div id="post5" class="post">
						<h2>Sheet Music from the A.S.K. Brown Military Collection</h2>
						<p style="text-align:justify;padding-right:15px;">10 covers from sheet music with themes pertaining to Garibaldi. These are English and American scores, published in Boston and 
					London between 1860 and 1866.<br /><br />
					 		<a href="sheetmusic.php"><button class="btn btn-success">View sheet music...</button></a>
					 	</p>
					</div>
			
					<div id="post6" class="post">
						<h2>Search the Garibaldi Website</h2>
						<p style="text-align:justify;padding-right:15px;">A lot of materials were digitized and placed online as part of the "Garibaldi Collection" on Brown's older 
						digital repository. You can find a number of the images from the Illustrated London News and other engravings. <br /><br />
						<a href="http://library.brown.edu/cds/catalog/catalog.php?verb=search&task=setup&colid=38&type=basic"><button class="btn btn-success">Search the Garibaldi Collection...</button></a>
						</p>
						<p>The complete Garibaldi Collection contains 521 items. <br /><br />
						<a href="http://library.brown.edu/cds/catalog/catalog.php?verb=search&task=run&keywords1=Garibaldi+and+the+Risorgimento&operand1=AND&field1=ti_all&output=record"><button class="btn btn-success">Browse the Garibaldi Collection...</button></a>
						 
						 </p>
					</div>

				</div>
     
      			<div class="item">
        
					<div id="post7" class="post">
						<h2>Contributed Scholarship</h2>
						<ul>
							<li><a href="http://www.garibaldi200.it" target="_blank">Bicentenario Garibaldi (1807-2007)</a></li>
							<li><a href="http://www.risorgimento.info/index.html" target="_blank">Risorgimento. Prospettive di ricerca (in Italian and German)</a></li>
							<li><a href="http://www.sc.edu/library/spcoll/hist/garib/garib.html" target="_blank">The Anthony P. Campanella Collection of Giuseppe Garibaldi</a></li>
							<li>De Benedictis, Angela - <a href="Ugo_Bassi_De_Benedictis/Ugo_Bassi.html" target="_blank">Ugo Bassi</a></li>
							<li>Casalena, Maria Pia - <a href="Casalena/Casalena_Epoca.html" target="_blank">L'Epoca</a></li>
							<li>Hyde, Ralph - <a href="http://library.brown.edu/cds/garibaldi/Ralph_Hyde_Garibaldi_Panorama.pdf" target="_blank">&quot;The Campaigns of Garibaldi&quot;</a>: A Look at a Surviving Panorama (Paper read at the 12th International Conference, &quot;The Panorama in the Old World and the New,&quot; held at Hunter College, New York in November 2004)</li>
							<li>Magoni, Clizia - <a href="spini_magoni01.html" target="_blank">Leopoldo Spini: Cenni Bibliografici di un Esule Risorgimentale</a></li>
							<li>Magoni, Clizia - <a href="magoni_fonti.pdf" target="_blank"> Le fonti dello script</a></li>
							<li>Pecout, Gilles - <a href="Pecout/Pecout.html" target="_blank">A Cruise on the Mediterranean with Garibaldi</a></li>
							<li>Sutcliffe, Marcella - <a href="Sutcliffe/Hamilton_Sutcliffe.html" target="_blank"s>Other Garibaldi panoramas and dioramas: Gompertz and Hamilton</a></li>
						</ul>
					</div>

		   		</div>

				<div class="item">
		    		<div id="post8" class="post">
						<h2>More Panoramas</h2>
						<ul>
							<li><a href="http://www.sacomuseum.org/panorama/index.shtml" target="_blank"> Pilgrim's Progress (Panorama at the Saco Museum)</a></li>
							<li><a href="http://www.artsmia.org/currents-of-change/panorama.cfm" target="_blank">The Mississipi River Moving Panorama</a></li>
							<li><a href="http://newman.baruch.cuny.edu/digital/2003/panorama/default.htm" target="_blank"> The Panorama Effect (CUNY Library Exhibit)</a></li>
							<li><a href="http://www.panoramacouncil.org" target="_blank"> International Panorama Council</a></li>
						</ul>
					</div>

					<div id="post6" class="post">
						<img src="../img/res-sites.jpg" style="padding:5px;width:200px;float:left;"><br>
						<h2>Garibaldi and the Risorgimento Sites</h2>
						<ul>
							<li> <a href="http://www.sc.edu/library/spcoll/hist/garib/garib.html" target="_blank"> The Anthony P. Campanella Collection of Giuseppe Garibaldi</a></li>
							<li> <a href="http://www.garibaldi200.it" target="_blank"> Bicentenario Garibaldi (1807-2007) </a></li>
							<li> <a href="http://www.risorgimento.it" target="_blank"> Istituto per la Storia del Risorgimento italiano/Museo Centrale del Risorgimento </a></li>
							<li> <a href="http://www.istitutomazziniano.it" target="_blank"> Istituto Mazziniano, Genoa, Italy </a></li>
							<li> <a href="http://museorisorgimentotorino.it/index.php" target="_blank"> Museo Nazionale del Risorgimento Italiano, Torino</a></li>
							<li> <a href="http://www.comune.bologna.it/museorisorgimento" target="_blank"> Museo del Risorgimento di Bologna</a></li>
						</ul>
					</div>

				</div>

				</div><!--end carousel inner-->
			<a class="carousel-control left" href="#myCarousel" data-slide="prev" >&lsaquo;</a>
 			<a class="carousel-control right" href="#myCarousel" data-slide="next" >&rsaquo;</a>
	
		</div>
	</div>
</div>

<?php footer();?>
</body></html>
