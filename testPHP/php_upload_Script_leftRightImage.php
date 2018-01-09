<?php
//"images/male/TEMPLATE-RESULT1.png";
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$wtr=$_GET["wtr"];
$wtrFileName=end(explode("/", $wtr));
$dp=$_GET["dp"];
$dpFileName=end(explode("/", $dp));
$fileName = "TEMPLATE-RESULT1.png"; // The file name
$fileTmpLoc =0; // File in the PHP tmp folder
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter
$kaboom = array($fileName,".","png");
$fileExt = end($kaboom); // Now target the last array element to get the file extension

// Place it into your "uploads" folder mow using the move_uploaded_file() function
	$moveResult = copy("images/TEMPLATE-RESULT1.png", "uploads/$fileName");
  echo "$moveResult";
// Include the file that houses all of our custom image functions
	include_once("ak_php_img_lib_1.0.php");
	
// ---------- Start Universal Image Resizing Function --------
$target_file = "uploads/$fileName";

$BackgroundImage = "uploads/$fileName";
$wmax = 500;
$hmax = 500;
ak_img_resize($target_file, $BackgroundImage, $wmax, $hmax, $fileExt);
// ----------- End Universal Image Resizing Function ----------

// ---------- Start Convert to JPG Function --------
if (strtolower($fileExt) != "jpg") {
    $target_file = "uploads/$fileName";
    $new_jpg = "uploads/".$kaboom[0].".jpg";
    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
}
// ----------- End Convert to JPG Function -----------
// ---------- Start Image Watermark Function --------
$target_file = "uploads/".$kaboom[0].".jpg";

//Anime pics
ak_img_resize($wtr, "uploads/$wtrFileName", 150,450, "png");
ak_img_resize($dp, "uploads/$dpFileName", 150,450, "png");
$AnimePic = "uploads/$wtrFileName";
$dpPic = "uploads/$dpFileName";
$new_file = "uploads/result".$kaboom[0].".jpg";
$lor="right";
$name =array_shift(explode(".",$wtrFileName));
ak_img_watermark($target_file, $AnimePic, $new_file,$dpPic,$name);
// ----------- End Image Watermark Function -----------

?>
