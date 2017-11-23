<?php
App::uses('Helper', 'View');
class NavHelper extends AppHelper {
	
	public $helpers = array('Html');
	
	function menuList($elements, $elkey = null, $parentId = 0 ){
		
		$data = $this->generateLink($elements, $elkey, $parentId );
		$this->htmlConvert($data,$elkey);
	}
	
 function generateLink($elements, $elkey = null, $parentId = 0 ) {
        $branch = array();

        foreach ($elements as $key=>$element) {
            if ($element[$elkey]['parent_id'] == $parentId) {
                $children = $this->generateLink($elements,$elkey, $element[$elkey]['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element[$elkey]['id']] = $element;
                unset($elements[$key]);
            }
        }
        return $branch;
       // pr($branch);
        
    }
	
	function htmlConvert($arr, $elmkey) {
		
		echo "<ul class='homemenu'>";
		foreach ($arr as $val) {
			/* if($val[$elmkey]['linkType']=='OutSite')
				$href = $val[$elmkey]['page_url'];
			else{
				$href =$this->webroot.$val[$elmkey]['web_page_url'];
			} */
			
		
			
			$href = ($val[$elmkey]['linkType']=="onSite")?( 
					($val['Page']['seo_url'])?$this->webroot."view/".$val['Page']['seo_url']:$this->webroot."view/".$val['Page']['id']
        			):(
        				($val[$elmkey]['linkType']=="OutSite")?(
        				(substr($val[$elmkey]['page_url'],0,7)=="http://" || substr($val[$elmkey]['page_url'],0,8)=="https://")?(
        						$val[$elmkey]['page_url'] ):(
        				($val[$elmkey]['page_url']=="#")?(
        							$val[$elmkey]['page_url']):(
        									$this->webroot.$val[$elmkey]['page_url']))
        			):
					($this->webroot.$val[$elmkey]['staticlink']));
			
			$target = "target='".$val[$elmkey]['openin']."'";
			
			if (!empty($val['children'])) {
				
				
				
				echo "<li><a href='".$href."' ".$target.">" . $val[$elmkey]['title']."</a>";
				$this->htmlConvert($val['children'], $elmkey);
				echo "</li>";
			} else {
				echo "<li><a href='".$href."' ".$target.">" . $val[$elmkey]['title'] . "</a></li>";
			}
		}
		echo "</ul>";
	}

}
