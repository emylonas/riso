
/*

  Given a domNode (a container), an array of dimensions (which provides the facet data), 
  and updateAll (a function that draws all the facets on the page)

  Render the facet view to domNode
  Handle requests to clear the crossFilter
  Set up the various interactions that effect the state of the filter
   - update this filter THEN 
   - call updateAll() to tell all the OTHER filters to update accordingly
  
*/

define(function() { 

  // Return a constructor
  
  return function (domNode, crossFilterDimensions, updateAll) {

    // Render output to domNode
    
    function update(){
      $(domNode).text('FACET OUTPUT HERE');
    }
    
    function clearFilter() {
      // Take off crossFilter
    }
    
    // Initialize

    function init() {
      // Code goes here
      update(); // Create initial view
    }

    init();

    return {
      update: update,
      clearFilter: clearFilter
    };
  }
});


