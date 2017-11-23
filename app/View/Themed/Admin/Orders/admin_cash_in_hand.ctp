 
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
	<?php 
	if(isset($records) && !empty($records)){
		echo $this->html->link("Accept Money", array("controller" => "orders", "action" => "manager_accept_money", $records[0]['Order']['driver_id'],  "admin" => true), array("class" => "ajax_member btn btn-info custom-btn-index", "escape" => false)); 
	}
	
	
	
	?>
</div>

<div class="ajaxMessage clearDiv"></div>

					
<table class="table table-bordered table-striped datatable" id="table-2">
	<thead>
		<tr>
			<th>
				  <strong><?php echo   $url = $this->Paginator->sort('S.No.'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('total_amount'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('recived_amount'); ?></strong>
			 </th>
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('discount_amount'); ?></strong>
			 </th>
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('reason'); ?></strong>
			 </th>
			 
			
		</tr>
	</thead>
	
	<tbody>
			
		<?php
			if (!empty($records)) {
				foreach ($records as $k => $order) {
		?>
		<tr>
			<td>
				<?php echo ($k+1); ?>
			</td>
			<td> <?php echo $order['Order']['total_amount']; ?></td>
			<td> <?php echo $order['Order']['recived_amount']; ?></td>
			<td> <?php echo $order['Order']['discount_amount']; ?></td>
			<td> <?php echo $order['Order']['reason']; ?></td>
			
			
		</tr>
		<?php 	} 
			}
		?>
		
	</tbody>
</table>

<?php /*
<div class="row"> 
	<div class="col-xs-6 col-left">
		&nbsp;
	</div>
	<div class="col-xs-6 col-right">
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

*/ ?>


<!-- END EXAMPLE TABLE PORTLET-->

<script type="text/javascript">
	$( document ).ready(function() {
		$(".driverSelect").change(function(){
			var site_url	=	"<?php echo $this->base; ?>";
			var driverId =  $(this).val();
			var orderId =  $(this).attr('data-order-id');
			var message = "";
			
			$.ajax({
				type: 'post',
				data: {"driverId":driverId,"orderId":orderId},
				url: site_url+'/admin/orders/driverAssignToOrder',
				success: function (result) {
					
					//$(".alert").html("Driver Updated to order sucessfully");
					//$(".alert").show();
					
					message += '<div class="alert alert-success"><button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>Sucess: Order detail has been updated. </div>';
					
					$(".ajaxMessage").html(message);
					
					
					
				}
			});
			
		});
		
		
		
		
	});
	
</script>
