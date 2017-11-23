<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::uses('Controller', 'Controller');
App::uses('AppHelper', 'View/Helper');

class AppController extends Controller {

     var $helpers = array('Form', 'Html', 'Session', 'Js', 'Thumb', 'Time');
     public $components = array(
         'Session',
         'RequestHandler',
         'Cookie',
         'imageUpload',
         'Email',
         'Acl',
         'ControllerList',
         'Auth',
        
     );
     public $settings = array();
     public $Me = array();

     function beforeFilter() {		 		 
		$this->Session->write('Config.language', 'hin');
          $_Auth = array();
          if ($this->request->prefix == 'admin') {
               AuthComponent::$sessionKey = 'Auth.User';
               $this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index', 'admin' => true);
               $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
               $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
               $this->Auth->authenticate = array(
                   'Form' => array(
                       'userModel' => 'User',
                       'fields' => array('username' => 'username')
                   )
               );
               $this->Auth->allow('admin_login','admin_forgot_password' ,'admin_resetpassword');
               $this->theme = "Admin";
               $this->layout = 'default';
               $this->set("Me", $this->Auth->user());
               $this->Me = $this->Auth->user();
          } else if ($this->request->prefix == 'patient') {
               AuthComponent::$sessionKey = 'Auth.Patient';
               $this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index', 'patient' => true);
               $this->Auth->logoutRedirect = array('controller' => 'patients', 'action' => 'login', 'patient' => true);
               $this->Auth->loginAction = array('controller' => 'patients', 'action' => 'login', 'patient' => true);
               $this->Auth->authenticate = array(
                   'Form' => array(
                       'userModel' => 'Patient',
                       'fields' => array('username' => 'email')
                   )
               );
               $this->Auth->allow('patient_login', 'patient_registration', 'patient_forgot_password','patient_loginstatus');
               $_Auth = $this->Session->read("Auth.Patient");
               $this->loadModel("Patient");
               $usrpt = $this->Patient->find("first",array("conditions"=>array("Patient.id"=>$_Auth['id'])));
               
               //pr($usrdt);
               
               $this->set("_Me", isset($usrpt['Patient'])?$usrpt['Patient']:array());
               $this->Me = isset($usrpt['Patient'])?$usrpt['Patient']:array();
               $this->layout = 'patient';
              } else if ($this->request->prefix == 'doctor') {
               AuthComponent::$sessionKey = 'Auth.Doctor';
               $this->Auth->loginRedirect = array('controller' => 'dashboard', 'action' => 'index', 'doctor' => true);
               $this->Auth->logoutRedirect = array('controller' => 'doctors', 'action' => 'login', 'doctor' => true);
               $this->Auth->loginAction = array('controller' => 'doctors', 'action' => 'login', 'doctor' => true);
               $this->Auth->authenticate = array(
                   'Form' => array(
                       'userModel' => 'Doctor',
                       'fields' => array('username' => 'email')
                   )
               );
               $this->Auth->allow('doctor_login', 'doctor_registration', 'doctor_forgot_password','doctor_loginstatus');
               $_Auth = $this->Session->read("Auth.Doctor");
               $this->loadModel("Doctor");
               $usrdt = $this->Doctor->find("first",array("conditions"=>array("Doctor.id"=>$_Auth['id'])));
               $this->set("_Me", isset($usrdt['Doctor'])?$usrdt['Doctor']:array());
               $this->Me = isset($usrdt['Doctor'])?$usrdt['Doctor']:array();
             $this->layout = 'doctor';
          } else {
               $this->Auth->allow();
               $this->Me = array();
               if($this->Session->check('Auth.Doctor') === true){
               $this->set("_Me", $this->Session->read("Auth.Doctor"));
                }else if($this->Session->check('Auth.Patient') === true)
                $this->set("_Me", $this->Session->read("Auth.Patient"));
              
          }
          
		 
          $imgLogo = $this->imgsize('logos');
          $this->loadModel('Setting');
          $mySetting = $this->Setting->find('first', array("conditions" => array("Setting.default" => 1, "Setting.status" => 1), array("order" => array("Setting.id" => "DESC"))));
          $this->set("mySetting", $mySetting['Setting'] + $imgLogo);
          if (!empty($imgLogo))
               $this->settings = $mySetting['Setting'] + $imgLogo;
          else
               $this->settings = $mySetting['Setting'];

          $this->set("metatitle", $mySetting['Setting']['meta_title']);
          $this->set("metaKey", $mySetting['Setting']['meta_keyword']);
          $this->set("metaDescription", $mySetting['Setting']['meta_description']);
     }

