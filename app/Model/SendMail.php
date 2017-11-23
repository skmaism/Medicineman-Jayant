<?php 

class SendMail extends AppModel{
	
	
	var $name = 'SendMail';
    var $belongsTo = array(
         'User',
	);
}