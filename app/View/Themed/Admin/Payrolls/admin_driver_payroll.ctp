     <!-- BEGIN PAGE HEADER-->
	 
<style>
.statusChange{cursor:pointer;}
.icon-edit, .icon-trash{font-size:30px;text-decoration:none !important;margin-right:5px;}
</style>
<script>
function clearsearch(){
	
	var site_url	=	"<?php echo $this->base; ?>";
	var driver_id = "<?php echo $this->params['pass'][0]; ?>";
	window.location = site_url + "/admin/payrolls/driver_payroll/"+driver_id;
}
</script>

<!-- END PAGE HEADER-->
<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div style="float:left;">
<h3>Driver Payroll</h3>
</div>
<div style="float:right;">
	
</div>

<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px;">
				   <?php 
				   
				   echo $this->form->create("Payroll",array('url' => array('controller' => 'payrolls', 'action' => 'driver_payroll' , $this->params['pass'][0]), 'type' => 'get'));
				  
				   ?> 
				   
				   <?php 
				   echo '<div class="span2 filterdiv">';
			  echo $this->form->input('date', array("class" => "form-control daterange active", 'type' => 'text',
                        'placeholder' => 'Date Range', 'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => false,
						'value' => $_REQUEST['date'],
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
			   echo '</div>';
			   
			     ?>
				 
				<?php 
				   echo '<div class="span5 new-span5">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-info custom-btn-index'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>'clearsearch();'));
					echo "</div>";
				   echo $this->form->end();
				   ?>
				   
				   
			  </div>
		</div>
		
<div class="table-responsive">
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th  width="5%">
				  <strong><?php echo   $url = $this->Paginator->sort('S.No.'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('date'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Drop Dollar Thresholds"; ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Day Pay"; ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Distance Bonus"; ?></strong>
			 </th>
			 
			  <th>
				  <strong><?php echo   "Full Day Bonus"; ?></strong>
			 </th>
			  
		</tr>
		
		
	</thead>
	
	<tbody>
			
		<?php
		
		
			if (!empty($newOrderData)) {
				
				$i = 1;
				$ThresholdsTotal = 0;
				$DayPayTotal = 0;
				$DistanceBonusTotal = 0;
				$FullDayBonusTotal = 0;
				
				foreach ($newOrderData as $k => $order) {
		?>
		<tr>
			<td>
				<?php echo $i; ?>
			</td>
			<td> <?php echo $order['date']; ?></td>
			<td> <?php echo $order['total']; ?></td>
			<td> <?php
			
				$ThresholdsTotal = $ThresholdsTotal + $order['total'];
				$DistanceBonusTotal = $DistanceBonusTotal + $order['distance_bonus'];
				
				if($order['total'] >= $payrollSetting['PayrollSetting']['first_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['first_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['first_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['first_base_pay']);
					
				}else if($order['total'] >= $payrollSetting['PayrollSetting']['second_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['second_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['second_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['second_base_pay']);
				}else if($order['total'] >= $payrollSetting['PayrollSetting']['third_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['third_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['third_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['third_base_pay']);
				}else if($order['total'] >= $payrollSetting['PayrollSetting']['fourth_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['fourth_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['fourth_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['fourth_base_pay']);
					
				}else if($order['total'] >= $payrollSetting['PayrollSetting']['fifth_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['fifth_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['fifth_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['fifth_base_pay']);
					
				}else if($order['total'] >= $payrollSetting['PayrollSetting']['sixth_threshold_lower'] && $order['total'] < $payrollSetting['PayrollSetting']['sixth_threshold_upper']){
					echo $order['total'] * $payrollSetting['PayrollSetting']['sixth_base_pay'];
					$DayPayTotal = $DayPayTotal + ($order['total'] * $payrollSetting['PayrollSetting']['sixth_base_pay']);
				}else{
					echo "0.00";
				}
				
				?></td>
				
			<td> <?php echo $order['distance_bonus']; ?></td>
			<td> <?php 
			
				
				if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_first_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_first_order_slot_pay'];					
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_first_order_slot_pay'];
					
				}else if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_second_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_second_order_slot_Pay'];
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_second_order_slot_Pay'];
					
				}else if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_third_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_third_order_slot_pay'];
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_third_order_slot_pay'];
					
				}else if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_fourth_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_fourth_order_slot_pay'];
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_fourth_order_slot_pay'];
					
				}else if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_fifth_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_fifth_order_slot_pay'];
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_fifth_order_slot_pay'];
					
				}else if($order['order_count'] > $payrollSetting['PayrollSetting']['full_day_sixth_order_slot']){
					echo $payrollSetting['PayrollSetting']['full_day_sixth_order_slot_pay'];
					$FullDayBonusTotal = $FullDayBonusTotal + $payrollSetting['PayrollSetting']['full_day_sixth_order_slot_pay'];
					
				}else{
					echo "0.00";
				}
				
			?></td>
			
			
			
		</tr>
		<?php 	$i++;
		
			} 
			
		?>
		<tr>
			<td><strong>&nbsp;</strong></td>
			<td><strong>Total</strong></td>
			<td><strong><?php echo $ThresholdsTotal; ?></strong></td>
			<td><strong><?php echo $DayPayTotal; ?></strong></td>
			<td><strong><?php echo $DistanceBonusTotal; ?></strong></td>
			<td><strong><?php echo $FullDayBonusTotal; ?></strong></td>
			
			
		</tr>
		<?php 
			}
		?>
		
	</tbody>
</table>
</div>




<div class="table-responsive">
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th  width="5%">
				  <strong><?php echo   $url = $this->Paginator->sort('S.No.'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Start Date"; ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "End Date"; ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Orders"; ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   "Weekly Bonus"; ?></strong>
			 </th>
			 
		</tr>
	</thead>
	
	<tbody>
			
		<?php
		
		
			if (!empty($newDataArray)) {
				
				$j = 1;
				$WeekBonusToal = 0;
				$WeekOrdersToal = 0;
				foreach ($newDataArray as $k => $order) {
					
					$WeekOrdersToal = $WeekOrdersToal + $order['count'];
		?>
		<tr>
			<td>
				<?php echo $j; ?>
			</td>
			<td> <?php echo date('l, F d, Y' , strtotime($order['startDate'])); ?></td>
			<td> <?php echo date('l, F d, Y' , strtotime($order['endDate'])); ?></td>
			<td> <?php echo $order['count']; ?></td>
			<td> <?php  if($order['count'] > $payrollSetting['PayrollSetting']['full_week_order_slot']){
				echo $payrollSetting['PayrollSetting']['full_week_order_slot_pay'];
				
				$WeekBonusToal = $WeekBonusToal + $payrollSetting['PayrollSetting']['full_week_order_slot_pay'];
			}else{
				echo "0.00"; 
			} ?></td>
			
				
			
		</tr>
		<?php 	$j++;
		
			} ?>
			
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><strong>Total</strong></td>
				<td><strong><?php echo $WeekOrdersToal; ?></strong></td>
				<td><strong><?php echo $WeekBonusToal; ?></strong></td>
				
				
			</tr>
			<?php 
			}
		?>
		
	</tbody>
</table>
</div>
<?php /*
<div class="row"> 
	<div class="col-xs-6 col-left">
		&nbsp;
	</div>
	<div class="col-xs-6 col-right">
			<div class="dataTables_paginate paging_bootstrap">
				<ul class="pagination pagination-sm">
						<?php
							echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
							echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
							echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						?>
					</ul>
			</div>
	</div>
</div>

*/ ?>


<!-- END EXAMPLE TABLE PORTLET-->
