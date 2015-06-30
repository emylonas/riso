<?php
ob_start();
session_start();
$colid = 38;
$_SESSION['colid']=38;
$yoursearch = $_SESSION['yoursearch'];
$count = $_SESSION['count'];
$arr = $_SESSION['hitlistArray'];
$output = $_SESSION['output'];
$sender = $_SESSION['sender'];

$vars = array('verb','start');

foreach ($vars as $var){
if (isset($_REQUEST["$var"])){
${$var} = $_REQUEST["$var"];
}
# else {${$var} = "";}
}

#print_r($_REQUEST);




$startval = $start +1;
$end = $start + 19;
$endval = $end +1;

if ($end >= $count)
{
        $end = $count -1 ;
	$endval = $count;
}
else
{
	$nextval = $end +1;
	$next = "
		
		<form method='post' action='get2.php'>
		<input type='hidden' name='verb' value='display'>
		<input type='hidden' name='start' value='$nextval'>
		<button class='btn btn-success'><input type='submit' value='Next'></button>
		</form>
		
	";
}

if ($start >0)
{
	$prevval = $start - 20;
	if ($prevval <0)
	{
		$prevval = 0;
	}
	$prev = "
		<button class='btn btn-primary'>
		<form method='post' action='get2.php'>
		<input type='hidden' name='verb' value='display'>
		<input type='hidden' name='start' value='$prevval'>
		<input type='submit' value='Prev'>
		</form>
		</button>
	";
}
echo '<div class="container">
		<div class="row">
		    <ul class="breadcrumb">
		      <li><a href="/cds/garibaldi/index2.php">Home</a> <span class="divider">/</span></li>
		      <li><a href="/cds/garibaldi/resources.php">Resources</a> <span class="divider">/</span></li>
		      <li><a href="/cds/garibaldi/inews2.php">Garibaldi & the 19<sup>th</sup> Century Illustrated Press</a> <span class="divider">/</span></li>
		      <li class="active">Newspaper Item</li>
		    </ul>
  		</div>
  		<div class="resultnav"><div class="backward">'.$prev.'</button></div><div class="searchset">Records '.$startval.' to '.$endval.' of '.$count.'</div>'.$next.'<br></div>
  		<div id="items-container">';
for ($i=$start; $i <= $end; $i++)
{
	$thumbnail = $arr[$i]['thumbnail'];
	$citation = $arr[$i]['citation'];
	$metsid = $arr[$i]['metsid'];
	$type = $arr[$i]['type'];
	$subtype = $arr[$i]['subtype'];
	$label = $arr[$i]['label'];
	$nonsort = $arr[$i]['nonsort'];
	$url = $arr[$i]['url'];
	$abstract = $arr[$i]['abstract'];
	echo "
	<div class=\"entry\">
	<div class=\"$output\">
	<p>
	<a target=\"_new\" href=\"http://library.brown.edu/cds/catalog/catalog.php?verb=render&id=$metsid\">
	<img src=\"$thumbnail\" title=\"$nonsort $label\"/>
	</a>
	</p>
	<p>
	<a target=\"_new\" href=\"http://library.brown.edu/cds/catalog/catalog.php?verb=render&id=$metsid\">$nonsort $label</a>
	</p>
	<p><strong>$citation</strong></p>
	<div class=\"format\">
	<div class=\"type\"><!--$type--></div>
	<div class=\"genre\">$image</div>
	</div>
	<div class=\"abstract\"><p style=\"text-align:justify\">$abstract</p></div>
	</div>
	</div>
	";
}
echo "</div>";
echo "<div class='resultnav'><div class='backward'>$prev</div><div class='searchset'>Records $startval to $endval of $count</div><div class='forward'>$next<br></div></div></div>";
?>
