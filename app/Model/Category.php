<?php
class Category extends AppModel {
		var $name = "Category";	
		var $validate = array(
         'name' => array(

            'notempty' => array(

                'rule' => array('notempty'),

                'message' => 'Please enter category name.',

            ),
			)
     );
}
