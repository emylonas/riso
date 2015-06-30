<?php
//Error Reporting be sure to disable
//error_reporting(E_ALL);
//ini_set('display_errors', True);

/*This file has several functions for the cds garibaldi site*/
/*Need to figure out how to NOT pollute the namespace... ok for now*/
$currentpage;

// Have to hardcode since this file is being used in different (sub)folders
$baseurl = ( strstr( $_SERVER['HTTP_HOST'], "worfdev" ) != false ) ? "http://worfdev.services.brown.edu/cds/garibaldi/" : "http://library.brown.edu/cds/garibaldi/";
//$baseurl = "http://localhost:8888/garibaldi/";

/*Makes the header for the site*/
function getHeader( $js, $title, $type='optional', $style=true ) {
	global $currentpage, $baseurl;
	echo '<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>'.$title.' | Garibaldi and the Risorgimento</title>
		    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		    <meta name="Description" content="Garibaldi and the Risorgimento">
		    <meta name="version" content="version 3.0">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <link rel="start" href="../" title="Home">
		    <link rel="search" href="#search" title="Search this Web site">
		    <!--<link rel=stylesheet type="text/css" href="'.$baseurl.'css/garibaldi.css">-->
				<link rel="stylesheet" type="text/css" href="'.$baseurl.'css/bootstrap.css">
				'.( ( $style ) ? '<link rel="stylesheet" type="text/css" href="'.$baseurl.'css/style.css">' : '' ).$js.'
		<!--Google WebFont-->
		<link href="http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
			<script src="'.$baseurl.'js/html5shiv.js"></script>
		<![endif]-->
		</head>
		<body>
			<div id="wrap">';
	$currentpage = $title;
	// This is a bad way of doing this.
	if ( $currentpage == "Garibaldi & the 19th Century Illustrated Press" || $currentpage == "Prints from the Anne S. K. Brown Collection" ) {
		$currentpage = 'Resources';
	}
	// This is a better way of saying if this subpage is a type of resources, identify the current page as a resource page.
	if ( $type == "resources" ) {
		$currentpage = 'Resources';
	}
	getNavigation( null );
}

/*makes the navigation bar*/
/*takes in a string called $breadcrumbs*/
function getNavigation( $breadcrumbs ) {
	global $baseurl;
	$currnav = currentPage();
	echo '<!--Begin navbar top-->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<div class="brand span3" href="#">
					<a href="'.$baseurl.'" title="Home"><span style="font-family: \'Libre Baskerville\', serif;color:#000;">Garibaldi &amp; the Risorgimento</span></a>
				</div>
				<ul class="nav main-nav">
					<li style="list-style: none">' .$currnav.'
					</li>
				</ul>
			</div>
		</div>
	</div><!--end navbartop-->';
}

//could be done more elegantly perhaps but kiss...
//basically when you hit a page this code is called and checks if the page requested is the active page... by looking the current page. if is active the
//code activates certain styles...
function currentPage() {
	global $baseurl;
	return '<li class="'.currentPageHelper( "View the Panorama", "active" ).'"><a href="'.$baseurl.'panoramaHTML5/panorama_scroll.php" title="View the Panorama"><img src="'.$baseurl.'img/panorama-icon4.png" alt="" class="img-circle'.currentPageHelper( "View the Panorama", "img" ).'"><br><strong>View the Panorama</strong></a></li>
			<li class="'.currentPageHelper( "Research the Panorama", "active" ).'"><a href="'.$baseurl.'latest-scene" title="Research the Panorama"><img src="'.$baseurl.'img/rtp-icon2.png" alt="" class="img-circle'.currentPageHelper( "Research the Panorama", "img" ).'"><br><strong>Research the Panorama</strong></a></li>
			<li class="'.currentPageHelper( "Resources", "active" ).'"><a href="'.$baseurl.'resources" title="Resources"><img src="'.$baseurl.'img/res-icon2.png" alt="" class="img-circle'.currentPageHelper( "Resources", "img" ).'"><br><strong>Resources</strong></a></li>
			<li class="'.currentPageHelper( "Behind the Scenes", "active" ).'"><a href="'.$baseurl.'behindthescenes.php" title="Behind the Scenes"><img src="'.$baseurl.'img/rtp-icon.png" alt="" class="img-circle'.currentPageHelper( "Behind the Scenes", "img" ).'"><br><strong>Behind the Scenes</strong></a></li>
			<!--<form class="span4 form-inline form-search" style="margin-top:20px">
				<input type="text" class="input-medium search-query">
				<button class="btn" type="submit" style="margin-top:0px;"><span class="icon-search"></span></button>
			</form>-->';
}

