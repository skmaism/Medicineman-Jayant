<!-- BEGIN PAGE HEADER-->
<div class="row">
     <div class="col-md-12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               CMS Page Managment <small>CMS Menus</small>
          </h3>
          <?php echo $this->element('admin-breadcrumb', array('pageName' => 'Menu')); ?>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box grey">
     <div class="portlet-title">
          <div class="caption">
               <i class="fa fa-th-list"></i>Menus Master
          </div>

          <div class="actions">

               <?php echo $this->html->link("<i class=\"fa fa-plus\"></i> Add", array("controller" => "menus", "action" => "add", "admin" => true), array("class" => "btn blue", "escape" => false)); ?>

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
     <div class="portlet-body" id="admin_table" data="menus">
          <table class="table table-striped table-bordered table-hover" id="sample_2">
               <thead>
                    <tr>
                         <th style="width1:8px;">
                                 <!-- <input type="checkbox" id="checkedUnchecked" onclick="$('input[name*=\'user_id\']').attr('checked', this.checked);" class="group-checkable" data-set="#sample_2 .checkboxes"/> -->
                              <input type="checkbox" id="checkedUnchecked" class="group-checkable" data-set="#sample_2 .checkboxes"/>
                         </th>
                         <th>
                              Parent
                         </th>
                         <th>
                              Title
                         </th>

<th>
									Menu position
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
                              <tr class="odd gradeX" id="removeable_<?php echo $data['Menu']['id']; ?>">
                                   <td>
                                        <input type="checkbox" class="checkboxes" name="selected_id[]" value="<?php echo $data['Menu']['id']; ?>"/>
                                   </td>


                                   <td>
                                        <?php
                                        //echo $data['Menu']['title']; 
                                        //$treePath = $this->Menu->getPath(12);
                                        echo $this->element('parentbradcrum', array("id" => $data['Menu']['id']));
                                        ?>
                                   </td>

                                   <td>
          <?php echo $data['Menu']['p_name']; ?>
                                   </td>


<td>
									<?php	if($data['Menu']['header_menu']) 
											echo "Header menu<br>"; 
											if($data['Menu']['footer_menu'])
											echo "Footer menu<br>";
											if($data['Menu']['sidebar_menu'])
											echo "Sidebar menu<br>";
											if($data['Menu']['top_left'])
											echo "Header Top menu<br>";
											
									 ?>
								</td>


                                   <td class="status_<?php echo $data['Menu']['id']; ?>">
          <?php if ($data['Menu']['status'] == 1) { ?>
                                             <span class="label label-sm label-success" ondblclick="changeCurrantStatus(<?php echo $data['Menu']['id']; ?>, 1);">
                                                  Active
                                             </span>
          <?php } else { ?>
                                             <span class="label label-sm label-danger" ondblclick="changeCurrantStatus(<?php echo $data['Menu']['id']; ?>, 0);">
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
                                                       <?php echo $this->html->link("Edit", array("controller" => "menus", "action" => "edit", $data['Menu']['id'], "admin" => true), array("escape" => false)); ?>
                                                  </li>
                                                  <li>
          <?php echo $this->html->link("Delete", array("controller" => "menus", "action" => "delete", $data['Menu']['id'], "admin" => true), array("escape" => false)); ?>
                                                  </li>

                                             </ul>
                                        </div>	

                                   </td>

                              </tr>
     <?php }
} ?>

               </tbody>
          </table>
     </div>
</div>

<!-- END EXAMPLE TABLE PORTLET-->
