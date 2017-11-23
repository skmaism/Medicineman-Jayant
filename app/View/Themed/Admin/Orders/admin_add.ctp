
<script> var site_url	=	"<?php echo $this->base; ?>";</script>
<script>
$(document).ready(function() {
	
   
	/* code for muliinput box of tag */
	
	var max_fields_tag      = 10; //maximum input boxes allowed
    var wrapper_tag          = $(".input_fields_wrap_tag"); //Fields wrapper
    var add_button_tag       = $(".add_field_button_tag"); //Add button ID
   
    var x = 1; //initlal text box count
	
	
    $(add_button_tag ).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields_tag ){ //max input box allowed
            x++; //text box increment
			
			var content = "";
			
			content += '<div class="clearDiv productDiv"></div>';
			content += '<div class="productDiv" style="margin:5px 0 5px 0">';
			content += '<div class="col-md-12 add-more-pad input-right">';
			
			content += '<div class="col-md-4 input-right input-left">';
			content += '<a class="btn btn-default btn-select">';
			content += '<input type="hidden" class="btn-select-input" id="" name="data[Product][product_id][]" value="" />';
			content += '<span class="btn-select-value">Select a product</span>';
			content += '<span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>';
			content += '<ul>';
		
						<?php if(isset($Products) && !empty($Products)){
								foreach($Products as $k => $product){									
								
						?>
									
											
										content += '<li data-product-id="<?php echo $k; ?>"><?php echo $product; ?></li>';
										
						<?php 	}
							}
						?>
									content += '</ul>';
						content += '</a>';
						
						
						
						content += '</div>';
						
			content += '<div class="col-md-4 input-right r-padding"><div class="input text required"><input type="input" name="data[Product][quantity][]" placeholder="Quantity" class="form-control marBottom10" style=""></div></div>';
			content += '<div class="col-md-2"><button type="submit" class="remove_field_tag btn remove-btn-order custom-btn-index ">Remove</button></div>';
			content += '</div>';
			
            $(wrapper_tag ).append(content); //add input box
			
			
			
			
			
			
        }
    });
   
    $(wrapper_tag ).on("click",".remove_field_tag ", function(e){ //user click on remove text
	    e.preventDefault(); $(this).closest('.productDiv').remove(); x--;
    })
	
	

	function removeTag(tag_id){
	
			var r=confirm("Are you sure you want to delete this tag?")
			if(r==true){
			 
			 var site_url	=	"<?php echo $this->base; ?>";
		 
			$.ajax({
				url:site_url+"/projects/deleteTag",
				type:'post',
				
				data: {tag_id: tag_id},
				success:function(result){
				
					if(result == 'successfull'){
						$('#div_'+tag_id).remove();
						
					}
			}}); 
			}else{
			
			return false;
			
			}
	}
		
		
});	

</script>

<h3>Add Order</h3>



<?php echo $this->Session->flash(); ?>
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
		
			
			<div class="panel-body">
				
				<div class="row">
	<?php
                    echo $this->Form->create('Order', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-horizontal',
                            'div' => array('class' => 'col-md-6 '),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					
					
				   
					echo $this->Form->input('c_id', array('options' =>
                        $client,
						"type" => "select",
						"empty"=>"Please Select",				
                        "class" => "selectboxit selectboxit-order marBottom10",
                        'label' => array('text' => 'Client'))
                    );
					echo $this->Form->input('e_id', array('options' =>
                        $employee,
						"type" => "select",
						"empty"=>"Please Select",					
                        "class" => "selectboxit selectboxit-order marBottom10",
                        'label' => array('text' => 'Employee'))
                    );
					echo '<div style="clear:both;"></div>';
					
					echo '<div class="col-md-12 input_fields_wrap_tag marTop10">';
					echo '<button type="submit" class="add_field_button_tag btn custom-btn-index ">Add More</button>';
					echo '<div style="margin:5px 0 5px 0">';
					
					?>
						<div class="col-md-4 input-right">
						<!-- vipin  -->
						
						
						<a class="btn btn-default btn-select"> 
										<input type="hidden" class="btn-select-input" id="" name="data[Product][product_id][]" value="" />
										<span class="btn-select-value">Select a product</span>
										<span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
										<ul>
										
						<?php if(isset($Products) && !empty($Products)){
								foreach($Products as $k => $product){									
								
						?>
									
											
											<li data-product-id="<?php echo $k; ?>"><?php echo $product; ?></li>
										
						<?php 	}
							}
						?>
										</ul>
						</a>
						
						<!-- end vipin  -->
						
						</div>
						
						<div class="col-md-4 input-right r-padding">
							<div class="input text required">
								<input type="input" name="data[Product][quantity][]" placeholder="Quantity" class="form-control marBottom10" style="">
							</div>
						</div>
						
					<?php
					echo '</div>';
					
					echo '</div>';
					
					echo '<div style="clear:both;"></div>';
					echo '<div class="col-md-12">';
                    		echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-info custom-btn'
                    ));
                   
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn btn-info custom-btn marLeft10',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/orders/'"
                    ));
                    echo '</div>';
                     
                    

                    
                    echo $this->form->end();
                    ?>
				</div>
				
			</div>
		
		</div>
	
	</div>
</div>
<script>
$('document').ready(function(){
	$("#OrderCId").change(function(){
		$('#OrderEIdSelectBoxItText').html("Please Select");
		$('#OrderEIdSelectBoxItText').attr("data-val", "");
		$("#OrderEId option:eq()").prop('selected', true);
	});
	$("#OrderEId").change(function(){
		$('#OrderCIdSelectBoxItText').html("Please Select");
		$('#OrderCIdSelectBoxItText').attr("data-val", "");
		$("#OrderCId option:eq()").prop('selected', true);
	});
});
</script>