//Helps currentPage checks if the currentpage is active and is the one sent in to the fx
function currentPageHelper( $alink, $vector ) {
	global $currentpage;
	//if the current page is being visited or if we are at the garibaldi homepage make the link active.
	if ( $vector=='active' ||  $_SERVER["REQUEST_URI"] == "/cds/garibaldi/" ) {
		if ( $alink == $currentpage || $_SERVER["REQUEST_URI"] == "/cds/garibaldi/" ) {
			return ' active';
		}
	}
	if ( $vector=='img' ) { //makes the image grayscale
		if ( $alink != $currentpage ) {
			return ' img-grayscale';
		}
	}
}

//Returns the footer to be placed after the last div is closed and the </body> tag... often used to put javascript at the end of the file so that the page can load quicker.
//$js will append javascript after javascript libraries has been attributed this is good because it allows js only when we need js
//and will help prevent js plugins from smashing one another.
function footer( $js=null, $close=true ) {
global $baseurl;
	echo "
	<div id=\"push\">
	</div>
	</div> <!-- end wrap -->
<footer>
	<div id=\"footer\">

			<div class=\"container\">


						<br>
						<a href=\"".$baseurl."../\"><img src=\"".$baseurl."/img/cds-logo.png\"></a>
						<a href=\"".$baseurl."../\"><img src=\"".$baseurl."/img/brown-logo2.png\"></a>
						<a href=\"".$baseurl."sitemap.php\">Sitemap</a>
						<a href=\"".$baseurl."contact.php\">Contact</a>
						<span class=\"pull-right\">&copy; 2013 Center for Digital Scholarship All Rights Reserved</span>

						<br>
					</div>


	</div>
</footer>

		<!--Bootstrap JS-->
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
		<script type='text/javascript' src='".$baseurl."js/bootstrap.js'></script>".$js."


		<!--Google Analytics-->
		<script type='text/javascript'>
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-3203647-16']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>".( ( $close ) ? "</body></html>" : "" );
}

/*Models a hyperlink used in breadcrumb builder*/
class aHyperLink {

	var $linkName;
	var $linkHref;

	public function __construct( $aname , $ahref ) {
		$this->linkName = $aname;
		$this->linkHref = $ahref;
	}

}

//deprecated***
//returns the breadcrumbs of a non empty array of aHyperLinks
function buildBreadcrumbs( $anarray ) {
	//1. make sure array size is greater or equal than 2
	if ( !is_array( $anarray ) ) {
		return ''; //wasnt an array
	}

	$arraylength = count( $anarray );
	if ( $arraylength<2 ) {
		return '';
	}

	//2. build breadcrumbs
	$breadcrumbs_str = '<ul class="breadcrumb pull-left">';
	for ( $i = 0; $i<$arraylength; $i++ ) {

		$hyperlink = $anarray[$i];
		if ( get_class( $hyperlink )!="aHyperLink" ) {
			throw new Exception( 'An object in the breadcrumbs array was not a the hyperlink class.' );
		}

		$end = $arraylength - 1;
		if ( $end == $i ) { //at the end of the array
			$breadcrumbs_str .= '<li class="active">'.$hyperlink->linkName.'</li>';
		} else {

			$breadcrumbs_str .= '<li><a href="'.$hyperlink->linkHref.'">'.$hyperlink->linkName.'</a> <span class="divider">/</span> </li>';
		}
	}

	$breadcrumbs_str .= '</ul>';
	return $breadcrumbs_str;
}

