<?php

class MenusController extends AppController {

     var $helpers = array('Html', 'Form', 'Ajax');
     var $components = array('Email', 'RequestHandler', 'Paginator', 'Cookie');
     public $imgSize = array();
     public $_dir = "img/banners/";

     function beforeFilter() {
          parent::beforeFilter();
          $this->imgSize = $this->imgsize('banners');
     }

     /* admin  managment section --------------------------------------------------------------------- */

     public function admin_index() {

          $category_tree = $this->Menu->generateTreeList(null, null, null, ' - ');

          $categories_array = array();
          foreach ($category_tree as $k => $v) {
               $records[$k] = $this->Menu->find('first', array('conditions' => array('Menu.id' => $k)));
               $records[$k]['Menu']['p_name'] = $v;
          }
          //pr($records);
          $this->set(compact('records'));
     }

     public function admin_index_old() {


          $sel = 0;
          $con = null;
          if (isset($_GET['str']) && $_GET['str'] != '') {
               $sel = $_GET['str'];
               $con = array("Menu.id" => $_GET['str']);
          }
          $this->set('sel', $sel);

          $records = $this->Menu->find("all", array("order" => array("Menu.orderId" => "ASC")));

          $this->Paginator->settings = array(
              'limit' => 30,
              'order' => array(
                  'Menu.orderId' => 'ASC'
              )
          );
          $records = $this->Paginator->paginate('Menu');


          $this->set(compact('records'));


          $parents[0] = "[ Parent Menu ]";

          $treelist = $this->Menu->generateTreeList($con, null, null, " - ");
          //$this->Cms->recover("title");
          if ($treelist)
               foreach ($treelist as $key => $value)
                    $parents[$key] = $value;
          $this->set(compact('parents'));
     }

     public function admin_add() {

          if ($this->request->is('post')) {

               //pr($this->request->data);
               if ($this->Menu->AddValidate()) {
                    $Thumbwidth = $this->imgSize['size1'][0];
                    $Thumbheight = $this->imgSize['size1'][1];


                    $imageUploadProcess = $this->imageUpload->uploadFileResize($this->request->data['Menu']['image'], $this->_dir, $Thumbwidth, $Thumbheight, "thumb");

                      $this->request->data['Menu']['image']=$imageUploadProcess; 

                    if ($this->request->data['Menu']['linkType'] == "onStatic") {
                         $this->request->data['Menu']['page_url'] = NULL;
                         $this->request->data['Menu']['web_page_url'] = NULL;
                    } else if ($this->request->data['Menu']['linkType'] == "OutSite") {
                         $this->request->data['Menu']['web_page_url'] = NULL;
                         $this->request->data['Menu']['staticlink'] = NULL;
                    } else if ($this->request->data['Menu']['linkType'] == "onSite") {
                         $this->request->data['Menu']['page_url'] = NULL;
                         $this->request->data['Menu']['staticlink'] = NULL;
                    }

                    $order = $this->request->data['Menu']['orderId'];
                    unset($this->request->data['Menu']['orderId']);

                    if ($this->Menu->save($this->request->data)) {

                         $cid = $this->Menu->getLastInsertId();

                         $this->Menu->updateAll(
                                 array('Menu.orderId' => 'Menu.orderId+1'), array('Menu.orderId >' => $order)
                         );
                         $this->Menu->updateAll(
                                 array('Menu.orderId' => $order + 1), array('Menu.id' => $cid)
                         );

                         $this->Session->setFlash(__('Sucess: Submit Sucessfully.'), "sucess");
                         return $this->redirect(array('controller' => 'menus', "action" => "index"));
                    } else {
                         $this->Session->setFlash(__('Sorry Admin !! Operation failed try again Or contact support.'), "danger");
                    }
               }
          }


          $parents[0] = "[ Parent Menu ]";

          $treelist = $this->Menu->generateTreeList(null, null, null, " - ");
          //$this->Cms->recover("title");
          if ($treelist)
               foreach ($treelist as $key => $value)
                    $parents[$key] = $value;
          $this->loadModel('Cmspage');
          $pages = $this->Cmspage->find("list", array("fields" => array("id", "title"), "conditions" => array("status" => 1), "order" => array("Cmspage.title" => "ASC")));
          $this->set(compact('parents', 'pages'));

          $sdata = $this->Menu->find("all", array("fields" => array("id", "title", "orderId"), "order" => array("Menu.orderId" => "ASC")));
          $sort = $this->reorderList($sdata, "", "Menu", "id", "orderId", "last");
          $this->set("sort", $sort);
     }

