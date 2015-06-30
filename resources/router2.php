<?php
$rsc = stream_context_create(array('http'=>array('protocol_version'=>1.0)));
header('Content-type: application/json');

switch($_GET['action']){
  case "pamphlets":
    $query = "genre:pamphlets+-publisher:%22Dennis+Powers+Productions%22";
    break;
  case "music":
    $query = "genre:%22sheet+music%22";
    break;
 case "portraits":
    $query = "text:%22portrait%22+genre:%22engravings+(prints)%22";
    break;
  default:
    $query = "text:".str_replace(" ", "+", urldecode($_GET['action']))."";
}

$subq = urlencode($_GET['subq']);
$num = urlencode($_GET['num']);
$startNum = urlencode($_GET['startNum']);

$r = file_get_contents("https://repository.library.brown.edu/bdr_apis/pub/collections/613/?q=$query+$subq&rows=$num&start=$startNum&fl=*", false, $rsc);
echo($r);
?>