/*panorama nav
builds a nav at the bottom of each subpage for the panorama*/
function panoramaNav() {
	global $baseurl;
	echo '<br><br><br>
	        <div class="row">
			<div class="span8 offset3">
			<div class="span2">
				<img src='.$baseurl.'"img/javascript-panorama.png">
				<p style="text-align:center;">View the Panorama in Javascript</p>
			</div>
			<div class="span2">
				<img src="'.$baseurl.'img/flash-panorama.png">
				<p style="text-align:center;"><a href="'.$baseurl.'/panoramaFlash2011/side1-2.php">View the Panorama in Flash</a></p>
			</div>
			<div class="span2">
				<img src="'.$baseurl.'img/script.png">
				<p style="text-align:center;">View a book of the Panorama'."'".'s Script</p>
			</div>
			<div class="span2 offset1">
				<img src="'.$baseurl.'img/images-panorama.png">
				<p  style="text-align:center;"><a href="'.$baseurl.'panorama_scenes2.php">View Scenes from the Panorama</a></p>
			</div>
			<div class="span2">
				<img src="'.$baseurl.'img/digitization-process.png">
				<p style="text-align:center;"><a href="'.$baseurl.'panorama_digitization.php">How we digitized the Panorama</a></p>
			</div>
			</div>
		  </div>
		 <br><br><br>';
}

/**
 * [resourceBreadCrumbs description]
 *
 * builds breadcrumbs - works by using a baseurl and the requesting uri... doesn't depend on folder or file structure only the URI
 * Breaks apart /cds/resources/...(folder or filename)
 * Removes .php, index.php, ... anything in var @$REMOVE
 * Ignores any additional uri arguments strings ie: /cds/resources/...(folder or filename)?v=209ada#ok -> /cds/resources/...(folder or filename)
 *
 * @$baseurl - stores the parent url such as http://apple.com or http://support.apple.com
 * @return string of the breadcrumbs
 */


function resourceBreadCrumbs() {

	global $baseurl;
	$urlArray = parse_url( $baseurl.$_SERVER["REQUEST_URI"], PHP_URL_PATH ); //appends the http://.../ to /folder1/subfolder/file.php
	$crumbs = explode( "/", $urlArray ); //transforms /folder/folder/file.php -> array['','folder','subfolder','file.php']

	$REMOVE = array( "", "index.php", "cds", "garibaldi", "garibaldi_new" ); //an array that will hold strings to be removed -> array['folder','subfolder','file.php']

	// remove the elements who's values are stored in REMOVE array
	$crumbs = array_diff( $crumbs, $REMOVE );
	//used later to avoid adding a trailing >
	$totalCrumbs = count( $crumbs ); //counts the total number of items in the array
	$count = 0;
	//this is the subdirectory we are on the folder...
	$uri = $baseurl;
	foreach ( $crumbs as $crumb ) {
		$count++;
		if ( $count!=$totalCrumbs ) { //checks if we are at the end of the urlArray
			//not at end so, lets append an > to the url, and then for the href lets add the additonal crumb to the uri string...
			echo '<a href="'.$uri.$crumb.'">'.ucwords( str_replace( array( "-", ".php", "_" ), array( " ", "", " " ), $crumb ) . '</a> > ' );
		} else {
			//at the end of the uri string, we don't need >, and for href lets use the requesting URI (works well when pass arguments and queries ?,# in URI)
			echo '<a href="'.$_SERVER["REQUEST_URI"].'">'.ucwords( str_replace( array( "-", ".php", "_" ), array( " ", "", " " ), $crumb ) . '</a>' );
		}
		//add the string to the uri and store it.
		$uri = $uri.$crumb.'/';
	}
}

?>
