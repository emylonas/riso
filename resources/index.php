<?php
session_start();
$_SESSION['colid'] = 38;
include('../dependencies/functions.php');
getHeader("","Resources") ?>
	<div id="page">
	 <div class="container">

<br/>
<div id='gallery'>
	<!--When you add a new post, you must add a new &bull; to the span with position id-->
	<nav>
    <a href='#' id='prev'><em>&lsaquo;</em></a>
    <!--number of bulls should be equal to the number of li tags-->
    <div><h3 style="margin-top:-15px;">Resources</h3><span id='position'><em class='on'>&bull;</em><em>&bull;</em><em>&bull;</em><em>&bull;</em><em>&bull;</em></span></div>
    <a href='#' id='next'><em>&rsaquo;</em></a>
  </nav>

  <div id='slider'>
    <ul>
      <li style='display:block'>
        <div id="post1" class="post">
					<img src="../img/portraits.png" style="padding:5px;width:200px;float:left;"><br>
					<h3>Portraits from the Anne S. K. Brown Collection</h3>
					<p>The prints available here are from the holdings of the Anne S. K. Brown Military Collection at Brown University Library. They are part of a graphic collection numbering over 14,000 prints, drawings, paintings and watercolors, in addition to over 12,000 printed books, and several thousand scrapbooks, sketchbooks, albums and portfolios <br><br><a href="portraits.php"><button class="btn">View Portraits</button></a></p>
        </div>

		    <div id="post2" class="post">
						<img src="../img/newspaper-bg-transparency.png" style="padding:5px;width:200px;float:left;"><br>
						<h3>Garibaldi &amp; the 19th Century Illustrated Press</h3>
						<p style="margin-right:30px;">The pictorial newspaper made its appearance in Europe in the early 19th century and by mid-century was well established. Leading papers including the Illustrated London News, l'Illustration, and the Illustrierte Leipzig, and in the United States, Leslie's and Harper's Weekly, were popular subscriptions with the middle and upper classes <br><br><a href="illustrated_press.php"><button class="btn">Read More About the Illustrated Press...</button></a></p>
						<br>
		    </div>
      </li>
      <li style='display:none'>
          <div id="post3" class="post">
            <img src="../img/sheetmusic.jpg" alt="" class="circle" style="display:none;padding:5px;width:200px;float:left;"> 
            <h3>Sheet Music from the A.S.K. Brown Military Collection</h3>
            <p style="text-align:justify;padding-right:15px;">The display of moving panoramas such as the Garibaldi panorama was often accompanied by music. In this section, we collect examples of the kind of music that spectators in Derby or Nottingham, the two places where we know the panorama was exhibited, might have heard [see the article from the Nottingham Daily Express, February 1861]. They include 10 covers from sheet music with Garibaldian themes, English and American scores, published in Boston and London between 1860 and 1866. Soon, you will also be able to hear a piano recording of these pieces, courtesy of Mary Therese Royal de Martinez.<br /><br />
              <a href="sheetmusic.php"><button class="btn">View sheet music...</button></a>
            </p>
          </div>

          <div id="post4" class="post">
            <img src="../img/pamphlets.jpg" alt="" class="circle" style="display:none;padding:5px;width:200px;float:left;"> 
            <h3>Pamphlets from the Harvard Risorgimento Collection</h3>
            <p>A total of 5,902 titles from the Harvard College library, all documenting the Risorgimento, were preserved during the first three years of Harvard's first major microfilming project, funded by the NEH Division of Preservation and Access in 1990-92. This project was completed in 1993-95, by microfilming an additional 8,683 pamphlets published between 1814 and 1950. The Brown library acquired a copy of the complete sets of microfilms and microforms shortly afterwards. The digitization of these copyright-free materials provides scholars worldwide unprecedented access to a trove of primary and secondary sources documenting the political, economic, and religious aspects of the unification movement in Italy, from the first war of independence in 1848 through its unification in 1870.</p>

            <p><a href="pamphlets.php"><button class="btn">Read more about the pamphlets</button></a></p>
          </div>
      </li>
      <li style='display:none'>
      
			
					<!-- <div id="post6" class="post">
						<h3>Search the Garibaldi Website</h3>
						<p style="text-align:justify;padding-right:15px;">A lot of materials were digitized and placed online as part of the "Garibaldi Collection" on Brown's older 
						digital repository. You can find a number of the images from the Illustrated London News and other engravings. <br /><br />
						<a href="http://library.brown.edu/cds/catalog/catalog.php?verb=search&task=setup&colid=38&type=basic"><button class="btn">Search the Garibaldi Collection...</button></a>
						</p>
						<p>The complete Garibaldi Collection contains 521 items. <br /><br />
						<a href="http://library.brown.edu/cds/catalog/catalog.php?verb=search&task=run&keywords1=Garibaldi+and+the+Risorgimento&operand1=AND&field1=ti_all&output=record"><button class="btn">Browse the Garibaldi Collection...</button></a>
						 
						 </p>
					</div> -->

          <div id="post5" class="post">
            <h3>Read the Manuscript</h3>
            <p>To accompany the panorama, the Brown library also received an original manuscript, which contains several versions of a scene-by-scene narrative of the illustrated story.  The manuscript is a handwritten notebook of 144 pages, including the covers. It dates from the same year as the panorama, and we can consider it the work of John James Story, since in the upper right corner of the first page we read this inscription: J. J. Story Burton Street Nottingham Sep. 7th 1860. On page 141, in the upper left corner, we read the date Nov 21 1860, next to a table of contents of the second section, which includes 22 scenes and ends with Victor Emmanuel and Garibaldi's entry into Naples (which took place on November 2). We can therefore conjecture that the first 49 scenes of the panorama were probably completed between these two dates, along with the script which illustrates them. </p>
            <p><a href="manuscript.php"><button class="btn">View Manuscript...</button></a></p>
          </div>
          
                    <div id="post6" class="post">
            <h3>Garibaldi in TAG</h3>
            <img src="../img/TAG-image.jpg" alt="" class="circle" style="padding:5px;width:200px;float:left;"> 
            <p style="line-height:16px; font-size: 12px">The Touch Art Gallery application, developed by Prof. Andy Van Dam's Graphics lab in the Brown University Computer Science department, provides intuitive ways to explore digital collections of art and cultural objects. The Garibaldi Panorama was one of the first artifacts to which TAG was applied, and provided use cases that contributed to its development. Currently, the application is used in Prof. Riva's course on moving panoramas and 19th-Century visual culture which also include the Panorama of the Pilgrim's Progress at the Saco, Maine museum, and the Whaling Voyage 'Round The World at the Whaling Museum in New Bedford, Massachusetts. Users can also access materials from the Carleton Morse Whaling Collection at the John Hay library at Brown. If you are on Windows 8/81 you can view the full version of TAG on your desktop. The browser version of TAG runs on both Windows and Mac computers, You will need to be on the Brown University network or on the Brown VPN in order to access TAG materials. We hope to provide open access soon.</p>
            <p><a href="http://apps.microsoft.com/windows/en-US/app/e7176994-b05f-430e-80ca-57b53e89b712"><button class="btn">Download desktop TAG...</button></a> <a href="tag.php"><button class="btn">View TAG in a browser...</button></a></p>
          </div>
 </li>
      <li style="display:none">
					<div id="post7" class="post">
						<img src="../img/MediatingImage.png" style="padding:5px;width:200px;float:left;"><br>
						<h3>Mediating the Risorgimento / Risorgimento Mediato</h3>
						<p style="text-align:justify;padding-right:15px;">The international symposium Mediating the Risorgimento/Risorgimento mediato was held at Brown University on April 14 and 15, 2011, to mark  the occasion of  the 150th-anniversary of united Italy. The topic of the symposium was the role of old and new media (so defined within the framework of their time) in the production and dissemination of an “imagined Italian community” and the articulation of a national discourse, against the backdrop of 19th-century Europe. <!-- <a href="http://www.brown.edu/Departments/Italian_Studies/RisorgimentoMediato.html" target="_blank">[Go to Conference Website]</a> --></p>
						<p><a href="mediating-abstracts/index.php"><button class="btn">View Abstracts...</button></a></p>
					</div> 
     
        <div id="post8" class="post">
          <h3>Projects</h3>
          <p>In this section we will collect student projects about the  Garibaldi panorama. During  spring semester 2011, and again in fall 2012, Prof. Riva taught an experimental seminar on the panorama in which a select group of graduate and undergraduate students used vision technology (the Microsoft Surface) and new software for collaborative learning and research (LADS/TAG and WorkTop) developed under the direction of Computer scientist Andy van Dam and with the assistance of Elli Mylonas of the library's Center for Digital Scholarship.  Using this software, students were able to collect digital documents directly from the Brown repository and the web and annotate them, producing a complete set of interlinked digital materials associated with the 54 scenes of the Garibaldi panorama [see slides?]. The first two projects featured in this section experimented with timelines and maps, in order to visualize chronological and compositional elements of the panorama's visual narrative.</p>
          <p><a href="projects/index.php"><button class="btn">View Projects...</button></a></p>
     <!--     <ul>
            <li>Maps [Coming soon]</li>
            <li><a href="projects/2012-santucci">Timeline Project</a></li>
          </ul>  -->
        </div>
 </li>
      <li style="display:none">

    		<div id="post9" class="post">
					<h3>Contributed Scholarship</h3>
					<p>In this section, you can find contributions by members of the research team on specific topics directly related to the Garibaldi panorama, its historical context and the events and characters portrayed.</p>
					<p><a href="scholarship/index.php"><button class="btn">View Contributions...</button></a></p>
						<!-- 
