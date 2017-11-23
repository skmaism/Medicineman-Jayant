
<div class="" id="">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal ">
				<h4 class="modal-title ">Order Alert</h4>
			</div>
			
			<div class="modal-body">
				<div class="row modal-row">
                	<div class="row">
                	<div class="col-xs-4 item-title text-left">Product Name</div>
                    <div class="col-xs-4 item-title">Quantity</div>
                    <div class="col-xs-4 item-title">Amount</div>
                    </div>
                    <div class="hr-line"></div>
                    
					<?php if(isset($ProductArray) && !empty($ProductArray)){
						
						
						
						foreach($ProductArray as $key =>  $product){
								
					?>	
							<div class="row">
							<div class="col-xs-4 text-left"><?php echo $product['productName']; ?></div>
							<div class="col-xs-4"><?php echo $product['quantity']; ?></div>
							<div class="col-xs-4"><?php echo $product['price']; ?></div>
							</div>
							<div class="hr-line"></div>
					<?php 		
							
						}
					}
                    ?>
                    
                    
                    
                     <div class="row col-md-12">
                    <div class="col-xs-4 text-left">&nbsp;</div>
                    <div class="col-xs-4 item-title">Total Amount</div>
                    <div class="col-xs-4 item-title"><?php 
					$lastKey = end(array_keys($ProductArray));
					
					echo $ProductArray[$lastKey]['Total']; ?></div>
                    </div>
                   
                    
                    
                </div>
				<div class="hr-line"></div>
				<div class="row showreasondiv">
                    <div class="col-xs-2 text-left">Reason</div>
                    <div class="col-xs-10">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="reason" placeholder="" type="text">
											<div class="help-block reasonError"></div>
                                        </div>
										
                                    </div>
                                
                    </div>
					
                   	</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" data-order-id="<?php echo $orderId; ?>" class="InventoryAccept btn btn-green modal-btn" data-dismiss="modal">Accept</button>
				<button type="button" data-order-id="<?php echo $orderId; ?>" class="showinput btn btn-red" data-dismiss="modal" id="decinput">Declined</button>
				<button type="button" data-order-id="<?php echo $orderId; ?>" class="InventoryDeclined btn btn-red" data-dismiss="modal" id="decsubmit">Declined</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$( document ).ready(function() {
		$('.showreasondiv').hide();
		$('#decsubmit').hide();
		$(".showinput").click(function(){
			$('.showreasondiv').show();
			$('#decsubmit').show();
			$('#decinput').hide();
		});
		
		
		$(".InventoryAccept").click(function(){
			
			
			var site_url	=	"<?php echo $this->base; ?>";
			var orderId =  $(this).attr('data-order-id');
			var InventoryAccept = 1;
			var message = "";
			var TotalAmount = "<?php echo $ProductArray[$lastKey]['Total']; ?>";
			var ManagerId = "<?php echo $order['Order']['manager_id']; ?>";
			var DriverId = "<?php echo $order['Order']['driver_id']; ?>";
			var decreason = '';
			$.ajax({
				type: 'post',
				data: {"InventoryAccept":InventoryAccept,"orderId":orderId,"TotalAmount":TotalAmount,"ManagerId":ManagerId,"DriverId":DriverId,"decreason":decreason},
				url: site_url+'/admin/orders/inventoryUpdate',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order has been accepted. </div>';
					
					
					
					
					$(".order_"+orderId).html('Accepted / ');
					
					$(".ajaxMessage").html(message);
					
					$.colorbox.close();
					
					
					
				}
			});
		});
		
		$(".InventoryDeclined").click(function(){
			$('.reasonError').html('');
			var site_url	=	"<?php echo $this->base; ?>";
			var orderId =  $(this).attr('data-order-id');
			var InventoryAccept = 2;
			var message = "";
			var TotalAmount = 0;
			var ManagerId = "<?php echo $order['Order']['manager_id']; ?>";
			var DriverId = "<?php echo $order['Order']['driver_id']; ?>";
			var decreason = $('#reason').val();
			if(decreason == ''){
				$('.reasonError').html('Please fill the reason box');
				return false;
			}
			$.ajax({
				type: 'post',
				data: {"InventoryAccept":InventoryAccept,"orderId":orderId ,"TotalAmount":TotalAmount,"ManagerId":ManagerId,"DriverId":DriverId,"decreason":decreason},
				url: site_url+'/admin/orders/inventoryUpdate',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order has been declined. </div>';
					
					$(".order_"+orderId).html('Declined / ');
					$(".ajaxMessage").html(message);
					
					$.colorbox.close();
					
					
					
				}
			});
		});
		
		
	});
	
</script>