     public function imgsize($siz = '') {
          $size = array(
              "logos" => array(
                  "size1" => array(100, 18),
                  "size2" => array(120, 35),
                  "size3" => array(208, 54),
                  "size4" => array(150, 100)
              ),
              "patients" => array(
                  "size1" => array(150, 120),
                  "size2" => array(164, 202),
              ),
              "doctors" => array(
                  "size1" => array(150, 120),
                  "size2" => array(164, 202),
              ),
          );


          if ($siz)
               return $size[$siz];
          else
               return $size;
     }

     function _sendMail($to, $from, $cc = '', $bcc = '', $subject, $template = "index", $layout = 'email_layout', $file = '') {
          $this->Email->to = $to;
          $this->Email->cc = $cc;
          $this->Email->bcc = $bcc;
          $this->Email->layout = $layout;
          if (file_exists($file) && $file != '') {
               $this->Email->attachments = array($file);
          }
          $this->Email->subject = $subject;
          //$this->Email->replyTo = 'support@example.com';
          $this->Email->from = " <" . $from . ">";
          $this->Email->template = $template; // note no '.ctp'


          if (!empty($this->settings)) {

               if ($this->settings['config_mail_protocol'] == "smtp") {

                    //Send as 'html', 'text' or 'both' (default is 'text')
                    $this->Email->delivery = 'smtp';
                    $this->Email->smtpOptions = array(
                        'host' => $this->settings['config_smtp_host'],
                        'port' => $this->settings['config_smtp_port'],
                        'username' => $this->settings['config_smtp_username'],
                        'password' => $this->settings['config_smtp_password']
                    );
               }
          }
          //$this->Email->sendAs = 'both'; // because we like to send pretty mail

          $this->Email->sendAs = 'html';

          if ($this->Email->send()) {
               $this->Email->reset();
               return true;
          } else {
               $this->Email->reset();
               return false;
          }
     }

     function beforeRender() {
       // $this->_setErrorLayout();
     }

     function _setErrorLayout() {
          if ($this->name == 'CakeError') {
               if ($this->params->prefix == 'admin') {
                    $this->layout = 'error';
               }
               if ($this->params->prefix == 'patient' || $this->params->prefix == 'doctor') {
                  $this->layout = 'default';
                 $this->redirect('/'.$this->params->prefix);
               }
               
          }
     }

//    public function appError($error) {
//          if($this->params->prefix=='admin'){
//           //$this->redirect('/');
//            $this->layout = 'error';
//          }
//       }


     public function getUniqueAlias($alias, $model = "Category") {

          $alias = str_replace(' ', '_', strtolower(rtrim($alias)));
          $alias_ini = $alias;
          $i = 0;
          while ($this->isAliasExist($alias, $model)) {
               $alias = $alias_ini . '_' . ++$i;
          }
          return $alias;
     }

     public function isAliasExist($alias, $model) {
          // Initialise variables.
          $this->loadModel($model);
          $this->$model->recursive = -1;
          $data = $this->$model->findBySeo_url($alias);

          return (count($data) > 0) ? true : false;
     }

     public function getUniqueName($alias, $model) {

          $alias = str_replace(' ', '', strtolower(rtrim($alias)));
          $alias_ini = $alias;
          $i = rand(5, 1000);
          while ($this->isUserAliasExist($alias, $model)) {
               $alias = $alias_ini . '_' . $i;
          }
          return $alias;
     }

     public function isUserAliasExist($alias, $model) {
          // Initialise variables.
          $this->loadModel($model);
          $this->$model->recursive = -1;
          $data = $this->$model->findByUsername($alias);
          return (count($data) > 0) ? true : false;
     }

     public function parents($id) {
          if (!$id)
               return false;
          $this->loadModel("Menu");
          $treePath = $this->Menu->getPath($id);
          if (!empty($treePath)) {
               //pr($treePath);
               $prifix = "";
               foreach ($treePath as $name) {
                    if ($name['Menu']['id'] == $id) {
                         if ($prifix == "")
                              echo "null";
                    }
                    else
                         echo $prifix . " " . $name['Menu']['title'] . " ";
                    $prifix .= "->";
               }
          }
     }

