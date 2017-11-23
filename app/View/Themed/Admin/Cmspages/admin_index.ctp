<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Manage Static pages <small>Static pages</small>
          </h3>
          <?php echo $this->element('admin-breadcrumb', array('pageName' => 'Cmspage')); ?>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <?php echo $this->Session->flash(); ?>
     
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box grey">
     <div class="portlet-title">
          <div class="caption">
               <h4><i class="icon-user"></i>Static pages</h4>
              
          </div>
          

        
     </div>
     <div class="portlet-body" id="admin_table" data="cmspages">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
               <thead>
                    <tr>
                        
                         <th>
                              Title
                         </th>

                         <th>
                              URL
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
                              <tr class="odd gradeX" id="removeable_<?php echo $data['Cmspage']['id']; ?>">
                                  
                                   <td>
                                        <?php echo $data['Cmspage']['title']; ?>
                                   </td>

                                   <td>
                                        <?php echo FULL_BASE_URL . router::url('/', false); ?><?php echo $data['Cmspage']['seo_url'] ? $data['Cmspage']['seo_url'] : $data['Cmspage']['id']; ?>
                                   </td>

                                   

                                   <td>

                                        <div class="btn-group">
                                             <button class="btn blue btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                  Action <i class="icon-angle-down"></i>
                                             </button>
                                             <ul class="dropdown-menu" role="menu">
                                                  <li>
                                                       <?php echo $this->html->link("Edit", array("controller" => "cmspages", "action" => "add", $data['Cmspage']['id'], "admin" => true), array("escape" => false)); ?>
                                                  </li>
                                                 
                                                  </li>

                                             </ul>
                                        </div>	

                                   </td>

                              </tr>
                         <?php }
                    }
                    ?>

               </tbody>
          </table>
     </div>
</div>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
