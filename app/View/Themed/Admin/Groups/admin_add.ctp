<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Group Master<small>Group List</small>
					</h3>
					<?php echo $this->element('admin-breadcrumb',array('pageName'=>$breadcrum));?>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
<div class="row">
	<div class="col-md-6 ">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i> Add Group
				</div>
				<div class="tools">
					<a
						href=""
						class="collapse"></a> <a
						href=""
						class="remove"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<!--  Form start -->
<?php

echo $this->Form->create ( 'Group', array ('enctype' => 'multipart/form-data',
		 'inputDefaults' => array(
        'class' => 'form-control',
        'div' => array('class' => 'form-group'),
        'label' => array('class' => 'control-label'),
        'error' => array('attributes' => array( 'class' => 'help-block'))
    )
		  ) );
echo '<div class="form-body">';

echo $this->Form->input ( 'title', 
		array ("class" => "form-control",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				'label' => array ('text' => 'Name','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
		 );
?>
<div class="<?php echo $this->Form->isFieldError('supper') ? 'has-error' : ''?>">
								<label>Supper User &nbsp; &nbsp;  &nbsp;  &nbsp; 
								<?php echo $this->Form->input ( 'supper', 
										array ("class" => "i-grey",
												'type' => 'checkbox',
												'label' => false ,
												'div' => false ,
												'error' => array(
														'attributes' => array('wrap' => 'span', 'class' => 'help-block')
												)
										)
										 );?>
									</label>
								</div>
<?php 
echo $this->Form->input('status', array('options' =>
		array(
				"1"=>"Active",
				"0"=>"Inactive",
		),
		"class"=>"form-control",
		'label'=>array('text'=>'Status'))
);


echo "</div>";

echo "<div class='form-actions'>";
echo $this->Form->button ( 'Submit', 
		array ('type' => 'submit','class' => 'btn blue' 
		) );
echo " ";
echo $this->Form->button ( 'Cancel', 
		array ('type' => 'button','class' => 'btn default',
				"onClick" => "window.location.href='" . $this->webroot .
						 "admin/groups/'","after" => "</div>" 
		) );

echo "</div>";
echo $this->form->end ();
?>
				<!-- Form End -->
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->

	</div>
</div>
