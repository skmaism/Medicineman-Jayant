<script> var site_url	=	"<?php echo $this->base; ?>";</script>

<h3>Add Category</h3>



<?php echo $this->Session->flash(); ?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
		
			
			<div class="panel-body">
				
				<div class="row">
	<?php
                    echo $this->Form->create('Category', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            'div' => array('class' => 'col-md-6 '),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					
									
					
					echo $this->Form->input('name', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Name <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('status', array('options' =>
                        array(
                            "Active" => "Active",
                            "Inactive" => "Inactive",
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
                        "admin/categories/'"
                    ));
                    echo '</div>';
                     
                    

                    
                    echo $this->form->end();
                    ?>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>

