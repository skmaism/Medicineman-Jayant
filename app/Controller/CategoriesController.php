<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class CategoriesController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("Category");
     //public $theme = "Admin";

     public function beforeFilter() {
          parent::beforeFilter();
          
     }


     public function admin_index() {$conditions = array('not' => array('Category.created' => null));
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Category.name LIKE ' => '%' . $keyword . '%',
						
                    ),
                );
		}
		
		
		
		//echo '<pre>';print_r($conditions); exit;
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('Category');
		 
		 

		// pass the value to our view.ctp
		$this->set(compact('records','keyword'));
		
		
		
	 }
     public function admin_add() {
		 
		if ($this->request->data) {
						
			if ($this->Category->save($this->request->data)) {
				 $this->Session->setFlash(__('Sucess: Category has been added.'), "sucess");	
				$this->redirect(array('controller' => 'categories', 'action' => 'index', "admin" => true));				 
			} else {
				 $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
			}
		   
		}
          
     }

     public function admin_edit($id = null) {
        
			

		if ($this->request->data) {
			
			$this->Category->id = $id;
		
			if ($this->Category->save($this->request->data)) {
				 $this->Session->setFlash(__('Sucess: Category has been updated.'), "sucess");	
				$this->redirect(array('controller' => 'categories', 'action' => 'index', "admin" => true));						 
			} else {
				 $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
			}
		   
		}
		
		if(empty($this->data)){
		   $this->data = $this->Category->read(null, $id);
		}

          
     }

     public function admin_delete($id = null) {
		 
		 
         $categoryArray = array();
		 $categoryArray['Category']['id'] = $id;
		 $categoryArray['Category']['status'] = "Inactive";
          if ($this->Category->save($categoryArray)) {
               $this->Session->setFlash(__('Category delete sucessfully'), "sucess");
               $this->redirect(array('controller' => 'categories', 'action' => 'index', "admin" => true));
          } else {
               $this->Session->setFlash('User could not be deleted.', "danger");
               $this->redirect(array('controller' => 'categories', 'action' => 'index', "admin" => true));
          }
     }

     
	 
}


