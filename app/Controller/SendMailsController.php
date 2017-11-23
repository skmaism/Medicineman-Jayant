<?php

App::uses('AppController','controller');

class SendMailsController extends AppController{

	var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
    var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie','Auth');
	
	
	public function admin_index(){
		
		echo "hello";
	}
	
	public function admin_add($id=null){
		
		$this->loadModel("User");
		$records= $this->User->find('list', array('fields' => array("User.id","User.name"), "order" => array("User.id" => "asc")));
		
		$this->set(compact("records"));
		
		$this->loadModel("SendMail");
		
			$links= array();
			$links= $this->SendMail->find('all', array('fields' => array("SendMail.id"), "order" => array("SendMail.id" => "asc")));
			
			$this->set(compact("links"));
			
		if($this->request->data)
		{  
			$data = array();
			$data['SendMail']['user_id'] = $this->request->data['SendMail']['user_id'][0];
			
			if($this->SendMail->save($data))
				{
						$this->Session->setflash('Add user Successful');
						$this->redirect(array('controller'=>'exclations','action' => 'add'));
				}
				else{
					$this->Session->setflash('User could not be added');
				}	
			
			
			if($id)
			$this->SendMail->id = $id;
			print_r($this->SendMail->id);exit;
			
			if ($this->SendMail->save($this->request->data)) {
				$this->SendMail->setFlash(__('Sucess: Submit Sucessfully.'),"sucess");
				return $this->redirect(array('controller' => 'exclations',"action"=>"add"));
				
			}
			else{
				$this->Session->setFlash(__('Sorry Admin !! Operation failed try again Or contact support.'),"danger");
					
			}
			
				
				
				
		} 
		
		if(empty($this->data))
        $this->data = $this->SendMail->read(null, $id);
                
		if($id){
		$this->set("heads","Edit SendMail");
		}else{
		$this->set("heads","Add SendMail");
		}
		    
	}

}