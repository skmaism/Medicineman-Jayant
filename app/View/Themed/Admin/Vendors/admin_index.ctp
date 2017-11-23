     <!-- BEGIN PAGE HEADER-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script> var site_url	=	"<?php echo $this->base; ?>";</script>


<style>
.statusChange{cursor:pointer;}
.icon-edit{font-size:30px;text-decoration:none !important;}
</style>
<?php echo __('Send'); ?>
<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Vendor <small>List</small>
          </h3>
          <ul class="breadcrumb">
			<li><i class="icon-home"></i> 
				<?php echo $this->Html->link('Home', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>                        <i class="icon-angle-right"></i>
			</li>
			<li>View <?php echo __('Vendor'); ?>                    </li>
		</ul>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="row-fluid">
     <div class="span12">
          <?php echo $this->Session->flash(); ?>
		  
		  <div style="float:right;padding:5px;">
		
		</div>
<div class="portlet box grey">
		
     <div class="portlet-title">
          <h4><i class="icon-user"></i>Vendor List</h4>
		  <div class="actions">
				<?php echo $this->html->link("<i class=\"icon-plus\"></i> Add Vendor", array("controller" => "Vendors", "action" => "add", "admin" => true), array("class" => "btn blue", "escape" => false)); ?>
			</div>
          
     </div>
	 <?php //echo $this->Form->input('search', array('between'=>'<label for="search" class="main_search">Search</label><br>','label'=>false));
    //echo $this->Form->button('Search', array('class'=>'btn btn-success')); ?>
	
	  <?php /*echo $this->Form->create('search');?>
		<table>
		   <tr>
				<td>
				  <?php
				   $session=$this->Session->read('title');
				   $value=isset($session)?$session:'';
				   echo $this->form->input('title',array('value'=>$value));?>
			 </td>
		 </tr>
		 <tr>
			 <td>
			   <?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false))?>
		  </td>
		  <td>
			  <?php echo $this->Form->input('Reset',array('type'=>'submit','name'=>'reset','label'=>false))?>       </td>
		 </tr>
		</table>
	<?php echo $this->Form->end(); */?>
	
	<div class="row-fluid">
			  <div class="span6" style="padding-top:10px; padding-left:10px;">
				   <?php 
				   
				   echo $this->form->create("Vendor",array('url' => array('controller' => 'Vendors', 'action' => 'index'), 'type' => 'get'));
				   echo '<div class="span5">';
				   echo $this->form->input("keyword",array("class"=>"m-wrap span12","placeholder"=>"Search","value"=>$keyword,"label"=>false,"div"=>false));
				   echo '</div><div class="span5">';
					echo $this->Form->button('Search', array('type' => 'submit', 'class' => 'btn blue'));
					echo " &nbsp; ";
					echo $this->Form->button('Clear', array('type' => 'button', 'class' => 'btn blue','onclick'=>isset($this->params->query['keyword'])?"window.location.href='" . $this->webroot . "admin/Vendors/'":""));
					echo "</div>";
				   echo $this->form->end();
				   ?>
				   
				   
			  </div>
		</div>

     <div class="portlet-body" id="admin_table" data="News">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
               <thead>
                    <tr>
                        
                         <th>
                              <?php echo   $this->Paginator->sort('name'); ?>
                         </th>
                         
                         
						 <th>
                              <?php echo  $this->Paginator->sort('status'); ?>
                         </th>
                         
                         <th>
                              Action
                         </th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    if (!empty($records)) {
                         foreach ($records as $vendor) {
                              ?>
                              <tr class="odd gradeX" id="removeable_<?php echo $vendor['Vendor']['id']; ?>">
                                 
                                   <td class="uname_<?php echo $vendor['Vendor']['id']; ?>">
          <?php echo $vendor['Vendor']['name']; ?>
                                   </td>
                                    
								   
								    <td width="4%" id="adagencyStatus_<?php echo $vendor['Vendor']['id']; ?>">
									<?php if($vendor['Vendor']['status'] == 1){ ?>
											<img data-vendor-id="<?php echo $vendor['Vendor']['id']; ?>" class="statusChange" src="/grain_seeds/img/accept.png" height="25" width="25" />
									<?php }else{ ?>
											<img data-vendor-id="<?php echo $vendor['Vendor']['id']; ?>" class="statusChange" src="/grain_seeds/img/cancel.png" height="25" width="25" />  
									<?php } ?>
          
                                   </td>
										
									<td width="15%">
								   
								    <?php echo $this->html->link("", array("controller" => "Vendors", "action" => "edit", $vendor['Vendor']['id'], "admin" => true), array("class"=>"icon-edit","escape" => false,"label"=>false)); ?>
									


                                   </td>

                                   

                              </tr>
     <?php }
} else{ ?>
	<tr>
		<td colspan="3" style="text-align:center">
			There is no record to show
		</td>
	</tr>
	
<?php } ?>

               </tbody>
          </table>
		  <div class="pagination pagination-large" style="margin:0px !important;float:right;">
			<ul class="pagination">
					<?php
						echo $this->Paginator->first(__('First'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						echo $this->Paginator->prev(__('previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
						echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
						echo $this->Paginator->last(__('Last'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
					?>
				</ul>
			</div>
			<div style="clear:both;"></div>
     </div>
	  <!-- END DASHBOARD STATS -->
	  
	  <!-- END DASHBOARD STATS -->
		
</div>

     </div>
</div>

<script>
	$(document).on("click",".statusChange",function(e){
		var vendor_id = $(this).attr('data-vendor-id');
		var currentStauts = '';
			
			if($(this).attr('src') == '/grain_seeds/img/accept.png'){
				currentStauts = 1;
			}else{
				currentStauts = 0;
			}
			
			$.ajax({
				type: 'post',
				url: site_url+'/Vendors/changeStatus',
				data: {"vendor_id":vendor_id,"currentStauts":currentStauts},
				success: function (result) {
					$('#vendorStatus_'+vendor_id).html(result);				
					
				}
			});
			
			
	});	
</script>
<!-- END EXAMPLE TABLE PORTLET-->
