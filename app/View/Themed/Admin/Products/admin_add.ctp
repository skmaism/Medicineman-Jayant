<script> var site_url	=	"<?php echo $this->base; ?>";</script>

<h3>Add Product</h3>



<?php echo $this->Session->flash(); ?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
		
			
			<div class="panel-body">
				
				<div class="row">
	<?php
                    echo $this->Form->create('Product', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            'div' => array('class' => 'col-md-6 '),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					
					$categoryOption['0'] =  "Please Select Category";
				   
				   $categoryOptionData = array_merge($categoryOption,$category);
					
					echo $this->Form->input('category_id', array('options' =>
                        $categoryOptionData,
						"type" => "select",
											
                        "class" => "selectboxit marBottom10",
                        'label' => array('text' => 'Category <span style="color:red">*</span>'))
                    );
									
					
					echo $this->Form->input('name', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Name <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo '<div class="padLeft15 padRight15 ">';
					
					echo '<label class="">Description</label>';
					echo $this->Form->textarea('description', array('rows' => '5','class' => 'form-control marBottom10','escape' => false));
					
					echo '</div>';
					
					echo $this->Form->input('image',
                                    array(
										'type' => 'file',
										"class" => "form-control file2 inline btn btn-primary marLeft10 marBottom10",
										'label'=>array('text'=>'Product photo','class'=>'')));
										
					echo $this->Form->input('customer_price', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Customer Price <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('employee_price', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Employee Price <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					
					
					echo $this->Form->input('quantity', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Quantity <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('min_alert', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Min Alert <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					
					
					
					echo $this->Form->input('unit_of_measurement', array('options' =>
                        array(
                           "GM" => "GM",
							"KG" => "KG",
                        ),
						"type" => "select",
						
                        "class" => "selectboxit marBottom10",
                        'label' => array('text' => 'Unit of Measurement'))
                    );
					echo '<div style="clear:both"></div>';
					
					echo $this->Form->input('status', array('options' =>
                        array(
                            "1" => "Active",
                            "0" => "Inactive",
                        ),
						"type" => "select",
						
                        "class" => "selectboxit marBottom10",
                        'label' => array('text' => 'Status'))
                    );
					
					echo '<div style="clear:both;"></div>';
					echo '<div class="col-md-12">';
                    		echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-info custom-btn'
                    ));
                   
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-info custom-btn marLeft10',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/products/'"
                    ));
                    echo '</div>';
                     
                    

                    
                    echo $this->form->end();
                    ?>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>

