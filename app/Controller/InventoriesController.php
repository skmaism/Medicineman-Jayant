<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
require_once('class.phpmailer.php');
class InventoriesController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("User","Role" ,"CustomerDetail","Order" ,"Inventory","Product");
     //public $theme = "Admin";

     

   
   

     /* admin  managment section --------------------------------------------------------------------- */

     public function admin_index() {
		 
		$uid = $this->Auth->user('id');
		$role =  $this->Auth->user('role_id');
		
		 
		
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Product.name LIKE ' => '%' . $keyword . '%',
						
                    ),
                );
		}$conditions[] = array('not' => array('Inventory.created' => null));
		if ($this->params->query['date'] !='') {
			$date = split('-',$this->params->query['date']);
			$datefrom = date("Y-m-d", strtotime(trim($date[0])));
			$dateto = date("Y-m-d", strtotime(trim($date[1])));
		   $conditions[] = " date(Inventory.created) >= '".$datefrom."'"; 
		   $conditions[] = " date(Inventory.created) <= '".$dateto."'"; 
		}
		$conditions[] = array(
                    'AND' => array(
                        'Inventory.driver_id' => $uid ,
						
                    ),
                );
		
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('Inventory');
		
		/* if(isset($records) && !empty($records)){
			$newProductrecord = array();
			foreach($records as $k => $products){
				
				$newProductrecord[$products['Inventory']['product_id']][] = $products;			
			}
		}
		 $newProductrecord = array_values($newProductrecord); */
		
		//echo '<pre>';print_r($records);die;
		$this->set(compact('records','keyword','role' ,'newProductrecord' ));
		
		 
		 
		 
		 
	 }
	 
	 public function admin_accept_inventory($id = null) {
		 $this->layout ='';
		
		$this->Inventory->query("UPDATE inventories SET driver_status = 'Accepted', modified = '".date("Y-m-d H:i:s" ,time())."' WHERE id ='".$id."'");
		
		 return $this->redirect(array("controller" => "inventories", "action" => "index"));
	 }
	 
	  public function admin_recieve_inventory($id = null){
		
		
		 $inventory = $this->Inventory->find("first", array("conditions" => array("Inventory.id" => $id),"recursive" => 2));
		 
	
		 
		/*  $order = $this->Order->find("first", array("conditions" => array("Order.id" => $id)));
		 
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
		 */
		
		  $this->set(compact('inventory'));
	  }	 
		public function admin_inventoryUpdate(){
			  
			$inventoryId = $_REQUEST['inventoryId'];
			$InventoryAccept = $_REQUEST['InventoryAccept'];
			$decreason = $_REQUEST['decreason'];
			$quantity = $_REQUEST['quantity'];
			
			$this->Inventory->query("UPDATE inventories SET 	accept_inventory = '".$InventoryAccept."',inventory_decline_reason = '".$decreason."' WHERE id ='".$inventoryId."'");
			$inventorydata = $this->Inventory->find('first',array('conditions'=>array('Inventory.id'=>$inventoryId)));
			if($inventorydata['Inventory']['accept_inventory'] == 1){
				$remainingQty = $inventorydata['Product']['quantity']-$quantity;
				$this->Product->query("UPDATE products SET 	quantity = '".$remainingQty."' WHERE id ='".$inventorydata['Inventory']['product_id']."'");
			}else{
				$remainingQty = $inventorydata['Product']['effect_quantity_on_assign']+$quantity;
				$this->Product->query("UPDATE products SET 	effect_quantity_on_assign = '".$remainingQty."' WHERE id ='".$inventorydata['Inventory']['product_id']."'");
			}
			echo "succssfull";
			die;
			  
		  }
		  	
		public function driverinventorynotify(){
			$uid = $this->Auth->user('id');
			$notifyorders = $this->Inventory->find('all', array('conditions' => array('Inventory.driver_id' => $uid,'Inventory.inventory_notify' => 0)));
			return $notifyorders;
		}
		public function setseennotify(){
			$uid = $this->Auth->user('id');
			$this->Order->query("update inventories set inventory_notify = 1 where driver_id = ".$uid);
		}
}


