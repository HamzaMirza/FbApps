<?php
 $uri  =  $_POST["url_"];//substr( $_GET["drp"], 1);
DownloadDP($uri);

function DownloadDP($url)
{
	
	/*$fileName=basename($url);
	$saveLoc= 'images/'.$fileName;
	file_put_contents($saveLoc,file_get_contents("$url")); */
	$content = file_get_contents("$url");
$fp = fopen("images/dp.jpg", "w");
fwrite($fp, $content);
fclose($fp); 
}	
?>
