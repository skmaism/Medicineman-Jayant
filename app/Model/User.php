<?php

//App::admins('AuthComponent', 'Controller/Component');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

     var $name = "User";
    
	var $belongsTo = array(
	
						'Role',

     );
     var $validate = array(
         'first_name' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter first name.',

            ),

        ),
		     
         'last_name' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter last name.',

            ),

        ),
		'phone' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter phone number.',

            ),

        ),
		'address' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter address.',

            ),

        ),
		'no_of_emp' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter no of employees.',

            ),

        ),
		'name_code' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter name code.',

            ),

        ),'name' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter name code.',

            ),

        ),
         'email' => array(
             'mustUnique' => array(
                 'rule' => 'isUnique',
                 'message' => 'This email already taken',
                 'last' => true),
			'validEmail' => array(
                 'rule' => 'email',
                 'message' => 'Enter valid email',
                 'last' => true),
         ),
         'username' => array(
             'mustNotEmpty' => array(
                 'rule' => 'notEmpty',
                 'message' => 'Please enter user name',
                 'last' => true),
             'mustUnique' => array(
                 'rule' => 'isUnique',
                 'message' => 'This user name already taken',
                 'last' => true),
         ),
         'password' => array(
             'mustNotEmpty' => array(
                 'rule' => 'notEmpty',
                 'message' => 'Please enter password',
                 'on' => 'create',
                 'last' => true
             ),
             'between' => array(
                 'rule' => array('between', 5, 15),
                 'message' => 'Password Between 5 to 15 characters',
                 'last' => true
             ),
             'password' => array(
                 'rule' => array('checkAlfaNum'),
                 'message' => 'Password must be combination of char and number',
                 'last' => true
             ),
         ),
         'cpassword' => array(
             'required' => array(
                 'rule' => array('notEmpty'),
                 'message' => 'Please confirm your password',
                 'last' => true
             ),
             'equaltofield' => array(
                 'rule' => array('equaltofield', 'password'),
                 'message' => 'Both passwords must match.',
                 'last' => true
             )
         ),
     );

     function AddValidate() {

          $validatedata = array(
              'first_name' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'First name is require',
                  )
              ),
			   'last_name' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'Last name is require',
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
              'username' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'Please enter user name',
                      'last' => true),
                  'mustUnique' => array(
                      'rule' => 'isUnique',
                      'message' => 'This user name already taken',
                      'last' => true),
              ),
              'password' => array(
                  'mustNotEmpty' => array(
                      'rule' => 'notEmpty',
                      'message' => 'Please enter password',
                      'on' => 'create',
                      'last' => true
                  ),
                  'between' => array(
                      'rule' => array('between', 5, 15),
                      'message' => 'Password Between 5 to 15 characters',
                      'last' => true
                  ),
                  'password' => array(
                      'rule' => array('checkAlfaNum'),
                      'message' => 'Password must be combination of char and number',
                      'last' => true
                  ),
              ),
              'cpassword' => array(
                  'required' => array(
                      'rule' => array('notEmpty'),
                      'message' => 'Please confirm your password',
                      'last' => true
                  ),
                  'equaltofield' => array(
                      'rule' => array('equaltofield', 'password'),
                      'message' => 'Both passwords must match.',
                      'last' => true
                  )
              ),
          );

          $this->validate = $validatedata;
          return $this->validates();
     }

     public function checkAlfaNum($check) {
          $pwd = '';
          foreach ($check as $key => $value) {
               $pwd = $key;
               break;
          }
          //echo $this->data[$this->name][$pwd];
          if(!empty($check['password'])){
          if (preg_match('/^(?=.*[a-zA-Z])(?=.*\d)([0-9a-zA-Z]+)$/', $check['password'])) {
               return true;
          }
          else
               return false;
          }else
               return false;
     }

     public function equaltofield($check, $otherfield) {
          if(!empty($this->data[$this->name]['password']))
          return $this->data[$this->name]['password'] === $this->data[$this->name]['cpassword'];
          else
               return true;
     }

     public function beforeSave($options = array()) {
          if (isset($this->data[$this->alias]['password'])) {
               $passwordHasher = new SimplePasswordHasher();
               $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
          }
          return true;
     }

}

