<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
require_once('class.phpmailer.php');
class UsersController extends AppController {
     
     var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
	
	public $uses = array("User","Role" ,"CustomerDetail","Order" ,"Inventory");
     //public $theme = "Admin";

     public function beforeFilter() {
          parent::beforeFilter();
          // Allow users to register and logout.
          $this->Auth->allow('login', 'logout', 'signup','forgotpassword');
     }

     public function admin_dashboard() {
          
     }

     public function admin_login() {
		 
		 
		 
		 $this->request->data['User']['username'] = $this->request->data['User']['login_username'];
		 $this->request->data['User']['password'] = $this->request->data['User']['login_password'];
		 
		

          $this->layout = "login";

          if ($this->request->is('post')) {
//				pr($this->request->data);
//                               echo $this->Auth->password($this->request->data['User']['password']);
//                               die;
               if ($this->Auth->login()) {
                    if (isset($this->request->data['User']['remember']) && $this->request->data['User']['remember'] == 1) {
                         // remove "remember me checkbox"
                         unset($this->request->data['User']['remember']);
                         // hash the user's password
                         //$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                         // write the cookie
                         $this->Cookie->write('_remember_me', $this->request->data, true, '2 weeks');
                    }
                    return $this->redirect($this->Auth->redirect());
               }
               else
                    $this->Session->setFlash(__('Invalid username or password, try again'), "danger");
          }

          $logincookie = $this->Cookie->read('_remember_me');
          if (!empty($logincookie))
               $this->data = $logincookie;
     }

     /* admin  managment section --------------------------------------------------------------------- */

