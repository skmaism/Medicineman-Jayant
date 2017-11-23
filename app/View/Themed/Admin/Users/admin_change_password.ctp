<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
	<div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               User master <small>Password Change</small>
          </h3>
          <?php echo $this->element('admin-breadcrumb', array('pageName' => 'changepassword')); ?>

          <!-- END PAGE TITLE & BREADCRUMB-->
     </div>
     <div style="clear: both;"></div>
      <?php echo $this->Session->flash(); ?>
   
</div>
<!-- END PAGE HEADER-->

<div class="row-fluid">

    
     <div class="span6">
          <!-- BEGIN SAMPLE FORM PORTLET-->
          <div class="portlet box blue">
               <div class="portlet-title">
                     <h4><i class="icon-reorder"></i>Change Password</h4>
                    
                  
               </div>
               <div class="portlet-body form">
                    <!--  Form start -->
                    <?php
                    //$this->Form->isFieldError('User.email') ? 'input-xlarge-error' : 'input-xlarge';

                    echo $this->Form->create('User', array('enctype' => 'multipart/form-data',
                        'inputDefaults' => array(
                            'class' => 'form-control',
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label'),
                            'error' => array('attributes' => array('class' => 'help-block'))
                        )
                    ));
                    echo '<div class="form-body">';

                    echo $this->Form->input('oldpassword', array("class" => "m-wrap span12", 'type' => 'password',
                        'placeholder' => 'Old Password', 'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group"),
                        'label' => array('text' => 'Old Password', 'class' => ''),
                        'error' => array(
                            'attributes' => array('wrap' => 'span', 'class' => 'help-block')
                        )
                            )
                    );

                     echo $this->Form->input('password', array("class" => "m-wrap span12", 'type' => 'password',
                        'placeholder' => 'password', 'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group" ),
                        'label' => array('text' => 'password', 'class' => ''
                        )
                            )
                    );

                    echo $this->Form->input('cpassword', array("class" => "m-wrap span12",
                        'type' => 'password', 'placeholder' => 'Confirm password',
                        'autocomplete' => 'off',
                        //"div" => array ("class" => "form-group" ),
                        'label' => array('text' => 'Confirm password', 'class' => ''
                        )
                            )
                    );


                    

                    echo "</div>";

                    echo "<div class='form-actions'>";
                    echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn blue'
                    ));
                    echo " ";
                    echo $this->Form->button('Cancel', array('type' => 'button', 'class' => 'btn default',
                        "onClick" => "window.location.href='" . $this->webroot .
                        "admin/users/'", "after" => "</div>"
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
