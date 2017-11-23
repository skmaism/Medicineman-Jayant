<?php

/**
 * Default Component
 *
 * PHP version 5
  This component consists the website default functions
 */
class WebserviceComponent extends Component {

    protected $_controller = null;

    /**
     * Remove any special character in string and used only numeric and digit
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function initialize(Controller $controller) {
        $this->_controller = & $controller;
    }

    public function Cleanstring($string = NULL) {
        $cleansedstring = ereg_replace("[^A-Za-z0-9]", "-", $string);
        return strtolower($cleansedstring);
    }

    function saveDeviceId($request_array) {
        $this->Device = ClassRegistry::init('Device');
        $response_arr = array();
        $is_exists = $this->Device->find('first', array('conditions' => array('Device.device_token' => $request_array->device_token)));
        

        if (!empty($is_exists)) {
            if ($is_exists['Device']['user_id'] == 0 && $request_array->user_id != 0) {
                $saveDevice['Device']['user_id'] = $request_array->user_id;
                $saveDevice['Device']['id'] = $is_exists['Device']['id'];
                $save_device['Device']['is_paid'] = $request_array->isPaid;
                $this->Device->save($saveDevice);
                $response_arr['status']['IsValid'] = true;
                $response_arr['status']['Message'] = "Device successfully registered";
                $response_arr['data'] = "";
            } else {
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = "Device already registered";
                $response_arr['data'] = "";
            }
        } else {
            $save_device['Device']['device_id'] = $request_array->device_id;
            $save_device['Device']['device_token'] = $request_array->device_token;
            $save_device['Device']['user_id'] = $request_array->user_id;
            $save_device['Device']['is_paid'] = $request_array->isPaid;
            $this->Device->save($save_device);
            $response_arr['status']['IsValid'] = true;
            $response_arr['status']['Message'] = "Device successfully registered";
            $response_arr['data'] = "";
        }
        return json_encode($response_arr);
    }

    function resetBadge($request_array) {
        $this->Device = ClassRegistry::init('Device');
        $response_arr = array();
        if($this->Device->updateAll(array('badge_count' => 0), array('Device.device_token' => $request_array->device_token))){
            $response_arr['status']['IsValid'] = true;
            $response_arr['status']['Message'] = "Badge count updated";
        }else{
            $response_arr['status']['IsValid'] = false;
            $response_arr['status']['Message'] = "There is some error in request";
        }
        $response_arr['data'] = "";
        return json_encode($response_arr);
    }

    function saveAndroidDevice($request_array) {
        $this->Device = ClassRegistry::init('Device');
        $response_arr = array();
        
        $is_exists = $this->Device->find('first', array('conditions' => array('Device.device_id' => $request_array->device_id)));
        
        if (!empty($is_exists)) {
            if ($is_exists['Device']['user_id'] == 0 && $request_array->user_id != 0) {
                $saveDevice['Device']['user_id'] = $request_array->user_id;
                $saveDevice['Device']['id'] = $is_exists['Device']['id'];
                $saveDevice['Device']['device_type'] = 1;
                $this->Device->save($saveDevice);
                $response_arr['status']['IsValid'] = true;
                $response_arr['status']['Message'] = "Device successfully registered";
                $response_arr['data'] = "";
            } else {
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = "Device already registered";
                $response_arr['data'] = "";
            }
        } else {
            $save_device['Device']['device_id'] = $request_array->device_id;
            $save_device['Device']['device_token'] = "";
            $save_device['Device']['user_id'] = 0;
            $save_device['Device']['device_type'] = 1;
            
            if($this->Device->save($save_device)){
                $response_arr['status']['IsValid'] = true;
                $response_arr['status']['Message'] = "Device successfully registered";
                $response_arr['data'] = "";
            }else{
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = "There is some error in device registration";
                $response_arr['data'] = "";
            }
        }
        return json_encode($response_arr);
    }
    
    function setReadStatus($request_array){
        $this->Notification = ClassRegistry::init('Notification');
        $device_token = $request_array->device_token;
        $this->Notification->bindModel(array(
           'belongsTo'=>array(
               'Device'
           ) 
        ));
        if($this->Notification->deleteAll(Array('Device.device_token' => $device_token))){
                $response_arr['status']['IsValid'] = true;
                $response_arr['status']['Message'] = "Status updated successfully";
                $response_arr['data'] = "";
        }else{
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = "There is some error in setting read status";
                $response_arr['data'] = "";
        }
        return json_encode($response_arr);
    }
    
    
    function fetchNotifications($request_array){
        $this->Notification = ClassRegistry::init('Notification');
        $device_token = $request_array->device_token;
        $this->Notification->bindModel(array(
           'belongsTo'=>array(
               'Device'
           ) 
        ),false);
        $notificationMessages = $this->Notification->find('all',array('conditions'=>array('Device.device_token'=>$device_token),'fields'=>array('Notification.notification')));
        
        foreach($notificationMessages as $key => $notification){
            $response_arr['data'][$key]['message'] = $notification['Notification']['notification'];
        }
        
        if(!empty($response_arr['data'])){
             $response_arr['status']['IsValid'] = true;
             $response_arr['status']['Message'] = "Notifications fetched successfully";
             $this->Notification->deleteAll(Array('Device.device_token' => $device_token));
        }else{
                $response_arr['status']['IsValid'] = false;
                $response_arr['status']['Message'] = "There is no new notification";
                $response_arr['data'] = "";
        }
        return json_encode($response_arr);
    }

}
