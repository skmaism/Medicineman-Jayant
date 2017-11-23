
<style>
.error{color:red;}
</style>
<div class="" id="">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal ">
				<h4 class="modal-title ">Order Update</h4>
			</div>
			
			<div class="modal-body">
				<div class="row modal-row">
                	<div class="row">
                	<div class="col-xs-6 item-title text-left">Total Amount</div>
                    <div class="col-xs-6 item-title"><?php echo $order['Order']['total_amount']; ?></div>
                   
                    </div>
                    <div class="hr-line"></div>
                    
                    <div class="row">
                    <div class="col-xs-6 text-left">Received Amount</div>
                    <div class="col-xs-6">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="ReceivedAmount" placeholder="" type="text">
											<div class="error recievedAmountError"></div>
                                        </div>
										
                                    </div>
                                
                    </div>
					
                   	</div>
                    <div class="hr-line"></div>
                    
                    <div class="row">
                    <div class="col-xs-6 text-left">Discount Amount</div>
                    <div class="col-xs-6">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="DiscountAmount" placeholder="" type="text">
											<div class="error DiscountAmountError"></div>
                                        </div>
										
                                    </div>
                                
                    </div>
					
                   	</div>
                    <div class="hr-line"></div>
                    
                    <div class="row">
                    <div class="col-xs-6 text-left">Note</div>
                    <div class="col-xs-6">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="Note" placeholder="" type="text">
											<div class="error NoteError"></div>
                                        </div>
										
                                    </div>
                                
                    </div>
					
                   	</div>
                    
                  
                   
                    
                   
                   
                    
                    
                </div>
                
			</div>
			
			<div class="modal-footer">
				<button type="button" class="OrderUpdateButton btn btn-green modal-btn" data-order-id="<?php echo $orderId; ?>" data-dismiss="modal">Submit</button>
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$( document ).ready(function() {
		$(".OrderUpdateButton").click(function(){
			var site_url	=	"<?php echo $this->base; ?>";
			var ReceivedAmount =  $("#ReceivedAmount").val();
			var DiscountAmount =  $("#DiscountAmount").val();
			var orderId =  $(this).attr('data-order-id');
			var note =  $("#Note").val();
			var message = "";
			var ManagerId = "<?php echo $order['Order']['manager_id']; ?>";
			var DriverId = "<?php echo $order['Order']['driver_id']; ?>";
			
			var recievedAmountError = 0;
			var DiscountAmountError = 0;
			var NoteError = 0;
			
			if(ReceivedAmount == ''){
				$(".recievedAmountError").html('Please fill');
				recievedAmountError = 1;
			}else{
				$(".recievedAmountError").html('');
				recievedAmountError = 0;
			}		
			if(DiscountAmount != ''){
				
				if(note == ''){
					$(".NoteError").html('Please fill');
					NoteError = 1;
				}else{
					$(".NoteError").html('');
					NoteError = 0;
				}
				
				//$(".DiscountAmountError").html('Please fill');
				DiscountAmountError = 0;
			}else{
				//$(".DiscountAmountError").html('');
				NoteError = 0;
			}
			
			
			
			
			if(recievedAmountError == 0 && DiscountAmountError == 0 && NoteError == 0){
				$.ajax({
					type: 'post',
					data: {"ReceivedAmount":ReceivedAmount,"DiscountAmount":DiscountAmount,"note":note,"orderId":orderId,"ManagerId":ManagerId,"DriverId":DriverId},
					url: site_url+'/admin/orders/updateOrderByDriver',
					success: function (result) {
						
						message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order detail has been updated. </div>';
						
						$(".ajaxMessage").html(message);
						
						$.colorbox.close();
						
						
						
					}
				});
			}
			
			
		});
	});
	
</script>