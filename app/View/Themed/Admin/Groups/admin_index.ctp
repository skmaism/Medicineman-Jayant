<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Group Master<small>Group List</small>
					</h3>
					<?php echo $this->element('admin-breadcrumb',array('pageName'=>'Group'));?>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->


<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Group List
							</div>
							<div class="tools" style="float: right;">
								<a href="javascript:;" class="collapse"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
							<div class="actions">
							
						<?php echo $this->html->link("<i class=\"fa fa-plus\"></i> Add",array("controller"=>"groups","action"=>"add","admin"=>true),array("class"=>"btn blue","escape"=>false));?>
								
								<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
									<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<?php /*?><li>
										<?php echo $this->html->link("<i class=\"fa fa-pencil\"></i> Edit","javascript:void(0)",array("onclick"=>"editFunc();","escape"=>false));?>
										</li>
										<?php */ ?>
										
										<li>
										<?php echo $this->html->link("<i class=\"fa fa-trash-o\"></i> Delete","javascript:void(0)",array("onclick"=>"deleteAllFunc();","escape"=>false));?>
										</li>
										
										<li>
										<?php echo $this->html->link("<i class=\"fa fa-ban\"></i> Selected Inactive ","javascript:void(0)",array("onclick"=>"updateStatus('0');","escape"=>false));?>
										</li>
										<li>
										<?php echo $this->html->link("<i class=\"fa fa-check\"></i> Selected Active ","javascript:void(0)",array("onclick"=>"updateStatus(1);","escape"=>false));?>
										</li>
									
										
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body" id="admin_table" data="groups">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th style="width1:8px;">
									<!-- <input type="checkbox" id="checkedUnchecked" onclick="$('input[name*=\'selected_id\']').attr('checked', this.checked);" class="group-checkable" data-set="#sample_2 .checkboxes"/> -->
									<input type="checkbox" id="checkedUnchecked" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>
								<th>
									Group Name
								</th>
								<th>
									Created
								</th>
								<th>
									Status
								</th>
								
								<th>
									Action
								</th>
							</tr>
							</thead>
							<tbody>
							<?php if(!empty($records)){
							foreach($records as $data){
								?>
							<tr class="odd gradeX" id="removeable_<?php echo $data['Group']['id']; ?>">
								<td>
									<input type="checkbox" class="checkboxes" name="selected_id[]" value="<?php echo $data['Group']['id']; ?>"/>
								</td>
								<td class="title_<?php echo $data['Group']['id']; ?>">
									<?php echo $data['Group']['title']; echo $data['Group']['supper']?" <small>(Supper)</small>":""; ?>
								</td>
								<td>
									<?php echo $data['Group']['created']; ?>
								</td>
								<td class="status_<?php echo $data['Group']['id']; ?>">
								<?php if($data['Group']['status']==1){?>
									<span class="label label-sm label-success" ondblclick="changeCurrantStatus(<?php echo $data['Group']['id']; ?>,1);">
										Active
									</span>
									<?php } else{?>
									<span class="label label-sm label-danger" ondblclick="changeCurrantStatus(<?php echo $data['Group']['id']; ?>,0);">
										Inactive
									</span>
									<?php }?>
								</td>
								
								<td>
									
							<div class="btn-group">
					<button class="btn blue btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
									Action <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
										<?php echo $this->html->link("Edit",array("controller"=>"groups","action"=>"add",$data['Group']['id'],"admin"=>true),array("escape"=>false));?>
										</li>
										<li>
										<?php echo $this->html->link("Delete",array("controller"=>"groups","action"=>"delete",$data['Group']['id'],"admin"=>true),array("escape"=>false));?>
										</li>
										
									</ul>
								</div>	
									
								</td>
								
							</tr>
							<?php } } ?>
							
							</tbody>
							</table>
						</div>
					</div>
					
					<!-- END EXAMPLE TABLE PORTLET-->
