<?php
class Panorama{

	public $scenes;
	
	function __construct(){
		$this->scenes = json_decode(file_get_contents("data/scenes.min.json"));
		$desktopnav = "";
		foreach($this->scenes as $id=>$scene){	
			$desc = $scene->desc;
			$title =  $scene->title;
			$side = ($id > 26) ? 2:1;

			$img = $big = sprintf("images/scenes/scene_%02d.jpg", $id);
			
			$desktopnav .= sprintf('<a href="%s" class="rsImg rsNoDrag"><h4>%s</h4><p>%s</p><span class="rsTmb nav-thumb scene-%02d" data-id="Side %d, Scene %d" data-rsBigImg="%s"></span></a>', $img, $title, $desc, $id, $side, $id, $big) ;			
			}
		echo $desktopnav;
	}
	
}
new Panorama();
?>