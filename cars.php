<?php
// Load the XML source
$xml = new DOMDocument();
$xml->load('books.xml');

// Start xslt
$xslt = new XSLTProcessor();

// Import Stylesheet
$xsl = new DOMDocument();
$xsl->load('books.xsl');
$xslt->importStylesheet($xsl);

print $xslt->transformToXML($xml);
?>