<?php
session_start();
$_SESSION['colid'] = 38;
$_SESSION['output'] = "record";
unset($_SESSION['hitlistArray']);
unset($_SESSION['count']);
include ('../dependencies/functions.php');
getHeader("","Garibaldi & the 19th Century Illustrated Press","Resources"); ?>

<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
  </div>

  <br><br>
  <div class="row">
    <ul class="span3 nav nav-list pull-left">
      <img src="../img/newspaper-bg.jpg" class="circle">
      <li class="nav-header" style="text-align:center;">Newspaper Pages</li>
      <li class="divider"></li>
      <!-- <li><a href="get2.php?verb=get&id=1">All Newspapers</a></li> -->
      <li class="divider"></li>
      <li><a href="illustrated_press_articles.php?press=iln">Illustrated London News</a></li>
    <!--   <li><a href="illustrated_press_articles.php?press=ilt">Illustrated London Times</a></li>  -->
    <li><a href="illustrated_press_articles.php?press=ilt">Illustrated London Times</a></li>
      <li><a href="illustrated_press_articles.php?press=iju">Illustration: Journal Universel</a></li>
      <li><a href="illustrated_press_articles.php?press=lmi">Le Monde Illustr&#x00E9;</a></li>
      <li><a href="illustrated_press_articles.php?press=ni">Nouvel Illustr&eacute</a></li>
      <li><a href="illustrated_press_articles.php?press=lpj">Le Petit Journal</a></li>
      <li><a href="illustrated_press_articles.php?press=ui">Univers Illustr&#x00E9;</a></li>
       <li><a href="illustrated_press_articles.php?press=si">Suisse illustr&eacute;</a></li>
     <li><a href="illustrated_press_articles.php?press=gi">Geschichtsfreund</a></li>
      <li><a href="illustrated_press_articles.php?press=ih">Illustrirte Hausfreund</a></li>
      <li><a href="illustrated_press_articles.php?press=iz">Illustrirte Zeitung</a></li>
      <li><a href="illustrated_press_articles.php?press=ulm">Ueber Land und Meer</a></li>
      <li><a href="../dependencies/get2.php?verb=get&id=16">Unknown Source</a></li>
    </ul>
<div class="span8" >
<p class="lead">
Garibaldi & the 19<sup>th</sup> Century Illustrated Press
</p>
<p style="text-align:justify">

The pictorial newspaper made its appearance in Europe in the early 19th century and by mid-century was well established. Leading papers including the Illustrated London News, l'Illustration, and the Illustrierte Leipzig, and in the United States, Leslie's and Harper's Weekly, were popular subscriptions with the middle and upper classes. The challenge to provide images of events and people that many had read previously in the traditional papers was met by employing some of the finest illustrators of the day who traveled the world in search of the latest stories or topical subjects. It was the first form of mass media that provided illustrations to familiarize the public with the unfolding world events as well as to inform and educate those less traveled about different cultures, societies, and physical environments.
<br><br>
The dawn of the illustrated paper coincided with the revolutions sweeping across Europe in the late 1840's as well as colonial adventures in Asia and Africa, so there was a plethora of subjects for the illustrators. Conflict was a popular subject and subscriptions increased during times of war. In the 1850's for instance, Britain was embroiled in several major conflicts on the Crimean peninsula, in India and in China, and trailing the armies were the 'special artists'.  (Prime minister Camillo Benso, the count of Cavour and a central figure in the Italian Risorgimento, sent an expedition of Bersaglieri from the Kingdom of Sardinia to participate in the Crimean conflict. Illustrations of their uniforms are preserved in the <a href="http://library.brown.edu/cds/askb">Anne S.K. Brown Military Collection</a>). Papers in search of visual material also invited readers to submit their sketches, and soldiers on campaign frequently did just that. Even photographs were used as sources for the wood engravings, especially portraits. When the pencil sketches and watercolors arrived in the newspaper offices, they were handed to teams of engravers who transferred the images onto wooden blocks that were then engraved. Maps were specially drawn to guide the readers to the various events. The blocks were bolted to lines of metal text and the whole inked. Time was of the essence and editors became impatient when the mails were delayed as competition among papers was rife.
<br><br>
Garibaldi's flamboyant character and his attempts towards the unification of Italy were frequently profiled in the illustrated press. Once again, here was a subject to thrill the readership and papers spared no expense in dispatching artists to the region, among them young Thomas Nast, representing the New York Illustrated News, who created the 1860 portrait of Colonel <a href=" http://library.brown.edu/find/Record/dc1189778158250000">John Whitehead Peard</a>, also found in the Brown military collection.
</p>
</div>
</div>

<br><br>
<? footer() ?>
</body>
</html>
