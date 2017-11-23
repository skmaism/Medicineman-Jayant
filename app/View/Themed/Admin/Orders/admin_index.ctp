<?php $user = $this->Session->read("Auth.User"); 



?> 
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
<h3>Orders List</h3>

</div>
<div style="float:right;">
	<?php if($role == 1 || $role == 2 || $role == 4){ echo $this->html->link("<i class=\"icon-plus\"></i> Add Order", array("controller" => "orders", "action" => "add", "admin" => true), array("class" => "btn btn-info custom-btn-index", "escape" => false)); } ?>
</div>

<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px;">
				   <?php 
				   
				   echo $this->form->create("Orders",array('url' => array('controller' => 'orders', 'action' => 'index'), 'type' => 'get'));
				   echo '<div class="span5 filterdiv">';
				   echo $this->form->input("keyword",array("class"=>"form-control marBottom10","placeholder"=>"Search","value"=>$keyword,"label"=>false,"div"=>false));
				   echo '</div>';
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
				   <div class="filterdiv">

						<select name="status" class=" selectboxit selectboxit-order visible" data-order-id="<?php echo $order['Order']['id']; ?>" id="status" style="display: none;">
						<option value="" <?php if($_REQUEST['status']== '') { echo 'selected = "selected"'; } ?>>Select Status</option>
						<option value="0" <?php if($_REQUEST['status']== '0') { echo 'selected = "selected"'; } ?> >Pending</option>
						<option value="1" <?php if($_REQUEST['status']== '1') { echo 'selected = "selected"'; } ?> >Delivered</option>
						<option value="2" <?php if($_REQUEST['status']== '2') { echo 'selected = "selected"'; } ?> >Cancelled</option>
						</select>
						</div>
				<?php 
				   echo '<div class="span5 new-span5">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-info custom-btn-index'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/orders/'":""));
					echo "</div>";
				   echo $this->form->end();
				   ?>
				   
				   
			  </div>
		</div>
	<div class="table-responsive">				
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th>
				  <strong><?php echo   $url = $this->Paginator->sort('S.No.'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Order.id' , 'Order No'); ?></strong>
			 </th>
			 
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Customer.name' , 'Customer Name'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Customerdetail.shipping_address' , 'Address'); ?></strong>
			 </th>
			 
			 <?php if($role == 8){ ?>
			<th>
				  <strong style="color: #373e4a;"><?php echo "Inventory"; ?></strong>
			 </th>
			 <?php } ?>
			
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Order.total_amount' , 'Total Amount'); ?></strong>
			 </th>
			 
			
			<th>
				 <strong> <?php echo   $url = $this->Paginator->sort('Order.status' , 'Status'); ?></strong>
			 </th>
			 
			  <?php if($role == 2 || $role == 1){ ?>
				<th>
				<strong style="color: #373e4a;"> Assign To Driver</strong>
				</th>
				<?php } ?>
			 
			 <th>
				 <strong style="color: #373e4a;"> Action</strong>
			 </th>
		</tr>
	</thead>
	
	<tbody>
			
		<?php
			if (!empty($records)) {
				//echo '<pre>';print_r($records);die;
				foreach ($records as $k => $order) {
		?>
		<tr>
			<td width="5%">
				<?php echo ($k+1); ?>
			</td>
			<td>
				<?php echo $order['Order']['id']; ?>
			</td>
			<td>
				<?php echo $order['Customer']['name']; ?>
			</td>
			<td>
				<?php echo $order['Customerdetail']['shipping_address']; ?>
			</td>
			<?php if($role == 8){ ?>
			<td>
				<?php 
					$invnetory = 0;
					if(isset($order['OrderProduct']) && !empty($order['OrderProduct'])){
						
						foreach($order['OrderProduct'] as $k => $orderProduct){
							$invnetory = $invnetory + $orderProduct['quantity'];
						}
					}
					?>
					
					
					<a href="<?php echo $this->base; ?>/admin/orders/show_inventory/<?php echo $order['Order']['id']; ?>" class="ajax_member cboxElement"><?php echo $invnetory; ?></a>
					
					
					
					
					
			</td>
			<?php } ?>
			
			<td width="10%"> <?php echo $order['Order']['total_amount']; ?></td>
			
			
			
			<td width="20%">


				<div class="col-md-12">

				<select name="data[status]" class="statusSelect selectboxit selectboxit-status visible" data-order-id="<?php echo $order['Order']['id']; ?>" id="status" style="display: none;">
				<option value="0" <?php if($order['Order']['status']== 0) { echo 'selected = "selected"'; } ?> >Pending</option>
				<option value="1" <?php if($order['Order']['status']== 1) { echo 'selected = "selected"'; } ?> >Delivered</option>
				<option value="2" <?php if($order['Order']['status']== 2) { echo 'selected = "selected"'; } ?> >Cancelled</option>
				</select>
				</div>
			</td>
			
		<?php if($role == 2 || $role == 1){ ?>
			<td> 
			<div class="col-md-12">
			<?php if($order['Order']['status']!= 1) { ?>
			<select name="data[driver_id]" class="driverSelect selectboxit selectboxit-status visible" data-order-id="<?php echo $order['Order']['id']; ?>" id="driver_id" style="display: none;">
			<option value="0">Select Driver</option>
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
			<?php }else{ ?>
				&nbsp;
			<?php } ?>
			</div>
			</td>
			<?php } ?>
			
			<td>
			<?php if($role == 1 || $role == 2){ 

				echo $this->html->link('<i class="entypo-pencil"></i>
					Edit', array("controller" => "orders", "action" => "edit", $order['Order']['id'], "admin" => true), array("class"=>" btn btn-default btn-sm btn-icon icon-left","escape" => false)); 
				
			}
				
			?>
			<?php if($role == 1 || $role == 2){ 
				 
				 
				  echo $this->html->link('<i class="entypo-cancel"></i>
					Delete', array("controller" => "orders", "action" => "delete", $order['Order']['id'], "admin" => true),
          array('class'=>'btn btn-danger btn-sm btn-icon icon-left',"escape" => false,'confirm'=>'Are you sure you want to delete this Order?')); ?>
		  
				  <?php  } ?>
		  
		   <?php if($role == 8){ 
		   
		   echo '<span class="order_'.$order['Order']['id'].'">';
		  if($order['Order']['accept_inventory'] == 0){
		  
		  echo $this->html->link('<i class="entypo-check"></i>
					Accept order', array("controller" => "orders", "action" => "recieve_inventory", $order['Order']['id'], "admin" => true), array("class"=>" btn btn-default btn-sm btn-icon icon-left ajax_member","escape" => false));
		  
		  
		  }else if($order['Order']['accept_inventory'] == 1){
			  echo 'Accepted';
			  
		  }else if($order['Order']['accept_inventory'] == 2){
			  echo 'Declined';
			  
		  }
		  echo '</span>';
		  
		  echo $this->html->link('<i class="entypo-pencil"></i>
					Update order', array("controller" => "orders", "action" => "admin_update_order", $order['Order']['id'], "admin" => true), array("class"=>" btn btn-info btn-sm btn-icon icon-left ajax_member","escape" => false));
		  
		  echo $this->html->link('<i class="entypo-eye"></i>
					Detail', array("controller" => "orders", "action" => "edit", $order['Order']['id'], "admin" => true), array("class"=>"btn btn-default btn-sm btn-icon icon-left ","escape" => false));
		
		   }

		  ?>
			
				
			</td>
		</tr>
		<?php 	} 
			}else{?>
				<tr>
					<td colspan="8"><center>There is no record to show!</center></td>
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


<!-- END EXAMPLE TABLE PORTLET-->

<script type="text/javascript">
	$( document ).ready(function() {
		
		
		
		$(".statusSelect").change(function(){
			
			var site_url	=	"<?php echo $this->base; ?>";
			var status =  $(this).val();
			var orderId =  $(this).attr('data-order-id');
			var message = "";
			
			$.ajax({
				type: 'post',
				data: {"status":status,"orderId":orderId},
				url: site_url+'/admin/orders/changeOrderStatus',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order status has been updated. </div>';
					
					$(".ajaxMessage").html(message);
					
					
					
				}
			});
			
		});
		
		
		
		
	});
	
</script>
