<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class ProductsController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("Product" , "Category" ,"User" ,"Inventory");
     //public $theme = "Admin";

     public function beforeFilter() {
          parent::beforeFilter();
          
     }


     public function admin_index() {
		$keyword = '';
		 $role =  $this->Auth->user('role_id');
		 $id =  $this->Auth->user('role_id');
		$conditions = array('not' => array('Product.created' => null));
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Product.name LIKE ' => '%' . $keyword . '%',
						
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
		$records = $this->paginate('Product');
		 
		$drivers = $this->User->find("all", array('conditions' => array('User.role_id' => 8),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));

		// pass the value to our view.ctp
		$this->set(compact('records','keyword','role','drivers','id'));
		
		
		
	 }
     public function admin_add() {
		 
		if ($this->request->data) {
			
			$imgPath = '';
			if ( ! empty($this->request->data['Product']['image']) && !empty($this->request->data['Product']['image']['name'])){
			
				
				$fileNmaeArray	=	array();
				$fileNmaeArray	=	explode('.',$this->request->data['Product']['image']['name']);
		
				$image_name	=	$fileNmaeArray[0];
				$image_ext	=	$fileNmaeArray[1];
				
				//$this->GroupImage->saveAll($GroupImage);
				$imgPath	=	WWW_ROOT.'img/products/'.$image_name.'.'.$image_ext;
				
				
				$imgDBPath = "/img/products/".$image_name.'.'.$image_ext;
				
				move_uploaded_file($this->request->data['Product']['image']['tmp_name'],$imgPath);
				
				$this->request->data['Product']['image'] = $imgDBPath;
			
			}else{
				unset($this->request->data['Product']['image']);
			}
			
			$this->request->data['Product']['effect_quantity_on_assign'] = $this->request->data['Product']['quantity'];
						
			if ($this->Product->save($this->request->data)) {
				 $this->Session->setFlash(__('Sucess: Product has been added.'), "sucess");	
				$this->redirect(array('controller' => 'products', 'action' => 'index', "admin" => true));				 
			} else {
				 $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
			}
		   
		}
		
		$category = $this->Category->find("list", array('fields' => array("Category.id", 'Category.name'), "order" => array("Category.name" => "asc")));
		
		$this->set(compact('category'));
          
     }

     public function admin_edit($id = null) {
        
		

		if ($this->request->data) {
			
			
			$this->request->data['Product']['id'] = $id;
			
			$imgPath = '';
			if ( ! empty($this->request->data['Product']['image']) && !empty($this->request->data['Product']['image']['name'])){
			
				
				$fileNmaeArray	=	array();
				$fileNmaeArray	=	explode('.',$this->request->data['Product']['image']['name']);
		
				$image_name	=	$fileNmaeArray[0];
				$image_ext	=	$fileNmaeArray[1];
				
				//$this->GroupImage->saveAll($GroupImage);
				$imgPath	=	WWW_ROOT.'img/products/'.$image_name.'.'.$image_ext;
				
				
				$imgDBPath = "/img/products/".$image_name.'.'.$image_ext;
				
				move_uploaded_file($this->request->data['Product']['image']['tmp_name'],$imgPath);
				
			
				$this->request->data['Product']['image'] = $imgDBPath;
			}else{
				unset($this->request->data['Product']['image']);
			}
			
			
		$this->request->data['Product']['effect_quantity_on_assign'] = $this->request->data['Product']['quantity'];
			if ($this->Product->save($this->request->data)) {
				 $this->Session->setFlash(__('Sucess: Product has been updated.'), "sucess");	
				$this->redirect(array('controller' => 'products', 'action' => 'index', "admin" => true));
			} else {
				 $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
			}
		   
		}
		
		
		
		
		
		$category = $this->Category->find("list", array('fields' => array("Category.id", 'Category.name'), "order" => array("Category.name" => "asc")));
		
		$this->set(compact('category'));
		
		if(empty($this->data)){
		   $this->data = $this->Product->read(null, $id);		   
		}
		
		

          
     }

     public function admin_delete($id = null) {
		 
		 
         $productArray = array();
		 $productArray['Product']['id'] = $id;
		 $productArray['Product']['status'] = "Inactive";
          if ($this->Product->save($productArray)) {
               $this->Session->setFlash(__('Product delete sucessfully'), "sucess");
               $this->redirect(array('controller' => 'products', 'action' => 'index', "admin" => true));
          } else {
               $this->Session->setFlash('User could not be deleted.', "danger");
               $this->redirect(array('controller' => 'products', 'action' => 'index', "admin" => true));
          }
     }

     
	 public function admin_product_driver($id = null) {
		 
		$role =  $this->Auth->user('role_id');
		
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Driver.name LIKE ' => '%' . $keyword . '%',
                        'Driver.name_code LIKE ' => '%' . $keyword . '%',
                        'Driver.phone LIKE ' => '%' . $keyword . '%',
                        'Product.name LIKE ' => '%' . $keyword . '%',
						
                    ),
                );
		}
		$conditions[] = array('not' => array('Inventory.created' => null));
		if ($this->params->query['date'] !='') {
			$date = split('-',$this->params->query['date']);
			$datefrom = date("Y-m-d", strtotime(trim($date[0])));
			$dateto = date("Y-m-d", strtotime(trim($date[1])));
		   $conditions[] = " date(Inventory.created) >= '".$datefrom."'"; 
		   $conditions[] = " date(Inventory.created) <= '".$dateto."'"; 
		}
		$conditions[] = array(
                    'AND' => array(
                        'Inventory.product_id' => $id ,
						
                    ),
                );
		
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('Inventory');
		
		
		if(isset($records) && !empty($records)){
			$newDriversrecord = array();
			foreach($records as $k => $drivers){
				
				$newDriversrecord[$drivers['Inventory']['driver_id']][] = $drivers;			
			}
		}
		 $newDriversrecord = array_values($newDriversrecord);
		//echo '<pre>';print_r($newDriversrecord);die;
		$this->set(compact('records','keyword','role' ,'newDriversrecord'));
		
		 
		 
		 
		 
	 }
	  public function admin_driverAssignToProduct(){
		 
		 
		  
		$driverId = $_REQUEST['driverId'];
		$quantity = $_REQUEST['quantity'];
		$productId = $_REQUEST['productId'];
		$availableQuant = $_REQUEST['availableQuant'];
		$manager_id = $_REQUEST['manager_id'];
		
		$this->Product->query("UPDATE products SET effect_quantity_on_assign = '".$availableQuant."' WHERE id ='".$productId."'");
		
			$inventory = array();
			$inventory['Inventory']['driver_id'] = $driverId;
			$inventory['Inventory']['product_id'] = $productId;
			$inventory['Inventory']['manager_id'] = $manager_id;
			$inventory['Inventory']['quantity'] = $quantity;
			$inventory['Inventory']['created'] = date('Y-m-d H:i:s' ,time());
			$inventory['Inventory']['modified'] = date('Y-m-d H:i:s' ,time());
			
			$this->Inventory->save($inventory);
		echo 'sucessfull';
		
		die;
		  
	  }
	 
}


