<!-- BEGIN PAGE HEADER-->
<div class="row">
     <div class="col-md-12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               CMS Page Managment <small>CMS Menus</small>
          </h3>
          <?php echo $this->element('admin-breadcrumb', array('pageName' => 'Cmspage')); ?>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
     <div class="col-md-12">
          <?php echo $this->Session->flash(); ?>
     </div>
</div>
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box grey">
     <div class="portlet-title">
          <div class="caption">
               <i class="fa fa-th-list"></i>CMS Page Master
          </div>

          <div class="actions">

               <?php echo $this->html->link("<i class=\"fa fa-plus\"></i> Add", array("controller" => "cmspages", "action" => "add", "admin" => true), array("class" => "btn blue", "escape" => false)); ?>

               <div class="btn-group">
                    <a class="btn green" href="#" data-toggle="dropdown">
                         <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                         <?php /* ?><li>
                           <?php echo $this->html->link("<i class=\"fa fa-pencil\"></i> Edit","javascript:void(0)",array("onclick"=>"editFunc();","escape"=>false));?>
                           </li>
                           <?php */ ?>

                         <li>
                              <?php echo $this->html->link("<i class=\"fa fa-trash-o\"></i> Delete", "javascript:void(0)", array("onclick" => "deleteAllFunc();", "escape" => false)); ?>
                         </li>

                         <li>
                              <?php echo $this->html->link("<i class=\"fa fa-ban\"></i> Selected Inactive ", "javascript:void(0)", array("onclick" => "updateStatus('0');", "escape" => false)); ?>
                         </li>
                         <li>
                              <?php echo $this->html->link("<i class=\"fa fa-check\"></i> Selected Active ", "javascript:void(0)", array("onclick" => "updateStatus(1);", "escape" => false)); ?>
                         </li>


                    </ul>
               </div>
          </div>
     </div>
     <div class="portlet-body" id="admin_table" data="cmspages">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
               <thead>
                    <tr>
                         <th style="width1:8px;">
                                 <!-- <input type="checkbox" id="checkedUnchecked" onclick="$('input[name*=\'user_id\']').attr('checked', this.checked);" class="group-checkable" data-set="#sample_2 .checkboxes"/> -->
                              <input type="checkbox" id="checkedUnchecked" class="group-checkable" data-set="#sample_2 .checkboxes"/>
                         </th>
                         <th>
                              Title
                         </th>

                         <th>
                              URL
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
                    <?php
                    if (!empty($records)) {
                         foreach ($records as $data) {
                              ?>
                              <tr class="odd gradeX" id="removeable_<?php echo $data['Cmspage']['id']; ?>">
                                   <td>
                                        <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?php echo $data['Cmspage']['id']; ?>"/>
                                   </td>
                                   <td>
                                        <?php echo $data['Cmspage']['title']; ?>
                                   </td>

                                   <td>
                                        <?php echo FULL_BASE_URL . router::url('/', false); ?><?php echo $data['Cmspage']['seo_url'] ? $data['Cmspage']['seo_url'] : $data['Cmspage']['id']; ?>
                                   </td>

                                   <td class="status_<?php echo $data['Cmspage']['id']; ?>">
                                        <?php if ($data['Cmspage']['status'] == 1) { ?>
                                             <span class="label label-sm label-success" ondblclick="changeCurrantStatus(<?php echo $data['Cmspage']['id']; ?>, 1);">
                                                  Active
                                             </span>
                                        <?php } else { ?>
                                             <span class="label label-sm label-danger" ondblclick="changeCurrantStatus(<?php echo $data['Cmspage']['id']; ?>, 0);">
                                                  Inactive
                                             </span>
                                        <?php } ?>
                                   </td>

                                   <td>

                                        <div class="btn-group">
                                             <button class="btn blue btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                                  Action <i class="fa fa-angle-down"></i>
                                             </button>
                                             <ul class="dropdown-menu" role="menu">
                                                  <li>
                                                       <?php echo $this->html->link("Edit", array("controller" => "cmspages", "action" => "add", $data['Cmspage']['id'], "admin" => true), array("escape" => false)); ?>
                                                  </li>
                                                  <li>
                                                       <?php echo $this->html->link("Delete", array("controller" => "cmspages", "action" => "delete", $data['Cmspage']['id'], "admin" => true), array("escape" => false)); ?>
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

<!-- END EXAMPLE TABLE PORTLET-->
