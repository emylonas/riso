# CDS-facetview
Creates a browser-based facet interface

The idea is to take a JSON file with categorical data and HTML markup and be able to quickly produce an interface for browsing the data using facets. 

In some ways this is similar to http://viewshare.org/ 

The difference is that this is customizeable, and the assumption is that the user has some development chops. 

The user is intended to modify three areas:

* the data file, a JSON structure wrapped in a module
* the HTML file, in which facets placeholders are placed within the document
* any custom views for the facets, consisting of a *-facet.js file and a *-facet.css file

More to come ...
