<?php
class ThumbHelper extends AppHelper {

	
	public function imageResize($dir,$upload_img,$rwidth,$rheight, $type = "", $color=''){
	
	$imageUpload = new imageUploadComponent;
	
	$imageUpload->ResizeResponsive($dir,$upload_img,$rwidth,$rheight,$type,$color);
	
	}

}