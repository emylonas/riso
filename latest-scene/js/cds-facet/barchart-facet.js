

define(function() { 

  return function barChartFacet(domNode, crossFilterDimensions, updateAll) {

    var crossFilterDimension = crossFilterDimensions[0],
        width = 400, height = 150, // TODO: make these dynamic, not hard-coded
        margin = { top: 50, left: 20, right: -20, bottom: 50 },
        AXIS_BAR_MARGIN = 5, // space between x-axis ticks and bottom of bars
        d3domNode = d3.select(domNode), 
        g,
        gBrush,
        clipPathId = 'clip-' + Math.random().toString().slice(2),
        brush = d3.svg.brush(),
        brushDirty = false,
        group = crossFilterDimension.group(function (x) {
          return Math.floor(x / 10) * 10;
        }),
        axis = d3.svg.axis().orient('bottom'),
        xScaleFunction,
        yScaleFunction = d3.scale.linear().domain([0, 550]).range([100, 0]),
        rangeReadout;

    xScale( d3.time.scale()
              .domain([new Date(1830, 0, 1), new Date(1881, 0, 1)]) // TODO: DATES SHOULD NOT BE HARD-CODED
              .range([0, width]));

    function xScale(_) {
      if (!arguments.length) { return xScaleFunction; }
      xScaleFunction = _;
      axis.scale(xScaleFunction); // set the scale for the x-axis
      brush.x(xScaleFunction); // set the x-scale associated with the brush
    }

    // Set up brush handle event handlers

    function setBrushEventHandlers() {

      var round = false;

      brush.on('brushstart.chart', function () {
        var div = d3.select(this.parentNode.parentNode.parentNode);
        div.select('.title a').style('display', null);
      });

      brush.on('brush.chart', function () {
        var g = d3.select(this.parentNode),
            extent = brush.extent();
        if (round) {
          g.select('.brush')
            .call(brush.extent(extent = extent.map(round)))
            .selectAll('.resize')
            .style('display', null);
        }

        g.select('#' + clipPathId + ' rect')
            .attr('x', xScaleFunction(extent[0]))
            .attr('width', xScaleFunction(extent[1]) - xScaleFunction(extent[0]));

        crossFilterDimension.filterRange(extent);
        
        // Update range readout
        
        // console.log(event[1] - event[0]);
        
        rangeReadout.style('visibility', 'visible')
          .text(Math.ceil(extent[0].getFullYear()) + 
                ((extent[0].getFullYear() !== extent[1].getFullYear() &&
                 extent[1].getMonth() && extent[1].getDate() !== 1)
                  ? '–' + Math.floor(extent[1].getFullYear()) : ''));
      });

      brush.on('brushend.chart', function () {
        
        // If brush is empty (indicating clicking outside of handles)
        
        if (brush.empty()) {
          rangeReadout.style('visibility', 'hidden'); // Clear/hide range readout
          var div = d3.select(this.parentNode.parentNode.parentNode);
          div.select('.title a').style('display', 'none');
          div.select('#' + clipPathId + ' rect').attr('x', null).attr('width', '100%');
          crossFilterDimension.filterAll();
        }
        updateAll();
      });
    }


    // Add readout to show currently selected range

    function addRangeReadout() {
      rangeReadout = d3domNode.append('p')
                      .style('visibility', 'hidden')
                      .text('init');
    }
    
    // Add preset value buttons (years)
    
    function addPresetButtons() {
      
      var buttonContainer = d3domNode.append('p')
                                     .text('Show ')
                                     .append('span')
                                     .classed('btn-group', true)
                                     .attr('role', 'group');
      
      [1860, 1861, 1862].forEach(function (year) {
        buttonContainer.append('button')
          .attr('type','button')
          .classed({ 'btn':true, 'btn-default': true, 'btn-xs': true })
          .attr('value', year)
          .text(year)
          .on('click', function () { 
            setRangeTo( new Date(parseInt(this.value), 0, 1), 
                        new Date(parseInt(this.value) + 1, 0, 1));
          });
      });
      
      buttonContainer.append('button')
        .attr('type','button')
        .classed({ 'btn':true, 'btn-default': true, 'btn-xs': true })
        // .attr('value', year)
        .text('After 1862')
        .on('click', function () { 
          setRangeTo( new Date(1863, 0, 1), 
                      new Date());
        });
    }
            
    // Add clear button

    function addClearButton() {
    /*
      $('<button>Clear</button>').click(function () {

        crossFilterDimension.filterAll();      
        activeFilterList = {};
        updateAll();
      }).appendTo($domNode);
      */
    }


    // Generate chart brush handle as SVG path

    function getResizeHandlePath(d) {

        var e = +(d == 'e'),
            x = e ? 1 : -1,
            y = height / 3;

        return 'M' + (.5 * x) + ',' + y + 'A6,6 0 0 ' + e + ' ' + (6.5 * x) + ',' + (y + 6) + 
               'V' + (2 * y - 6) + 'A6,6 0 0 ' + e + ' ' + (.5 * x) + ',' + (2 * y) + 'Z' + 
               'M' + (2.5 * x) + ',' + (y + 8) + 'V' + (2 * y - 8) + 
               'M' + (4.5 * x) + ',' + (y + 8) + 'V' + (2 * y - 8);
    }

    // Generate a SVG path for the bars
    // I believe groups is taken from what's set via the .datum method
    //  above -- g.selectAll(".bar").datum(group.all());

    function getPathForBars(groups) {

      var path = [],
          i = -1,
          n = groups.length,
          d;

      while (++i < n) {
        d = groups[i];
        if (d.value > 0)
          path.push('M', xScaleFunction(d.key), ',', height, 
                    'V', yScaleFunction(d.value) + margin.top, 'h9V', height);
      }

      return path.join('');
    }

    // Create container for facet bar chart
    //  A group within <svg>

    function addFacetContainer() {

      var id = Math.random(),
          g = d3domNode.append('svg')
              .attr('width', width + margin.left + margin.right)
              .attr('height', height + margin.top + margin.bottom)
              .attr('class','facet-barchart-container')
              .append('g')
              .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

      // Clip path to clip the foreground (blue) bars, revealing the 
      //  background (grey) bars

      g.append('clipPath')
        .attr('id', clipPathId)
        .append('rect')
        .attr('width', width)
        .attr('height', height + margin.top)
        .attr('y', margin.top * -1);

      // Two SVG path elements - both for the same
      //  data, but one is blue for selection, one is 
      //  grey for the not-selected
      // The 'data' in this case is just for generating
      //  the class attributes 'background bar' and 
      //  'foreground bar'
      // I think the data that is used to create the bars
      //  is set via .datum() -- and group is assigned via the chart.group()
      //  method -- which is called when the chart instance is initialized

      g.selectAll('.bar')
        .data(['background', 'foreground'])
        .enter().append('path')
        .attr('class', function (d) {
          return d + ' bar';
        })
        .datum(group.all());

      // Assign clip path to foreground bars path 
      //  (the one we just created)
      //  according to chart id

      g.selectAll('.foreground.bar')
        .attr('clip-path', 'url(#' + clipPathId + ')');

      // Add chart axis

      g.append('g')
        .attr('class', 'axis')
        .attr('transform', 'translate(0,' + (height + AXIS_BAR_MARGIN) + ')')
        .call(axis);

      // Initialize the brush component with pretty resize handles

      gBrush = g.append('g').attr('class', 'brush').call(brush);
      gBrush.selectAll('rect').attr('height', height);
      gBrush.selectAll('.resize').append('path').attr('d', getResizeHandlePath);

      return g;
    }

    // Update facet listing -- this is the main draw routine
    //  Draw content straight to the DOM node

    function update() {

      // Get the foreground and background bar paths
      //  and shape it -- this is performed in getPathForBars(),
      //  defined above

      g.selectAll('.bar').attr('d', getPathForBars);
    }

    function clearFilter() {

      crossFilterDimension.filterAll();

      // Clear brush and blue highlighting

      g.selectAll('g.brush').call(brush.clear());
      d3.select('#' + clipPathId + ' rect')
        .attr('x', null)
        .attr('width', '100%');
    }
    
    function setRangeTo(startDate, endDate) {
      brush.extent([startDate, endDate]);
      g.selectAll('g.brush').call(brush);
      brush.event(gBrush);
    }

    function init() {
      addRangeReadout();
      addPresetButtons();
      // addClearButton();
      g = addFacetContainer();
      setBrushEventHandlers();
    }

    init();

    window.sr = setRangeTo; // TEMP
    
    return {
      update: update,
      clearFilter: clearFilter,
      setRangeTo: setRangeTo
    }
  }
});

  
