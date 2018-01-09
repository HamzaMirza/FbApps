<?php
 $uri  =  $_POST["url_"];
 $friendlist  =  json_decode(stripslashes($_POST['friendlist']));
DownloadDP($uri);
for($i=0;$i<sizeof($friendlist);$i++)
DownloadDP( $friendlist[$i]->imgSrc,$friendlist[$i]->nameF);

function DownloadDP($url,$name=null)
{
	
	/*$fileName=basename($url);
	$saveLoc= 'images/'.$fileName;
	file_put_contents($saveLoc,file_get_contents("$url")); */
	if($name==null)
		$name="dp";
	$content = file_get_contents("$url");
$fp = fopen("img/uploads_2bf/".$name.".jpg", "w");
fwrite($fp, $content);
fclose($fp); 
}	
?>
