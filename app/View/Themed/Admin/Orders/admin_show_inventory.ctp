
<div class="" id="">
	<div class="">
		<div class="modal-content">
			
			<div class="modal-header order-modal ">
				<h4 class="modal-title ">Inventory</h4>
			</div>
			
			<div class="modal-body">
				<div class="row modal-row">
                	<div class="row">
                	<div class="col-xs-6 item-title text-left">Product</div>
                    <div class="col-xs-6 item-title">Quantity</div>
                    </div>
                    <div class="hr-line"></div>
                    
					<?php if(isset($ProductArray) && !empty($ProductArray)){
						
						
						
						foreach($ProductArray as $key =>  $product){
								
					?>	
							<div class="row">
							<div class="col-xs-6 text-left"><?php echo $product['productName']; ?></div>
							<div class="col-xs-6"><?php echo $product['quantity']; ?></div>
							</div>
							<div class="hr-line"></div>
					<?php 		
							
						}
					}
                    ?>
                    
                    
                    
                     
                   
                    
                    
                </div>
				
			
			</div>
			
			
		</div>
	</div>
</div>
