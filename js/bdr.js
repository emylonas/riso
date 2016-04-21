/**
 * BDR - Querys the Brown Digital Repository
 * Copyright (c) 2013 Joel Kang
 * Not licensed for public consumption
 * Date: 1/31/2013
 * @author Joel Kang
 * @version 1.0
 * @requires jquery.ba-hashchange.js
 **/

var BDR = function(options){
  "use strict";
  var defaults = {
    page: 1,
    num: 20
  }
  , bdr = this;

  if(options){
    if(typeof(options.fail) == "function")
      this._fail = options.fail;
    if (typeof(options.success) == "function")
      this._success = options.success;
    if (typeof(options.empty) == "function")
      this._empty = options.empty;
    this._settings = $.extend(defaults, options);
  }else{
    throw new Exception("action, success and empty must be implemented as options");
  }
  
  $(window).on("hashchange", function(){
    var hasPage = location.hash.indexOf('&page=')
      , subq;
    if(hasPage == -1){
      bdr._settings.page = 1;
      subq = location.hash.substring(1);
    }else{
      bdr._settings.page = location.hash.substring(hasPage+6);
      subq = location.hash.substring(1, location.hash.indexOf('&page='));
    }
    
    $(".form-search input").val(subq);
    $(window).scrollTop($("form").offset().top-10);

    bdr.query(subq);
  });

  $(".form-search").on('submit', function(e){
    e.preventDefault();
    location.hash = $(e.target[0]).val();
    return false;
  });
  $(window).trigger('hashchange');
}

BDR.prototype._fail = function(){ $("#results tbody").html('<tr><td colspan="5">Server error. Please try again.</td></tr>');}

BDR.prototype.showResults = function(results){
  var bdr = this;
  $("#results tbody").html(results);
  $("#results tbody .btn").click(function(e){
    e.preventDefault();
    bdr.page = 1;
    location.hash = 'subject: "'+$(e.target).text()+'"';
    return false;
  });
  $("#results tbody .meta-link").click(function(e){
    e.preventDefault();
    bdr._getMod($(e.target));
  });
}

BDR.prototype._getMod = function(metalink){
  if(metalink.siblings('.meta-content').html() == ""){
    var style="";
    switch(this._settings.modType){
      case 'search':
        style = 'https://library.brown.edu/cds/garibaldi/resources/search-metadata.xsl';
        break;
      case 'generic':
        style = 'https://library.brown.edu/cds/garibaldi/resources/generic-metadata.xsl';
        break;
      default:
        throw new Exception("The modType option must be one of 'search' or 'generic'");
        return false;
    }
    $.ajax({
      url: 'https://library.brown.edu/xsl_transformer/v1/?xml_url=https://repository.library.brown.edu/studio/item/'+metalink.attr('data-pid')+'/MODS/'+'&xsl_url='+style+'&auth_key=whitelist',
      type: 'GET',
      dataType: "jsonp",
      jsonpCallback:"metacallback",
    }).done(function(data,text){
      var metaOutput = '<table><tbody><tr>';
      if(data.creator.name !=""){
        if(data.creator.role != ""){
          metaOutput += '<th>'+data.creator.role.substring(0,1).toUpperCase() + data.creator.role.substring(1)+'</th><td>'+ data.creator.name +'</td>';
        }else{
          metaOutput += '<th>Creator</th><td>'+ data.creator.name +'</td>';
        }
      }else{
        metaOutput += "<td></td><td></td>";
      }
      metaOutput +='<th>Format</th><td>'+data.pagination+'</td></tr><tr><th>Library Link</th><td><a href="'+data.link+'" target="_blank">View in Library</a></td><th>Published</th><td colspan="3">'+data.publication.place+': '+data.publication.publisher+', '+data.date+'</td></tr></tbody></table>';
      metalink.siblings(".meta-content").html(metaOutput).show();
      metalink.siblings('.arrow').addClass('rotate90');
    });
  }else{
    metalink.siblings(".meta-content").toggle();
    metalink.siblings('.arrow').toggleClass('rotate90');
  }
}


BDR.prototype.query = function(subq){
  var bdr = this;
  $.post('./router.php',
    {
      action: bdr._settings.action,
      num: bdr._settings.num,
      startNum: (parseInt(bdr._settings.page)-1) * bdr._settings.num,
      subq: subq
    },
    function(data){
      if(data){ 
        if(data.items.numFound == 0)
          bdr._empty();
        else{
          var response = data.items
            , start = parseInt((bdr._settings.page-1) * bdr._settings.num)
            , last = (start+bdr._settings.num >= response.numFound) ? response.numFound : start+bdr._settings.num
            , pages = '<li '+((bdr._settings.page == 1) ? 'class="disabled"' : '')+'><a href>&laquo;</a></li>'
            , results = "";
          for(i = 1; i <= response.numFound/bdr._settings.num+1; i++){
            active = (bdr._settings.page == i) ? " class='active'" : "";
            pages += "<li"+active+"><a href>"+i+"</a></li>";
            active = "";
          }
          pages += '<li '+((bdr._settings.page == (Math.floor(response.numFound/bdr._settings.num)+1)) ? 'class="disabled"' : '')+'><a href>&raquo;</a></li>';

          $(".pagination ul").html(pages);
          $(".pagination ul li").each(function(i,li){
            var li = $(li)
              , hash = window.location.hash;
            li.click(function(evt){
              evt.preventDefault();
              var pageIdx = hash.indexOf('&page=');
              window.location.hash = ((pageIdx == -1) ? hash+"&page="+li.children('a').html() : hash.substring(0, pageIdx+6)+li.children('a').html());
            });
          });

          var pageLinks = $(".pagination ul li");

          pageLinks.filter(':last-child')
            .unbind('click')
            .click(function(evt){
              evt.preventDefault();
              if(!$(this).hasClass('disabled')){
                var hash = window.location.hash
                  , pageIdx = hash.indexOf('&page=')
                  , nextPg = parseInt($('.pagination ul li.active a').html())+1;
                window.location.hash = ((pageIdx == -1) ? hash+"&page=2" : hash.substring(0,pageIdx+6)+nextPg);
              }
            });
          pageLinks.filter(':first-child')
            .unbind('click')
            .click(function(evt){
              evt.preventDefault();
              if(!$(this).hasClass('disabled')){
                var hash = window.location.hash
                  , pageIdx = hash.indexOf('&page=')
                  , prevPg = parseInt($('.pagination ul li.active a').html())-1;
                window.location.hash = hash.substring(1, pageIdx+6)+prevPg;
              }
            })
          
          $(".pagination ul+p").html("Showing "+(start+1)+" to "+last+" of "+response.numFound);
          bdr._success(response);
        }
      }else{
        bdr._fail();
      }
    }
  , "json")
  .fail(bdr._fail);
}
