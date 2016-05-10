
/*

  Given a domNode (a container), a dimension (which provides the facet data), 
  and updateAll (a function that draws all the facets on the page)
  
  Creates a clear button within the container
  
  Creates a container within the container for the listing of facets
  
  Creates the listing 
  
  Returns an object with an update() method that draws the facet, using the dimension, 
  to the domNode
  
*/

define(function() { 

  // Return a constructor
  
  return function (domNode, crossFilterDimensions, updateAll) {

    // Some constants

    var INIT_LISTING_COUNT = 25,
        BIG_CHUNK_SIZE = 250,
        RESOURCE_URL_BASE = 'https://search.library.brown.edu/catalog/',
        SCENE_URL_BASE = 'http://library.brown.edu/cds/garibaldi/latest-scene/#/scene/',
        BDR_URL_BASE = 'https://repository.library.brown.edu/studio/item/';
    
    var crossFilterDimension = crossFilterDimensions[0],
        facetGroup = crossFilterDimension.group(function(textLabel) { 
          return textLabel 
        }),
        $domNode = $(domNode),
        $facetListingContainer = $domNode;
    
    function updateResultsListing(itemNumberStart) {
        
        itemNumberStart = (itemNumberStart === undefined) ? 0 : itemNumberStart;
        
        var listingText,
            allItems = crossFilterDimension.top(Infinity),
            makeSceneLink = function (scene) {
              if (scene !== '[Non-panorama history]')
                return '<a target="_blank" href="' + 
                       SCENE_URL_BASE + scene + '">' + scene + 
                       '</a>';
              else return scene;
            },
            currentViewRange = {
              start: itemNumberStart,
              end: (itemNumberStart + INIT_LISTING_COUNT > allItems.length)
                    ? allItems.length 
                    : itemNumberStart + INIT_LISTING_COUNT
            }; 
        
        // Update results count

        $('#active').text(allItems.length);
        
        // Empty results area

        $('#resource-list').empty();
        
        // Add slider
        /* TODO: replace paging with a slider - using d3.slider.js (or a jQuery solution)
          see d3-slider-index.html in this directory
        d3.select('#slider8').call(
          d3.slider()
            .orientation("vertical")
            .axis(d3.svg.axis().ticks(4).orient('right')) 
            .min(1)
            .max(2100) 
            );
        */
        // Update page list
        
        if (allItems.length > INIT_LISTING_COUNT) {
          
          $('#resource-list').append(function () {

            var pageListing = $('<p style="font-size: 80%"></p>'), 
                linkRange,
                a, isClose;

            for (linkRange = { start: 0, end: undefined }; linkRange.start < allItems.length;) {
              
              if (linkRange.start <= currentViewRange.start && 
                  currentViewRange.start - linkRange.start <= BIG_CHUNK_SIZE)
                isClose = true;
              else if (linkRange.start > currentViewRange.start 
                       && linkRange.start - currentViewRange.start <= INIT_LISTING_COUNT * 2)
                isClose = true;
              /*
              else if (Math.abs(linkRange.start - currentViewRange.start) <= BIG_CHUNK_SIZE)
                isClose = true;*/
              else if (linkRange.start % BIG_CHUNK_SIZE !== 0)
                isClose = true;
              else
                isClose = false;
              /*
              isClose = (Math.abs(linkRange.start - currentViewRange.start) < INIT_LISTING_COUNT * 3 && 
                         (linkRange.start === currentViewRange.start || linkRange.start % BIG_CHUNK_SIZE !== 0));*/
              
              linkRange.end =  linkRange.start + (isClose ? INIT_LISTING_COUNT : BIG_CHUNK_SIZE) - 1;
              
              if (linkRange.end > allItems.length) linkRange.end = allItems.length;
              
              if (currentViewRange.start === linkRange.start) {
                a = $('<strong style="white-space: nowrap">' + 
                      (linkRange.start + 1) + '&ndash;' + (linkRange.end + 1) + 
                      '<strong>');
              } else {
                
                a = $('<a style="white-space: nowrap">' 
                      + (linkRange.start + 1) + '&ndash;' + (linkRange.end + 1) + 
                      '<a>');
                
                a.click((function (itemNumber) { 
                  return function () { 
                    updateResultsListing(itemNumber) 
                  }
                })(linkRange.start));
              }

              pageListing.append(a);
              pageListing.append('&nbsp;&middot; ');

              linkRange.start = linkRange.end + 1;
            }

            return pageListing;
          });
          
          // Title of current selection
          
          $('#resource-list').append('<p>Numbers ' + (currentViewRange.start + 1) + ' to ' + currentViewRange.end + '</p>');
        }
        
        allItems.slice(currentViewRange.start, currentViewRange.end)
                .forEach(function (item) {
          
          var author, url;
          
          if (item.author)
            author = (item.author.join ? item.author.join(' and ') : item.author) + '<br />';
          else
            author = '';

          console.log(item.URLID.substring(0,3));
          
          if (item.URLID.substring(0,4) === 'http') {
            url = item.URLID
          } else if (item.URLID.substring(0,4) === 'bdr:') {
            url = BDR_URL_BASE + item.URLID
          } else {
            url = RESOURCE_URL_BASE + item.URLID;
          }
          
          // url = (item.URLID.substring(0,4) === 'http' ? '' : RESOURCE_URL_BASE) + item.URLID;
          
          listingText = '<p>' +
            '<strong>' +
            // '<a href="' + RESOURCE_URL_BASE + item.URLID + '" target="_BLANK">' + 
            '<a href="' + url + '" target="_BLANK">' + 
              item.short_title + '</a>' +
            '</strong>' +
            ' (' + item.year.getFullYear() + ')<br />' +
            author +
            // (item.author ? item.author + '<br />' : '') +
            'Scenes: ' + item.scene.map(makeSceneLink).join(', ') +
            '</p>';
          // $('#resource-list').append(listingText); 
          $domNode.append(listingText);
        }); 
      }
    
    // Update facet listing -- this is the main draw routine
    //  Draw content straight to the DOM node

    function update() {

      // Clear what's there

      $facetListingContainer.empty();

      updateResultsListing();

    }

    // Initialize

    function init() {
      // addClearButton();
      // addFacetListingContainer();
      update();
    }

    init();

    return {
      update: update,
      clearFilter: function () { return true; }
    };
  }
});


