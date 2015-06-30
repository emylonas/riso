<?php
session_start();
include ('../../dependencies/functions.php');
getHeader("","Mediating the Risorgimento-Risorgimento Mediato","Resources"); ?>

<html>
<head>
  <title></title>
</head>

<body>
  <div class="container">
    <div class="container">
      <div class="row">
        <ul class="breadcrumb">
          <? resourceBreadCrumbs(); ?>
          </ul>
      </div>

      <div id="project">
        <div class="span4 pull-right">
          <img src="" alt="" class="circle">
        </div>

        <div class="row">
          <div class="span8">
            
            <h3>Contributed Scholarship</h3>
						<p>In this section, you can find contributions by members of the research team on specific topics directly related to the Garibaldi panorama, its historical context and the events and characters portrayed.</p>
						<p><ul>
							<li>De Benedictis, Angela - <a href="Ugo_Bassi.php" >Ugo Bassi</a></li>
							<li>Casalena, Maria Pia - <a href="Casalena_Epoca.php">L'Epoca</a></li>
							<li>Hyde, Ralph - <a href="Ralph_Hyde_Garibaldi_Panorama.pdf" target="_blank">&quot;The Campaigns of Garibaldi&quot;</a>: A Look at a Surviving Panorama (Paper read at the 12th International Conference, &quot;The Panorama in the Old World and the New,&quot; held at Hunter College, New York in November 2004)</li>
							<li>Magoni, Clizia - <a href="spini_magoni.php" >Leopoldo Spini: Cenni Bibliografici di un Esule Risorgimentale</a></li>
							<li>Magoni, Clizia - <a href="magoni_fonti.pdf" target="_blank"> Le fonti dello script</a></li>
							<li>Pecout, Gilles - <a href="Pecout.php">A Cruise on the Mediterranean with Garibaldi</a></li>
							<li>Sutcliffe, Marcella - <a href="Sutcliffe.php" >Other Garibaldi panoramas and dioramas: Gompertz and Hamilton</a></li>
						</ul>
					</p>


          </div>
        </div><br>
        <br>
        <? footer() ?>
        </div>
    </div>
  </div>
</body>
</html>
