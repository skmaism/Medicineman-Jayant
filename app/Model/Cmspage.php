<?php

class Cmspage extends AppModel {

     var $validate = array(
         'title' => array(
             'rule' => 'notEmpty',
             'message' => 'Title field can\'t be left blank',
             'on' => 'create'
         ),
         'seo_url' => array(
             'invalid' => array(
                 'rule' => array('checkUrl'),
                 'allowEmpty' => true,
                 'message' => 'invalid url'),
             'uniqueUrl' => array(
                 "rule" => array("checkUniqueUrlNew"),
                 'allowEmpty' => true,
                 'message' => 'This url already taken')
         ),
     );

     public function checkUrl($url) {
          if ($url['seo_url'] != "") {

               if (preg_match('/^(?=.*[a-zA-Z])([0-9a-zA-Z_]+)$/', $url['seo_url'])) {
                    return true;
               }
               else
                    return false;
          }
          else
               return true;
     }

     function checkUniqueUrl($data) {

          /* if($id)
            $self = array('Menu.id != ' =>$id,'Menu.seo_url' => $data['seo_url']);
            else
            $self=array('Menu.seo_url' => $data['seo_url']); */

          if ($data['seo_url'] != "") {
               $isUnique = $this->find(
                       'count', array(
                   'fields' => array(
                       'Cmspage.id',
                       'Cmspage.seo_url'
                   ),
                   'conditions' => array('Cmspage.seo_url' => $data['seo_url'])
                       )
               );
               if ($isUnique)
                    return false; //Allow update
               else
                    return true; //If there is no match in DB allow anyone to change
          }
          else
               return true;
     }

     function checkUniqueUrlNew($data) {
//pr($data);die;
          /* if($id)
            $self = array('Menu.id != ' =>$id,'Menu.seo_url' => $data['seo_url']);
            else
            $self=array('Menu.seo_url' => $data['seo_url']); */

          if ($data['seo_url'] != "") {

               return $this->isUnique($data, false);
          }
          else
               return true;
     }

}
