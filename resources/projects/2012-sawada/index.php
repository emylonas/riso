<?php
session_start();
include ('../../../dependencies/functions.php');
$header = <<<MAP
<style type="text/css">
table.gadget tr:first-child, table.gadget tr:last-child{
  display: none;
}

#map{ margin: 0 auto; width: 800px;}
</style>
MAP;
getHeader($header,"Projects","Resources"); ?>

<div class="container">

 <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
</div>
<div class="row">
  
  <p class="lead">
Mapping the Roman Republic, Xavier Sawada '13 and Alice Mia Addis '14
</p>
<aside id="instructions">
        <h5>Instructions</h5>
        <p>This project uses Google Earth software, together with a historical map (<a href="http://www.davidrumsey.com/luna/servlet/detail/RUMSEY~8~1~21035~540012:Plan-of-modern-Rome,-by-W-B--Clarke?sort=Pub_List_No_InitialSort%2CPub_Date%2CPub_List_No%2CSeries_No&amp;qvq=q:Rome%2BClarke;sort:Pub_List_No_InitialSort%2CPub_Date%2CPub_List_No%2CSeries_No;lc:RUMSEY~8~1&amp;mi=1&amp;trs=3" target="_blank">Plan of Modern Rome, W.B. Clarke</a>) from the <a href="http://www.davidrumsey.com" target="_blank">David Rumsey collection</a> to map events and locations.</p>
        <p>Please wait for the Google Earth map to load before clicking on anything. You will know when it has loaded because it will zoom to display Rome, and the push pins will be visible. Explore the map by clicking on the various locations. Hovering over the upper right area of the map will show the zoom and pan controls.</p>
      </aside>

</p>
<section id="map">
  <script src="//www.gmodules.com/ig/ifr?url=http://dl.google.com/developers/maps/embedkmlgadget.xml&amp;up_kml_url=http%3A%2F%2Flibrary.brown.edu%2Fcds%2Fgaribaldi%2Fresources%2Fprojects%2F2012-sawada%2Fmap.kmz&amp;up_view_mode=earth&amp;up_earth_2d_fallback=0&amp;up_earth_fly_from_space=1&amp;up_earth_show_nav_controls=1&amp;up_earth_show_buildings=1&amp;up_earth_show_terrain=1&amp;up_earth_show_roads=1&amp;up_earth_show_borders=1&amp;up_earth_sphere=earth&amp;up_maps_zoom_out=0&amp;up_maps_default_type=map&amp;synd=open&amp;w=800&amp;h=600&amp;title=Embedded+KML+Viewer&amp;border=%23ffffff%7C3px%2C1px+solid+%23999999&amp;output=js"></script>
<noscript>Javascript must be enabled to view this map.</noscript>
</section>
<div>

<h5>About the Project</h5>
<p>The goal of this project was to create an animated historical view of the most important episodes that marked Garibaldi's heroic and tragic defense of the Roman Republic, in 1849 (scenes 14-21). This dynamic view was obtained by overlaying a historical map of Rome, circa 1850, onto the Google Earth app and pinpointing historical landmarks, in order to offer an alternative, contemporary "street-view" of Rome in the spring and summer of 1849. By clicking on the yellow pins, the viewer can visualize drawings, prints and daguerrotypes by artists who visited Rome at that time, as well as textual descriptions by such illustrious eye-witnesses of the Roman events as American journalist Sarah Margaret Fuller Ossoli, commonly known as Margaret Fuller (May 23, 1810 – July 19, 1850)</p>
</div>
  </div>
</div>
<?php footer();?>
