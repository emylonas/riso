<?php
session_start();
$_SESSION['colid'] = 38;
include('../dependencies/functions.php');
getHeader('<link href="../css/bdr.css" type="text/css" rel="stylesheet">',"Portraits from the Anne S. K. Brown Collection","resources") ?>
<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
  </div>

 <div id="project">
  <div class="span4 offset1 pull-right">
      <img src="../img/portraits.png" alt="" class="circle">
  </div>
  <div class="row">

    <div class="span7">
      <p style="text-align:justify"> The prints available here are from the holdings of the Anne S. K. Brown
      Military Collection at Brown University Library. They are part of a
      graphic collection numbering over 14,000 prints, drawings, paintings and
      watercolors, in addition to over 12,000 printed books, and several
      thousand scrapbooks, sketchbooks, albums and portfolios. A colleciton of 6,000 miniature
      toy soldiers complement this archive. The collection, founded by the
      late Mrs. John Nicholas Brown (1906-1985), had its origins in her
      interest in military uniforms but grew to encompass military history and
      bioography, regimental histories, army lists, drill, tractics and
      regulations, and many other diverse subjects including costume, military
      artists, early travel, and world royalty. Today, the collection is
      primarily concerned with the history and iconography of soldiers and
      soldiering of all nations from circa 1500-1945, and new items are being
      added to the collection annually.</p>
    </div>
  </div>
</div>
<div class="container">
  <form class="form-search">
    <input type="text" class="span6 input-medium search-query" placeholder="Type here to search within portraits">
  <button type="submit" class="btn">Search</button> 
  </form>
  <nav class="pagination">
    <ul></ul><p></p>
  </nav>
  <table id="results" class="table">
    <thead><th>Link</th><th>Title</th><th>Date</th><th>Subjects</th></thead>
    <tbody>
    </tbody>
  </table>
  <nav class="pagination">
    <ul></ul><p></p>
  </nav>
 </div>
</div>
<?php footer(null, false);?>
<script src='../js/jquery.ba-hashchange.min.js'></script>
<script src='../js/bdr.js'></script>
<script>
$(window).load(function(){
  (function(){
    var BDR_press = new BDR(
      { action: 'portraits'
      , success: _success
      , empty: _empty
      , modType: 'search'
    });
    
    function _empty(){
      $(".pagination ul, .pagination ul+p").html("");
      $("#results tbody").html('<tr><td colspan="4" class="centered">No portraits found matching the search terms.</td></tr>');
      return;
    }

    function _success(response){
      var results = "";
      $.each(response.docs, function(i,e){
        results += "<tr><td class='thumb' rowspan='2'><a title='View this portrait' target='_blank' href='https://repository.library.brown.edu/viewers/image/zoom/"+e.pid+"/'><img alt='"+((e.nonsort)?e.nonsort+" ":"")+e.primary_title+"' src='http://repository.library.brown.edu/viewers/image/thumbnail/"+e.pid+"'></a></td>"
                + "<td class='title'><a target='_blank' href='https://repository.library.brown.edu/viewers/image/zoom/"+e.pid+"/'>"+((e.nonsort)?e.nonsort+" ":"")+e.primary_title+"</a></td>"
                + "<td class='date'>"+((e.dateIssued) ? e.dateIssued.toString().substring(0,10) : "(View metadata)")+"</td>"
                + "<td class='subject'>";
        if(e.hasOwnProperty("subject")) {
          $.each(e.subject,function(i,subject){ results += "<a href class='btn btn-info btn-small'>"+subject+"</a><br>" });
        }
        results += "</td></tr><tr><td colspan='4'><span class='arrow'>&raquo;</span> <a class='meta-link' href data-pid='"+e.pid+"'>View metadata</a><div class='meta-content'></div></td></tr>";
      });
      
      this.showResults(results);
    }
  }());
});
</script>
</body></html>
