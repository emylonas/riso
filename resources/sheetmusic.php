<?php
session_start();
$_SESSION['colid'] = 38;
include ('../dependencies/functions.php');
getHeader('<link href="../css/bdr.css" type="text/css" rel="stylesheet">',"Sheet Music from the Anne S. K. Brown Collection","resources") ?>

<div class="container">

  <div class="row">
    <ul class="breadcrumb">
      <? resourceBreadCrumbs(); ?>
    </ul>
  </div>


 <div id="project">
  <div class="span5 offset1 pull-right">
      <img src="../img/sheetmusic.jpg" alt="" class="circle"> 
  </div>
  <div class="row">

    <div class="span5">
      <p style="text-align:justify">The display of moving panoramas such as the Garibaldi panorama was often accompanied by music. In this section, we collect examples of the kind of music that spectators in Derby or Nottingham, the two places where we know the panorama was exhibited, might have heard [see the article from the Nottingham Daily Express, February 1861]. They include 10 covers from sheet music with Garibaldian themes, English and American scores, published in Boston and London between 1860 and 1866 and for some, a piano recording of these pieces, courtesy of Mary Therese Royal de Martinez.</p>
    </div>
  </div>
</div>
<div class="container">
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
      { action: 'music_files'
      , success: _success
      , empty: _empty
      , modType: 'search'
    });

		function _empty(){
			$(".pagination ul, .pagination ul+p").html("");
			$("#results tbody").html('<tr><td colspan="5" class="centered">No sheet music found matching the search terms.</td></tr>');
			return;
		}

		function _success(response){
			var results = ""
				,	bdr = this;
			var files = [];
			$.each(response.docs, function(i,e){
			    if(e.genre[0] == "sound recordings") {
			        files = files.concat([e]);
			    } else {
                    results += "<tr id='"+e.pid.split(":")[1]+"'><td class='thumb' rowspan='2'><a title='View this PDF' target='_blank' href='https://repository.library.brown.edu/viewers/image/zoom/"+e.pid+"'><img alt='"+e.primary_title+"' src='https://repository.library.brown.edu/viewers/image/thumbnail/"+e.pid+"/'></a></td>"
                                    + "<td class='title'><a target='_blank' href='https://repository.library.brown.edu/viewers/image/zoom/"+e.pid+"'>"+e.primary_title+"</a></td>"
                                    + "<td class='creator'>"+ (e.creator ? e.creator : "--") +"</td>"
                                    + "<td class='publisher'>"+e.publisher[0]+(e.publication_place ? ("<br>"+e.publication_place[0]+", "+e.publication_code[0].toUpperCase()) : "")+"</td>"
                                    + "<td class='subject'>";
                    if(e.hasOwnProperty("subject")) {
                        $.each(e.subject,function(i,subject){ results += "<a href class='btn btn-info btn-small'>"+subject+"</a><br>" });
                    }
                    results += "</td></tr><tr><td colspan='4'><span class='arrow'>&raquo;</span> <a class='meta-link' href data-pid='"+e.pid+"'>View metadata</a><div class='meta-content'></div></td></tr>";
                }
			});
			this.showResults(results);
			show_play_icon(files);
		}
		
		function show_play_icon(files) {
		    $.each(files, function(i,f){
		        var pid = f.rel_is_part_of_ssim[0];
		        $("#"+ pid.split(":")[1] +" td.title").append("<audio preload='auto' controls> <source src='https://repository.library.brown.edu/fedora/objects/"+f.pid+"/datastreams/MP3/content' type='audio/mpeg'/> </audio>");
		    });
		}

	}());
});
</script>
</body>
</html>
