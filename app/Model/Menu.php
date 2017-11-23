<?php
//App::admins('AuthComponent', 'Controller/Component');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Menu extends AppModel {

	public $actsAs = array('Tree');
	var $validate = array();	
	
	
	public $belongsTo = array(
			'Page' => array(
					'className' => "Cmspages",
					'foreignKey' => 'web_page_url'
			),
			
	);
	
	function AddValidate($id=null) {
	
	 $validatedata = array(
		
	 'title'=> array(
	 				'mustNotEmpty'=>array(
	 						'rule' => 'notEmpty',
	 						'message'=> 'Menu name is require',
	 				)
	 		),
	 'seo_url' => array(
	 				'invalid' => array(
	 								'rule'    => array('checkUrl'),
	 								'allowEmpty' => true,
	 								'message' => 'invalid url'),
	 				'uniqueUrl' => array(
	 								'rule'    => array('checkUniqueUrl',$id),
	 								'allowEmpty' => true,
	 								'message' => 'This url already taken')
	 		),
	 		
	'linkType' => array(
	 				'rule' => 'notEmpty',
	 				'message' => 'Link Type is require'
	 		),
	 'page_url' => array(
	 				"required"=>array('rule' => array('pageurlNotEmpty','linkType'),
	 									'allowEmpty' => true,
	 								  'message' => 'Page Url is require'),
	 				/* "requiredprifix"=>array('rule' => array('httpRequire','linkType'),
	 									'allowEmpty' => true,
	 								   'message' => 'please add "http://" prifix before url '), */
	 		),
			
		 );
		 
		 $this->validate=$validatedata;
		return $this->validates();
	
}

public function checkUrl($url,$id){
	if($url['seo_url']!=""){
		
		if (preg_match('/^(?=.*[a-zA-Z])([0-9a-zA-Z]+)$/', $url['seo_url']))
		{
			return true;
		}
		else
			return false;
		
	}else 
		return true;
	
}

public function pageurlNotEmpty($value,$type){

	
	if($this->data[$this->name][$type]=="OutSite"){
		if($value['page_url']!="")
		return true;
		else 
		return false;
	}
	else 
		return true;
	

}

public function httpRequire($value,$type){

	if($this->data[$this->name][$type]=="OutSite"){
		if($value['page_url']!=""){
		$url = substr($value['page_url'],0,7);
		if($url=="http://")
			return true;
		else 
			return false;
		}
		else
			return true;
	}
	else
		return true;


}


function checkUniqueUrl($data,$id) {
	
	if($id)
		$self = array('Menu.id != ' =>$id,'Menu.seo_url' => $data['seo_url']);
	else
		$self=array('Menu.seo_url' => $data['seo_url']);;
	
	if($data['seo_url']!=""){
	$isUnique = $this->find(
			'count',
			array(
					'fields' => array(
							'Menu.id',
							'Menu.seo_url'
					),
					'conditions' => $self
			)
	);
		if($isUnique)
		return false; //Allow update
		else
		return true; //If there is no match in DB allow anyone to change
	
	}else return true;
}




}
