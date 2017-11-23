<script> var site_url	=	"<?php echo $this->base; ?>";</script>

<h3>Edit Payroll Settings</h3>



<?php echo $this->Session->flash();

 ?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
		
			
			<div class="panel-body">
				
				<div class="row">
	<?php
                    echo $this->Form->create('PayrollSetting', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            'div' => array('class' => 'col-md-4 marBottom10'),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					echo '<div class="col-md-12"><strong><h4>Payroll amounts</h4></strong></div>';
					
					echo $this->Form->input('first_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['first_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'First Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('first_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['first_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'First Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('first_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['first_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'First Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('second_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['second_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Second Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('second_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['second_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Second Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('second_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['second_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Second Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					
					echo $this->Form->input('third_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['third_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Third Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('third_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['third_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Third Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('third_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['third_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Third Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fourth_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fourth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fourth Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fourth_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fourth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fourth Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fourth_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fourth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fourth Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fifth_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fifth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fifth Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fifth_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fifth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fifth Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('fifth_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['fifth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fifth Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('sixth_threshold_lower', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['sixth_threshold_lower'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Sixth Threshold Lower', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('sixth_threshold_upper', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['sixth_threshold_upper'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Sixth Threshold Upper', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('sixth_base_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['sixth_base_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Sixth Base Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					
					echo '<div style="clear:both;" class="col-md-12"><strong><h4>Full Day Bonus</h4></strong></div>';
					echo $this->Form->input('full_day_first_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_first_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'First Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_first_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_first_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'First Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo '<div style="clear:both;"></div>';
					
					echo $this->Form->input('full_day_second_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_second_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Second Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_second_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_second_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Second Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '<div style="clear:both;"></div>';
					
					echo $this->Form->input('full_day_third_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_third_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Third Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_third_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_third_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Third Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '<div style="clear:both;"></div>';
					
					echo $this->Form->input('full_day_fourth_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_fourth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fourth Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_fourth_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_fourth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fourth Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '<div style="clear:both;"></div>';
					
					echo $this->Form->input('full_day_fifth_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_fifth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fifth Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_fifth_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_fifth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Fifth Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '<div style="clear:both;"></div>';
					
					echo $this->Form->input('full_day_sixth_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_sixth_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Sixth Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_day_sixth_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_day_sixth_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Sixth Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo '<div style="clear:both;" class="col-md-12"><strong><h4>Full Week Bonus</h4></strong></div>';
					
					echo $this->Form->input('full_week_order_slot', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_week_order_slot'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Week Threshold', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('full_week_order_slot_pay', array("class" => "form-control", 'type' => 'text',
                         'autocomplete' => 'off',
						 'value' => $records[0]['PayrollSetting']['full_week_order_slot_pay'],
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Week Threshold Pay', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo '<div style="clear:both;"></div>';
					echo '<div class="col-md-12">';
                    		echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-info custom-btn'
                    ));
                   
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-info custom-btn marLeft10',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/payrolls/settings'"
                    ));
                    echo '</div>';
                     
                    

                    
                    echo $this->form->end();
                    ?>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>

