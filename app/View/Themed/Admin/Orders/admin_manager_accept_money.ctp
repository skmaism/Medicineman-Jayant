

<div class="" id="">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal ">
				<h4 class="modal-title ">Accept Money</h4>
			</div>
			
			<div class="modal-body">
				<div class="row modal-row">
				
					<div class="row">
                	<div class="col-xs-6 item-title text-left">Total Amount</div>
                    <div class="col-xs-6 item-title"><?php echo $cashInHandEntry['InHandRupees']['total_amount']; ?></div>
                   
                    </div>
                    <div class="hr-line"></div>
					
                	<div class="row">
                	<div class="col-xs-6 item-title text-left">In Hand Amount</div>
                    <div class="col-xs-6 item-title"><?php echo $cashInHandEntry['InHandRupees']['cash_in_hand']; ?></div>
                   
                    </div>
                    <div class="hr-line"></div>
                    
                    <div class="row">
                    <div class="col-xs-6 text-left">Received Amount</div>
                    <div class="col-xs-6">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="ReceivedAmount" placeholder="" type="text">
                                        </div>
                                    </div>
                                
                    </div>
                   	</div>
                    <div class="hr-line"></div>
                    
                    
                    
                    <div class="row">
                    <div class="col-xs-6 text-left">Remark</div>
                    <div class="col-xs-6">
                        		
                                    <div class="form-group">
                                       <div class="col-xs-6 col-md-12">
                                            <input class="form-control modal-input" id="Remark" placeholder="" type="text">
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
			var Remark =  $("#Remark").val();
			var message = "";			
			var CashInHandId = "<?php echo $cashInHandEntry['InHandRupees']['id']; ?>";
			
			
			
			$.ajax({
				type: 'post',
				data: {"ReceivedAmount":ReceivedAmount,"Remark":Remark,"CashInHandId":CashInHandId},
				url: site_url+'/admin/orders/ManagerUpdateMoney',
				success: function (result) {
					
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order detail has been updated. </div>';
					
					$(".ajaxMessage").html(message);
					
					$.colorbox.close();
					
					
					
				}
			});
			
		});
	});
	
</script>