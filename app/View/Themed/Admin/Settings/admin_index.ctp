<!-- BEGIN PAGE HEADER-->
<style>
.statusChange{cursor:pointer;}
.icon-edit{font-size:30px;text-decoration:none !important;}
</style>
<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Autocontrol Settings
          </h3>
          <ul class="breadcrumb">
			<li><i class="icon-home"></i> 
				<?php echo $this->Html->link('Home', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>                        <i class="icon-angle-right"></i>
			</li>
			<li>View <?php echo __('Setting'); ?>                    </li>
		</ul>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN EXAMPLE TABLE PORTLET-->

<div class="row-fluid">
     <div class="span12">
          <?php echo $this->Session->flash(); ?>
          <div class="portlet box grey">
               <div class="portlet-title">
                    <h4><i class="icon-user"></i>Settings</h4>

                    <div class="actions">

                        

                        
                    </div>
               </div>
               <div class="portlet-body" id="admin_table" data="settings">
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                         <thead>
                              <tr>
                                  
                                   <th>
                                        Title
                                   </th>

                                   <th>
                                        Owner
                                   </th>

                                   <th>
                                        Email
                                   </th>



                                   <th>
                                        Action
                                   </th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              if (!empty($records)) {
                                   foreach ($records as $data) {
                                        ?>
                                        <tr class="odd gradeX" id="removeable_<?php echo $data['Setting']['id']; ?>">
                                            
                                             <td>
                                                  <?php
                                                  echo $data['Setting']['title'];
                                                  if ($data['Setting']['default'])
                                                       echo " <strong>( Default )</strong>";
                                                  ?>
                                             </td>

                                             <td>
          <?php echo $data['Setting']['owner']; ?>
                                             </td>

                                             <td>
          <?php echo $data['Setting']['email']; ?>
                                             </td>



                                             <td>

												  
												  <?php echo $this->html->link("", array("controller" => "settings", "action" => "add", $data['Setting']['id'], "admin" => true), array("class"=>"icon-edit","escape" => false)); ?>

                                             </td>

                                        </tr>
     <?php }
} ?>

                         </tbody>
                    </table>
               </div>
          </div>
     </div></div>
<!-- END EXAMPLE TABLE PORTLET-->
