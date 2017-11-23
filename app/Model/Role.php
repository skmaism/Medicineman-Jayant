<?php
class Role extends AppModel {
       	
	var $validate = array();	
	
	function checkUnique($data) {
	
		$_auth = SessionComponent::read('Auth.User');
		
		
		if($data['supper']!=0){
			$isUnique = $this->find(
					'count',
					array('conditions' => array('Group.supper' => 1)
					)
			);
			
			if($isUnique)
				return false; //Allow update
			else
				return true; //If there is no match in DB allow anyone to change
	
		}else return true;
	}
	     
}
