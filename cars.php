<?php
//load the xml source
$xml = new DOMDOCUMENT;
$xml->load('cars.xml');
$xsl = new DOMDOCUMENT;
$xsl->substituteEntities = true;
$xsl->load('cars.xsl');

//configure the transformer
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); 

echo $proc->transformToXML($xml);
?>