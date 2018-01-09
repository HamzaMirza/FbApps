<?php

// ----------------------- RESIZE FUNCTION -----------------------
// Function for resizing any jpg, gif, or png image files
function ak_img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
    $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
    $img = imagecreatefrompng($target);
    } else { 
    $img = imagecreatefromjpeg($target);
    }
  $tci = imagecreatetruecolor($w, $h);
  // Transparent Background
		$color = imagecolorallocatealpha($tci, 0, 0, 0, 127);
		imagefill($tci, 0, 0, $color);
		imagesavealpha($tci, true);
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    if ($ext == "gif"){ 
        imagegif($tci, $newcopy);
    } else if($ext =="png"){ 
       imagepng($tci, $newcopy);
    } else { 
        imagejpeg($tci, $newcopy, 84);
    }

	//
}

// -------------- THUMBNAIL (CROP) FUNCTION ---------------
// Function for creating a true thumbnail cropping from any jpg, gif, or png image files
function ak_img_thumb($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $src_x = ($w_orig / 2) - ($w / 2);
    $src_y = ($h_orig / 2) - ($h / 2);
    $ext = strtolower($ext);
    $img = "";
    if ($ext == "gif"){ 
    $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
    $img = imagecreatefrompng($target);
    } else { 
    $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    imagecopyresampled($tci, $img, 0, 0, $src_x, $src_y, $w, $h, $w, $h);
    if ($ext == "gif"){ 
        imagegif($tci, $newcopy);
    } else if($ext =="png"){ 
        imagepng($tci, $newcopy);
    } else { 
        imagejpeg($tci, $newcopy, 84);
    }
}

// ----------------------- IMAGE CONVERT FUNCTION -----------------------
// Function for converting GIFs and PNGs to JPG upon upload
function ak_img_convert_to_jpg($target, $newcopy, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $ext = strtolower($ext);
    $img = "";
    if ($ext == "gif"){ 
        $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
        $img = imagecreatefrompng($target);
    }
    $tci = imagecreatetruecolor($w_orig, $h_orig);
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w_orig, $h_orig, $w_orig, $h_orig);
   imagejpeg($tci, $newcopy, 84);

}

// ----------------------- IMAGE WATERMARK FUNCTION -----------------------
// Function for applying a PNG watermark file to a file after you convert the upload to JPG
function ak_img_watermark($target, $wtrmrk_file,$wtrExt, $newcopy,$dp,$name,$dpExt,$userName) { 
     if ($wtrExt == "gif"){ 
    $watermark = imagecreatefromgif($wtrmrk_file);
    } else if($wtrExt =="png"){ 
    $watermark = imagecreatefrompng($wtrmrk_file);
    } else { 
    $watermark = imagecreatefromjpeg($wtrmrk_file);
    }
	//$watermark = imagecreatefrompng($wtrmrk_file); 
	$dpExt = strtolower($dpExt);
    if ($dpExt == "gif"){ 
    $dpMark = imagecreatefromgif($dp);
    } else if($dpExt =="png"){ 
    $dpMark = imagecreatefrompng($dp);
    } else { 
    $dpMark = imagecreatefromjpeg($dp);
    }
	imagealphablending($dpMark, false); 
    imagesavealpha($dpMark, true); 	
   imagealphablending($watermark, false); 
    imagesavealpha($watermark, true); 
    $img = imagecreatefromjpeg($target);
    $img_w = imagesx($img); 
    $img_h = imagesy($img); 
    $wtrmrk_w = imagesx($watermark); 
    $wtrmrk_h = imagesy($watermark);
	$dpmrk_w = imagesx($dpMark); 
    $dpmrk_h = imagesy($dpMark);
	$dst_x_anime = 10;
	$dst_y_anime = 40;
	$dst_x_dp = 490; 
	$dst_y_dp = 40;
	
    imagecopy($img, $watermark, $dst_x_anime, $dst_y_anime, 0, 0, $wtrmrk_w, $wtrmrk_h); 
      $white = imagecolorallocate($img, 0, 0, 255);
		$font="js/High Voltage.ttf";
      $text = "".$name;
      imagettftext($img, 30, 0, 25, 35, $white, $font, $text);
	imagecopy($img, $dpMark, $dst_x_dp, $dst_y_dp, 0, 0, $dpmrk_w, $dpmrk_h); 
    imagejpeg($img, $newcopy, 100); 
    imagedestroy($img); 
    imagedestroy($watermark); 
} 