     public function admin_index() {
		 
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
		
		//echo '<pre>';print_r($conditions); exit;
		if(!empty($_REQUEST['role_id'])){
			$role_id 			=	 $_REQUEST['role_id'];
			if($role_id !='all'){
				$conditions[] = array(
                    'AND' => array(
                        'User.role_id' => $role_id,
                    ),
                );
			}
		}
		
		if($role == 1){
			
		}else if($role == 2){ 
			$conditions[] = array(
                    'AND' => array(
                    'User.role_id' => 8,
                ),
            );
		} 
		
		
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 10,
				'recursive' => 2,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('User');
		
		 
		// pass the value to our view.ctp
		$this->set(compact('records','keyword','role_id' ,'roles' ,'role'));
		
		
		
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
	 
	 public function admin_clients() {
		 
		 $roles = $this->Role->find("list", array('fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
		 
		$uid = $this->Auth->user('id');
		$role =  $this->Auth->user('role_id');
		$conditions = array('not' => array('User.created' => null));
		if(!empty($_REQUEST['keyword'])){
			$keyword 			=	 $_REQUEST['keyword'];
			$conditions = array(
                    'OR' => array(
                        'User.name LIKE ' => '%' . $keyword . '%',
						'User.email LIKE ' => '%' . $keyword . '%',
						'User.phone LIKE ' => '%' . $keyword . '%'
                    ),
                );
		}
		
		$conditions = array('not' => array('User.role_id' => '1'));
		
		
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
		
		$conditions = array(
				'AND' => array(
				'User.role_id' => 5,
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
	 
     public function admin_add() {
		
          
          $this->loadModel('Role');
         
		  $role =  $this->Auth->user('role_id');
				$imgPath = '';
				$ProofImgPath = '';
				
				
				if ( ! empty($this->request->data['User']['image']) && !empty($this->request->data['User']['image']['name'])){
				
					
					$fileNmaeArray	=	array();
					$fileNmaeArray	=	explode('.',$this->request->data['User']['image']['name']);
			
					$image_name	=	$fileNmaeArray[0];
					$image_ext	=	$fileNmaeArray[1];
					
					//$this->GroupImage->saveAll($GroupImage);
					$imgPath	=	WWW_ROOT.'img/users/'.$image_name.'.'.$image_ext;
					
					
					$imgDBPath = "/img/users/".$image_name.'.'.$image_ext;
					
					move_uploaded_file($this->request->data['User']['image']['tmp_name'],$imgPath);
					$this->request->data['User']['image_path'] = $imgDBPath;
				
				
				}else{
					unset($this->request->data['User']['image']);
				}
				if ( ! empty($this->request->data['User']['id_proof']) && !empty($this->request->data['User']['id_proof']['name'])){
				
					
					$fileNmaeArray	=	array();
					$fileNmaeArray	=	explode('.',$this->request->data['User']['id_proof']['name']);
			
					$image_name	=	$fileNmaeArray[0];
					$image_ext	=	$fileNmaeArray[1];
					
					//$this->GroupImage->saveAll($GroupImage);
					
					$ProofImgPath	=	WWW_ROOT.'img/users_id_proofs/'.$image_name.'.'.$image_ext;
					
					
					$ProofImgDBPath = "/img/users_id_proofs/".$image_name.'.'.$image_ext;
					
					move_uploaded_file($this->request->data['User']['id_proof']['tmp_name'],$ProofImgPath);
					
					$this->request->data['User']['id_proof'] = $ProofImgDBPath;
				
				}else{
					unset($this->request->data['User']['id_proof']);
				}
				
				//$this->request->data['image_path'] = $imgPath;
          if ($this->request->is('post')) {
               
			   
				
				
				$CustomerDetails = array();
				if($this->request->data['User']['role_id'] == '5'){
					$CustomerDetails['CustomerDetail']['shipping_address'] = $this->request->data['User']['shipping_address'];
					$CustomerDetails['CustomerDetail']['shipping_state'] = $this->request->data['User']['shipping_state'];
					$CustomerDetails['CustomerDetail']['shipping_city'] = $this->request->data['User']['shipping_city'];
					$CustomerDetails['CustomerDetail']['shipping_zip'] = $this->request->data['User']['shipping_zip'];
					$CustomerDetails['CustomerDetail']['shipping_lat'] = $this->request->data['User']['lat'];
					$CustomerDetails['CustomerDetail']['shipping_long'] = $this->request->data['User']['long'];
					
					/* $CustomerDetails['CustomerDetail']['billing_address'] = $this->request->data['User']['billing_address'];
					$CustomerDetails['CustomerDetail']['billing_state'] = $this->request->data['User']['billing_state'];
					$CustomerDetails['CustomerDetail']['billing_city'] = $this->request->data['User']['billing_city'];
					$CustomerDetails['CustomerDetail']['billing_zip'] = $this->request->data['User']['billing_zip']; */
				}else{
					unset($this->request->data['User']['shipping_address']);
					unset($this->request->data['User']['shipping_state']);
					unset($this->request->data['User']['shipping_city']);
					unset($this->request->data['User']['shipping_zip']);
					/* unset($this->request->data['User']['billing_address']);
					unset($this->request->data['User']['billing_state']);
					unset($this->request->data['User']['billing_city']);
					unset($this->request->data['User']['billing_zip']); */
				}
				
				$this->request->data['User']['created_by'] = $this->Auth->user('id');
				
				
				
               if ($this->User->save($this->request->data)) {
				   
				   //save customer details if user type is clinet
					$lastInsertedId = $this->User->getLastInsertId();
					$CustomerDetails['CustomerDetail']['client_id'] = $lastInsertedId;
					$CustomerDetails['CustomerDetail']['status'] = 1;
					$CustomerDetails['CustomerDetail']['created'] = date("Y-m-d H:i:s" ,time());
					$CustomerDetails['CustomerDetail']['modified'] = date("Y-m-d H:i:s" ,time());
					
					
					
				   $this->CustomerDetail->save($CustomerDetails);
                    $this->Session->setFlash(__('Success: User has been added.'), "sucess");
					if($role == 2){ 
                    return $this->redirect(array('controller' => 'users', "action" => "drivers"));
					}else{
					return $this->redirect(array('controller' => 'users', "action" => "index"));
					}
               }
          }

          
			if($role == 1){
				$roles = $this->Role->find("list", array('fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
			}else if($role == 2){ 
				$roles = $this->Role->find("list", array('conditions' =>array('Role.id' => '8'),'fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
			}else if($role == 4){ 
				$roles = $this->Role->find("list", array('conditions' =>array('Role.id' => '5'),'fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
			}  
          
          
          $this->set(compact('roles'));
     }

     public function admin_edit($id = null) {
          
          if(!$id)
          $id = $this->Me['id'];
	  
	  $role =  $this->Auth->user('role_id');
	  
		$imgPath = '';
				$ProofImgPath = '';
				
				
				if ( ! empty($this->request->data['User']['image']) && !empty($this->request->data['User']['image']['name'])){
				
					
					$fileNmaeArray	=	array();
					$fileNmaeArray	=	explode('.',$this->request->data['User']['image']['name']);
			
					$image_name	=	$fileNmaeArray[0];
					$image_ext	=	$fileNmaeArray[1];
					
					//$this->GroupImage->saveAll($GroupImage);
					$imgPath	=	WWW_ROOT.'img/users/'.$image_name.'.'.$image_ext;
					
					
					$imgDBPath = "/img/users/".$image_name.'.'.$image_ext;
					
					move_uploaded_file($this->request->data['User']['image']['tmp_name'],$imgPath);
					
					$this->request->data['User']['image_path'] = $imgDBPath;
				
				}else{
					unset($this->request->data['User']['image']);
				}
				if ( ! empty($this->request->data['User']['id_proof']) && !empty($this->request->data['User']['id_proof']['name'])){
				
					
					$fileNmaeArray	=	array();
					$fileNmaeArray	=	explode('.',$this->request->data['User']['id_proof']['name']);
			
					$image_name	=	$fileNmaeArray[0];
					$image_ext	=	$fileNmaeArray[1];
					
					//$this->GroupImage->saveAll($GroupImage);
					
					$ProofImgPath	=	WWW_ROOT.'img/users_id_proofs/'.$image_name.'.'.$image_ext;
					
					
					$ProofImgDBPath = "/img/users_id_proofs/".$image_name.'.'.$image_ext;
					
					move_uploaded_file($this->request->data['User']['id_proof']['tmp_name'],$ProofImgPath);
					
					$this->request->data['User']['id_proof'] = $ProofImgDBPath;
				
				}else{
					unset($this->request->data['User']['id_proof']);
				}
          
          if ($this->request->data) {

              
              
               $this->User->id = $id;
			   $this->request->data['User']['id'] = $id;
			   
			   
			   
			   unset($this->request->data['User']['image']);
			   unset($this->request->data['User']['username']);
			   unset($this->request->data['User']['password']);
			   
				
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Success: User has been saved.'), "sucess");
					if($role == 2){ 
                    return $this->redirect(array('controller' => 'users', "action" => "drivers"));
					}else{
					return $this->redirect(array('controller' => 'users', "action" => "index"));
					}
			   }else {
					 $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
				}
				  
				  
                 
               
          }

          
		  
			if($role == 1){
				$roles = $this->Role->find("list", array('fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
			}else if($role == 2){ 
				$roles = $this->Role->find("list", array('conditions' =>array('Role.id' => '8'),'fields' => array("Role.id", 'Role.name'), "order" => array("Role.name" => "asc")));
			} 
          
          
          $this->set(compact('roles'));
          
		 
		  

          if(empty($this->data)){
               $this->data = $this->User->read(null, $id);
          }
     }
	 
	 
	 public function admin_add_client() {

          
          $this->loadModel('Role');
         
		  $role =  $this->Auth->user('role_id');
				$ProofImgPath = '';
				
				if ( ! empty($this->request->data['User']['id_proof']) && !empty($this->request->data['User']['id_proof']['name'])){
				
					
					$fileNmaeArray	=	array();
					$fileNmaeArray	=	explode('.',$this->request->data['User']['id_proof']['name']);
			
					$image_name	=	$fileNmaeArray[0];
					$image_ext	=	$fileNmaeArray[1];
					
					//$this->GroupImage->saveAll($GroupImage);
					
					$ProofImgPath	=	WWW_ROOT.'img/users_id_proofs/'.$image_name.'.'.$image_ext;
					
					
					$ProofImgDBPath = "/img/users_id_proofs/".$image_name.'.'.$image_ext;
					
					move_uploaded_file($this->request->data['User']['id_proof']['tmp_name'],$ProofImgPath);
					
					$this->request->data['User']['id_proof'] = $ProofImgDBPath;
				
				}else{
					unset($this->request->data['User']['id_proof']);
				}
				
				//$this->request->data['image_path'] = $imgPath;
          if ($this->request->is('post')) {
               //pr($this->request->data);
			   
				
				
				$CustomerDetails = array();
				if($this->request->data['User']['role_id'] == '5'){
					$CustomerDetails['CustomerDetail']['shipping_address'] = $this->request->data['User']['shipping_address'];
					$CustomerDetails['CustomerDetail']['shipping_state'] = $this->request->data['User']['shipping_state'];
					$CustomerDetails['CustomerDetail']['shipping_city'] = $this->request->data['User']['shipping_city'];
					$CustomerDetails['CustomerDetail']['shipping_zip'] = $this->request->data['User']['shipping_zip'];
					
					$CustomerDetails['CustomerDetail']['billing_address'] = $this->request->data['User']['billing_address'];
					$CustomerDetails['CustomerDetail']['billing_state'] = $this->request->data['User']['billing_state'];
					$CustomerDetails['CustomerDetail']['billing_city'] = $this->request->data['User']['billing_city'];
					$CustomerDetails['CustomerDetail']['billing_zip'] = $this->request->data['User']['billing_zip'];
				}else{
					unset($this->request->data['User']['shipping_address']);
					unset($this->request->data['User']['shipping_state']);
					unset($this->request->data['User']['shipping_city']);
					unset($this->request->data['User']['shipping_zip']);
					unset($this->request->data['User']['billing_address']);
					unset($this->request->data['User']['billing_state']);
					unset($this->request->data['User']['billing_city']);
					unset($this->request->data['User']['billing_zip']);
				}
				
				$this->request->data['User']['created_by'] = $this->Auth->user('id');
				
				
				
               if ($this->User->save($this->request->data)) {
				   
				   //save customer details if user type is clinet
					$lastInsertedId = $this->User->getLastInsertId();
					$CustomerDetails['CustomerDetail']['client_id'] = $lastInsertedId;
					$CustomerDetails['CustomerDetail']['status'] = 1;
					$CustomerDetails['CustomerDetail']['created'] = date("Y-m-d H:i:s" ,time());
					$CustomerDetails['CustomerDetail']['modified'] = date("Y-m-d H:i:s" ,time());
					
					
					
				   $this->CustomerDetail->save($CustomerDetails);
                    $this->Session->setFlash(__('Success: User has been saved.'), "sucess");
                    return $this->redirect(array('controller' => 'users', "action" => "index"));
               }
          }

          
          $this->set(compact('roles'));
     }

     public function admin_delete($id = null) {
		 
		 
          if ($this->RequestHandler->isAjax()) {

               //pr($_POST);
               $msg = false;

               if (!empty($_POST['selected_id'])) {
                    $data_id = array();
                    foreach ($_POST['selected_id'] as $id) {
                         $this->User->id = $id;
                         if ($this->Auth->user("id") != $id) {
							 
							 $userArray = array();
							 $userArray['User']['id'] = $id;
							 $userArray['User']['status'] = "Inactive";
							 
                              if ($this->User->save($userArray)) {
                                   $msg = true;
                                   $data_id[] = $id;
                              } else {
                                   $msg = false;
                                   break;
                              }
                         }
                    }
                    $cnt = count($data_id);
                    echo json_encode(array("sucess" => $msg, "err_msg" => $msg ? $cnt . " Users Delete Sucessfully" : "Your Process faild", "data" => $data_id));
               }
               die;
          }
          if (!$id)
               return $this->redirect(array('controller' => 'users', "action" => "index", "admin" => true));
          $this->User->id = $id;
          if ($this->Auth->user("id") == $id) {
               $this->Session->setFlash(__('Warning: you can not delete this user'), "warning");
               $this->redirect(array('controller' => 'users', 'action' => 'index', "admin" => true));
               return;
          }
		  
		 $userArray = array();
		 $userArray['User']['id'] = $id;
		 $userArray['User']['status'] = "Inactive";
          if ($this->User->save($userArray)) {
               $this->Session->setFlash(__('User delete sucessfully'), "sucess");
               $this->redirect(array('controller' => 'users', 'action' => 'index', "admin" => true));
          } else {
               $this->Session->setFlash('User could not be deleted.', "danger");
               $this->redirect(array('controller' => 'users', 'action' => 'index', "admin" => true));
          }
     }

     public function admin_status($cnt = null) {

          if ($this->RequestHandler->isAjax()) {

               if (isset($_POST['uid'])) {
                    if ($_POST['cnt'] == 1)
                         $st = 0;
                    else
                         $st = 1;
                    $this->User->id = $_POST['uid'];
                    if ($this->Auth->user("id") != $_POST['uid']) {
                         if ($this->User->saveField("status", $st))
                              echo json_encode(array("sucess" => true, "err_msg" => "Status Update Sucessfully", "data" => $_POST['uid']));
                         else
                              echo json_encode(array("sucess" => false, "err_msg" => "Your Process faild", "data" => ""));
                    }
                    else
                         echo json_encode(array("sucess" => false, "err_msg" => "Your Process faild", "data" => ""));

                    die;
               }

               $msg = false;
               if (!empty($_POST['selected_id'])) {
                    $uids = array();
                    $allid = array();
                    foreach ($_POST['selected_id'] as $id) {
                         $this->User->id = $id;
                         if ($this->Auth->user("id") != $id) {
                              $uids[$id] = $id;
                              $allid[] = $id;
                         }
                    }
                    if ($cnt)
                         $status = $cnt;
                    else
                         $status = 0;
                    if ($this->User->updateAll(array('User.status' => $status), array('User.id' => $uids)))
                         echo json_encode(array("sucess" => true, "err_msg" => "Status Update Sucessfully", "data" => $allid));
                    else
                         echo json_encode(array("sucess" => false, "err_msg" => "Your Process faild", "data" => $allid));
                    die;
               }
               die;
          }
     }

     public function admin_change_password($id = null) {

          
          if ($this->request->data) {
               $usrdata = $this->User->findById($this->Me['id']);
               $oldpws = $this->Auth->password($this->request->data['User']['oldpassword']);
               if ($usrdata['User']['password'] === $oldpws) {
                    
                    if($this->request->data['User']['password']!=$this->request->data['User']['cpassword']){
                         $this->Session->setFlash('password did not match.',"danger");
                         return false;
                    }
                    
                     $this->User->id = $this->Me['id'];
                    if($this->User->saveField("password", $this->request->data['User']['password'])){
                         $this->Session->setFlash('password has been updated.',"sucess");
                         $this->redirect(array('controller'=>'users','action'=>'change_password',"admin"=>true));
                    }
                    else{
                          $this->Session->setFlash('your process faild.',"danger");
                         $this->redirect(array('controller'=>'users','action'=>'change_password',"admin"=>true));
                    }
                    
                    
               }else{
                   $this->Session->setFlash('old password is incorrect.',"danger");
                  // $this->redirect(array('controller'=>'users','action'=>'change_password',"admin"=>true)); 
               }
          }
     }

     public function admin_logout() {
          //$this->Session->destroy();
          return $this->redirect($this->Auth->logout());
     }

     /* ////admin  managment section --------------------------------------------------------------------- */

     public function logout() {
          $this->Session->destroy();
          return $this->redirect($this->Auth->logout());
     }

	
	
	public function getSettings() {
		
		
	   $this->loadModel('Setting');
       $setting = $this->Setting->find('first');
		
		
        return $setting;
    }
	
	public function admin_forgot_password(){

		 $this->layout = "forgot_password";

          if ($this->request->is('post')) {
			  
			   $email = $this->request->data['User']['email'];
			   $data = $this->User->findByEmail($email);
               if (!empty($data)) {

                    $username = $data['User']['email'];
                    $this->User->id = $data['User']['id'];
                    $to = trim($email);
                    $from = trim($this->settings['email']);
                    $uniqueId = $this->get_token();
					$URL = Router::url('/', true).'resetpassword/'.$uniqueId;
					$this->User->query("UPDATE users SET forgot_password_token = '".$uniqueId."' WHERE id ='".$data['User']['id']."'");
					
					
					$html = 'Hello '.ucwords($data['User']['name']).',<br/><br/>';
					$html .= 'Please click on below URL to change your password: <br/></br/>';
					$html .= $URL.'<br/><br/>';
					$html .= 'Thanks and regards<br/><br/>';
					$html .= 'Audit';
					
					/********* mail ************/

					$mail = new PHPMailer(true);

					$mail->IsSMTP(); // telling the class to use SMTP



					$mail->Host       = "mail.skmaism.com"; // SMTP server
					$mail->SMTPAuth   = true;                  // enable SMTP authentication

					$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
					$mail->Username   = "skmaism@skmaism.com"; // SMTP account username
					$mail->Password   = "5E_4e,ZkLFJO";        // SMTP account password
					$mail->AddAddress($to, ucwords($data['User']['name']));
					$mail->SetFrom('skmaism@skmaism.com', 'Audit');

					$mail->Subject = 'New Password';
					$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically


					$mailbody = $html;	 


					$mail->MsgHTML($mailbody);
					$mail->Send();

					/************** end **************/

					

                    

                    $this->Session->setFlash(__('Please check your email'), 'alert', array('class' => 'alert alert-success'));

                    return $this->redirect(array("controller" => "users", "action" => "login"));

               } else {

                    $this->Session->setFlash(__('Email is not available, please register/retry with new member'), 'alert', array('class' => 'alert alert-danger'));

               }

          }

	 }
	 
	 public function get_token(){

		$this->layout ='';
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet) - 1;
		for ($i=0; $i < 8; $i++) {
			$token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
		}
		return $token;
	}
	
	public function admin_resetpassword(){
		
		$this->layout = "resetpassword";
		
		if(isset($this->params->params['pass']) && !empty($this->params->params['pass']) && $this->params->params['pass'][0] != ''){

			$fogotPasswordToken = $this->params->params['pass'][0];		

			$userData = $this->User->find('first', array('conditions' => array('User.forgot_password_token' => $fogotPasswordToken)));

			

			if(empty($userData)){				

				$this->Session->setFlash(__('This link is not more activated'), 'alert', array('class' => 'alert alert-danger'));				

				return $this->redirect(array("controller" => "users", "action" => "resetpassword"));
			}else{
				if ($this->request->is('post')) {		

					$this->User->id = $userData['User']['id'];
					$UserArray = array();
					$UserArray['User']['password'] = $this->request->data['User']['password'];
					$this->User->save($UserArray);
					$this->User->query("UPDATE users SET forgot_password_token = '' WHERE id ='".$userData['User']['id']."'");

					$this->Session->setFlash(__('Password has been changed successfully'), 'alert', array('class' => 'alert alert-success'));	

					return $this->redirect(array("controller" => "users", "action" => "login"));
				}

			}

		}

	}
	 
	public function crypto_rand_secure($min, $max){

		$range = $max - $min;
		if ($range < 1) return $min; // not so random...
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {

			$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd = $rnd & $filter; // discard irrelevant bits

		} while ($rnd >= $range);

		return $min + $rnd;

	}
	
	public function admin_driver_product($id = null) {
		
		 
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
                        'Inventory.driver_id' => $id ,
						
                    ),
                );
		
		//echo '<pre>'; print_r($conditions); exit;
		$this->paginate = array(
				'conditions' =>$conditions,
				'limit' => 50,
				'order' => array('id' => 'desc')
			);
		// we are using the 'User' model
		$records = $this->paginate('Inventory');
		
		if(isset($records) && !empty($records)){
			$newProductrecord = array();
			foreach($records as $k => $products){
				
				$newProductrecord[$products['Inventory']['product_id']][] = $products;			
			}
		}
		 $newProductrecord = array_values($newProductrecord);
		
		//echo '<pre>';print_r($newProductrecord);die;
		$this->set(compact('records','keyword','role' ,'newProductrecord' ));
		
		 
		 
		 
		 
	 }
	
	 
}


