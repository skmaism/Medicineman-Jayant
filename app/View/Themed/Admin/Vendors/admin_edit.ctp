<!-- BEGIN PAGE HEADER-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script> var site_url	=	"<?php echo $this->base; ?>";</script>

<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Vendor 
          </h3>
          <ul class="breadcrumb">
			<li><i class="icon-home"></i> 
				<?php echo $this->Html->link('Home', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>                        <i class="icon-angle-right"></i>
			</li>
			<li>Edit <?php echo __('Vendor'); ?>                    </li>
		</ul>

          <!-- END PAGE TITLE & BREADCRUMB-->
           <?php echo $this->Session->flash(); ?>
     </div>
    
     
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE HEADER-->
     <div class="row-fluid">
    
     <?php echo $this->Session->flash(); ?>
  
     <div class="span12">
          <!-- BEGIN SAMPLE FORM PORTLET-->
          <div class="portlet box blue">
               
               <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>Vendor Detail</h4>
                   
                
               </div>
               <div class="portlet-body form">
                    <!--  Form start -->
                    <?php
                    echo $this->Form->create('Vendor', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-control',
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
					
					
					
					
					echo '<div class="form-body">';
					
					
                  
			
													
                    echo '<div class="form-body"><div class="row-fluid"><div class="span6">';
                    echo '<h3 class="form-section">General Info</h3>';

                    echo $this->Form->input('name', array("class" => "m-wrap span12", 'type' => 'text',
                        'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Vendor Name', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );
					
					
                    if($this->data['Vendor']['status'] == 1){
						$status_selected = 1;
					}else{
						$status_selected = 0;
					}
					
					echo $this->Form->input('status', array('options' =>
                        array(
                            "1" => "Active",
                            "0" => "Inactive",
                        ),
						"type" => "select",
						"selected"=>$status_selected,
                        "class" => "m-wrap span12",
                        'label' => array('text' => 'Status'))
                    );
                    
               echo "</div></div></div></div>";

                   

                    echo "<div class='form-actions' style='padding-left: 20px;'>";
                     echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn blue'
                    ));
                    echo " ";
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn default',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/news/'", "after" => "</div>"
                    ));
                    

                    echo "</div>";
                    echo $this->form->end();
                    ?>
                    <!-- Form End -->
               </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->



     </div>
     </div>