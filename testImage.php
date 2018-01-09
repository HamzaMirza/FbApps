<?php
	$img=imagecreatefrompng("images/TEMPLATE-RESULT.png");
	$imgRotated=imagerotate($img,45,-1);
	imagepng($img,"images/myPicRotated.png",$imgRotated);

	
?>
<form enctype="multipart/form-data" method="post" action="php_upload_script.php">
Choose your file here:
<input name="uploaded_file" type="file"/><br /><br />
<input type="submit" value="Upload It"/>
</form>
