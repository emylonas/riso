<?php
session_start();
$_SESSION['colid'] = 38;
include '../dependencies/functions.php';
switch(htmlentities($_GET['press'])){
  case 'iln':
    $press = "Illustrated London News";
    break;
  case 'ilt':
    $press = "Illustrated London Times";
    break;
  case 'iju':
    $press = "Illustration: Journal Universel";
    break;
  case 'lmi':
    $press = "Monde Illustré";
    break;
  case 'ni':
    $press = "Nouvel Illustré";
    break;
  case 'lpj':
    $press = "Petit Journal";
    break;
  case 'ui':
    $press = "Univers Illustré";
    break;
  case 'si':
    $press = "Suisse illustré";
    break;
  case 'gi':
    $press = "Geschichtsfreund";
    break;
  case 'ih':
    $press = "Illustrirte Hausfreund";
    break;
  case 'iz':
    $press = "Illustrirte Zeitung";
    break;
  case 'ulm':
    $press = "Ueber Land und Meer";
    break;
  case 'unk':
    $press = "unk";
    break;
  default:
    header("Location: ./illustrated_press.php");
}
getHeader('<link href="../css/bdr.css" type="text/css" rel="stylesheet">',"Garibaldi & the 19th Century Illustrated Press","resources");

if($_GET['press'] == "ilt"){
  include("../dependencies/ilt.php");
  exit();
}
?>
<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <?php resourceBreadCrumbs(); ?>
    </ul>
  </div>

 <div id="project">
  <div class="row">
    <div class="span12">
      <h4>Articles from <?php echo ($press == "unk") ? "unknown sources" : "the ".$press; ?></h4>
    </div>
  </div>
</div>
<div class="container">
  <form class="form-search">
    <input type="text" class="span6 input-medium search-query" placeholder="Type here to search within press">
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
      { action: '"<?=$press;?>"'
      , success: _success
      , empty: _empty
      , modType: 'search'
    });
    
    function _empty(){
      $(".pagination ul, .pagination ul+p").html("");
      $("#results tbody").html('<tr><td colspan="4" class="centered">No articles found matching the search terms.</td></tr>');
      return;
    }

    function _success(response){
      var results = "";
      $.each(response.docs, function(i,e){
        // Right now we're just storing and hardlinking the thumbnails. In future the thumbnails will be stored on the BDR itself.
        results += "<tr><td class='thumb' rowspan='2'><a title='View this article' target='_blank' href='https://repository.library.brown.edu/viewers/image/zoom/"+e.pid+"/'><img alt='"+((e.nonsort)?e.nonsort+" ":"")+e.primary_title+"' src='http://repository.library.brown.edu/viewers/image/thumbnail/"+e.pid+"/'></a></td>"
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
</body>
</html>