     public function admin_edit($id = null) {
          if (!$id)
               return $this->redirect(array('controller' => 'menus', "action" => "index"));

          $this->Menu->id = $id;
          if ($this->request->data) {

               //pr($this->request->data);
               //return;
                $Thumbwidth 			= $this->imgSize['size1'][0];
                 $Thumbheight			= $this->imgSize['size1'][1];

                 $imageUploadProcess = $this->imageUpload->uploadFileResize($this->request->data['Menu']['image'], $this->_dir, $Thumbwidth, $Thumbheight, "thumb");
                 if($imageUploadProcess=='0')
                 $imageUploadProcess=$this->request->data['Menu']['hiimagess'];
                 else{
                 @unlink($this->_dir.$this->request->data['Menu']['hiimagess']);
                 foreach($this->imgSize as $imgsizwise){

                 @unlink($this->_dir.$imgsizwise[0]."x".$imgsizwise[1].$this->request->data['Menu']['hiimagess']);
                 }
                 } 


               //$this->request->data['Menu']['image']=$imageUploadProcess;
               unset($this->request->data['Menu']['hiimagess']);
               if ($this->Menu->AddValidate($id)) {
                    if ($this->request->data['Menu']['linkType'] == "onStatic") {
                         $this->request->data['Menu']['page_url'] = NULL;
                         $this->request->data['Menu']['web_page_url'] = NULL;
                    } else if ($this->request->data['Menu']['linkType'] == "OutSite") {
                         $this->request->data['Menu']['web_page_url'] = NULL;
                         $this->request->data['Menu']['staticlink'] = NULL;
                    } else if ($this->request->data['Menu']['linkType'] == "onSite") {
                         $this->request->data['Menu']['page_url'] = NULL;
                         $this->request->data['Menu']['staticlink'] = NULL;
                    }
                    $order = $this->request->data['Menu']['orderId'];
                    unset($this->request->data['Menu']['orderId']);

                    if ($this->Menu->save($this->request->data)) {
                         $cid = $id;
                         $this->Menu->updateAll(
                                 array('Menu.orderId' => 'Menu.orderId+1'), array('Menu.orderId >' => $order)
                         );
                         $this->Menu->updateAll(
                                 array('Menu.orderId' => $order + 1), array('Menu.id' => $cid)
                         );

                         $this->Session->setFlash(__('Sucess: User has been saved.'), "sucess");
                         return $this->redirect(array('controller' => 'menus', "action" => "index"));
                    } else {
                         $this->Session->setFlash(__('Faild: Your Process Faild.'), "danger");
                    }
               }
          }



          $this->data = $this->Menu->read(null, $id);

          $parents[0] = "[ Parent Menu ]";

          $treelist = $this->Menu->generateTreeList(array('Menu.id !=' => $id), null, null, " - ");
          //$this->Cms->recover("title");
          if ($treelist)
               foreach ($treelist as $key => $value)
                    $parents[$key] = $value;

          $this->loadModel('Cmspage');
          $pages = $this->Cmspage->find("list", array("fields" => array("id", "title"), "conditions" => array("status" => 1), "order" => array("Cmspage.title" => "ASC")));
          $this->set(compact('parents', 'pages'));

          $sdata = $this->Menu->find("all", array("fields" => array("id", "title", "orderId"), "order" => array("Menu.orderId" => "ASC")));
          $sort = $this->reorderList($sdata, $id, "Menu", "id", "orderId", "last");

          //pr($sdata);

          $this->set("sort", $sort);
     }

     public function admin_delete($id = null) {
          if ($this->RequestHandler->isAjax()) {
               $msg = false;
               if (!empty($_POST['selected_id'])) {
                    $data_id = array();
                    foreach ($_POST['selected_id'] as $id) {
                         $this->Menu->id = $id;

                         if ($this->Menu->delete()) {
                              $msg = true;
                              $data_id[] = $id;
                         } else {
                              $msg = false;
                              break;
                         }
                    }
                    $cnt = count($data_id);
                    echo json_encode(array("sucess" => $msg, "err_msg" => $msg ? $cnt . " Records Delete Sucessfully" : "Your Process faild", "data" => $data_id));
               }
               die;
          }
          if (!$id)
               return $this->redirect(array('controller' => 'menus', "action" => "index", "admin" => true));

          $this->Menu->id = $id;
          if ($this->Menu->delete()) {
               $this->Session->setFlash(__('this record delete sucessfully'), "sucess");
               $this->redirect(array('controller' => 'menus', 'action' => 'index', "admin" => true));
          } else {
               $this->Session->setFlash('this could not be deleted.', "danger");
               $this->redirect(array('controller' => 'menus', 'action' => 'index', "admin" => true));
          }
     }

