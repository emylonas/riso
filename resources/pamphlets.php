<?php
session_start();
$_SESSION['colid'] = 38;
include '../dependencies/functions.php';
getHeader('<link href="../css/bdr.css" type="text/css" rel="stylesheet">',"Pamphlets from the Harvard Risorgimento Collection","resources");?>

<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <?php resourceBreadCrumbs(); ?>
    </ul>
  </div>

 <div id="project">
  <div class="span5 offset1 pull-right">
      <img src="../img/pamphlets.jpg" alt="Pamphlets BG" class="circle">
  </div>
  <div class="row">
    <div class="span5">
      <p style="text-align:justify">Most of the books included in the Harvard Risorgimento Collection are now available through Google Books. However, a significant quantity of shorter pamphlets and other types of publications remain to be made public: in this section, we are collecting these important documents as they become available in the Brown digital repository. A selection of these documents will also appear in the Research the Panorama section, linked to specific scenes of the panorama.</p>
    </div>
  </div>
</div>
<div class="container">
	<form class="form-search">
  	<input type="text" class="span6 input-medium search-query" placeholder="Type search terms here">
	<button type="submit" class="btn">Search</button> 
  </form>
 	<nav class="pagination">
 		<ul></ul><p></p>
 	</nav>
  <table id="results" class="table">
  	<thead><th>Link</th><th>Title</th><th>Creator</th><th>Published</th><th>Subjects</th></thead>
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
    var BDR_pamphlets = new BDR(
      { action: 'pamphlets'
      , success: _success
      , empty: _empty
      , modType: 'generic'
    });

		function _empty(){
			$(".pagination ul, .pagination ul+p").html("");
			$("#results tbody").html('<tr><td colspan="5" class="centered">No pamphlets found matching the search terms.</td></tr>');
			return;
		}

		function _success(response){
			var results = ""
				,	bdr = this;
			$.each(response.docs, function(i,e){
				// Right now we're just storing and hardlinking the thumbnails. In future the thumbnails will be stored on the BDR itself.
				results += "<tr><td class='thumb' rowspan='2'><a title='View this pamphlet' target='_blank' href='http://repository.library.brown.edu/studio/item/"+e.pid+"/'><img alt='"+e.primary_title+"' src='../pdfimgs/"+e.pid.substr(4)+".jpg'></a></td>"
								+ "<td class='title'><a target='_blank' href='http://repository.library.brown.edu/studio/item/"+e.pid+"/'>" + (e.nonsort ? (e.nonsort + " ") : "")+e.primary_title+"</a></td>"
								+ "<td class='creator'>"+ (e.creator ? e.creator : "--") +"</td>"
								+ "<td class='publisher'>"+e.publisher[0]+(e.publication_place ? ("<br>"+e.publication_place[0]+", "+e.publication_code[0].toUpperCase()) : "")+"</td>"
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
