
<div class="" id="">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal ">
				<h4 class="modal-title ">Inventory Alert</h4>
			</div>
			
			<div class="modal-body showreasondiv">
				<div class="row ">
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
				<button type="button" data-order-id="<?php echo $inventory['Inventory']['id']; ?>" class="InventoryAccept btn btn-green modal-btn" data-dismiss="modal">Accept</button>
				<button type="button" data-order-id="<?php echo $inventory['Inventory']['id']; ?>" class="showinput btn btn-red" data-dismiss="modal" id="decinput">Declined</button>
				<button type="button" data-order-id="<?php echo $inventory['Inventory']['id']; ?>" class="InventoryDeclined btn btn-red" data-dismiss="modal" id="decsubmit">Declined</button>
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
			var inventoryId =  $(this).attr('data-order-id');
			var InventoryAccept = 1;
			var message = "";
			var ManagerId = "<?php echo $inventory['Inventory']['manager_id']; ?>";
			var quantity = "<?php echo $inventory['Inventory']['quantity']; ?>";
			var DriverId = "<?php echo $inventory['Inventory']['driver_id']; ?>";
			var decreason = '';//alert();
			$.ajax({
				type: 'post',
				data: {"InventoryAccept":InventoryAccept,"inventoryId":inventoryId,"ManagerId":ManagerId,"DriverId":DriverId,"decreason":decreason,"quantity":quantity},
				url: site_url+'/admin/inventories/inventoryUpdate',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Inventory has been accepted. </div>';
					
					$(".inventory_"+inventoryId).html('Accepted');
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
			var ManagerId = "<?php echo $inventory['Inventory']['manager_id']; ?>";
			var quantity = "<?php echo $inventory['Inventory']['quantity']; ?>";
			var DriverId = "<?php echo $inventory['Inventory']['driver_id']; ?>";
			var decreason = $('#reason').val();
			if(decreason == ''){
				$('.reasonError').html('Please fill the reason box');
				return false;
			}
			$.ajax({
				type: 'post',
				data: {"InventoryAccept":InventoryAccept,"inventoryId":orderId ,"TotalAmount":TotalAmount,"ManagerId":ManagerId,"DriverId":DriverId,"decreason":decreason,"quantity":quantity},
				url: site_url+'/admin/inventories/inventoryUpdate',
				success: function (result) {
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Inventory has been declined. </div>';
					
					$(".inventory_"+orderId).html('Declined');
					$(".ajaxMessage").html(message);
					
					$.colorbox.close();
					
					
					
				}
			});
		});
		
		
	});
	
</script>