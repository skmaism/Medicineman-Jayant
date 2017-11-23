<?php
class SettingsController extends AppController {
	
	
	var $helpers = array('Html', 'Form', 'Ajax');
	var $components = array('Email','RequestHandler','Paginator','Cookie');
	
		
	public $imgSize = array();
	
	
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->imgSize = $this->imgsize('logos');
	}
	
	public function admin_index() {
		
		$records = $this->Setting->find("all",array("order"=>array("Setting.id"=>"DESC")));
		//pr($records);
		foreach($records as $thumb){
			foreach($this->imgSize as $imgsizwise){
				$this->imageUpload->ResizeResponsive("img/",$thumb['Setting']['logo'],$imgsizwise[0], $imgsizwise[1],"thumb");
			}
				
		}
		$imgSiz = $this->imgSize;
		$this->set(compact('records','imgSiz'));
		
		
	
	}
	
	public function admin_add($id=null) {
		//pr($this->request->data);
		//die;
		//echo $this->validate();
             
             if(!$id)
                  $id = $this->Me['id'];
                
		if ($this->request->data) {
			$Thumbwidth 			= $this->imgSize['size1'][0];
			$Thumbheight			= $this->imgSize['size1'][1];
			$dir                    = "img/";
			
			if(!$id)
				$imageUploadProcess = $this->imageUpload->uploadFileResize($this->request->data['Setting']['logo'],$dir,$Thumbwidth,$Thumbheight,"thumb");
			else{
				$imageUploadProcess = $this->imageUpload->uploadFileResize($this->request->data['Setting']['logo'],$dir,$Thumbwidth,$Thumbheight,"thumb");
				if($imageUploadProcess=='0')
					$imageUploadProcess=$this->request->data['Setting']['hiimagess'];
				else{
					@unlink($dir.$this->request->data['Setting']['hiimagess']);
					
					foreach($this->imgSize as $imgsizwise){
							
						@unlink($dir.$imgsizwise[0]."x".$imgsizwise[1].$this->request->data['Setting']['hiimagess']);
					}
				}
			}
			
			$this->request->data['Setting']['logo']=$imageUploadProcess;
			//unset($this->request->data['Setting']['hiimagess']);
			
			
			if($id)
				$this->Setting->id = $id;
			if($this->Setting->AddValidate()) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('Sucess: Submit Sucessfully.'),"sucess");
				return $this->redirect(array('controller' => 'settings',"action"=>"index"));
				
			}
			else{
				$this->Session->setFlash(__('Sorry Admin !! Operation failed try again Or contact support.'),"danger");
					
			}
			}else 
				$this->Session->setFlash(__('Sorry Admin !! Operation failed try again Or contact support.'),"danger");
			
		
		}
		
                if(empty($this->data))
                     $this->data = $this->Setting->read(null, $id);
                
		if($id){
		$this->set("heads","Edit Setting");
		}else{
		$this->set("heads","Add Setting");
		}
			
		
	
	}
	
	
	public function admin_delete($id=null){
		if($this->RequestHandler->isAjax()){
			
			$msg = false;
		if(!empty($_POST['selected_id'])){
			$data_id=array();
			foreach($_POST['selected_id'] as $id){
				$this->Setting->id=$id;
			$data = $this->Setting->find("first",array("fields"=>array("id","logo","default"),"conditions"=>array("Setting.id"=>$id)));
				if(!$data['Setting']['default']){
				$dir = "img/";
				$img = $data['Setting']['logo'];
				@unlink($dir.$img);
				
				foreach($this->imgSize as $imgsizwise){
					@unlink($dir.$imgsizwise[0]."x".$imgsizwise[1].$img);
				}
				
					if($this->Setting->delete()){
						$msg = true;
					}
					else{
						$msg = false;
						break;
					} 
					
					$data_id[]=	$id;
				}
						
				
			}
		
			$new = array("data"=>$data_id);
			echo json_encode($new);
			}
			die;
			
		}
		if(!$id)
			return $this->redirect(array('controller' => 'settings',"action"=>"index","admin"=>true));
		
		$this->Setting->id=$id;
		
		$data = $this->Setting->find("first",array("fields"=>array("id","logo","default"),"conditions"=>array("Setting.id"=>$id)));
		if(!$data['Setting']['default']){
			$dir = "img/";
			$img = $data['Setting']['logo'];
			@unlink($dir.$img);
		
			foreach($this->imgSize as $imgsizwise){
				@unlink($dir.$imgsizwise[0]."x".$imgsizwise[1].$img);
			}
		
		if($this->Setting->delete()){
			$this->Session->setFlash(__('this record delete sucessfully'),"sucess");
			$this->redirect(array('controller'=>'settings','action'=>'index',"admin"=>true));
		}
		else{
			$this->Session->setFlash('this could not be deleted.',"danger");
			$this->redirect(array('controller'=>'settings','action'=>'index',"admin"=>true));
		}
		}
		else{
			$this->Session->setFlash('Default setting could not be deleted.',"danger");
			$this->redirect(array('controller'=>'settings','action'=>'index',"admin"=>true));
		}
	}
	
	public function admin_status($cnt=null){
		
		if($this->RequestHandler->isAjax()){
			
			if(isset($_POST['uid'])){
				if($_POST['cnt']==1)
					$st=0;
				else 
					$st=1;
				$this->Setting->id=$_POST['uid'];
    		    $this->Setting->saveField("status",$st);
				die;
			}
			
			$msg = false;
			if(!empty($_POST['selected_id'])){
				$uids = array();
				foreach($_POST['selected_id'] as $id){
					$this->Setting->id=$id;
					$uids[$id] = $id;
					
				}
				if($cnt)
					$status=$cnt;
				else 
					$status = 0;
				$this->Setting->updateAll(
						array('Setting.status' => $status),
						array('Setting.id' => $uids)
				);
				$new = array("data"=>$_POST['selected_id']);
				echo json_encode($new);
			}
			die;
				
		}
		
	}
	
	
	
	
	
	
	
}
