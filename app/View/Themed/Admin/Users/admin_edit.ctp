<script> var site_url	=	"<?php echo $this->base; ?>";</script>

<h3>Add User</h3>
<?php $user = $this->Session->read("Auth.User"); ?>


<?php echo $this->Session->flash(); ?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
		
			
			<div class="panel-body">
				
				<div class="row">
	<?php
                    echo $this->Form->create('User', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            'div' => array('class' => 'col-md-6 '),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					if($user['role_id'] != 2){
					echo $this->Form->input('role_id', array('options' =>
                        $roles,
						"type" => "select",
						
                        "class" => "selectboxit marBottom10",
                        'label' => array('text' => 'User Type'))
                    );					
					}else{
						echo "<input type='hidden' name='data[User][role_id]' value='8'>";
					}
					echo $this->Form->input('name', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Name', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('name_code', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Name Code', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('phone', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Mobile <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('email', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Email <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('username', array("class" => "form-control marBottom10", 'type' => 'text',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Username <span style="color:red">*</span>', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					echo $this->Form->input('password', array("class" => "form-control marBottom10", 'type' => 'password',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Password <span style="color:red">*</span>', 'class' => ''),
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
					
					echo $this->Form->input('image',
                                    array(
										'type' => 'file',
										"class" => "form-control file2 inline btn btn-primary marLeft10",
										'label'=>array('text'=>'User photo','class'=>'')));
										
					echo $this->Form->input('id_proof',
                                    array(
										'type' => 'file',
										"class" => "form-control file2 inline btn btn-primary marLeft10",
										'label'=>array('text'=>'User Id Proof','class'=>'')));
					
					echo '<div>&nbsp; </div>';
					echo '<div class="ClientDetail clearDiv hide">';
						echo '<div class="padLeft15 padRight15 col-md-12">';
						echo '<h3>Shipping Information</h3>';
						echo '<hr/>'; 
						echo '</div>';
						echo '<div class="padLeft15 padRight15 col-md-12">';
					
						echo '<label class="">Address</label>';
						echo $this->Form->textarea('shipping_address', array('rows' => '5','class' => 'form-control marBottom10','escape' => false));
						
						echo '</div>';
						echo '<div class="col-md-12">';	
						echo $this->Form->input('shipping_state', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'State', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
						echo '</div>';
						
						echo '<div class="col-md-12">';						
						echo $this->Form->input('shipping_city', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'City', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
						echo '</div>';
						
						echo '<div class="col-md-12">';
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
					
					echo '<div class="receptionistDetail clearDiv hide">';
						echo $this->Form->input('receptionist_per_call_rate', array("class" => "form-control marBottom10", 'type' => 'text',
							 'autocomplete' => 'off',
							'label' => array('text' => 'Per Call Rate', 'class' => ''),
							'error' => array(
								'attributes' => array('wrap' => 'span', 'class' => 'help-block')
							)
								)
						);
					echo '</div>';
					
					echo '<div class="col-md-12 clearDiv">';
                    		echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-info custom-btn'
                    ));
                   if($user['role_id'] != 2){
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-info custom-btn marLeft10',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/users/'"
                    ));
				   }else{
					  echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-info custom-btn marLeft10',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/users/drivers'"
                    ));  
				   }
                    echo '</div>';
					
					
					echo $this->Form->input('lat', array("class" => "form-control marBottom10", 'type' => 'hidden',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					echo $this->Form->input('long', array("class" => "form-control marBottom10", 'type' => 'hidden',
                         'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
                     
                    

                    
                    echo $this->form->end();
                    ?>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>


<script type="text/javascript">
	$( document ).ready(function() {
		$("#UserRoleId").change(function(){
			var role_id = $(this).val();
			if(role_id == 5){
				$(".ClientDetail").removeClass('hide');
			}else{
				$(".ClientDetail").addClass('hide');
			}
			
		});
		
		$("#UserRoleId").change(function(){
			var role_id = $(this).val();
			if(role_id == 4){
				$(".receptionistDetail").removeClass('hide');
			}else{
				$(".receptionistDetail").addClass('hide');
			}
			
		});
	});
	

      function addressInit() {
		  
		  

		var input = document.getElementById('UserShippingAddress');
		var autocomplete = new google.maps.places.Autocomplete(input);
		
		
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
			
			
			$('#UserLat').val(place.geometry.location.lat());
			$('#UserLong').val(place.geometry.location.lng());

        });
		
			
	}

		google.maps.event.addDomListener(window, 'load', addressInit);
		
		

    </script>
	