<p><ul>
							<li>De Benedictis, Angela - <a href="scholarship/Ugo_Bassi.php" >Ugo Bassi</a></li>
							<li>Casalena, Maria Pia - <a href="scholarship/Casalena_Epoca.php">L'Epoca</a></li>
							<li>Hyde, Ralph - <a href="scholarship/Ralph_Hyde_Garibaldi_Panorama.pdf" target="_blank">&quot;The Campaigns of Garibaldi&quot;</a>: A Look at a Surviving Panorama (Paper read at the 12th International Conference, &quot;The Panorama in the Old World and the New,&quot; held at Hunter College, New York in November 2004)</li>
							<li>Magoni, Clizia - <a href="scholarship/spini_magoni.php" >Leopoldo Spini: Cenni Bibliografici di un Esule Risorgimentale</a></li>
							<li>Magoni, Clizia - <a href="scholarship/magoni_fonti.pdf" target="_blank"> Le fonti dello script</a></li>
							<li>Pecout, Gilles - <a href="scholarship/Pecout.php">A Cruise on the Mediterranean with Garibaldi</a></li>
							<li>Sutcliffe, Marcella - <a href="scholarship/Sutcliffe.php" >Other Garibaldi panoramas and dioramas: Gompertz and Hamilton</a></li>
						</ul>
					</p>
 -->
				</div>
  
				<div id="post11" class="post">
					<h3>More Panoramas</h3>
					<p>
						<ul>
							<li><a href="http://www.sacomuseum.org/panorama/index.shtml" target="_blank"> Pilgrim's Progress (Panorama at the Saco Museum)</a></li>
							<li><a href="http://www.artsmia.org/currents-of-change/panorama.cfm" target="_blank">The Mississipi River Moving Panorama</a></li>
							<li><a href="http://newman.baruch.cuny.edu/digital/2003/panorama/default.htm" target="_blank"> The Panorama Effect (CUNY Library Exhibit)</a></li>
							<li><a href="http://www.panoramacouncil.org" target="_blank"> International Panorama Council</a></li>
						</ul>
					</p>
				</div>
    </li>
      <li style="display: none;">
      	<div id="post12" class="post">
					<img src="../img/res-sites.png" style="padding:5px;width:200px;float:left;"><br>
					<h3>Garibaldi and the Risorgimento Sites</h3>
					<p>
						<ul>
							<li> <a href="http://www.sc.edu/library/spcoll/hist/garib/garib.html" target="_blank"> The Anthony P. Campanella Collection of Giuseppe Garibaldi</a></li>
							<li> <a href="http://www.garibaldi200.it" target="_blank"> Bicentenario Garibaldi (1807-2007) </a></li>
							<li> <a href="http://www.risorgimento.it" target="_blank"> Istituto per la Storia del Risorgimento italiano/Museo Centrale del Risorgimento </a></li>
							<li> <a href="http://www.istitutomazziniano.it" target="_blank"> Istituto Mazziniano, Genoa, Italy </a></li>
							<li> <a href="http://museorisorgimentotorino.it/index.php" target="_blank"> Museo Nazionale del Risorgimento Italiano, Torino</a></li>
							<li> <a href="http://www.comune.bologna.it/museorisorgimento" target="_blank"> Museo del Risorgimento di Bologna</a></li>
						</ul>
					</p>
				</div>
      </li>
    </ul>
  </div>
  
  

</div>
	</div>


</div>
<?php footer("<script src='$baseurl/js/swipe.min.js'></script>");?>
<!--script for slide counter-->
<script type="text/javascript">
// slider
$(document).ready(function(){

var slider = new Swipe(document.getElementById('slider'), {
      callback: function(e, pos) {
        
        var i = bullets.length;
        while (i--) {
          bullets[i].className = ' ';
        }
        bullets[pos].className = 'on';

      }
    }),
    bullets = document.getElementById('position').getElementsByTagName('em');

$("#next").click(function(e){
  e.preventDefault();
  slider.next();
});
$("#prev").click(function(e){
  e.preventDefault();
  slider.prev();
});

});

</script>
</body>
</html>
