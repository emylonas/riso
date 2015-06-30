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
include 'functions.php';
getHeader("","Resource");

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
		<form method='post' action='get.php'>
		<input type='hidden' name='verb' value='display'>
		<input type='hidden' name='start' value='$nextval'>
		<input type='submit' value='Next'>
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
		<form method='post' action='get.php'>
		<input type='hidden' name='verb' value='display'>
		<input type='hidden' name='start' value='$prevval'>
		<input type='submit' value='Prev'>
		</form>
	";
}
echo "<div class='resultnav'><div class='backward'>$prev</div><div class='searchset'>Records $startval to $endval of $count</div><div class='forward'>$next<br></div></div>";
echo "<div id='searchbox'>";
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
	<div class=\"$output\">
	<div class=\"thumbnail\">
	<a target=\"_new\" href=\"/cds/catalog/catalog.php?verb=render&id=$metsid\">
	<img src=\"$thumbnail\" title=\"$nonsort $label\"/>
	</a>
	</div>
	<div class=\"label\">
	<a target=\"_new\" href=\"/cds/catalog/catalog.php?verb=render&id=$metsid\">$nonsort $label</a>
	</div>
	<div class=\"citation\">$citation</div>
	<div class=\"format\">
	<div class=\"type\">$type</div>
	<div class=\"genre\">$image</div>
	</div>
	<div class=\"abstract\">$abstract</div>
	</div>
	";
}
echo "</div>";
echo "<div class='resultnav'><div class='backward'>$prev</div><div class='searchset'>Records $startval to $endval of $count</div><div class='forward'>$next<br></div></div>";
?>
