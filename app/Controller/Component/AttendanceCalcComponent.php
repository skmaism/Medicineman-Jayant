<?php
/*
	This file is part of Attendance Panel.

	Author: Hanuman Yadav

	
*/
class AttendanceCalcComponent extends Component {
	
     function getDays($year,$mh=null){

    $num_of_days = array();
    $total_month = 12;
    /*if($year == date('Y'))
        $total_month = date('m');
    else
        $total_month = 12;*/

    for($m=1; $m<=$total_month; $m++){
		if($m<10)
		$m = '0'.$m;
        $num_of_days[$m] = cal_days_in_month(CAL_GREGORIAN, $m, $year);
    }
	if($mh)
    return $num_of_days[$mh];
	else
	return $num_of_days;
}

 public function monts($m=NULL){
	 
	 $monthNames = array("01"=>"January","02"=> "February","03"=> "March","04"=> "April","05"=> "May","06"=> "June", "07"=>"July","08"=>"August","09"=> "September", "10"=>"October", "11" => "November", "12" => "December");
	 return $m?$monthNames[$m]:$monthNames;
 }
	
	
}