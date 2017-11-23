<?php
class CmspagesController extends AppController {
	
	
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Email','RequestHandler','Paginator','Cookie');
	
		
	
	
	/* admin  managment section ---------------------------------------------------------------------*/
	
	public function admin_index() {
		
		$records = $this->Cmspage->find("all",array("order"=>array("Cmspage.title"=>"ASC")));
		//pr($records);
		$this->set(compact('records'));
		
		
	
	}
	
	public function admin_add($id=null) {
		//pr($this->request->data);
		//die;
		//echo $this->validate();
		if ($this->request->data) {
			
			if($id)
				$this->Cmspage->id = $id;
			
                        if(empty($this->request->data['Cmspage']['seo_url']))
                         $this->request->data['Cmspage']['seo_url'] = $this->getUniqueAlias($this->request->data['Cmspage']['title'],"Cmspage");
                        
                      
                        
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('Sucess: Submit Sucessfully.'),"sucess");
				return $this->redirect(array('controller' => 'cmspages',"action"=>"index"));
			}
			else{
				$this->Session->setFlash(__('Sorry Admin !! Operation failed try again Or contact support.'),"danger");
					
			}
			
		
		}
		
		if(empty($this->data))
		$this->data = $this->Cmspage->read(null, $id);
			
		
	
	}
	
	public function admin_edit($id=null) {
		if(!$id)
		return $this->redirect(array('controller' => 'cmspages',"action"=>"index"));
		
			
			if ($this->request->data) {
				$this->Cmspage->id = $id;
			//pr($this->request->data);
			//return;
			if ($this->Cmspage->save($this->request->data)) {
					$this->Session->setFlash(__('Sucess: User has been saved.'),"sucess");
					return $this->redirect(array('controller' => 'cmspages',"action"=>"index"));
				}
				else{
					$this->Session->setFlash(__('Faild: Your Process Faild.'),"danger");
					
				}
				
				
			
	
		}
		
		$this->data = $this->Cmspage->read(null, $id);
		
	
	
	}
	
	public function admin_delete($id=null){
		if($this->RequestHandler->isAjax()){
			$msg = false;
		if(!empty($_POST['selected_id'])){
			foreach($_POST['selected_id'] as $id){
				$this->Cmspage->id=$id;
			
					if($this->Cmspage->delete()){
						$msg = true;
						$data_id[]=	$id;
					}
					else{
						$msg = false;
						break;
					} 
						
				
			}
			$cnt = count($data_id);
			echo json_encode(array("sucess"=>$msg,"err_msg"=>$msg?$cnt." Records Delete Sucessfully":"Your Process faild","data"=> $data_id));
			}
			die;
			
		}
		if(!$id)
			return $this->redirect(array('controller' => 'cmspages',"action"=>"index","admin"=>true));
		
		$this->Cmspage->id=$id;
		if($this->Cmspage->delete()){
			$this->Session->setFlash(__('this record delete sucessfully'),"sucess");
			$this->redirect(array('controller'=>'cmspages','action'=>'index',"admin"=>true));
		}
		else{
			$this->Session->setFlash('this could not be deleted.',"danger");
			$this->redirect(array('controller'=>'cmspages','action'=>'index',"admin"=>true));
		}
	}
	
	public function admin_status($cnt=null){
          
          if ($this->RequestHandler->isAjax()) {
             
               if (isset($_POST['uid'])) {
                    if ($_POST['cnt'] == 1)
                         $st = 0;
                    else
                         $st = 1;
                    $this->Cmspage->id = $_POST['uid'];
                    if($this->Cmspage->saveField("status", $st))
                    echo json_encode(array("sucess"=>true,"err_msg"=>"Status Update Sucessfully","data"=> $_POST['uid']));
                    else
                     echo json_encode(array("sucess"=>false,"err_msg"=>"Your Process faild","data"=> $_POST['uid']));
                    die;
               }

               $msg = false;
               if (!empty($_POST['selected_id'])) {
                    $uids = array();
                    foreach ($_POST['selected_id'] as $id) {
                         $this->Cmspage->id = $id;
                         $uids[$id] = $id;
                    }
                    if ($cnt)
                         $status = $cnt;
                    else
                         $status = 0;
                    if($this->Cmspage->updateAll(array('Cmspage.status' => $status), array('Cmspage.id' => $uids)))
                     echo json_encode(array("sucess"=>true,"err_msg"=>"Status Update Sucessfully","data"=> $_POST['selected_id']));
                     else
                       echo json_encode(array("sucess"=>false,"err_msg"=>"Your Process faild","data"=> $_POST['selected_id']));   
                   die;
               }
               die;
          }
     }
	
	
	
	
	/* ////admin  managment section ---------------------------------------------------------------------*/
	
	
	public function view($slug=null) {
	
		if(!$slug)
		$this->redirect(array("controller"=>"pages","action"=>"index"));
		
		if(is_numeric($slug))
		$data = $this->Cmspage->find("first",array("conditions"=>array("Cmspage.id"=>$slug)));
		else
		$data = $this->Cmspage->find("first",array("conditions"=>array("Cmspage.seo_url"=>$slug)));
		
		$this->set(compact("data"));
			
		
			$this->set("title",$data['Cmspage']['meta_title']);
			$this->set("metaKey",$data['Cmspage']['meta_keyword']);
			$this->set("metaDescription",$data['Cmspage']['meta_description']);
			
			
		
	}
	
        public function contact() {
              if ($this->RequestHandler->isAjax()) {
               //  pr($this->request->data['Contact']);
                   if($this->request->data['Contact']['hcid']!=""){
                        echo json_encode(array("sucess" => false, "err_msg" => "please fill your correct information"));
                        die;
                   }
                         $data = $this->request->data['Contact'];
                         
                         $html = '<table width="100%" border="0" cellspacing="1" cellpadding="0" class="gridtable">';
                         $html .= '<tr><td width="20%"> <strong>Name: </strong> </td><td width="80%">'.$this->request->data['Contact']['name'].'</td></tr>';
                         $html .= '<tr> <td><strong>Email Addresss:</strong></td><td>'.$this->request->data['Contact']['email'].'</td> </tr>';
                         $html .= '<tr> <td><strong>Phone:</strong></td><td>'.$this->request->data['Contact']['phone'].'</td> </tr>';
                         $html .= '<tr> <td><strong>Message:</strong></td><td>'.$this->request->data['Contact']['message'].'</td> </tr>';
                         $html .= '</table>';
                         
                         $this->set("data", $html);
                         $to = trim($this->settings['email']);
                         $from = trim($this->request->data['Contact']['email']);
                         $subject = "New Contact enquiry on " . $this->settings['title'] . "";
                         $send = $this->_sendMail($to, $from, $cc = '', $bcc = '', $subject, 'general','general_layout');
                         if($send){
                               echo json_encode(array("sucess" => true, "err_msg" => "your message sent successfull"));
                         }else{
                               echo json_encode(array("sucess" => false, "err_msg" => "please fill your correct information"));
                         }
                   
                   die;
              }
             
             die;
	}
		
	
}
