<?xml version="1.0"?>
<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.1">

<xsl:template match="*">
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="text()">
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="/">
<html>
	<head>
		<title>Cars 4 Cash</title>
	</head>
	<body>
		<h2>Petrol Cars:</h2>
		<!--http://videlibri.sourceforge.net/cgi-bin/xidelcgi-->
		<xsl:apply-templates select="//type[@fuel='petrol']/../*"/>
		
		<h2>Diesel Cars:</h2>
		<xsl:apply-templates select="//type[@fuel='diesel']/../*"/>
		
		<h2>All of our Cars:</h2>
		<xsl:apply-templates select="//brand"/>
		
	</body>
</html>
</xsl:template>

<xsl:template match="">
	<xsl:value-of select=""/>
</xsl:template>
<xsl:template match="">
	<xsl:value-of select=""/>
</xsl:template>
<xsl:template match="brand">
	<xsl:value-of select="."/>
</xsl:template>

</xsl:transform>