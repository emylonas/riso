<?
$header = '

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width">
	  
  <!-- Included CSS Files -->
  <link rel="stylesheet" href="stylesheets/royalslider.css">
  <link rel="stylesheet" href="stylesheets/rs-default-inverted.css">
  <link rel="stylesheet" href="stylesheets/mediaelementplayer.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">
	<style type="text/css">
	 .navbar{margin-bottom: 0;}
	</style>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script>
  function callback(rscData){
    window.rscData = JSON.parse(rscData);
  }
  </script>
  <script src="https://script.google.com/macros/s/AKfycbzn4ZtK67spxPUzEScRq9IvyVwupE7ECjepmBzwYmj_UJd5YzQ/exec"></script>';
require_once("../dependencies/functions.php");
getHeader($header,'Research the Panorama', 'scene');?>
  <!-- Begin #container -->
  <div id="container">
  	<!-- Draw the scene navigator -->
    <header>
    	<nav class="rsDefaultInv">
      	<div id="prevSceneArrow" class="sceneArrow">
          1
        </div>
        <div id="nextSceneArrow" class="sceneArrow">
          2
        </div>
      </nav>
    </header>
    <!-- end scene navigator -->
		<nav id="view-changer">
    	
    </nav>
    <article id="content" class="royalSlider row-fluid">
    <section id="scene-by-script" class="rsContent span7">
    	<div class="rsTmb" data-placement="bottom" title="View scene and manuscript text"><i class="icon-picture icon-white"></i><i class="icon-align-justify icon-white"></i></div>
			<div id="scene-image" class="row-fluid">
        <div id="scene-caption" class="row-fluid"></div>
      	<div id="scene-container" class="royalSlider rsDefaultInv">
      	<?php include_once("data/Panorama.php"); ?>
        </div>
      </div>
    </section><!-- end #scene-script -->
    <section id="script-by-pages" class="rsContent">
      <div class="rsTmb" data-placement="bottom" title="View manuscript text and page images"><i class="icon-align-justify icon-white"></i><i class="icon-file icon-white"></i></div>
			<div id="script-container" class="span5 tabbable tabs-right">
        <ul class="nav nav-tabs" id="lang-chooser">
          <li class="en"><a href="#">En</a></li>
          <li class="it"><a href="#">It</a></li>
        </ul>
        <div class="tab-content well well-small" >
          <h4 class="row-fluid">
            <div class="span4">Manuscript Text</div>
            <audio class="audio pull-left no-svg" preload="none" type="audio/mp3" src="en.mp3"></audio>
            <a class="btn btn-mini pull-right" id="line-breaker">Line breaks: <span>Off</span><span class="hide">On</span></a>
          </h4>
          <article id="script-text" class="row-fluid">
            <img class="preloader" src="preloaders/preloader.gif" alt="Loading...">
          </article>
        </div>
      </div>
      
      <div id="page-container" class="span7 tabbable tabs-left">
      	<h4>Pages <span class="scene-id label label-inverse"></span></h4>
        <ul class="nav nav-tabs">
        </ul>      
    		<div id="pages" class="tab-content"></div>
      </div>
      
    </section><!-- end #script-pages -->
    <section id="resources-only" class="rsContent">
      <div class="rsTmb" data-placement="bottom" title="View resources for this scene"><i class="icon-info-sign icon-white" ></i><i class="icon-th-large icon-white"></i></div>
      <div id="resources-container" class="container">
        <h4 class="row">Resources</h4>
        <div id="resources" class="row"><img src="preloaders/preloader.gif" alt="Loading..."></div>
      </div>
    </section><!-- end #resources -->
    </article>   
  </div><!-- End #container -->
  <script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
  <script src="javascripts/jquery-ui-1.8.23.custom.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="javascripts/jquery.placeholder.js"></script>
  <script src="javascripts/jquery.royalslider.min.js"></script>
  <script src="javascripts/jquery.scrollTo.min.js"></script>
  <script src="javascripts/mediaelement-and-player.min.js"></script>
  <script src="javascripts/app.js?<?php echo time();?>"></script>
	
	<!-- Optional regions 
	<script type="text/javascript">
	
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-3203647-16']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	
	</script>-->
  <!-- Don't use the php footer() function here, it adds markup we dont want. -->
</body></html>