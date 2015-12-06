	<?php
	/*
	 * PHP SimpleXML
	 * Loading a XML from a file, adding new elements and editing elements
	 */
	$reg = $_POST["reg"];

	if (file_exists('cars.xml')) {
		//loads the xml and returns a simplexml object
		$xml = simplexml_load_file('cars.xml');

		//transforming the object in xml format
		$xmlFormat = $xml->asXML();
		//displaying the element in proper format
		echo '<u><b>This is the xml code from test2.xml:</b></u>
		 <br /><br />
		 <pre>' . htmlentities($xmlFormat, ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre><br /><br />';

		//adding new child to the xml
		$newChild = $xml->addChild('brand');
		$newChild->addChild('reg', $reg);
		$newChild->addChild('carBrand', 'Toyota');
		$newChild->addChild('carType', 'Yaris');
		$newChild->addChild('engineSize', '1.0');
		$newChild->addChild('colour', 'silver');
		$newChild->addChild('price', '1000 Euro');
	  
		//transforming the object in xml format
		$xmlFormat = $xml->asXML();
		//displaying the element in proper format
		echo '<u><b>This is the xml code from test2.xml with new elements added:</b></u>
		 <br /><br />
		 <pre>' . htmlentities($xmlFormat, ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre>';

		//changing the nodes values
		//in this case we are changing the value 
		//of all children called <name>
		foreach ($xml->children() as $child)
			$child->genre = "CHANGED";
		//displaying the element in proper format
		echo '<br /><u><b>This is the xml code from books.xml with all genre changed:</b></u>
		 <br /><br />
		 <pre>' . htmlentities($xml->asXML(), ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre>';
	} else {
		exit('Failed to open cars.xml.');
	}
		file_put_contents('/home/ubuntu/workspace/cars.xml', $xml->asXML());
		
		writeRSS();
		function writeRSS(){
			if (file_exists('rss.xml')) {
				//loads the xml and returns a simplexml object
				$rssxml = simplexml_load_file('rss.xml');
				$newChild = $rssxml->channel->addChild('item');
				$newChild->addChild('reg', $reg);
				$newChild->addChild('carBrand', 'Toyota');
				$newChild->addChild('carType', 'Yaris');
				$newChild->addChild('engineSize', '1.0');
				$newChild->addChild('colour', 'silver');
				$newChild->addChild('price', '1000 Euro');
				file_put_contents('/home/ubuntu/workspace/rss.xml', $rssxml->asXML());
			}
		}
	?>