     public function admin_status($cnt = null) {

          if ($this->RequestHandler->isAjax()) {

               if (isset($_POST['uid'])) {
                    if ($_POST['cnt'] == 1)
                         $st = 0;
                    else
                         $st = 1;
                    $this->Menu->id = $_POST['uid'];
                    if ($this->Menu->saveField("status", $st))
                         echo json_encode(array("sucess" => true, "err_msg" => "Status Update Sucessfully", "data" => $_POST['uid']));
                    else
                         echo json_encode(array("sucess" => false, "err_msg" => "Your Process faild", "data" => $_POST['uid']));
                    die;
               }

               $msg = false;
               if (!empty($_POST['selected_id'])) {
                    $uids = array();
                    foreach ($_POST['selected_id'] as $id) {
                         $this->Menu->id = $id;
                         $uids[$id] = $id;
                    }
                    if ($cnt)
                         $status = $cnt;
                    else
                         $status = 0;
                    if ($this->Menu->updateAll(array('Menu.status' => $status), array('Menu.id' => $uids)))
                         echo json_encode(array("sucess" => true, "err_msg" => "Status Update Sucessfully", "data" => $_POST['selected_id']));
                    else
                         echo json_encode(array("sucess" => false, "err_msg" => "Your Process faild", "data" => $_POST['selected_id']));
                    die;
               }
               die;
          }
     }

     /* ////admin  managment section --------------------------------------------------------------------- */

     public function get_menu_categories($pos = null) {
          if(!$pos)
               $pos=1;
          $con[] = array("Menu.status" => 1);
          if ($pos == 1)
               $con[] = array("Menu.header_menu" => 1);
          if ($pos == 2)
               $con[] = array("Menu.footer_menu" => 1);
          if ($pos == 3)
               $con[] = array("Menu.sidebar_menu" => 1);
          if ($pos == 4)
               $con[] = array("Menu.top_left" => 1);
          
          $options['conditions'] = $con;
          $options['fields'] = array("Menu.id", "Menu.parent_id", "Menu.title", "Menu.seo_url", "Menu.linkType", "Menu.web_page_url", "Menu.page_url", "Menu.staticlink", "Menu.openin", "Page.id", "Page.title", "Page.seo_url");
          $options['order']   =  array("Menu.orderId ASC");
          $options['recursive'] = 3;
		  $data = $record = $this->Menu->find("all", $options);
         $menus = $this->generateLink($data,  0, $pos); // Preparing $categories.
          $this->htmlConvert($menus); // changing to list, you can add <a> inside it.
        
         
     }
     
    function generateLink(array &$elements, $parentId = 0) {
           $branch = array();

          foreach ($elements as $key => $element) {
               if ($element['Menu']['parent_id'] == $parentId) {
                  
                    $children = $this->generateLink($elements, $element['Menu']['id']);
                  
                    if ($children) {
                         $element['children'] = $children;
                    }
                    $branch[$element['Menu']['id']] = $element;
                    unset($elements[$key]);
               }
          }
          return $branch;
          // pr($branch);
     }
    
     function htmlConvert($arr) {
         
		
		echo "<ul class='mainNavigationList'>";
		foreach ($arr as $val) {
			$href = ($val['Menu']['linkType']=="onSite")?( 
					($val['Page']['seo_url'])?$this->webroot."view/".$val['Page']['seo_url']:$this->webroot."view/".$val['Page']['id']
        			):(
        				($val['Menu']['linkType']=="OutSite")?(
        				(substr($val['Menu']['page_url'],0,7)=="http://" || substr($val['Menu']['page_url'],0,8)=="https://")?(
        						$val['Menu']['page_url'] ):(
        				($val['Menu']['page_url']=="#")?(
        							$val['Menu']['page_url']):(
        									$this->webroot.$val['Menu']['page_url']))
        			):
					($this->webroot.$val['Menu']['staticlink']));
			
			$target = "target='".$val['Menu']['openin']."'";
			
			if (!empty($val['children'])) {
				echo "<li><a href='".$href."' ".$target.">" . $val['Menu']['title']."</a>";
				$this->htmlConvert($val['children']);
				echo "</li>";
			} else {
				echo "<li><a href='".$href."' ".$target.">" . $val['Menu']['title'] . "</a></li>";
			}
			
			
		}
		echo "</ul>";
	}


}
