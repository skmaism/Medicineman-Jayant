<?php class imageUploadComponent extends Component {
	
	function uploadFileResize($imagename,$DestinationDirectory,$width,$height,$wthumb='',$color='',$ext=''){
               
//   echo $imagename["name"]; 
//    echo "<pre>";
//    print_r($imagename);
//    echo "</pre>";
//    
//    return;
               if ($imagename["error"] > 0)
 		{
			return 0;
 		}
		else
		{
		 if (file_exists($DestinationDirectory.$imagename["name"]))
       		{
		$ran = rand ();
		$upload_img=$ran.$imagename["name"];
		move_uploaded_file($imagename["tmp_name"],$DestinationDirectory.$upload_img);
		$this->ResizeResponsive($DestinationDirectory,$upload_img,$width,$height,$wthumb,$color);
		return $upload_img;
			}
			 else
                    {
			move_uploaded_file($imagename["tmp_name"],$DestinationDirectory.$imagename["name"]);
			$this->ResizeResponsive($DestinationDirectory,$imagename["name"],$width,$height,$wthumb,$color);
			return $imagename["name"];
			}
			}
		}	
		
                
        function ResizeResponsive($dir,$upload_img,$rwidth,$rheight, $type = "", $color=''){
	 
		if (!file_exists($dir . $upload_img) || !is_file($dir . $upload_img)) {
			return;
		} 
		
		
		$old_image = $upload_img;
		
		if($type=="thumb"){
		$new_image =  $rwidth . 'x' . $rheight.$upload_img;
		if (!file_exists($dir . $new_image) || (filemtime($dir . $old_image) > filemtime($dir . $new_image))) {
		list($width_orig, $height_orig) = @getimagesize($dir . $upload_img);
		if ($width_orig != $rwidth || $height_orig != $rheight) {
                                $image = new imageComponent($dir . $old_image);
				$image->resize($rwidth, $rheight, $type,$color);
				$image->save($dir . $new_image);
				//echo "hello hanuman";
			} else {
				copy($dir . $old_image,$dir . $new_image);
			}
		}
		else 
			return false;
		
		}
		else{
		$new_image =  $upload_img;
		
		list($width_orig, $height_orig) = getimagesize($dir . $upload_img);
		if ($width_orig != $rwidth || $height_orig != $rheight) {
				$image = new imageComponent($dir . $old_image);
				$image->resize($rwidth, $rheight, $type,$color);
				$image->save($dir . $new_image);
				//echo "hello hanuman";
			} else {
				copy($dir . $old_image,$dir . $new_image);
			}
		
		}
		
		
		}
		
		function uploadFileWithoutThumbNresize($imagename,$DestinationDirectory)
	{
	//pr($imagename);
	//echo $imagename["error"];
		if ($imagename["error"] > 0)
 		{
			return 0;
 		}
		else
		{
			 if (file_exists($DestinationDirectory.$imagename["name"]))
       		{
		$ran = rand ();
		$upload_img=$ran.$imagename["name"];
		move_uploaded_file($imagename["tmp_name"],$DestinationDirectory.$upload_img);
		return $upload_img;
			}
			 else
        	{
			move_uploaded_file($imagename["tmp_name"],$DestinationDirectory.$imagename["name"]);
			return $imagename["name"];
			}
			}
		}
			        
	}
class imageComponent {
    
	 private $file;
	 private $image;
	 private $info;
	 
	 public function __construct($file) {
		if (file_exists($file)) {
		$this->file = $file;

		$info = @getimagesize($file);

		$this->info = array(
            	'width'  => $info[0],
            	'height' => $info[1],
            	'bits'   => $info['bits'],
            	'mime'   => $info['mime']
        	);
        	
        	$this->image = $this->create($file);
    	} else {
      		exit('Error: Could not load image ' . $file . '!');
    	}
	}
	
	private function create($image) {
		$mime = $this->info['mime'];
		
		if ($mime == 'image/gif') {
			return imagecreatefromgif($image);
		} elseif ($mime == 'image/png') {
			return imagecreatefrompng($image);
		} elseif ($mime == 'image/jpeg') {
			return imagecreatefromjpeg($image);
		}
    }
	
	public function save($file, $quality = 90) {
		$info = pathinfo($file);
       
		$extension = strtolower($info['extension']);
   		
		if (is_resource($this->image)) {
			if ($extension == 'jpeg' || $extension == 'jpg') {
				imagejpeg($this->image, $file, $quality);
			} elseif($extension == 'png') {
				imagepng($this->image, $file);
			} elseif($extension == 'gif') {
				imagegif($this->image, $file);
			}
			   
			imagedestroy($this->image);
		}
    }
	
	 public function resize($width = 0, $height = 0, $default = '' , $color='') {
    	if (!$this->info['width'] || !$this->info['height']) {
			return;
		}
		$colors=($color=='')?"FFFFFF":$color;
		$rgb = $this->html2rgb($colors);

		$xpos = 0;
		$ypos = 0;
		$scale = 1;

		$scale_w = $width / $this->info['width'];
		$scale_h = $height / $this->info['height'];

		if ($default == 'w') {
			$scale = $scale_w;
		} elseif ($default == 'h'){
			$scale = $scale_h;
		} else {
			$scale = min($scale_w, $scale_h);
		}

		if ($scale == 1 && $scale_h == $scale_w && $this->info['mime'] != 'image/png') {
			return;
		}

		$new_width = (int)($this->info['width'] * $scale);
		$new_height = (int)($this->info['height'] * $scale);			
    	$xpos = (int)(($width - $new_width) / 2);
   		$ypos = (int)(($height - $new_height) / 2);
        		        
       	$image_old = $this->image;
        $this->image = imagecreatetruecolor($width, $height);
			
		if (isset($this->info['mime']) && $this->info['mime'] == 'image/png') {		
			imagealphablending($this->image, false);
			imagesavealpha($this->image, true);
			$background = imagecolorallocatealpha($this->image, 255, 255, 255, 127);
			imagecolortransparent($this->image, $background);
		} else {
			$background = imagecolorallocate($this->image, $rgb[0], $rgb[1], $rgb[2]);
		}
		
		imagefilledrectangle($this->image, 0, 0, $width, $height, $background);
	
        imagecopyresampled($this->image, $image_old, $xpos, $ypos, 0, 0, $new_width, $new_height, $this->info['width'], $this->info['height']);
        imagedestroy($image_old);
           
        $this->info['width']  = $width;
        $this->info['height'] = $height;
    }
	
	
	private function html2rgb($color) {
		if ($color[0] == '#') {
			$color = substr($color, 1);
		}
		
		if (strlen($color) == 6) {
			list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);   
		} elseif (strlen($color) == 3) {
			list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);    
		} else {
			return false;
		}
		
		$r = hexdec($r); 
		$g = hexdec($g); 
		$b = hexdec($b);    
		
		return array($r, $g, $b);
	}

    
}
?>