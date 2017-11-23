<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	
	public function display() {
	
		$path = func_get_args();
		
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
                if($page == 'contact_us'){
                    $this->layout = "default";
                } else {
                    $this->layout = "home";
                }
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		
                
             /*   $this->loadModel("AppointmentSchedule");
               // $this->AppointmentSchedule->find("all");
                $start = strtotime("00:15");
               $mins = range(0,86400,900); //Measured in seconds.
               
               $i=1;
               $endtime = array();
               foreach($mins AS $min) {
                $time = date('H:i',$start+$min);
                  if($time<="12:00")
                     $sl = " AM";
                else
                     $sl = " PM";
                $endtime[] = $time.$sl;
               // echo "<br>";
               $i++;}
               echo $i;
              
               
               $st = strtotime("00:00");
               $mins = range(0,86400,900); //Measured in seconds.
               
               $i=1;
               $starttime = array();
               foreach($mins AS $min) {
                $time = date('H:i',$st+$min);
                if($time<="12:00")
                     $sl = " AM";
                else
                     $sl = " PM";
                $starttime[] = $time.$sl;
               // echo "<br>";
               $i++;}
               
                //pr($endtime);
                // pr($starttime);
                 $arc = array_combine($starttime,$endtime);
                // pr($arc);
                 
                 $data = array();
                 foreach($arc as $k=>$y){
                      $data[] = array("start_slot"=>$k,"end_slots"=>$y,"status"=>1);
                 }
                // $this->AppointmentSchedule->saveAll($data);
                
		*/
		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
