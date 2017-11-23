     <!-- BEGIN PAGE HEADER-->
	 
<style>
.statusChange{cursor:pointer;}
.icon-edit, .icon-trash{font-size:30px;text-decoration:none !important;margin-right:5px;}
</style>
<script>
function clearsearch(){
	
	var site_url	=	"<?php echo $this->base; ?>";
	window.location = site_url + "/admin/users";
}
</script>

<!-- END PAGE HEADER-->
<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div style="float:left;">
<h3><?php echo  'Payroll setting'; ?></h3>
</div>
<div style="float:right;">
	
</div>

<div class="ajaxMessage clearDiv"></div>
<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('PayrollSetting', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                          
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    )); ?>
<div class="table-responsive">		
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th colspan="7">
				  <strong>&nbsp;</strong>
			 </th>
			 
			
			
		</tr>
	</thead>
	
	<tbody>
		
		<?php
			if (!empty($records)) {
				
				foreach ($records as $k => $setting) { //echo '<pre>'; print_r($product); exit;
		?>
		<tr>
			<td colspan="7"><strong>Payroll amounts</strong></td>
		</tr>
		<tr>
			<td class="col-md-3"><strong>Upper Threshold < </strong></td>
			<td>
				<?php
					echo $this->Form->input('first_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['first_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('second_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['second_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('third_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['third_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fourth_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fourth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fifth_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fifth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td><?php
					echo $this->Form->input('sixth_threshold_upper', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['sixth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
				
			</td>
		</tr>
		<tr>
			<td><strong>Lower Threshold >= </strong></td>
			<td>
				<?php
					echo $this->Form->input('first_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['first_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
				
			</td>
			<td>
				<?php
					echo $this->Form->input('second_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['second_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('third_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['third_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fourth_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fourth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fifth_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fifth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('sixth_threshold_lower', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['sixth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
		</tr>
		<tr>
			<td><strong>Pay</strong></td>
			<td>
				<?php
					echo $this->Form->input('first_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['first_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('second_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['second_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('third_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['third_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fourth_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fourth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('fifth_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['fifth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('sixth_base_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['sixth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
				
			</td>
		</tr>
		
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		
		<tr>
			<td colspan="7">
				<strong>Full Day Bonus</strong>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Drop Threshold > </strong>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_first_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_first_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
				
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_second_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_second_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_third_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_third_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_fourth_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_fourth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_fifth_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_fifth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_sixth_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_sixth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			
		</tr>
		<tr>
			<td>
				<strong>Pay</strong>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_first_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_first_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_second_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_second_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_third_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_third_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_fourth_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_fourth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_fifth_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_fifth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			<td>
				<?php
					echo $this->Form->input('full_day_sixth_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_day_sixth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			
		</tr>
		
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		
		<tr>
			<td colspan="7">
				<strong>Full Week Bonus</strong>
			</td>
		</tr>
		
		<tr>
			<td>
				<strong>Drop Threshold > </strong>
			</td>
			<td colspan="6">
				<?php
					echo $this->Form->input('full_week_order_slot', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_week_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			
			
		</tr>
		<tr>
			<td>
				<strong>Pay</strong>
			</td>
			<td colspan="6">
				<?php
					echo $this->Form->input('full_week_order_slot_pay', array("class" => "form-control custom-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $setting['PayrollSetting']['full_week_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => '', 'class' => ''),
                        
                            )
                    );
				?>
			</td>
			
			
		</tr>
		<tr>
			<td colspan="7">
			<?php 
               		echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-info custom-btn'
                    ));
			?>
			</td>
			
			
			
		</tr>
		
		
		
		
		<?php 	} 
			}
		?>
		
	</tbody>
</table>
</div>

<?php  echo $this->form->end(); ?>

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