     public function doctorAssignId($date = null, $slot = null) {
          $this->loadModel('Doctor');
          $options["conditions"] = array("Doctor.status" => 1, "Doctor.is_approved" => 1, "Doctor.email_verified" => 1);
          $availCon = array();
          if ($date && $slot)
               $availCon = array("conditions" => array("DoctorAvailability.availability_date" => $date, "DoctorAvailability.appointment_schedule_id" => $slot));

          $options["contain"] = array("DoctorAvailability" => $availCon,
              "Booking" => array(
                  "conditions" => array("Booking.booking_date >=" => date('Y-m-d'))));
          $records = $this->Doctor->find("all", $options);
//          $log = $this->Doctor->getDataSource()->getLog(false, false);
//debug($log);
//          pr($records);
//          die;

          foreach ($records as $k => $rc) {
               $cnt = count($rc['Booking']);
               $avilCnt = count($rc['DoctorAvailability']);
               if (!empty($rc['DoctorAvailability'])) {
                    $newRecords[] = array(
                        "id" => $rc['Doctor']['id'],
                        "name" => $rc['Doctor']['fullname'],
                        "email" => $rc['Doctor']['email'],
                        "date" => $rc['Doctor']['created'],
                        "BkCnt" => $cnt,
                        "avail" => $avilCnt,
                    );

                    $cont[$k] = $cnt;
                    $name[$k] = $rc['Doctor']['created'];
               }
          }

          array_multisort($cont, SORT_ASC, $name, SORT_ASC, $newRecords);
//           pr($newRecords);
//           die;
          foreach ($newRecords as $dt) {
               $id = $dt['id'];
               break;
          }
          return $id;
     }
     
     public function doctorAssignIdforTest($date = null, $slot = null) {
          $date = '2014-11-03';
          $slot = '20';
          $this->loadModel('Doctor');
          $options["conditions"] = array("Doctor.status" => 1, "Doctor.is_approved" => 1, "Doctor.email_verified" => 1);
          $availCon = array();
          if ($date && $slot)
               $availCon = array("conditions" => array("DoctorAvailability.availability_date" => $date, "DoctorAvailability.appointment_schedule_id" => $slot));

          $options["contain"] = array("DoctorAvailability" => $availCon,
              "Booking" => array(
                  "conditions" => array("Booking.booking_date >=" => date('Y-m-d'))));
          $records = $this->Doctor->find("all", $options);
//          $log = $this->Doctor->getDataSource()->getLog(false, false);
//debug($log);
//          pr($records);
//          die;

          foreach ($records as $k => $rc) {
               $cnt = count($rc['Booking']);
               $avilCnt = count($rc['DoctorAvailability']);
               if (!empty($rc['DoctorAvailability'])) {
                    $newRecords[] = array(
                        "id" => $rc['Doctor']['id'],
                        "name" => $rc['Doctor']['fullname'],
                        "email" => $rc['Doctor']['email'],
                        "date" => $rc['Doctor']['created'],
                        "BkCnt" => $cnt,
                        "avail" => $avilCnt,
                    );

                    $cont[$k] = $cnt;
                    $name[$k] = $rc['Doctor']['created'];
               }
          }

          array_multisort($cont, SORT_ASC, $name, SORT_ASC, $newRecords);
           pr($newRecords);
           die;
          foreach ($newRecords as $dt) {
               $id = $dt['id'];
               break;
          }
          return $id;
     }

     function captchaCode($color = '', $font = '') {

          $font = !empty($font) ? $font : array('Arial', 'Tahoma', 'Verdana');
          $color = !empty($color) ? $color : array('gray', "#FC7100", "#B00140", "#0A8DB7");

          $fnt = array_rand($font);
          $font[$fnt];

          $coun = array_rand($color);
          $color[$coun];

          $char = range('a', 'z');
          $cchar = range('A', 'Z');
          $num = range('55', '80');
          $rchar = array_rand($char);
          $rcchar = array_rand($cchar);
          $rnum = array_rand($num);
          $char[$rchar] . $cchar[$rcchar] . $num[$rnum];
          return array("code" => $char[$rchar] . $cchar[$rcchar] . $num[$rnum], "color" => $color[$coun], "font" => $font[$fnt]);
     }

