<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:xs="http://www.w3.org/2001/XMLSchema"
  xmlns:xd="http://www.oxygenxml.com/ns/doc/xsl"
  xmlns:mods="http://www.loc.gov/mods/v3" 
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
  xsi:schemalocation="http://www.loc.gov/mods/v3 http://www.loc.gov/standards/mods/v3/mods-3-3.xsd"
  exclude-result-prefixes="xs xd"
  version="2.0">
    
  <!-- ******************************************************************************
      grabs pieces of MODS to display for Risorgimanto Pamphlets
      
      **Change Log
      2012-10-24 EM Begun
      
      ******************************************************************************   -->
  <!-- Work plan:
        
  -->
  

  <!-- ** line break in output file; improves human readability of xml output ** -->
  
  <xsl:output indent="no" method="text" media-type="application/javascript" encoding="utf-8" />

  <xsl:template match="text()">
  	<xsl:value-of select="normalize-space(translate(., '&#34;', &quot;'&quot;))"/>
  </xsl:template>

  <!-- For now we show only the first role type -->
  <xsl:variable name="role" select="/mods:mods/mods:name[1]/mods:role/mods:roleTerm" />
  <xsl:template match="/mods:mods/mods:name">
    <xsl:copy>
      <xsl:apply-templates select="mods:namePart[not(@type)]"/>
    </xsl:copy>
    <xsl:if test="following-sibling::mods:name">; </xsl:if>
  </xsl:template>

  <xsl:template match="mods:namePart">
    <xsl:if test="../mods:role/mods:roleTerm = $role">
      <xsl:value-of select="./text()" />
    </xsl:if>
  </xsl:template>
    
  <xsl:template match="/">metacallback({"title": "<xsl:apply-templates select="/mods:mods/mods:titleInfo[not(@type)]/mods:title"/>",
  "creator": {
    "role": "<xsl:value-of select="$role"/>",
    "name": "<xsl:apply-templates select="/mods:mods/mods:name"/>"
  },
  "publication": {
    "place": "<xsl:apply-templates select="/mods:mods/mods:originInfo/mods:place/mods:placeTerm[@type='text']"/>",
    "publisher": "<xsl:apply-templates select="/mods:mods/mods:originInfo/mods:publisher"/>"
  },
  "date": "<xsl:apply-templates select="/mods:mods/mods:originInfo/mods:dateIssued"/>",
  "pagination": "<xsl:apply-templates select="/mods:mods/mods:physicalDescription/mods:extent"/>",
  "link": "http://library.brown.edu/find/Record/<xsl:value-of select="substring(/mods:mods/mods:recordInfo/mods:recordIdentifier,1,8)"/>"
})</xsl:template>
</xsl:stylesheet>
        
   