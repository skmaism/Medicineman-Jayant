<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class OrdersController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
	 var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("Order" , "User" , "Product" ,"Category" ,"CustomerDetail" ,"OrderProduct" ,"InHandRupees");
     //public $theme = "Admin";

     public function beforeFilter() {
          parent::beforeFilter();
          
     }

	  public function admin_index() {
		 
		$uid = $this->Auth->user('id');
		$role =  $this->Auth->user('role_id');
		 
		
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			//echo $keyword; die;
			$conditions = array(
                    'OR' => array(
                        'Order.total_amount LIKE ' => '%' . $keyword . '%',
                        'Customer.name LIKE ' => '%' . $keyword . '%',
                        'Order.id LIKE ' => '%' . $keyword . '%',
						
                    ),
                );
		}
		
		if(!empty($_REQUEST['status'])){
			$status = $_REQUEST['status'];
			$conditions = array(
					'OR' => array(
						'Order.status LIKE' => '%' . $status . '%',
						
					),
				);
		
		}	
		
		$conditions[] = array('not' => array('Order.created' => null));
		if ($this->params->query['date'] !='') {
			$date = split('-',$this->params->query['date']);
			$datefrom = date("Y-m-d", strtotime(trim($date[0])));
			$dateto = date("Y-m-d", strtotime(trim($date[1])));
		   $conditions[] = " date(Order.created) >= '".$datefrom."'"; 
		   $conditions[] = " date(Order.created) <= '".$dateto."'"; 
		}
		
		if($role == 8){
		$conditions = array( 
                    'AND' => array(
                        'Order.driver_id ' => $uid,
						
                    ),
                );
		}
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('Order');
		
		/* if(isset($records) && !empty($records)){
			$newProductrecord = array();
			foreach($records as $k => $products){
				
				$newProductrecord[$products['Inventory']['product_id']][] = $products;			
			}
		}
		 $newProductrecord = array_values($newProductrecord); */
		
		//echo '<pre>';print_r($records);die;
		$drivers = $this->User->find("all", array('conditions' => array('User.role_id' => 8),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		
		
		
		// pass the value to our view.ctp
		$this->set(compact('records','keyword' ,'role' , 'drivers' ,'loggedInUser' ,'status'));
		 //$this->set(compact('records','keyword' ,'role' , 'drivers' ,'loggedInUser' ,'status'));
	 }
	 
	 public function admin_manager_index() {
		$conditions = array('not' => array('Order.created' => null));
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Order.total_amount LIKE ' => '%' . $keyword . '%',
						
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
		$records = $this->paginate('Order');
		 
		

		// pass the value to our view.ctp
		$this->set(compact('records','keyword'));
		
		
		
	 }
     public function admin_add() {
		 
		if ($this->request->data) {
			
			if($this->request->data['Order']['c_id'] !=''){
				$this->request->data['Order']['customer_id'] = $this->request->data['Order']['c_id'];
			}
			if($this->request->data['Order']['e_id'] !=''){
				$this->request->data['Order']['customer_id'] = $this->request->data['Order']['e_id'];
			}
			
			$CustomerDetail = $this->CustomerDetail->find("first", array('conditions' => array('CustomerDetail.client_id' => $this->request->data['Order']['customer_id']),'fields' => array("CustomerDetail.id")));
			
			
			$this->request->data['Order']['customer_detail_id'] = $CustomerDetail['CustomerDetail']['id'];
			
			
			$CustomerType = $this->User->find("first", array('conditions' => array('User.id' => $this->request->data['Order']['customer_id']),'fields' => array("User.role_id")));
			
			$CustomerType = $CustomerType['User']['role_id'];
			
			$totalAmount = 0;
			
			
			$ProductData = $this->Product->find("all", array('conditions' => array('Product.id' => $this->request->data['Product']['product_id']),'fields' => array("Product.customer_price" , "Product.employee_price")));
			
			
			foreach($ProductData as $key => $product){
				if($CustomerType == 5){
					$totalAmount = $totalAmount+($product['Product']['customer_price'] * $this->request->data['Product']['quantity'][$key]);
				}
				if($CustomerType == 3){
					$totalAmount = $totalAmount+ ($product['Product']['employee_price'] * $this->request->data['Product']['quantity'][$key]);
				}
			}
			
			$this->request->data['Order']['total_amount'] = $totalAmount;
			
			$this->request->data['Order']['status'] = 0;
			$this->request->data['Order']['created'] = date("Y-m-d H:i:s" ,time());
			$this->request->data['Order']['modified'] = date("Y-m-d H:i:s" ,time());
			
			if ($this->Order->save($this->request->data)) {
				
				$lastInsertedId = $this->Order->getLastInsertId();
				
				$OrderProducts = array();
				
				for($i=0; $i<count($this->request->data['Product']['product_id']); $i++){
					$OrderProducts[$i]['OrderProduct']['order_id'] = $lastInsertedId;
					$OrderProducts[$i]['OrderProduct']['product_id'] = $this->request->data['Product']['product_id'][$i];
					$OrderProducts[$i]['OrderProduct']['quantity'] = $this->request->data['Product']['quantity'][$i];
					
					$OrderProducts[$i]['OrderProduct']['status'] = 1;
					$OrderProducts[$i]['OrderProduct']['created'] = date("Y-m-d H:i:s" ,time());
					$OrderProducts[$i]['OrderProduct']['modified'] = date("Y-m-d H:i:s" ,time());
				}
				
				$this->OrderProduct->saveAll($OrderProducts);
				
				
				 $this->Session->setFlash(__('Sucess: Order has been added.'), "sucess");	
					$this->redirect(array('controller' => 'orders', 'action' => 'index', "admin" => true));				 
			} else {
				 $this->Session->setFlash(__('Faild: Order Process Faild.'), "danger");
			}
		   
		}
		$roleforclient = array(5,3);
		$client = $this->User->find("list", array('conditions' => array('User.role_id' => 5),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		$employee = $this->User->find("list", array('conditions' => array('User.role_id' => 3),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		
		$Products = $this->Product->find("list", array('fields' => array("Product.id", 'Product.name'), "order" => array("Product.name" => "asc")));
		
		
		
		$this->set(compact('client' , 'Products', 'employee'));
          
     }

     public function admin_edit($id = null) {
			 
		if ($this->request->data) {
			$this->request->data['Order']['id'] = $id;
			//echo '<pre>'; print_r($this->request->data); exit;
			if($this->request->data['Order']['c_id'] !=''){
				$this->request->data['Order']['customer_id'] = $this->request->data['Order']['c_id'];
			}
			if($this->request->data['Order']['e_id'] !=''){
				$this->request->data['Order']['customer_id'] = $this->request->data['Order']['e_id'];
			}
			
			$CustomerDetail = $this->CustomerDetail->find("first", array('conditions' => array('CustomerDetail.client_id' => $this->request->data['Order']['customer_id']),'fields' => array("CustomerDetail.id")));
			
			
			$this->request->data['Order']['customer_detail_id'] = $CustomerDetail['CustomerDetail']['id'];
			
			
			$CustomerType = $this->User->find("first", array('conditions' => array('User.id' => $this->request->data['Order']['customer_id']),'fields' => array("User.role_id")));
			
			$CustomerType = $CustomerType['User']['role_id'];
			
			$totalAmount = 0;
			
			
			$ProductData = $this->Product->find("all", array('conditions' => array('Product.id' => $this->request->data['Product']['product_id']),'fields' => array("Product.customer_price" , "Product.employee_price")));
			
			
			foreach($ProductData as $key => $product){
				if($CustomerType == 5){
					$totalAmount = $totalAmount+($product['Product']['customer_price'] * $this->request->data['Product']['quantity'][$key]);
				}
				if($CustomerType == 3){
					$totalAmount = $totalAmount+ ($product['Product']['employee_price'] * $this->request->data['Product']['quantity'][$key]);
				}
			}
			
			$this->request->data['Order']['total_amount'] = $totalAmount;
			
			$this->request->data['Order']['status'] = 0;
			$this->request->data['Order']['created'] = date("Y-m-d H:i:s" ,time());
			$this->request->data['Order']['modified'] = date("Y-m-d H:i:s" ,time());
			
			if ($this->Order->save($this->request->data)) {
				
				
				$OrderProducts = array();
				
				for($i=0; $i<count($this->request->data['Product']['product_id']); $i++){
					$OrderProducts[$i]['OrderProduct']['order_id'] = $id;
					$OrderProducts[$i]['OrderProduct']['product_id'] = $this->request->data['Product']['product_id'][$i];
					$OrderProducts[$i]['OrderProduct']['quantity'] = $this->request->data['Product']['quantity'][$i];
					
					$OrderProducts[$i]['OrderProduct']['status'] = 1;
					$OrderProducts[$i]['OrderProduct']['created'] = date("Y-m-d H:i:s" ,time());
					$OrderProducts[$i]['OrderProduct']['modified'] = date("Y-m-d H:i:s" ,time());
				}
				$this->OrderProduct->query('delete from order_products where order_id = '.$id);
				$this->OrderProduct->saveAll($OrderProducts);
				
				
				 $this->Session->setFlash(__('Sucess: Order has been added.'), "sucess");	
					$this->redirect(array('controller' => 'orders', 'action' => 'index', "admin" => true));				 
			} else {
				 $this->Session->setFlash(__('Faild: Order Process Faild.'), "danger");
			}
		   
		}
		$roleforclient = array(5,3);
		$client = $this->User->find("list", array('conditions' => array('User.role_id' => 5),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		$employee = $this->User->find("list", array('conditions' => array('User.role_id' => 3),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		
		$Products = $this->Product->find("list", array('fields' => array("Product.id", 'Product.name'), "order" => array("Product.name" => "asc")));
		
		if(empty($this->data)){
		   $this->data = $this->Order->read(null, $id);		   
		}//echo '<pre>'; print_r($this->data);
		$OrderProduct = $this->OrderProduct->find('all',array('conditions'=>array('OrderProduct.order_id'=>$id)));
		
		$this->set(compact('client' , 'Products', 'employee','OrderProduct'));
          
     }

     public function admin_delete($id = null) {
		 
		 
         $orderArray = array();
		 $orderArray['Order']['id'] = $id;
		 $orderArray['Order']['status'] = "0";
          if ($this->Order->save($orderArray)) {
               $this->Session->setFlash(__('Order delete sucessfully'), "sucess");
               $this->redirect(array('controller' => 'orders', 'action' => 'index', "admin" => true));
          } else {
               $this->Session->setFlash('User could not be deleted.', "danger");
               $this->redirect(array('controller' => 'orders', 'action' => 'index', "admin" => true));
          }
     }
	 
	 
	 public function admin_driverAssignToOrder(){
		 
		 
		  
		$driverId = $_REQUEST['driverId'];
		$orderId = $_REQUEST['orderId'];
		
		$this->Order->query("UPDATE orders SET driver_id = '".$driverId."' , manager_id = '".$this->Auth->user('id')."' WHERE id ='".$orderId."'");
		
		$cashInHandEntry = $this->InHandRupees->find("first", array("conditions" => array("InHandRupees.driver_id" => $driverId,"InHandRupees.manager_id" => $this->Auth->user('id'),"InHandRupees.date" => date('Y-m-d' ,time()) )));
		
		
		if(empty($cashInHandEntry)){
			$InHandCash = array();
			$InHandCash['InHandRupees']['driver_id'] = $driverId;
			$InHandCash['InHandRupees']['manager_id'] = $this->Auth->user('id');
			$InHandCash['InHandRupees']['date'] = date('Y-m-d' ,time());
			$InHandCash['InHandRupees']['created'] = date('Y-m-d H:i:s' ,time());
			$InHandCash['InHandRupees']['modified'] = date('Y-m-d H:i:s' ,time());
			
			$this->InHandRupees->saveAll($InHandCash);
			
		}
		
		echo 'sucessfull';
		
		die;
		  
	  }
	  
	  
	  
	 public function admin_changeOrderStatus(){
		 
		 
		  
		$status = $_REQUEST['status'];
		$orderId = $_REQUEST['orderId'];
		
		
		$this->Order->query("UPDATE orders SET status = '".$status."' WHERE id ='".$orderId."'");
		
		
		echo 'sucessfull';
		
		die;
		  
	  }
	  
	  
	  public function admin_recieve_inventory($id = null){
		
		
		 $orderProducts = $this->OrderProduct->find("all", array("conditions" => array("OrderProduct.order_id" => $id), "order" => array("OrderProduct.id" => "asc"),"recursive" => 2));
		 
	
		 
		  $order = $this->Order->find("first", array("conditions" => array("Order.id" => $id)));
		 
		 $ProductArray = array();
		 
		 if(isset($orderProducts) && !empty($orderProducts)){
			 $total = 0;
			 foreach($orderProducts as $k => $product){
				 $ProductArray[$k]['productName'] =  $product['Product']['name'];
				 $ProductArray[$k]['quantity'] =  $product['OrderProduct']['quantity'];
				 
				 $user = $this->User->find("first", array("conditions" => array("User.id" => $product['Order']['customer_id']), "fields" => array('User.role_id'),"recursive" => 2));
				 
				
				 
				 if($user['User']['role_id'] == 5){
					$ProductArray[$k]['price'] =  $product['Product']['customer_price']*$product['OrderProduct']['quantity']; 
				 }else if($user['User']['role_id'] == 3){
					$ProductArray[$k]['price'] =  $product['Product']['employee_price']*$product['OrderProduct']['quantity']; 
				 }
				 
				 
				 $ProductArray[$k]['Total'] = ($total + $ProductArray[$k]['price']);
				 $total = $ProductArray[$k]['Total'];
			 }
		 }
		 
		 $orderId = $id;
		 
		
		  $this->set(compact('ProductArray' ,'orderId' ,'order'));
	  }
	  
	  public function admin_update_order($id = null){
		  
		  $orderId = $id;
		  
		  $order = $this->Order->find("first", array("conditions" => array("Order.id" => $id)));
		 
		  $this->set(compact('orderId' , 'order'));
	  }
	  
	  
	  public function admin_updateOrderByDriver(){
		  
		
		  
		$ReceivedAmount = $_REQUEST['ReceivedAmount'];
		$DiscountAmount = $_REQUEST['DiscountAmount'];
		$note = $_REQUEST['note'];
		$orderId = $_REQUEST['orderId'];
		
		$DriverId = $_REQUEST['DriverId'];
		$ManagerId = $_REQUEST['ManagerId'];

		$this->Order->query("UPDATE orders SET recived_amount = '".$ReceivedAmount."' , discount_amount = '".$DiscountAmount."', reason = '".$note."' WHERE id ='".$orderId."'");
		
		
		$cashInHandEntry = $this->InHandRupees->find("first", array("conditions" => array("InHandRupees.driver_id" => $DriverId,"InHandRupees.manager_id" => $ManagerId,"InHandRupees.date" => date('Y-m-d' ,time()) )));
		
		
		if(isset($cashInHandEntry) && !empty($cashInHandEntry)){
			
			$exactTotalAmout = ($cashInHandEntry['InHandRupees']['cash_in_hand'] + $ReceivedAmount);
			$this->InHandRupees->query("UPDATE in_hand_rupees SET cash_in_hand = '".$exactTotalAmout."' WHERE id ='".$cashInHandEntry['InHandRupees']['id']."'");
		}

		echo "succssfull";
		die;

		  
	  }
	  
	  public function admin_inventoryUpdate(){
		  
		$orderId = $_REQUEST['orderId'];
		$InventoryAccept = $_REQUEST['InventoryAccept'];
		$TotalAmount = $_REQUEST['TotalAmount'];
		$ManagerId = $_REQUEST['ManagerId'];
		$DriverId = $_REQUEST['DriverId'];
		$decreason = $_REQUEST['decreason'];
		
		
		$this->Order->query("UPDATE orders SET 	accept_inventory = '".$InventoryAccept."',inventory_decline_reason = '".$decreason."' WHERE id ='".$orderId."'");
		
		
		$cashInHandEntry = $this->InHandRupees->find("first", array("conditions" => array("InHandRupees.driver_id" => $DriverId,"InHandRupees.manager_id" => $ManagerId,"InHandRupees.date" => date('Y-m-d' ,time()) )));
		
		
		if(isset($cashInHandEntry) && !empty($cashInHandEntry)){
			
			$exactTotalAmout = ($cashInHandEntry['InHandRupees']['total_amount'] + $TotalAmount);
			$this->InHandRupees->query("UPDATE in_hand_rupees SET total_amount = '".$exactTotalAmout."' WHERE id ='".$cashInHandEntry['InHandRupees']['id']."'");
		}
		
		

		echo "succssfull";
		die;
		  
	  }
	  
	  
	  public function admin_cash_in_hand($driverId = null) {
		  
		 
		$role =  $this->Auth->user('role_id');
		$conditions = array('not' => array('Order.created' => null));
		
		$conditions = array(
			'AND' => array(
				'Order.driver_id ' => $driverId,
				
			),
		);
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
			
			
		$records = $this->paginate('Order');
		
		$drivers = $this->User->find("all", array('conditions' => array('User.role_id' => 8),'fields' => array("User.id", 'User.name'), "order" => array("User.name" => "asc")));
		
		$this->set(compact('records','keyword' ,'role' , 'drivers' ,'loggedInUser' , 'driverId'));
		
		
		
	 }
	 
	 public function admin_manager_accept_money($DriverId = null){
		 
		 
		$cashInHandEntry = $this->InHandRupees->find("first", array("conditions" => array("InHandRupees.driver_id" => $DriverId,"InHandRupees.manager_id" => $this->Auth->user('id'),"InHandRupees.date" => date('Y-m-d' ,time()) )));
		
		
	  $this->set(compact('driverId' , 'cashInHandEntry'));
	}
	
	public function admin_ManagerUpdateMoney(){
		
		$ReceivedAmount = $_REQUEST['ReceivedAmount'];
		$Remark = $_REQUEST['Remark'];
		$CashInHandId = $_REQUEST['CashInHandId'];
		
		
		$this->InHandRupees->query("UPDATE in_hand_rupees SET hand_over_amount = '".$ReceivedAmount."' , manager_accept = 1 , manager_remark = '".$Remark."' WHERE id ='".$CashInHandId."'");

		echo "succssfull";
		die;
	  
	}
	
	
	public function driverordernotify(){
		$uid = $this->Auth->user('id');
		$notifyorders = $this->Order->find('all', array('conditions' => array('Order.driver_id' => $uid,'Order.notify' => 0)));
		return $notifyorders;
	}
	public function setseennotify(){
		$uid = $this->Auth->user('id');
		$this->Order->query("update orders set notify = 1 where driver_id = ".$uid);
	}
	
	public function admin_show_inventory($id = null){
		
		
		$orderProducts = $this->OrderProduct->find("all", array("conditions" => array("OrderProduct.order_id" => $id), "order" => array("OrderProduct.id" => "asc"),"recursive" => 2));
		 
	 
		$ProductArray = array();
		 
		 if(isset($orderProducts) && !empty($orderProducts)){
			 $total = 0;
			 foreach($orderProducts as $k => $product){
				 $ProductArray[$k]['productName'] =  $product['Product']['name'];
				 $ProductArray[$k]['quantity'] =  $product['OrderProduct']['quantity'];
				 
				 
			 }
		 }
		 
		//echo '<pre>';print_r($ProductArray);
		 
		
		  $this->set(compact('ProductArray'));
	  }
	 
}


