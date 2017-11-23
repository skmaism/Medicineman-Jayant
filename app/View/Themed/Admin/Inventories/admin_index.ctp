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
<h3><?php echo  'Assigned Products To '.$records[0]['Driver']['name']; ?></h3>
</div>

<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px; padding-left:10px;">
				   <?php 
				   
				   echo $this->form->create("Inventories",array('url' => array('controller' => 'inventories', 'action' => 'index'), 'type' => 'get'));
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
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/inventories/'":""));
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
				  <strong><?php echo   $url = $this->Paginator->sort('date'); ?></strong>
			 </th>
			 
			 <th>
				  <strong><?php echo   $url = $this->Paginator->sort('product name'); ?></strong>
			 </th>
			  
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('quantity'); ?></strong>
			 </th>
			 
			  <th>
				  <strong><?php echo   $url = $this->Paginator->sort('price'); ?></strong>
			 </th>
			 
			 <th>
				  <strong style="color: #373e4a;"><?php echo   'Action'; ?></strong>
			 </th>
			
		</tr>
	</thead>
	
	<tbody>
		
		<?php
			if (!empty($records)) {
				foreach ($records as $k => $product) { //echo '<pre>'; print_r($product); exit;
		?>
		<tr>
			<td>
				<?php echo ($k+1); ?>
			</td>
			<td> <?php echo date("d-m-Y", strtotime($product['Inventory']['created'])); ?></td>
			<td> <?php echo $product['Product']['name']; ?></td>
			<td> <?php echo $product['Inventory']['quantity']; ?></td>
			<td> <?php echo ($product['Inventory']['quantity'] * $product['Product']['customer_price']); ?></td>			
			<td class="iventory_<?php echo $product['Inventory']['id'] ?> ">  
			<span class="inventory_<?php echo $product['Inventory']['id'] ?>">
			<?php if($product['Inventory']['accept_inventory'] == '' || $product['Inventory']['accept_inventory'] == 0){
								//echo $this->html->link("Accept Inventory", array("controller" => "inventories", "action" => "accept_inventory", $product['Inventory']['id'], "admin" => true),array('class'=>'','confirm'=>'Are you sure you want to accept this inventory?')); 
		    echo $this->html->link("Accept Inventory", array("controller" => "inventories", "action" => "recieve_inventory", $product['Inventory']['id'], "admin" => true), array("class"=>"ajax_member","escape" => false));
		  
			}else{
				if($product['Inventory']['accept_inventory'] == 1){echo 'Accepted';}else{echo 'Declined';}
			}
				
				?></span></td>
			
			
		</tr>
		<?php 	} 
			}else{?>
				<tr>
					<td colspan="6"><center>There is no record to show!</center></td>
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
