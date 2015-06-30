<?php
session_start();
$_SESSION['colid'] = 38;
include('../dependencies/functions.php');
getHeader('<link href="../css/bdr.css" type="text/css" rel="stylesheet">',"Tag Project","resources") ?>
<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
  </div>

  
<div id='tagContainer'
     style='margin-left:25;margin-top:50px; width: "1000px"'>
</div>
<?php footer(null, false);?>
<script src='../js/jquery.ba-hashchange.min.js'></script>
<script src='./TAGWebapp2.2/TAG-embed.js'></script>
<script>
    window.onload = load;
    
    function load() {
    
        TAG({
            path: './TAGWebapp2.2',
            containerId: 'tagContainer',
            serverIp: 'garibaldipanorama.brown.edu',
            width: '1000px',
            height: '500px'
        });
        
    }
</script>
</body></html>
