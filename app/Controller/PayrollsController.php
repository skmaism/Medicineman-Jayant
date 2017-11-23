<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
require_once('class.phpmailer.php');
class PayrollsController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("User","Role" ,"CustomerDetail","Order" ,"Inventory","Product" , 'Payroll','PayrollSetting');
     //public $theme = "Admin";

     

   
   

     /* admin  managment section --------------------------------------------------------------------- */

     public function admin_index() {
		 
		$conditions[] = array('not' => array('SaleBill.created' => null));
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'Product.name LIKE ' => '%' . $keyword . '%',
						
                    ),
                );
		}
		
		if ($this->params->query['datefrom'] !='' && $this->params->query['dateto'] !='') {
			$datefrom = date("Y-m-d", strtotime($this->params->query['datefrom']));
			$dateto = date("Y-m-d", strtotime($this->params->query['dateto']));
		   $conditions[] = " date(Inventory.created) >= '".$datefrom."'"; 
		   $conditions[] = " date(Inventory.created) <= '".$dateto."'"; 
		}
		
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('SaleBill');
		
		$this->set(compact('records','keyword' ));
		
		 
		 
		 
		 
	 }
	 
	 public function admin_settings($id = null ) {
		 
		 $records = $this->PayrollSetting->find('all');
		 
		 if ($this->request->is('post')) {
			$this->request->data['PayrollSetting']['id'] = $id;
			if ($this->PayrollSetting->save($this->request->data)) {
				return $this->redirect(array('controller' => 'payrolls', "action" => "settings", $id));
				
		   }else{
			   return $this->redirect(array('controller' => 'payrolls', "action" => "settings", $id));
		   }
		   
		   
			
		}
		 $this->set(compact('records' ));
		
		 
	 }
	 
	 public function admin_edit_settings($id = null) {
		 $records = $this->PayrollSetting->find('all');
		 
		 
		 
		if ($this->request->is('post')) {
			$this->request->data['PayrollSetting']['id'] = $id;
			if ($this->PayrollSetting->save($this->request->data)) {
				return $this->redirect(array('controller' => 'payrolls', "action" => "settings"));
				
		   }else{
			   return $this->redirect(array('controller' => 'payrolls', "action" => "edit_settings"));
		   }
		   
		   
			
		}
		$this->set(compact('records'));
		
		
		 
	 }
	 
	 public function admin_drivers() {
		 
		 $roles = $this->Role->find("list", array('fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
		 
		$uid = $this->Auth->user('id');
		$role =  $this->Auth->user('role_id');
		
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'User.name LIKE ' => '%' . $keyword . '%',
						'User.name_code LIKE ' => '%' . $keyword . '%',
						'User.phone LIKE ' => '%' . $keyword . '%'
                    ),
                );
		}
		$conditions[] = array('not' => array('User.created' => null));
		$conditions[] = array('not' => array('User.role_id' => '1'));
		
		
		if(!empty($_REQUEST['role_id'])){
			$role_id 			=	 $_REQUEST['role_id'];
			if($role_id !='all'){
				$conditions = array(
                    'AND' => array(
                        'User.role_id' => $role_id,
                    ),
                );
			}
		}
		
		$conditions[] = array(
				'AND' => array(
				'User.role_id' => 8,
			),
		);
		
		//echo '<pre>';print_r($conditions); exit;
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('User');
		 
		 

		// pass the value to our view.ctp
		$this->set(compact('records','keyword','role_id' ,'roles'));
		
		
		
	 }
	 
	 public function admin_driver_payroll($id = null) {
		 
		 $this->Order->unbindModel(
			array('belongsTo' => array('Customer' , 'Customerdetail'))
		);
		
		/* $start_date = $datefrom =   date('Y-m-01');
		$end_date = $dateto =  date('Y-m-t'); */
		
		if ($this->params->query['date'] !='') {
			$date = split('-',$this->params->query['date']);
			$datefrom = $startDateRange = date("Y-m-d 00:00", strtotime(trim($date[0])));
			$dateto = $endDateRange = date("Y-m-d 23:59", strtotime(trim($date[1])));
		   
		}else{
			
			$datefrom = $startDateRange = date('Y-m-01 00:00');
			$dateto = $endDateRange = date('Y-m-t 23:59');
		}
		
		
		
			
		 $driver_orders = $this->Order->find("all", array('conditions' =>array('Order.driver_id' => $id , 'Order.created >='  => $datefrom ,'Order.created <='  => $dateto), "order" => array("Order.created" => "asc")));
		 
		 
		
		$start = new DateTime($startDateRange);
		$end = new DateTime($endDateRange);

		$interval = new DateInterval('P1D');
		$dateRange = new DatePeriod($start, $interval, $end);

		$weekNumber = 1;
		$weeks = array();
		
		foreach ($dateRange as $date) {
			$weeks[$weekNumber][] = $date->format('Y-m-d');
			
			if ($date->format('w') == 5) {
				$weekNumber++;
			}
			
			$ranges = array_map(function($week) {
				return   array_shift($week) 
					. ','. array_pop($week); },
			$weeks);
			
			
			
		}
		
		$ranges = array_values($ranges);
		
		
		
		
		
		$newDataArray = array();
		foreach($ranges as $k => $weeks){
			
			$weekdaysArray = explode(",",$weeks);
			
			$startWeekDay = $weekdaysArray[0];
			if(!empty($weekdaysArray[1])){
				$endWeekDay = $weekdaysArray[1];
			}else{
				$endWeekDay = $weekdaysArray[0];
			}
			
			
			
			
			$range_orders = $this->Order->find("count", array('conditions' =>array('Order.driver_id' => $id , 'Order.created >='  => $startWeekDay ,'Order.created <='  => $endWeekDay), "order" => array("Order.created" => "asc")));		
			
			$newDataArray[$k]['startDate'] = $startWeekDay;
			$newDataArray[$k]['endDate'] = $endWeekDay;
			$newDataArray[$k]['count'] = $range_orders;
			
		}
		
		
		 
		 
		 $payrollSetting = $this->PayrollSetting->find("first");
		 
		 
		 $OrderData = array();
		 if(isset($driver_orders) && !empty($driver_orders)){
			 foreach($driver_orders as $k => $orders){
				
				 
				 $OrderData[date("Y-m-d" , strtotime($orders['Order']['created']))][] = $orders['Order'];
				 
			 }
		 }
		 
		 $newOrderData = array();
		 if(isset($OrderData) && !empty($OrderData)){
			 $i = 0; 
			 foreach($OrderData as $k => $orders){
				 
				 $total = 0;
				 $distance_bonus = 0;
				 foreach($orders as $key => $order){
					 $total = $total+$order['total_amount'];
					 if($order['distance'] > 22){
						  $distance_bonus = $distance_bonus+5;
					 }
					
				 }
				 $newOrderData[$i]['date'] = $k;
				 $newOrderData[$i]['total'] = $total;
				 $newOrderData[$i]['order_count'] = count($orders);
				 $newOrderData[$i]['distance_bonus'] = $distance_bonus;
				 
				 $i++;
			 }
		 }
		 
		// echo '<pre>';print_r($newOrderData);die;
		 $this->set(compact('newOrderData' , 'payrollSetting' , 'newDataArray'));
		 
	 }
	 
	 
	 public function admin_receptionists() {
		 
		 $roles = $this->Role->find("list", array('fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
		 
		$uid = $this->Auth->user('id');
		$role =  $this->Auth->user('role_id');
		
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'User.name LIKE ' => '%' . $keyword . '%',
						'User.name_code LIKE ' => '%' . $keyword . '%',
						'User.phone LIKE ' => '%' . $keyword . '%'
                    ),
                );
		}
		$conditions[] = array('not' => array('User.created' => null));
		$conditions[] = array('not' => array('User.role_id' => '1'));
		
		
		if(!empty($_REQUEST['role_id'])){
			$role_id 			=	 $_REQUEST['role_id'];
			if($role_id !='all'){
				$conditions = array(
                    'AND' => array(
                        'User.role_id' => $role_id,
                    ),
                );
			}
		}
		
		$conditions[] = array(
				'AND' => array(
				'User.role_id' => 4,
			),
		);
		
		//echo '<pre>';print_r($conditions); exit;
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('User');
		 
		 

		// pass the value to our view.ctp
		$this->set(compact('records','keyword','role_id' ,'roles'));
		
		
		
	 }
	 
	 public function admin_receptionist_payroll($id = null) {
		 
		 $this->Order->unbindModel(
			array('belongsTo' => array('Customer' , 'Customerdetail'))
		);
		
		/* $start_date = $datefrom =   date('Y-m-01');
		$end_date = $dateto =  date('Y-m-t'); */
		
		if ($this->params->query['date'] !='') {
			$date = split('-',$this->params->query['date']);
			$datefrom = $startDateRange = date("Y-m-d 00:00", strtotime(trim($date[0])));
			$dateto = $endDateRange = date("Y-m-d 23:59", strtotime(trim($date[1])));
		   
		}else{
			
			$datefrom = $startDateRange = date('Y-m-01 00:00');
			$dateto = $endDateRange = date('Y-m-t 23:59');
		}
		
		
		$receptionist_data = $this->User->find("first", array('conditions' =>array('User.id' => $id)));
		
			
		 $receptionist_orders = $this->Order->find("all", array('conditions' =>array('Order.creator_id' => $id , 'Order.created >='  => $datefrom ,'Order.created <='  => $dateto), "order" => array("Order.created" => "asc")));
		 
		 
		 
		 
		 
		
		$start = new DateTime($startDateRange);
		$end = new DateTime($endDateRange);

		$interval = new DateInterval('P1D');
		$dateRange = new DatePeriod($start, $interval, $end);

		$weekNumber = 1;
		$weeks = array();
		
		foreach ($dateRange as $date) {
			$weeks[$weekNumber][] = $date->format('Y-m-d');
			
			if ($date->format('w') == 5) {
				$weekNumber++;
			}
			
			$ranges = array_map(function($week) {
				return   array_shift($week) 
					. ','. array_pop($week); },
			$weeks);
			
			
			
		}
		
		$ranges = array_values($ranges);
		
		
		
		
		
		$newDataArray = array();
		foreach($ranges as $k => $weeks){
			
			$weekdaysArray = explode(",",$weeks);
			
			$startWeekDay = $weekdaysArray[0];
			if(!empty($weekdaysArray[1])){
				$endWeekDay = $weekdaysArray[1];
			}else{
				$endWeekDay = $weekdaysArray[0];
			}
			
			
			
			
			$range_orders = $this->Order->find("count", array('conditions' =>array('Order.creator_id' => $id , 'Order.created >='  => $startWeekDay ,'Order.created <='  => $endWeekDay), "order" => array("Order.created" => "asc")));		
			
			$newDataArray[$k]['startDate'] = $startWeekDay;
			$newDataArray[$k]['endDate'] = $endWeekDay;
			$newDataArray[$k]['count'] = $range_orders;
			$newDataArray[$k]['payment'] = ($range_orders * $receptionist_data['User']['receptionist_per_call_rate']);
			
		}
		
		 
		
		 $this->set(compact('newDataArray'));
		 
	 }
	 
	 
}


