<?php

App::uses('AppController', 'Controller');

/**
 * Departments Controller
 * @developer dotsquares
 *
 * @property Department $Department
 */
class WebservicesController extends AppController {

    var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Webservice','Email', 'RequestHandler', 'Paginator', 'Cookie');

    /**
     * index method
     *
     * @return void
     * @developer Chirag & Arnav (114)
     */
	 
	
    function index() {
        $request_array = json_decode($_REQUEST['json']);
        switch ($_REQUEST['action']) {
            case 'saveDeviceId' :
                echo $this->Webservice->saveDeviceId($request_array);
                break;
            case 'saveAndroidDevice' :
                echo $this->Webservice->saveAndroidDevice($request_array);
                break;
            case 'resetBadge' :
                echo $this->Webservice->resetBadge($request_array);
                break;
            case 'setReadStatus' :
                echo $this->Webservice->setReadStatus($request_array);
                break;
            case 'fetchNotifications' :
                echo $this->Webservice->fetchNotifications($request_array);
                break;
            case 'login' :
                echo $this->Webservice->login($request_array);
                break;
            default :
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = 'Wrong method name';
                echo json_encode($response_arr);
        }die;
    }
	
	
	public function registerDevice(){
		$this->loadModel('Device');
		
		$response_arr = array();
		if(isset($_POST) && !empty($_POST)){

			$deviceArray = array();
			
			$deviceArray['Device']['device_id'] = "";
			if(isset($_POST['device_id']) && !empty($_POST['device_id'])){
				$deviceArray['Device']['device_id'] = $_POST['device_id'];
			}
			
			$deviceArray['Device']['device_type'] = "";
			if(isset($_POST['device_type']) && !empty($_POST['device_type'])){
				$deviceArray['Device']['device_type'] = $_POST['device_type'];
			}
			
			$deviceArray['Device']['reg_id'] = "";
			if(isset($_POST['reg_id']) && !empty($_POST['reg_id'])){
				$deviceArray['Device']['reg_id'] = $_POST['reg_id'];
			}
			
			
			$deviceArray['Device']['status'] 			= 1;
			
			$this->loadModel('Device');
			$deviceData = $this->Device->find(
			  'first',
			  array(
				'conditions' => array(
					'Device.device_id ' => $_POST['device_id']
				)
			  )
			);
			
			
			if(isset($deviceData) && !empty($deviceData)){
				$this->Device->query("UPDATE devices SET reg_id = '".$_POST['reg_id']."' WHERE id ='".$deviceData['Device']['id']."'");
			}else{
				$this->Device->save($deviceArray);
				
			}
			
			$message = 'successfull';
			$response_arr['status'] = 1;
			$response_arr['Message'] = $message;
		
			
		}else{
			$response_arr['status'] = 0;
			$response_arr['Message'] = 'Information is not correct';
		}
		echo json_encode($response_arr);		
		die;
		
		
		
	}
	
