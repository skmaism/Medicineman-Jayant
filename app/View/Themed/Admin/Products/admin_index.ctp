     <!-- BEGIN PAGE HEADER-->
	 
<style>
.statusChange{cursor:pointer;}
.icon-edit, .icon-trash{font-size:30px;text-decoration:none !important;margin-right:5px;}

.minQuantity{border-color:red};
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
<h3>Products List</h3>
</div>
<div style="float:right;">
	<?php echo $this->html->link("<i class=\"icon-plus\"></i> Add Product", array("controller" => "products", "action" => "add", "admin" => true), array("class" => "btn btn-info custom-btn-index", "escape" => false)); ?>
</div>
<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px;">
				   <?php 
				   
				   echo $this->form->create("Products",array('url' => array('controller' => 'products', 'action' => 'index'), 'type' => 'get'));
				   echo '<div class="span5 filterdiv">';
				   echo $this->form->input("keyword",array("class"=>"form-control marBottom10","placeholder"=>"Search","value"=>$keyword,"label"=>false,"div"=>false));
				   echo '</div><div class="span5">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-info custom-btn-index'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/products/'":""));
					echo "</div>";
				   echo $this->form->end();
				   ?>
				   
				   
			  </div>
		</div>
<div class="table-responsive">
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th width="5%">
				  <strong><?php echo   $url = $this->Paginator->sort('S.No.'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Image'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('name'); ?></strong>
			 </th>
			 
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Product.customer_price' ,'Customer Price'); ?></strong>
			 </th>
			<th>
				 <strong> <?php echo   $url = $this->Paginator->sort('status'); ?></strong>
			 </th>
			 <?php if($role == 2 || $role == 1){ ?>
				 <th>
					 <strong style="color: #373e4a;">Assign To Driver</strong>
				 </th>
			 <?php } ?>
			 
			 <th>
				 <strong style="color: #373e4a;">Action</strong>
			 </th>
		</tr>
	</thead>
	
	<tbody>
			
		<?php
			if (!empty($records)) {
				foreach ($records as $k => $product) {
		?>
		<tr>
			<td width="5%">
				<?php echo ($k+1); ?>
			</td>
			<td width="10%"> 
				<?php if(!empty($product['Product']['image'])){ ?>
					<img src="<?php echo $this->base.$product['Product']['image']; ?>" height="75" width="75">
				<?php }else{ ?>
					<img src="<?php echo $this->base.'/img/no_image.jpg'; ?>" height="75" width="75">
				<?php } ?>
				
			</td>
			<td width="10%"> <?php echo $product['Product']['name']; ?></td>
			<td width="10%"> <?php echo $product['Product']['customer_price']; ?></td>
			<td width="10%"> <?php if($product['Product']['status'] == 1){ echo 'Active'; }else if($product['Product']['status'] == 0){ echo 'Inactive'; } ?></td>
			
			<?php if($role == 2 || $role == 1){ ?>
				 <td width="40%"> 	
					<div class="col-md-5">
					
					<select name="data[driver_id]" class="driverSelect selectboxit visible" id="driver_id_<?php echo $product['Product']['id']; ?>" style="display: none;">
						<option value="">Select Driver</option>
						<?php if(isset($drivers) && !empty($drivers)){
								foreach($drivers as $key => $driver){
								
								$selected = "";
								if(isset($order['Order']['driver_id']) && !empty($order['Order']['driver_id']) && $order['Order']['driver_id'] == $driver['User']['id']){
									$selected = 'selected = "selected"';
								}
								
						?>
							<option <?php echo $selected; ?> value="<?php echo $driver['User']['id']; ?>"><?php echo $driver['User']['name']; ?></option>
						<?php 
						
								}
							} 
						
						?>
						
					</select>
					<div class="help-block driverError_<?php echo $product['Product']['id'];?>"></div>
					</div>
					<div class="col-md-5">
					<input class="<?php if($product['Product']['effect_quantity_on_assign']<$product['Product']['min_alert']){echo 'minQuantity';} ?>" name="quantity" class="form-control marBottom10" autocomplete="off" value="" placeholder="Left Quantity : <?php echo $product['Product']['effect_quantity_on_assign'];?>" type="text" id="quantity_<?php echo $product['Product']['id']; ?>">
					<div class="help-block quantityError_<?php echo $product['Product']['id'];?>"></div>
					<input type="hidden" id="left_quan_<?php echo $product['Product']['id'];?>" value="<?php echo $product['Product']['effect_quantity_on_assign'];?>">
					<input type="hidden" id="manager_id_<?php echo $product['Product']['id'];?>" value="<?php echo $id;?>">
					</div>
					<div class="col-md-1">
					<button type="button" class="btn btn-success assigndriver" data-id="<?php echo $product['Product']['id'];?>" data-total-quantity="<?php echo $product['Product']['quantity'];?>"> <i class="entypo-right"></i> </button>
					</div>
				 </td>
			 <?php } ?>
			<td width="25%">
			
				 <?php echo $this->html->link('<i class="entypo-pencil"></i>
					Edit', array("controller" => "products", "action" => "edit", $product['Product']['id'], "admin" => true), array("class"=>" btn btn-default btn-sm btn-icon icon-left","escape" => false)); ?>
				
				 
				  <?php echo $this->html->link('<i class="entypo-cancel"></i>
					Delete', array("controller" => "products", "action" => "delete", $product['Product']['id'], "admin" => true),
          array('class'=>'btn btn-danger btn-sm btn-icon icon-left',"escape" => false,'confirm'=>'Are you sure you want to delete this product?')); ?>
				
				
				<?php echo $this->html->link('<i class="entypo-eye"></i>
					Assign List', array("controller" => "products", "action" => "product_driver", $product['Product']['id'], "admin" => true), array("class"=>" btn btn-info btn-sm btn-icon icon-left","escape" => false)); ?>
				
			</td>
		</tr>
		<?php 	} 
			}else{?>
				<tr>
					<td colspan="7"><center>There is no record to show!</center></td>
				</tr>
			<?php }
		?>
		
	</tbody>
</table>
</div>

<div class="row"> 
	
	<div class="col-xs-12 col-left">
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

<script type="text/javascript">
	$( document ).ready(function() {
		$(".assigndriver").click(function(){
			
			var site_url	=	"<?php echo $this->base; ?>";
			var productId = $(this).attr("data-id");
			$(".quantityError_"+productId).html('');
			$(".driverError_"+productId).html('');
			var quantity_left = $("#left_quan_"+productId).val();
			var driverId =  $("#driver_id_"+productId).val();
			var quantity =  $("#quantity_"+productId).val();
			var manager_id =  $("#manager_id_"+productId).val();
			var message = "";
			var error = 0;
			//alert(quantity_left);
			if(quantity == ''){
				$(".quantityError_"+productId).html('Please enter product quantity');
				error = 1;
			}else{
				if(quantity_left !=0 ){
					if(!(quantity.match(/^\d+$/))){
						$(".quantityError_"+productId).html('Please enter valid quantity');
						error = 1;
					}
					else if(parseInt(quantity_left) < parseInt(quantity)){
						$(".quantityError_"+productId).html('You cross the maximum quantity, available quantity : '+quantity_left);
						error = 1;
					}
				}else{
					$(".quantityError_"+productId).html('Out of stock');
					error = 1;
				}
			}
			if(driverId == ''){
				$(".driverError_"+productId).html('Please select driver to assign product');
				error = 1;
			}
			if(error == 1){
				return false;
			}else{
				var availableQuant = quantity_left-quantity;
				$.ajax({
				type: 'post',
				data: {"driverId":driverId,"quantity":quantity,"productId":productId,"availableQuant":availableQuant,"manager_id":manager_id},
				url: site_url+'/admin/products/driverAssignToProduct',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Product assign to driver. </div>';
					$('.ajaxMessage').show();
					$("#quantity_"+productId).attr("placeholder", "Left Quantity : "+availableQuant);
					$('#driver_id_'+productId+'SelectBoxItText').html("Select Driver");
					$('#driver_id_'+productId+'SelectBoxItText').attr("data-val", "");
					$("#driver_id_"+productId+" option:eq()").prop('selected', true);
					$("#quantity_"+productId).val('');
					$("#left_quan").val(availableQuant);
					$(".ajaxMessage").html(message);
					
					setTimeout(function() {
						$('.ajaxMessage').fadeOut('fast');
					}, 3000);
					
				}
			});
			}
			
		});
		
		
		
		
	});
	
</script>


<!-- END EXAMPLE TABLE PORTLET-->
