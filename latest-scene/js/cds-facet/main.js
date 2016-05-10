'use strict';

/* 

SOME DOCUMENTATION

In the HTML the data-facet-type attribute indicates what facet is used - and these facets are 
defined in a corresponding *-facet.js file

e.g. <div data-facet-type="map"> assumes the existence of map-facet.js

Facet containers in the DOM are marked by a 'facet' class

The data-dimension attribute indicates the data from which the dimension is built.
For example, if the data looks like: [{ fruit: banana }, { fruit: apple }],
then you can build a dimension from d.fruit -- the value of data-dimension would be 
'fruit' (which gets turned into d.fruit )

*/

requirejs(['crossfilter.min'],
          
  function (_) {

    var facetDomNodes = $('.facet[data-facet-type]');
  
    // Get the URL of the data file
    //  (currently just gets the first occurrance of a data-source attribute on a <script> tag)
    // TODO: needs to have default value if none found
  
    function getDataUrl() {
      return $('script[data-source]')[0].getAttribute('data-source');
    }
  
    // Put any data prep work in here -- should return an array of objects
  
    function cleanData(dirtyData) {

      var cleanData = dirtyData.data;
      
      // Convert publication years into date objects

      cleanData.forEach(function (r) {
        r.year = new Date(r.year, 0, 1);
      });
      
      return cleanData;
    }
  
    // Get all the nodes in the DOM that are placeholders for facets

    function getFacetDomNodes() {
      return facetDomNodes; 
    }
  
    // Look for references to facets in DOM
    // Collect unique list

    function getUniqueListOfFacetsUsed() {
      
      var facets = {};
      
      getFacetDomNodes().each(function (_, y) {
        facets[y.getAttribute('data-facet-type')] = 0; 
      });

      return $.map(facets, function(_, facetName) { 
        return facetName;
      });
    }
  
    // Given the accessor code as string (e.g. 'a.b.c') and the crossfilter
    //  return an array of crossfilter dimensions
    //  For multiple dimensions, delimit with semicolons, e.g. a.b.c;d.e.f

    function createDimensionsFromDataSelector(codeStr, cf) {

      // Generates code such as (function() { return function(d) { return d.a.b.c } })()

      return codeStr.split(';')
                    .map(function(code) { 
                      return eval( '(function() { return function(d) { return d.' +
                                   code + 
                                   ' } })()' );
                    })
                    .map(function(f) {
                      return cf.dimension(f);
                    });
    }
  
    // Call appropriate facet-generators
    // Change dimension into dimensions (an array) to allow for multiple dimensions
    //  This will involve adjusting all the *-facet.js files
  
    function makeFacet(facetType, facetFactory, domNode, dimensions, updateAll) {

      if (facetFactory[facetType] === undefined) {
        console.warn('WARNING: Unknown facet type ' + facetType);
        return null;
      } else {
        console.log("LOADING: Facet type " + facetType);
        return facetFactory[facetType](domNode, dimensions, updateAll);
      }
    }
  
    // Scan the DOM for facet references and return array of facet instances
  
    function getFacetInstances(facetFactory, data, updateAll) {
      
      var facetList = [],
          cf = crossfilter(data);

      getFacetDomNodes().each(function(i, node) {
        facetList.push( makeFacet(
          node.getAttribute('data-facet-type'),
          facetFactory,
          node, 
          createDimensionsFromDataSelector(node.getAttribute('data-dimension'), cf),
          updateAll
        ));
      });
      
      // Only return non-null elements (this may be unnecessary)
      
      return facetList.filter(function (f) { 
        return (f !== null) 
      });
    }
  
    // Load CSS
  
    function loadCss(url) {
        var link = document.createElement('link');
        link.type = 'text/css';
        link.rel = 'stylesheet';
        link.href = requirejs.toUrl(url);
        document.getElementsByTagName('head')[0].appendChild(link);
    }
  
    // Main routine -- called when DOM loaded
  
    function init() {
      
      var facetNames, facetFilenameRoots, resources;

      // Clean data
      
      // resources = cleanData(data);
      
      // Get list of facet resources (.js and .css)

      facetNames = getUniqueListOfFacetsUsed();
      facetFilenameRoots = facetNames.map(function(f, _) {
        return f + '-facet';
      });
      
      // Load facet CSS files (*-facet.css) and add classes to DOM
      
      facetFilenameRoots.map(function(r) { return r + '.css'})
                        .forEach(loadCss);
      
      getFacetDomNodes().each(function (_, i) { 
        $(i).addClass(i.getAttribute('data-facet-type') + '-facet');
      });
      
      // Compile list of modules to load: *-facet.js and the source data
      
      var loadThese = [getDataUrl()];
      facetFilenameRoots.forEach(function (r) { loadThese.push(r); });
      
      // Load additional modules
      
      requirejs(loadThese, function () {

        var facetFactory = {}, // Hash of facet factory functions
            facets = []; // Facet objects
        
        resources = cleanData(arguments[0]);

        // Assign facet factory functions to facetFactory hash
        
        for(var i = 1; i < arguments.length; i++) {
          facetFactory[facetNames[i - 1]] = arguments[i];
        }

        // This is called by the facets when there's a change
        // Note that all facets must have an update() method

        function updateAll() {
          facets.forEach(function (facet) {
            facet.update();
          });
        }
        
        // Get an array of all facet objects defined in DOM
        
        facets = getFacetInstances(facetFactory, resources, updateAll);
        
        // Initialize 'clear all filters' button

        function clearAll() {
          facets.forEach(function (facet) {
            facet.clearFilter();
          });
          updateAll();
        }
        
        $('#clear-filters-button').click(clearAll);
        
        // Initialize all facet views
        
        updateAll();
      });
    };

    $(init); // Run init when DOM loaded
  }
);
