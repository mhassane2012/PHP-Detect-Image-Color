<?php
/**
 * A simple class php to detect image (JPEG,PNG) Color
 *
 * Get :: Image Color in background
 * 
 * Before used this class, below the prerequises : 
 * 
 * PHP 5 or newer
 * @author Hassane Moussa <mhassane2012@gmail.com>
 * @From Africa / Niamey-Niger
 * @License GPL
 */

class DetectImageColor{
	
	private
	$image="",
	$imgcreatc="",
	$pathToImg="",
	$type="",
	$body="",
	$print_img="";
	
	/**
    * Constructor of the class
    */
    public function __construct($path_img)
    {
		$this->pathToImg = $path_img;
			
			if($this->getImgType($path_img)==2 || $this->getImgType($path_img)==3){ // IMAGETYPE_JPEG || IMAGETYPE_PNG
				echo $this->getImage($this->pathToImg)."<br/>";
				echo $this->is_img($this->pathToImg);
				echo $this->getColorBackground($this->getHexa($this->pathToImg));
			}else{
				echo $this->is_img($this->pathToImg);
			}
    }

	public function is_img($path_img){
		
		if(exif_imagetype($path_img)){
			if($this->getImgType($path_img)==2){return "IMAGETYPE_JPEG";}
			elseif($this->getImgType($path_img)==3){return "IMAGETYPE_PNG";}
			else{return "IMAGETYPE OTHER";}
		}
		else{return "File isn't type image or not exist";}
	}
	
	public function getImgType($path_img){	
		$this->type = getimagesize($path_img)[2];
		return $this->type;	
	}
	
	public function getImage($path_img){	
		$this->print_img = "<img src=$path_img />";
		return $this->print_img;	
	}
	
	public function getColorBackground($codehexa){
		
		$this->body="<body style='background:#$codehexa;'></body>";
		return $this->body;
	}
	
	public function getHexa($path_img){
		
	  if($this->getImgType($path_img)==2){
		$this->image=imagecreatefromjpeg($path_img);
		}else{$this->image=imagecreatefrompng($path_img);}
	  $this->imgcreatc=imagecreatetruecolor(1,1);  
	  imagecopyresampled($this->imgcreatc,$this->image,0,0,0,0,1,1,imagesx($this->image),imagesy($this->image));
	  $this->hexa_color=dechex(imagecolorat($this->imgcreatc,0,0));
	  return $this->hexa_color;
	}

	
}