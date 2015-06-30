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
  this.defaults = {
    page: 1,
    num: 20,
    action: null,
    success: null,
    empty: null,
    fail: function(){ $("#results tbody").html('<tr><td colspan="5">Server error. Please try again.</td></tr>');}
  }
  this.init(options);
}

BDR.prototype.init = function(options){
  var bdr = this;
  if(options){
    if(typeof(options.fail) == "function" && typeof(options.success) == "function" && typeof(options.empty) == "function")
      this.settings = $.extend(this.defaults, options);
    else{
      throw new Exception("fail, success and empty must be functions");
    }
  }else{
    throw new Exception("action, success and empty must be implemented as options");
  }
  
  $(window).on("hashchange", function(){
    var hasPage = location.hash.indexOf('&page=')
      , subq;
    if(hasPage == -1){
      bdr.settings.page = 1;
      subq = location.hash.substring(1);
    }else{
      bdr.settings.page = location.hash.substring(hasPage+6);
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

BDR.prototype.query = function(subq){
  var bdr = this;
  $.post('./router.php',
    {
      action: bdr.settings.action,
      num: bdr.settings.num,
      startNum: (parseInt(bdr.settings.page)-1) * bdr.settings.num,
      subq: subq
    },
    function(data){
      if(data){ 
        if(data.response.numFound == 0)
          bdr.settings.empty();
        else{
          var start = parseInt((bdr.settings.page-1) * bdr.settings.num)
            , last = (start+bdr.settings.num >= data.response.numFound) ? data.response.numFound : start+bdr.settings.num
            , pages = '<li '+((bdr.settings.page == 1) ? 'class="disabled"' : '')+'><a href>&laquo;</a></li>'
            , results = "";
          for(i = 1; i <= data.response.numFound/bdr.settings.num+1; i++){
            active = (bdr.settings.page == i) ? " class='active'" : "";
            pages += "<li"+active+"><a href>"+i+"</a></li>";
            active = "";
          }
          pages += '<li '+((bdr.settings.page == (Math.floor(data.response.numFound/bdr.settings.num)+1)) ? 'class="disabled"' : '')+'><a href>&raquo;</a></li>';

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
          
          $(".pagination ul+p").html("Showing "+(start+1)+" to "+last+" of "+data.response.numFound);
          bdr.settings.success(data);
        }
      }else
        bdr.settings.fail();
    }
  , "json")
  .fail(bdr.settings.fail());
}