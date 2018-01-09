<?php
		$dirname = "../images/male/";
		$response=array();
		$response["male"]=array();
		$response["maleTitle"]=array();
		if ($opendir= opendir($dirname)) 
		{
			while(($file=readdir($opendir)) !== false)
			{
				if($file!=='.' && $file!=='..' )
				{
					//$response["male"]=" <img src='".$dirname.$file."' /> <br />";
					$blah=strpos($file,".");
					
					array_push($response["maleTitle"],"".substr($file,0, $blah));
					array_push($response["male"],"".$dirname."".$file);
				}
			}
		}
		$dirname = "../images/female/";
		$response["female"]=array();
		$response["femaleTitle"]=array();
		if ($opendir= opendir($dirname)) 
		{
			while(($file=readdir($opendir)) !== false)
			{
				if($file!=='.' && $file!=='..' )
				{
					//$response["male"]=" <img src='".$dirname.$file."' /> <br />";
					array_push($response["femaleTitle"],"".$file);
					array_push($response["female"],"".$dirname."".$file);
				}
			}
		}
		 echo json_encode($response); 	
		
		 
?>