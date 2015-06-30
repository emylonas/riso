<?php
$rsc = stream_context_create(array('http'=>array('protocol_version'=>1.0)));
header('Content-type: application/json');

switch($_POST['action']){
  case "pamphlets":
    $query = "genre:pamphlets+-publisher:%22Dennis+Powers+Productions%22";
    break;
  case "music":
    $query = "genre:%22sheet+music%22";
    break;
  case "portraits":
    $query = "text:%22portrait%22+genre:%22engravings+(prints)%22";
    break;
  case "music_files":
    $query = "(genre:%22sound+recordings%22+OR+genre:%22sheet+music%22)";
    break;
  default:
    $query = "text:".str_replace(" ", "+", urldecode($_POST['action']))."";
}

$subq = urlencode($_POST['subq']);
$num = urlencode($_POST['num']);
$startNum = urlencode($_POST['startNum']);

$r = file_get_contents("https://repository.library.brown.edu/bdr_apis/pub/collections/613/?q=$query+$subq&rows=$num&start=$startNum&fl=pid,primary_title,creator,genre,publisher,publication_place,publication_code,subject,nonsort,rel_is_part_of_ssim&sort=primary_title%20asc", false, $rsc);
echo($r);
?>