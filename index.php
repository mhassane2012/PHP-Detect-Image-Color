<?php 
 error_reporting(0);
/***************************************************************************************
							Main Using  Class DetectImageColor
***************************************************************************************/
 require('detectImageColor.php');
 
 $path = "images3.png";

	$mainDetectImageColor = new DetectImageColor($path);

	//echo $mainDetectImageColor->getColorBackground($mainDetectImageColor->getHexa($path))."<br/>";
		
	var_dump($mainDetectImageColor);
   
?>