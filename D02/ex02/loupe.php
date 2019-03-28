#!/usr/bin/php
<?php
if ($argc == 1)
	exit();

function up_img_a($Doc) { 

	$links = array(); 
	foreach($Doc->getElementsByTagName('a') as $link) { 
		$links[] = array('keyimg' => $link->getElementsByTagName('img'));
		foreach($link->getElementsByTagName('img') as $osef)
		{
			$titleimglink = $osef->getAttribute('title');
			if (strlen($titleimglink)){
				$titleimglink = strtoupper($titleimglink);
				$osef->setAttribute('title', $titleimglink);
			}
		}
	}
	return ($links); 
}

$str = file_get_contents($argv[1]);
$Doc = new DOMDocument();
$implementation = new DOMImplementation();

$ext = pathinfo($argv[1], PATHINFO_EXTENSION);
if ($ext != "html" && $ext != "xml")
{
	echo"$str";
	exit();
}

$Doc->loadHTML($str, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

$rows = $Doc->getElementsByTagName('a');
$i = 0;
foreach ($rows as $row)
{
	$var = strtoupper($rows->item($i)->nodeValue);
	$rows->item($i)->childNodes[0]->nodeValue = "$var";
	$i++;
}

$rows = $Doc->getElementsByTagName('a');

foreach ($rows as $row)
{
	$var = $row->getAttribute('title');
	if (strlen($var)){
		$var = strtoupper($var);
		$row->setAttribute('title',$var);
	}
}
up_img_a($Doc);

$str = $Doc->saveHTML();
echo"$str";

?>
