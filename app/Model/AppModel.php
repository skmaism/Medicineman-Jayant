<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	
	function getNextAutoIncrement(){
	
		$next_increment = 0;
	
		$table = Inflector::tableize($this->name);
	
		$query = "SHOW TABLE STATUS LIKE '$table'";
	
		$db =& ConnectionManager::getDataSource($this->useDbConfig);
	
		$result = $this->query($query);
		
		//pr($result);
	
	
		foreach($result as $row) {
	
			$next_increment = $row['TABLES']['Auto_increment'];
	
		}
	return $next_increment;
	
	}
	
}

class AppointmentSchedule extends AppModel {
     
}

class DoctorAvailability extends AppModel {
     var $belongsTo = array("AppointmentSchedule");
}

class BookingVideochat extends AppModel {
     var $belongsTo = array("Booking");
}

class Subscriber extends AppModel {
     var $belongsTo = array("Payment", "Patient");
}