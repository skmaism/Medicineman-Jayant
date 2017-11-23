<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
require_once('class.phpmailer.php');
class CronsController extends AppController {

     
	 var $helpers = array('Html', 'Form', 'Ajax','Paginator' => array('Paginator'));
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie' ,'Mpdf');
	 var $uses =array("Lead","LeadCoapplicant","LeadEmployementDetail","LeadSecurityDetail","LeadFeeDetail","LeadRefrence","LeadDeclaration","LeadFiles","Device","LeadGuarantor","User","Document", "Valuer" , "Newspaper" , "Officer" ,"LeadCheque","Exclation","PossessionImage");

    public function index() {
        die;
    }
     
     
     public function test(){
			

			$maildIdsData = $this->Exclation->find("all" , array('conditions' => '','recursive' => 2));
			foreach($maildIdsData as $mailId){
				$mail = new PHPMailer(true);

				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host       = "mail.skmaism.com"; // SMTP server
				$mail->SMTPAuth   = true;                  // enable SMTP authentication

				$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
				$mail->Username   = "skmaism@skmaism.com"; // SMTP account username
				$mail->Password   = "5E_4e,ZkLFJO";        // SMTP account password
				$mail->AddAddress($mailId['User']['email'], ucwords($mailId['User']['first_name']).' '.ucwords($mailId['User']['last_name']));
				$mail->SetFrom('skmaism@skmaism.com', 'skmaism');

				$mail->Subject = 'cron job test';
				$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically


				$mailbody = 'cron job test';	 


				$mail->MsgHTML($mailbody);
				//$mail->AddAttachment('images/phpmailer.gif');      // attachment
				//$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
				$mail->Send();

				/************** end **************/
			}

			
         die;
     }
}