     public function reorderList($data, $id = null, $model = null, $idfield = "id", $orderfild = "orderId", $orderpos = "first") {
          $order_list[0] = "First";
          $selected_pos = -1;
          $default_position = $orderpos ? $orderpos : "first";

          foreach ($data as $md) {
               //pr($md[$model]);

               if ($id == $md[$model][$idfield])
                    $selected_pos = count($order_list);
               else
                    $order_list[$md[$model][$orderfild]] = "After " . $md[$model]["title"];
          }

          $selected_pos = ($selected_pos == -1 && $default_position == 'last') ? count($order_list) : $selected_pos;
          $lstcounter = 1;
          $nar = array();
          $lstcounter = 1;
          $selc = null;
          foreach ($order_list as $ck => $cv) {
               if ($selected_pos == $lstcounter)
                    $selc = $ck;
               $lstcounter++;
          }
          return array($selc, $order_list);
     }

     public function String2named($param_names = null) {

          $parameters_strings = array();
          if (is_array($param_names)) {
               foreach ($param_names as $param_name) {
                    if (!empty($this->request->query[$param_name])) {
                         $parameters_strings[$param_name] = $this->request->query[$param_name];
                    }
               }
          } else {
               $parameters_strings = $this->request->query;
               unset($parameters_strings['url']);
          }

          if (!empty($parameters_strings)) {
               $parameters_strings = array_merge($this->request->params['named'], $parameters_strings);
               $this->redirect($parameters_strings, null, true);
          }
     }
     
     public function clear_cache() {
        Cache::clear();
        clearCache();

        $files = array();
        $files = array_merge($files, glob(CACHE . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'css' . DS . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'js' . DS . '*'));  // remove cached js           
        $files = array_merge($files, glob(CACHE . 'models' . DS . '*'));  // remove cached models           
        $files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));  // remove cached persistent           

        foreach ($files as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }

        if(function_exists('apc_clear_cache')):      
        apc_clear_cache();
        apc_clear_cache('user');
        endif;

        $this->set(compact('files'));
        $this->layout = 'ajax';
    }

    public function discount(  ){
        
    }
	
	 public function _checkAuth() {


        $exception_array = array(
            
            'webservices/login',
            'webservices/addCompany',
            'webservices/addAttendance',
            'webservices/saveAttendanceImages',
            'webservices/createFields',
            'webservices/getStreamWiseStudentData',
           
            
            
        );


        $cur_page = $this->params['controller'] . '/' . $this->params['action'];
        $is_admin = false;
        if (isset($this->params['prefix']) and $this->params['prefix'] == 'admin') {
            $is_admin = true;
        }

        if (!in_array($cur_page, $exception_array)) {


            if (!$this->Auth->user('id')) {
                $this->Session->setFlash(__('Authorization Required'));

                if (isset($this->params['prefix']) and $this->params['prefix'] == 'admin') {
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login',
                        'admin' => $is_admin
                    ));
                } else {
                    $this->redirect(array("controller" => "/", "action" => ''));
                }
            }

            if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin' && ($this->Auth->user('role_id') != 1)) {
                $this->redirect(Router::url('/', true));
            }
        } else {
            $this->Auth->allow();
            if ($this->params['action'] == 'admin_login' && $this->Auth->user('id')) {
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'dashboard',
                    'admin' => $is_admin
                ));
            }
        }
        
        
        $this->set('UsersDetails', $this->Auth->user());
    }
	
	public function sendAndroidPush($data,$registrationIDs){
		
		$apiKey = "AAAA1fcbvcc:APA91bEgGDSuwBAQiyFZ1oZb-6uRdO1gbBTY2bo9-MkbRDvKJcvdTNdEwhDU8_Kct4ZrzsP6nVP9xM41m4muw-A_aoBgwy9wdt0nhVp5cRFFEG28r_bFg98AFLn1D0UQhuBwz28OA0ID";
		
		$url = 'https://fcm.googleapis.com/fcm/send';
		
		$fields = array(
				'registration_ids'  => $registrationIDs,
				'data'              => array("title"=>$data['title'],"message"=>$data['message'], "type" => $data['type']),
				);
		$headers = array( 
				'Authorization: key=' . $apiKey,
				'Content-Type: application/json'
				);
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($fields) );

		$result = curl_exec($ch);
		if(curl_errno($ch)){ echo 'Curl error: ' . curl_error($ch); }
		curl_close($ch);
		
		return true;
	}
	
}