	public function getModel()
	{
		$this->loadModel('Gpsmodel');
		$this->loadModel('Autocode');
		$modelData = $this->Gpsmodel->find('all',array("order" => array("Gpsmodel.id" => "ASC")));
		$CodeData = $this->Autocode->find('all',array("order" => array("Autocode.id" => "ASC")));
		
		$response_arr = array();
		$modelArray = array();
		$codesArray = array();
		
		
		if(isset($CodeData) && !empty($CodeData)){
			
			foreach($CodeData as $key => $code){
				$codesArray[] = $code['Autocode'];
			}
			
		}
		
	if(isset($modelData) && !empty($modelData)){
			foreach($modelData as $key => $model){
				
				
				$modelArray[]	=	$model['Gpsmodel'];
				
			}
			//echo '<pre>';print_r($modelArray);die;
			$allCarrierArray[]=array('id'=>'0','value'=>'Airtel');
		$allCarrierArray[]=array('id'=>'1','value'=>'Vodafone');
		
			//echo '<pre>';print_r($modelArray);die;
				$response_arr= array();			
							
			
			$response_arr['message'] = 'Model list fetched succesfully.';
			$response_arr['status'] = 1;
			$response_arr['models'] = $modelArray;
			$response_arr['autocodes'] = $codesArray;
			$response_arr['CarrierData'] = $allCarrierArray;
			
			
		}else{
			
			$response_arr['message'] = 'There is no model';
			$response_arr['status'] = 0;
			$response_arr['data'] = NULL;
			
		}
	
		echo json_encode($response_arr);
		die;
	
	
	}
	public function getCarrier()
	{
		$allCarrierArray[]=array('id'=>'Airtel','value'=>'Airtel');
		$allCarrierArray[]=array('id'=>'Vodafone','value'=>'Vodafone');
		
			//echo '<pre>';print_r($modelArray);die;
				$response_arr= array();			
			
			if(!empty($allCarrierArray)) {
                             $response_arr['message'] = 'Successfull';
			                 $response_arr['status'] = 1;
			                 $response_arr['data'] = $allCarrierArray;
                        } else {
                             $response_arr['message'] = 'No code found for this model';
			                 $response_arr['status'] = 0;
			                 $response_arr['data'] = NULL;
                        }
		echo json_encode($response_arr);
		die;
	
	
	}
public function getCode()
	{
		$this->loadModel('Gpsmodel');
		$this->loadModel('Autocode');
		if($this->request->is(['post']))
		{
		$id = $_REQUEST['id'];
		$modelId = $_REQUEST['model_id'];
		$carrier_id = $_REQUEST['carrier_id'];
		
		
		
		if(!empty($id) && !empty($modelId)) {
		
		$modelData = $this->Gpsmodel->find('first',array('conditions' => array('Gpsmodel.id ' => $modelId)));	
		
		$response_arr = array();
		$modelArray = array();
		
		
		 if(empty($modelData)) {
                   
			$response_arr['message'] = 'Model id does not exist';
			$response_arr['status'] = 0;
			$response_arr['data'] = NULL;
                } 
				else {
                    if($id > 0 && $id < 18) {
                        if($id == 1) {
                            $field = 'reboot';
                        } else if($id == 2) {
                            $field = 'reset';
                        } else if($id == 3) {
                            $field = 'factory';
                        } else if($id == 4) {
                            $field = 'location';
                        } else if($id == 5) {
                            $field = 'status';
                        } else if($id == 6) {
                            $field = 'parameters';
                        } else if($id == 7) {
                            $field = 'supply_on';
                        } else if($id == 8) {
                            $field = 'supply_off';
                        } else if($id == 9) {
                            $field = 'gprs_on';
                        } else if($id == 10) {
                            $field = 'gprs_off';
                        } else if($id == 11) {
                            $field = 'angel_on';
                        } else if($id == 12) {
                            $field = 'angel_off';
                        } 
						else if($id == 13) {
                            $field = 'gmt';
                        }else if($id == 14) {
                            $field = 'ip_and_port';
                        }else if($id == 15) {
							if($carrier_id==0)
							{
								$field = 'apn_airtel';
							}else{
								$field = 'apn_vodafone';
							}
                            
                        }
						
						else if($id == 16) {
                            $field = 'auto_continous_track';
                        } else {
                            $field = '';
                        }
                        //$codeData  = $autocodeTable->getCodeData($modelId,$field); 
						if( $id  == 17)
						{
							//echo'dfghj';die;
						$allCodeData = $this->Autocode->find('first',array('conditions' => array('Autocode.gpsmodel_id ' => $modelId)));
						//echo '<pre>';print_r($allCodeData);die;
						$allCodeArray = array();
						
						if($allCodeData['Autocode']['reboot_status']==1)
						{
							$allCodeArray[]=array('id'=>'reboot','value'=>$allCodeData['Autocode']['reboot']);
						}
						if($allCodeData['Autocode']['reset_status']==1)
						{
							$allCodeArray[]=array('id'=>'reset','value'=>$allCodeData['Autocode']['reset']);
						}
						if($allCodeData['Autocode']['factory_status']==1)
						{
							$allCodeArray[]=array('id'=>'factory','value'=>$allCodeData['Autocode']['factory']);
						}
						if($allCodeData['Autocode']['location_status']==1)
						{
							$allCodeArray[]=array('id'=>'location','value'=>$allCodeData['Autocode']['location']);
						}
						if($allCodeData['Autocode']['status_status']==1)
						{
							$allCodeArray[]=array('id'=>'status','value'=>$allCodeData['Autocode']['status']);
						}
						if($allCodeData['Autocode']['supply_on_status']==1)
						{
							$allCodeArray[]=array('id'=>'supply_on','value'=>$allCodeData['Autocode']['supply_on']);
						}
						if($allCodeData['Autocode']['supply_off_status']==1)
						{
							$allCodeArray[]=array('id'=>'supply_off','value'=>$allCodeData['Autocode']['supply_off']);
						}
						if($allCodeData['Autocode']['gprs_on_status']==1)
						{
							$allCodeArray[]=array('id'=>'gprs_on','value'=>$allCodeData['Autocode']['gprs_on']);
						}
						if($allCodeData['Autocode']['gprs_off_status']==1)
						{
							$allCodeArray[]=array('id'=>'gprs_off','value'=>$allCodeData['Autocode']['gprs_off']);
						}
						if($allCodeData['Autocode']['angel_on_status']==1)
						{
							$allCodeArray[]=array('id'=>'angel_on','value'=>$allCodeData['Autocode']['angel_on']);
						}
						if($allCodeData['Autocode']['angel_off_status']==1)
						{
							$allCodeArray[]=array('id'=>'angel_off','value'=>$allCodeData['Autocode']['angel_off']);
						}
						if($allCodeData['Autocode']['auto_continous_track_status']==1)
						{
							$allCodeArray[]=array('id'=>'auto_continous_track','value'=>$allCodeData['Autocode']['auto_continous_track']);
						}if($allCodeData['Autocode']['parameters_status']==1)
						{
							$allCodeArray[]=array('id'=>'parameters','value'=>$allCodeData['Autocode']['parameters']);
						}
						if($allCodeData['Autocode']['ip_and_port_status']==1)
						{
							$allCodeArray[]=array('id'=>'ip_and_port_status','value'=>$allCodeData['Autocode']['ip_and_port']);
						}
						if($allCodeData['Autocode']['gmt_status']==1)
						{
							$allCodeArray[]=array('id'=>'gmt_status','value'=>$allCodeData['Autocode']['gmt']);
						}
						if($allCodeData['Autocode']['apn_airtel_status']==1 && $carrier_id == 0)
						{
							$allCodeArray[]=array('id'=>'apn_airtel_status','value'=>$allCodeData['Autocode']['apn_airtel']);
						}
						if($allCodeData['Autocode']['apn_vodafone_status']==1 && $carrier_id == 1)
						{
							$allCodeArray[]=array('id'=>'apn_vodafone_status','value'=>$allCodeData['Autocode']['apn_vodafone']);
						}
						
						if($allCodeData['Autocode']['ip_status']==1)
						{
							$allCodeArray[]=array('id'=>'ip_status','value'=>$allCodeData['Autocode']['ip']);
						}
						
						if($allCodeData['Autocode']['port_status']==1 && $carrier_id == 1)
						{
							$allCodeArray[]=array('id'=>'port_status','value'=>$allCodeData['Autocode']['port']);
						}
						
						//echo '<pre>';print_r($allCodeArray);die;
						if(!empty($allCodeArray)) {
                             $response_arr['message'] = 'Code fetched succesfully';
			                 $response_arr['status'] = 1;
			                 $response_arr['data'] = $allCodeArray;
                        } else {
                             $response_arr['message'] = 'No code found for this model';
			                 $response_arr['status'] = 0;
			                 $response_arr['data'] = NULL;
                        }
						
						
						}
						else{
							
						$codeData = $this->Autocode->find('first',array('fields'=>'Autocode.'.$field,'conditions' => array('Autocode.gpsmodel_id ' => $modelId)));
						
                        //echo '<pre>';print_r($codeData['Autocode'][$field]);die;
						if(!empty($codeData)) {
                             $response_arr['message'] = 'Code fetched succesfully';
			                 $response_arr['status'] = 1;
			                 $response_arr['data'][] = array('id'=>$field,'value'=>$codeData['Autocode'][$field]);
                        } else {
                             $response_arr['message'] = 'No code found for this model';
			                 $response_arr['status'] = 0;
			                 $response_arr['data'] = NULL;
                        }
		}
					}
				       else {
                        
						$response_arr['message'] = 'Invalid id';
			                 $response_arr['status'] = 0;
			                 $response_arr['data'] = NULL;
                         }
				          }
						} else {
								     
							       $response_arr['message'] = 'Requested data can\'t be blank';
											 $response_arr['status'] = 0;
											 $response_arr['data'] = NULL;
							
							
							}
							} else {
							
						             $response_arr['message'] = 'Requested data should come as POST data';
											 $response_arr['status'] = 0;
											 $response_arr['data'] = NULL;
							
						
						
						}
						echo json_encode($response_arr);
		die;
				
							}
		

	
	}

