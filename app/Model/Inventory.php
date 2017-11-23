<?php
class Inventory extends AppModel {
		var $name = "Inventory";		
		var $belongsTo = array("Product" ,'Driver' => array(

					'className' => "User",

					'foreignKey' => 'driver_id'

			),'Manager' => array(

					'className' => "User",

					'foreignKey' => 'manager_id'

			));		
}
