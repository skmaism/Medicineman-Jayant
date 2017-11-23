<div class="" id="modal-1">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal">
				<h4 class="modal-title ">Add Client</h4>
			</div>
			
			<div class="modal-body">
				<div class="row modal-row">
                	<div class="col-md-12">
	<?php
                    echo $this->Form->create('User', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					
									
					echo '<div class="col-md-6">';
					echo $this->Form->input('name', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Name', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '</div>';
					
					
					echo '<div class="col-md-6">';
					echo $this->Form->input('phone', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Mobile', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '</div>';
					echo '<div class="col-md-6">';
					echo $this->Form->input('email', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Email', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo '</div>';
					echo '<div class="col-md-6">';
					echo $this->Form->input('status', array('options' =>
                        array(
                            "Active" => "Active",
                            "Inactive" => "Inactive",
                        ),
						"type" => "select",
						
                        "class" => "selectboxit marBottom10",
                        'label' => array('text' => 'Status'))
                    );
					echo '</div>';
					
					echo '<div style="clear:both;"></div>';
					
					
					echo '<div class="col-md-6">';	
					echo $this->Form->input('id_proof',
                                    array(
										'type' => 'file',
										"class" => "form-control file2 inline btn btn-primary marLeft10",
										'label'=>array('text'=>'User Id Proof','class'=>'')));
					
					echo '</div>';
					
					echo '<div>&nbsp; </div>';
					echo '<div class="ClientDetail clearDiv">';
						echo '<div class="padLeft15 padRight15 col-md-12">';
						echo '<h3>Shipping Information</h3>';
						echo '<hr/>'; 
						echo '</div>';
						echo '<div class="padLeft15 padRight15 col-md-12">';
					
						echo '<label class="">Address</label>';
						echo $this->Form->textarea('shipping_address', array('rows' => '5','class' => 'form-control marBottom10','escape' => false));
						
						echo '</div>';
						echo '<div class="col-md-6">';	
						echo $this->Form->input('shipping_state', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'State', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
						echo '</div>';
						
						echo '<div class="col-md-6">';						
						echo $this->Form->input('shipping_city', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'City', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
						echo '</div>';
						
						echo '<div class="col-md-6">';
						echo $this->Form->input('shipping_zip', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'Zip', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
						echo '</div>';
						
						
					
					echo '</div>';
					
                    
					echo $this->form->end();
                    ?>
				</div>
                    
                    
                </div>
                
			</div>
			
			<div class="modal-footer">
			
				<?php echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-green modal-btn'
                    ));
					
					echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-red',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/users/clients'"
                    ));
				?>
				
			</div>
		</div>
	</div>
</div>


		
		
			
			
				
				
				
		
		
		