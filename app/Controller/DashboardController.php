<?php

class DashboardController extends AppController {

     var $helpers = array('Html', 'Form', 'Ajax');
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
     //var $layout = "patient";
     public $uses = array("User");

     public function beforeFilter() {
          parent::beforeFilter();
     }

     public function admin_index() {
			
			$Users = $this->User->find("count" , array('conditions' => array('not' => array('User.role_id' => '1'))));			
			
			$Drivers = $this->User->find("all" , array('conditions' => array('User.role_id' => '8')));	
			$this->set(compact("Users" , "Drivers"));
     }


}
