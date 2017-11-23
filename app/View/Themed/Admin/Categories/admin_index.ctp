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
<h3>Categories List</h3>
</div>
<div style="float:right;">
	<?php echo $this->html->link("<i class=\"icon-plus\"></i> Add Category", array("controller" => "categories", "action" => "add", "admin" => true), array("class" => "btn btn-info custom-btn-index", "escape" => false)); ?>
</div>
<div class="ajaxMessage clearDiv"></div>
<div class="row-fluid">
			  <div class="span6" style="padding-top:10px;">
				   <?php 
				   
				   echo $this->form->create("Categories",array('url' => array('controller' => 'categories', 'action' => 'index'), 'type' => 'get'));
				   echo '<div class="span5 filterdiv">';
				   echo $this->form->input("keyword",array("class"=>"form-control marBottom10","placeholder"=>"Search","value"=>$keyword,"label"=>false,"div"=>false));
				   echo '</div><div class="span5">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn btn-info custom-btn-index'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn btn-info custom-btn-index','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/categories/'":""));
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
				  <strong><?php echo   $url = $this->Paginator->sort('name'); ?></strong>
			 </th>
			<th>
				 <strong> <?php echo   $url = $this->Paginator->sort('status'); ?></strong>
			 </th>
			 
			 
			 <th>
				 <strong style="color: #373e4a;"> Action</strong>
			 </th>
		</tr>
	</thead>
	
	<tbody>
			
		<?php
			if (!empty($records)) {
				foreach ($records as $k => $category) {
		?>
		<tr>
			<td>
				<?php echo ($k+1); ?>
			</td>
			<td> <?php echo $category['Category']['name']; ?></td>
			<td> <?php echo $category['Category']['status']; ?></td>
			
			<td>
				
			
				 <?php echo $this->html->link('<i class="entypo-pencil"></i>
					Edit', array("controller" => "categories", "action" => "edit", $category['Category']['id'], "admin" => true), array("class"=>"btn btn-default btn-sm btn-icon icon-left","escape" => false)); ?>
				 
				 
				
				 
				  <?php echo $this->html->link('<i class="entypo-cancel"></i>
					Delete', array("controller" => "categories", "action" => "delete", $category['Category']['id'], "admin" => true),
          array("class"=>"btn btn-danger btn-sm btn-icon icon-left","escape" => false,"confirm"=>"Are you sure you want to delete this user?")); ?>
				
				
			</td>
		</tr>
		<?php 	} 
			}else{?>
				<tr>
					<td colspan="4"><center>There is no record to show!</center></td>
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
