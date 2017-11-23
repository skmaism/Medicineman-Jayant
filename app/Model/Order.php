<?php
class Order extends AppModel {
		var $name = "Order";	
		var $belongsTo = array('Customer' => array(

					'className' => "User",

					'foreignKey' => 'customer_id'

			),'Customerdetail' => array(

					'className' => "CustomerDetail",

					'foreignKey' => 'customer_detail_id'

			),
			);
			
		var $hasMany = array('OrderProduct' => array(

					'className' => "OrderProduct",

					'foreignKey' => 'order_id'

			)
			);
}