function ak_img_watermark1($target, $wtrmrk_file,$wtrExt,$wtrmrk_file1,$wtrExt1, $newcopy,$dp,$name,$name1,$dpExt,$userName) { 
     if ($wtrExt == "gif"){ 
    $watermark = imagecreatefromgif($wtrmrk_file);
    } else if($wtrExt =="png"){ 
    $watermark = imagecreatefrompng($wtrmrk_file);
    } else { 
    $watermark = imagecreatefromjpeg($wtrmrk_file);
    }
	
	if ($wtrExt1 == "gif"){ 
    $watermark1 = imagecreatefromgif($wtrmrk_file1);
    } else if($wtrExt =="png"){ 
    $watermark1 = imagecreatefrompng($wtrmrk_file1);
    } else { 
    $watermark1 = imagecreatefromjpeg($wtrmrk_file1);
    }	
	$dpExt = strtolower($dpExt);
    if ($dpExt == "gif"){ 
    $dpMark = imagecreatefromgif($dp);
    } else if($dpExt =="png"){ 
    $dpMark = imagecreatefrompng($dp);
    } else { 
    $dpMark = imagecreatefromjpeg($dp);
    }
	imagealphablending($dpMark, false); 
    imagesavealpha($dpMark, true); 	
   imagealphablending($watermark, false); 
    imagesavealpha($watermark, true); 
	imagealphablending($watermark1, false); 
    imagesavealpha($watermark1, true); 
    $img = imagecreatefromjpeg($target);
    $img_w = imagesx($img); 
    $img_h = imagesy($img); 
    $wtrmrk_w = imagesx($watermark); 
    $wtrmrk_h = imagesy($watermark);
	 $wtrmrk_w1 = imagesx($watermark1); 
    $wtrmrk_h1 = imagesy($watermark1);
	$dpmrk_w = imagesx($dpMark); 
    $dpmrk_h = imagesy($dpMark);
	$dst_x_anime = 1;
	$dst_y_anime = 40;
	$dst_x_dp = $wtrmrk_w*2; 
	$dst_y_dp = 40;
	
    imagecopy($img, $watermark, $dst_x_anime, $dst_y_anime, 0, 0, $wtrmrk_w, $wtrmrk_h); 
      $white = imagecolorallocate($img, 0, 0, 255);
		$font="js/arial.ttf";
		$font_size = 25;
		$text = "".$name;
		$text_a = explode(' ', $text);
		$text = ''; //Empty String
		$width = $wtrmrk_w1;
		$margin = 10;
		for($i=0;$i<sizeof($text_a);$i++)
		{
			if($i>1) break;
			$box = imagettfbbox($font_size, 0, $font, $text.' '.$text_a[$i]);
				if($box[$i] >= $width - $margin*2){
					$text .= "\n".$text_a[$i];
				} else {
					$text .= " ".$text_a[$i];
				}
		}
		$text = trim($text);
		$box = imagettfbbox($font_size, 0, $font, $text);
		$height = $box[1] + $font_size + $margin * 2;
		imagettftext($img,  $font_size, 0, $margin, $font_size+$margin, $white, $font, $text);
	  
	  $dst_x_anime = $wtrmrk_w+2;
	$dst_y_anime = 40;
	imagecopy($img, $watermark1, $dst_x_anime, $dst_y_anime, 0, 0, $wtrmrk_w1, $wtrmrk_h1);
		$text = "".$name1;
		$text_a = explode(' ', $text);
		$text = ''; //Empty String
		$width = $wtrmrk_w1;
		for($i=0;$i<sizeof($text_a);$i++)
		{
			if($i>1) break;
			$box = imagettfbbox($font_size, 0, $font, $text.' '.$text_a[$i]);
				if($box[$i] >= $width - $margin*2){
					$text .= "\n".$text_a[$i];
				} else {
					$text .= " ".$text_a[$i];
				}
		}
		$text = trim($text);
		$box = imagettfbbox($font_size, 0, $font, $text);
		$height = $box[1] + $font_size + $margin * 2;
		imagettftext($img,  $font_size, 0, 10+$margin+$wtrmrk_w, $font_size+$margin, $white, $font, $text);
	
	
	imagecopy($img, $dpMark, $dst_x_dp, $dst_y_dp, 0, 0, $dpmrk_w, $dpmrk_h); 
	 $text = "".$userName;
		$text_a = explode(' ', $text);
		$text = ''; //Empty String
		$width = $dpmrk_w;
		for($i=0;$i<sizeof($text_a);$i++)
		{
			if($i>1) break;
			$box = imagettfbbox($font_size, 0, $font, $text.' '.$text_a[$i]);
				if($box[$i] >= $width - $margin*2){
					$text .= "\n".$text_a[$i];
				} else {
					$text .= " ".$text_a[$i];
				}
		}
		$text = trim($text);
		$box = imagettfbbox($font_size, 0, $font, $text);
		$height = $box[1] + $font_size + $margin * 2;
		imagettftext($img,  $font_size, 0, 10+$margin+$dst_x_dp, $font_size+$margin, $white, $font, $text);
    imagejpeg($img, $newcopy, 100); 
    imagedestroy($img); 
    imagedestroy($watermark); 
} 
?>