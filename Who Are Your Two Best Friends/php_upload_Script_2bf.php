<?php
$userName = $_POST['url_'];
working($userName);

?>
<?php
function working($userName)
{
		$dirname = "img/uploads_2bf/";
		
		$wtr=Array();
		$wtrFileName=Array();
		$wtrFileExt=Array();
		if ($opendir= opendir($dirname)) 
		{
			while(($file=readdir($opendir)) !== false)
			{
				if($file!=='.' && $file!=='..' )
				{
					$blah=strpos($file,".");
					if(substr($file,0, $blah)!="dp" && substr($file,0, $blah)!="resultTEMPLATERESULT1"  && substr($file,0, $blah)!="TEMPLATERESULT1") 
					{
						array_push($wtr,"".$dirname."".$file); 
					}
				}
			}
		}
		

$dp="img/uploads_2bf/dp.jpg";	
for($i=0;$i<sizeof($wtr);$i++)
{
	$wtrFileName[$i]=end(explode("/", $wtr[$i]));
	$wtrFileExt[$i]=end(explode(".", $wtrFileName[$i]));
}

$dpFileName=end(explode("/", $dp));
$dpFileExt=end(explode(".", $dp));

$fileName = "TEMPLATE-RESULT1.png"; // The image background 
$fileTmpLoc =0; // File in the PHP tmp folder
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
$kaboom = explode(".", $fileName);
$fileExt = end($kaboom); // Now target the last array element to get the file extension

// Place it into your "uploads" folder mow using the move_uploaded_file() function
	$moveResult = copy("img/2bf/TEMPLATE-RESULT1.png", "uploads/$fileName");
// Include the file that houses all of our custom image functions
	include_once("ak_php_img_lib_1.0.php");
	
// ---------- Start Universal Image Resizing Function --------
$target_file = "img/uploads_2bf/$fileName";

$BackgroundImage = "img/uploads_2bf/$fileName";
$wmax = 796;
$hmax = 500;
ak_img_resize($target_file, $BackgroundImage, $wmax, $hmax, $fileExt);
// ----------- End Universal Image Resizing Function ----------

// ---------- Start Convert to JPG Function --------
if (strtolower($fileExt) != "jpg") {
    $target_file = "img/uploads_2bf/$fileName";
    $new_jpg = "img/uploads_2bf/".$kaboom[0].".jpg";
    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
	unlink($target_file);
	
}
if (strtolower($dpFileExt) != "jpg") {
    $target_file = "img/uploads_2bf/$dpFileName";
    $new_jpg = "img/uploads_2bf/".$dpFileName.".jpg";
    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
}
// ----------- End Convert to JPG Function -----------
// ---------- Start Image Watermark Function --------
 

//Anime pics

$target_file = "img/uploads_2bf/".$kaboom[0].".jpg"; //background image.

for($i=0;$i<sizeof($wtr);$i++)
{
	ak_img_resize($wtr[$i], "uploads/$wtrFileName[$i]", 270,460, "$wtrFileExt[$i]"); //Friend Resize
}

ak_img_resize($dp, "uploads/$dpFileName", 270,460, $dpFileExt); //DP Resize

$FirstFriend = "img/uploads_2bf/$wtrFileName[0]"; // Link to first Friend
$SecondFriend = "img/uploads_2bf/$wtrFileName[1]"; // Link to first Friend
 $dpPic = "img/uploads_2bf/$dpFileName"; // Link to dp

 $new_file = "img/uploads_2bf/result".$kaboom[0].".jpg"; // Link to result image
$name =array_shift(explode(".",$wtrFileName[0]));
$name1 =array_shift(explode(".",$wtrFileName[1]));
//echo $dpFileExt;
if(sizeof($wtr)>=2)
ak_img_watermark1($target_file, $FirstFriend,$wtrFileExt[0], $SecondFriend,$wtrFileExt[1], $new_file,$dpPic,$name,$name1,$dpFileExt,$userName);
else
ak_img_watermark($target_file, $FirstFriend,$wtrFileExt[0], $new_file,$dpPic,$name,$dpFileExt,$userName);	
// ----------- End Image Watermark Function -----------

	
}
