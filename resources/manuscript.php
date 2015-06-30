<?php require_once("../dependencies/functions.php");
$pages = str_replace(array("\t","\r","\n"," ","\n\r"),"",file_get_contents("../latest-scene/datafiles/pages.json"));
$header = '
<script>
var pages = JSON.parse(\''.$pages.'\');
</script>
<link rel="stylesheet" type="text/css" href="../css/manuscript.css"></link>';
$pages = json_decode($pages, true);
$group = $_GET['group'];
getHeader($header,'Manuscript','resources');?>
<div class="container">
	<div class="row">
    <ul class="breadcrumb">
      <?php resourceBreadCrumbs(); ?>
    </ul>
  </div>
</div>
<!-- For responseive 800px make topnav -->
<div id="affix-wrapper">
<nav id="page-nav" data-spy="affix" class="well well-small">
	<ul class="nav nav-tabs">
		<li><button class="btn btn-mini btn-success" id="line-breaker">Line breaks: <span class="hide">Off</span><span>On</span></button></li>
		<li><button class="to-top btn btn-mini btn-inverse dropup" href="#">Top <span class='caret'></span></button></li>
		<li class="nav-header">Pages</li>
    <?php 
		for($i=1;$i<=15;$i++){
			echo "
			
		<li>
			<div class='btn-group dropdown'>
				<a class='btn btn-mini group-link' href='?group=$i'>".(($i-1)*10+1)." - ".(($i != 15)?10*($i):144)."</a>
				<button class='btn btn-mini dropdown-toggle' data-toggle='dropdown' data-group='".(($i-1)*10+1)."'><span class='caret'></span></button>
				<div class='pagination dropdown-menu'>
				<ul id='group-$i' >";
				for($j=1;$j<=10;$j++){
					$page = ($i-1)*10+$j;
					if($page > 144) {
						break;
					} else {
						echo "<li><a class='page-link' href='?group=$i#page-$page' data-page='$page'>$page</a></li>";
					}
				}
				echo '
				</ul>
				</div>
			</div>
		</li>';
		}?>
  </ul>
  <div class="arrow"></div>
</nav>
</div>
<div id="script-body" class="row-fluid">
	<?php
	$group= ($_GET['group'] && $_GET['group'] >= 1 && $_GET['group'] <= 15)?$_GET['group']:1;
	include("../datafiles/pages_en/$group.html");
	?>
</div>
<div id="page-group-nav">
  	<div class="row-fluid">
    	<a class="btn btn-large" href="?group=<?php echo $group+1?>">Load next 10 pages</a>
    </div>
  </div>
<?php footer();?>
<script src="../js/jquery.infinitescroll.js"></script>
<script src="../js/jquery.scrollTo-min.js"></script>
<script>
$(document).ready(function(e){
	$("#affix-wrapper").height($('#page-nav').innerHeight());
	$('#page-nav').affix({
		offset: $('#page-nav').position()
	});

	// Scrollspy for navbar button highlighting
	$('body').attr("data-spy","scroll")
					 .scrollspy({target: '#page-nav', offset: $('#page-nav').innerHeight()+10});
	$(window).on('activate', function(){
		$('#page-nav li a').removeClass('btn-primary btn-info');
		$('#page-nav li.active > div > a').addClass('btn-primary')
	});
	
	function toggleLineBreaks(){
		$("#script-body br").toggleClass("hide");
		$("#line-breaker").toggleClass("btn-success");
		$("#line-breaker").children("span").toggleClass("hide");
	}
	$("#line-breaker").click(toggleLineBreaks).trigger('click');

	
	$(".to-top").click(function(e){
		e.preventDefault();
		window.scrollTo(0);
	});

	$('.group-link').each(function(i,button){
		var $button = $(button)
			,	group = $button.attr('href').substr(7);
		$button.click(function(e){
			e.preventDefault();
			onGroupPress(group);
		});
	})
	
	$('.page-link').each(function(i, link){
		var $link = $(link)
			,	page = $link.attr('href').split("#")
			, group = page[0].substr(7)
			, page = page[1];
		$link.click(function(e){
			e.preventDefault();
			onGroupPress(group, page);
		});
	})

	$('body').infinitescroll(
	{
		debug: true,
		navSelector: "#page-group-nav",
		nextSelector: "#page-group-nav a", 
		contentSelector: "#script-body",
		itemSelector: "#script-body > section",
		maxPage: 15,
		finishedMsg: '<div class="row-fluid well">You have reached the end of the manuscript</div>',
		msgText: "<em>Loading the next 10 pages...</em>",
		path: function(page) {return $("#page-group-nav a").attr('href')},
		bufferPx: 60,
	}, scrollLoad);

	function refreshScroll(){
		$('[data-spy="scroll"]').each(function () {
			var $spy = $(this).scrollspy('refresh')
		});
	}

	function scrollLoad(elems, done){
		var lastGroup = parseInt($("section.page-group:last").attr('data-group'));
		// Setting this prevents the loading of pages after the last page
		if(lastGroup == 15){
			$('body').infinitescroll({
				state: {
					currPage: 15
				}
			});
		}else{
			// This changes the href of the load next button to the next group of pages
			$("#page-group-nav a").attr("href","?group="+(lastGroup+1));
		}
		// We refresh the scroll twice, once upon infinitescroll load, and once after all the manuscript pages are loaded
		// This allows the scrollspy to work before the images are loaded, but to accurately scroll once they are loaded.
		// We can potentially refresh this after each image, but probably not necessary for now.
		refreshScroll();
		var pageImages = $(elems).find("img")
			, totalImages = pageImages.length
			, loadedImages = 0;
	  pageImages.each(function(){
			$(this).on('load', function(){
				loadedImages++;
				if(loadedImages == totalImages){
					refreshScroll();
					if(typeof done == "function")
						done();
				}
			});
		});
	}

	function scrollToItem(item){
		var navOffset = $('#page-nav').innerHeight();
		$(window).scrollTo(item.offset().top - navOffset);
	}

	function onGroupPress(group, page){
		var findGroup = $('section.page-group[data-group='+group+']');

		if(findGroup.length != 0){
			if(page){
				var findPage = $("#"+page);
				console.log('group press', findPage)
				if(findPage.length != 0){
					scrollToItem(findPage);
				}else{
					addPlaceHolders(group);
					loadPage(group, page);
				}
			}else{
				if(findGroup.find('.placeholder').length == 0){
					scrollToItem(findGroup);
				} else {
					loadPage(group, page);
				}
			}
		}else{
			addPlaceHolders(group);
			loadPage(group, page);
		}	
	}

	function addPlaceHolders(group){
		$("a.btn[href='?group="+group+"']").addClass('btn-info');
		var pageGroups = $('section.page-group')
			,	lastGroup = parseInt($(pageGroups).last().attr('data-group'))+1
			,	placeHolders = "";
			for(;lastGroup <= group; lastGroup++){
				placeHolders += "<section class='page-group' data-group='"+lastGroup+"'><div class='row-fluid text-center'><div class='span10 offset1 placeholder'><button class='btn btn-large'>Show pages "+((lastGroup-1)*10+1)+" to "+((lastGroup != 15)?10*(lastGroup):144)+"</button></div></div></section>";
			}
			pageGroups.last().after(placeHolders);
			// We can't just use pageGroups since we made changes to the DOM, so we have to make a fresh call.
			$('section.page-group .placeholder button').each(function(idx){
				var button = $(this);
				button.click(function(e){
					e.preventDefault();
					onGroupPress(button.parents('section').attr('data-group'));
				});
			});
	}

	function loadPage(group, page){
		var groupDiv = $("section.page-group[data-group="+group+"]");
		$(window).css("cursor","progress");
		$.get('?group='+group, function(data){
			// Selector code from jQuery.fn.load()
			data = $("<div>").append($.parseHTML(data)).find('#script-body > section');
			groupDiv.html(data);
			console.log('loadpage', page)
			scrollLoad(data, function(){
				$(window).css("cursor", "auto")
				scrollToItem( page ? 
											$('#'+page) :
											groupDiv
				);
			});
		}, 'html');
	}
});
	
</script>
</body>
</html>