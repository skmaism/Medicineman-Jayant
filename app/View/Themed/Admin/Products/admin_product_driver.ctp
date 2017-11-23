     <!-- BEGIN PAGE HEADER-->
	 
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
<h3><?php echo '('.$records[0]['Product']['name'].') Assign To Drivers'; ?></h3>
</div>
<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px;">
				   <?php 
				   echo $this->form->create("Products",array('url' => array('controller' => 'products', 'action' => 'product_driver',$this->request->params['pass'][0]), 'type' => 'get'));
				   echo '<div class="span5 filterdiv">';
				   echo $this->form->input("keyword",array("class"=>"form-control marBottom10","placeholder"=>"Search","value"=>$keyword,"label"=>false,"div"=>false));
				   echo '</div><div class="span2 filterdiv">';
			  echo $this->form->input('date', array("class" => "form-control marBottom10 daterange active", 'type' => 'text',
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
				   echo '<div class="span5 ">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-info custom-btn-index'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/products/product_driver/".$this->request->params['pass'][0]."'":""));
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
				  <strong><?php echo   $url = $this->Paginator->sort('Inventory.created','Date'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Driver.name' , 'Name'); ?></strong>
			 </th>
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Driver.name_code' , 'Name Code'); ?></strong>
			 </th>
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Driver.phone' , 'Phone'); ?></strong>
			 </th>
			
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Inventory.quantity' , 'Quantity'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('price'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('Manager.name','Manager Name'); ?></strong>
			 </th>
			  
		</tr>
	</thead>
	
	<tbody>
			
		<?php
			if (!empty($records)) {
				
				$totalQuantity = 0;
				$totalPrice = 0;
				
				foreach ($records as $k => $user) {
					
				
					
		?>
		<tr>
			<td>
				<?php echo ($k+1); ?>
			</td>
			<td> <?php echo date("d-m-Y", strtotime($user['Inventory']['created'])); ?></td>
			<td> <?php echo $user['Driver']['name']; ?></td>
			<td> <?php echo $user['Driver']['name_code']; ?></td>
			<td> <?php echo $user['Driver']['phone']; ?></td>
			<td> <?php echo $user['Inventory']['quantity']; ?></td>
			<td> <?php echo ($user['Inventory']['quantity'] * $user['Product']['customer_price']); ?></td>
			<td> <?php echo $user['Manager']['name']; ?></td>
			
			
			
		</tr>
		<?php 	
				$totalQuantity = $totalQuantity + $user['Inventory']['quantity'];
				$totalPrice = $totalPrice + ($user['Inventory']['quantity'] * $user['Product']['customer_price']);
		
				} 
				
				
			
				if($keyword != '' || $_REQUEST['datefrom'] != '' || $_REQUEST['dateto'] != ''){ ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><strong>Total</strong></td>
					<td> <strong><?php echo $totalQuantity; ?></strong></td>
					<td><strong> <?php echo $totalPrice; ?></strong></td>
					<td>&nbsp;</td>
					
					
					
				</tr>
				
				<?php }
				
			}
		?>
		
		
		
	</tbody>
</table>
</div>
<div class="row"> 
	
	<div class="col-xs-6 col-left">
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
