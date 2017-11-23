<?php

class Setting extends AppModel {

     var $validate = array();

     function AddValidate() {

          $validatedata = array(
              'title' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'title is require',
                  )
              ),
              'email' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'Please enter email',
                      'last' => true),
                  'mustUnique' => array(
                      'rule' => 'isUnique',
                      'message' => 'This email already taken',
                      'last' => true),
              ),
              'default' => array(
                  'mustUnique' => array(
                      'rule' => array('checkUnique'),
                      'message' => 'default setting already exist please unchecked this',
                      'on' => 'create',
                      'last' => true
                  ),
              ),
              'config_mail_protocol' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'Please select Mail Protocol',
                     
                  ),
              ),
              'config_smtp_host' => array(
                  'mustNotEmpty' => array(
                      'rule' => array('mailValid', 'config_mail_protocol'),
                      'message' => 'SMTP Host is require',
                     
                  ),
              ),
              'config_smtp_username' => array(
                  'mustNotEmpty' => array(
                      'rule' => array('smtpuserValid', 'config_mail_protocol'),
                      'message' => 'SMTP Username is require',
                      
                  ),
              ),
              'config_smtp_password' => array(
                  'mustNotEmpty' => array(
                      'rule' => array('smtpPasswordValid', 'config_mail_protocol'),
                      'message' => 'SMTP Password is require',
                     
                  ),
              ),
              'config_smtp_port' => array(
                  'mustNotEmpty' => array(
                      'rule' => array('smtpPortValid', 'config_mail_protocol'),
                      'message' => 'SMTP Port Number is require',
                     
                  ),
              ),
          );

          $this->validate = $validatedata;
          return $this->validates();
     }

     function checkUnique($data) {

          if ($data['default'] != 0) {
               $isUnique = $this->find(
                       'count', array('conditions' => array('Setting.default' => 1)
                       )
               );
               if ($isUnique)
                    return false; //Allow update
               else
                    return true; //If there is no match in DB allow anyone to change
          }
          else
               return true;
     }

     function mailValid($data, $mail) {

          if ($this->data[$this->name][$mail] == "smtp") {
               if ($data['config_smtp_host'] == "")
                    return false;
               else
                    return true;
          }
          else
               return true;
     }

     function smtpuserValid($data, $mail) {

          if ($this->data[$this->name][$mail] == "smtp") {
               if ($data['config_smtp_username'] == "")
                    return false;
               else
                    return true;
          }
          else
               return true;
     }

     function smtpPasswordValid($data, $mail) {

          if ($this->data[$this->name][$mail] == "smtp") {
               if ($data['config_smtp_password'] == "")
                    return false;
               else
                    return true;
          }
          else
               return true;
     }

     function smtpPortValid($data, $mail) {

          if ($this->data[$this->name][$mail] == "smtp") {
               if ($data['config_smtp_port'] == "")
                    return false;
               else
                    return true;
          }
          else
               return true;
     }

}

