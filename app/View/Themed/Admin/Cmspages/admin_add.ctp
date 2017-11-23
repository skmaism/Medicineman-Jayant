<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
 <h3 class="page-title">
               Manage Static pages <small>Static pages</small>
          </h3>
					<?php echo $this->element('admin-breadcrumb',array('pageName'=>'Cmspage_add'));?>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <?php echo $this->Session->flash(); ?>
     
			<!-- END PAGE HEADER-->
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
                             <h4><i class="icon-reorder"></i>Static page</h4>
				
                              
				
			</div>
			<div class="portlet-body form">
				<!--  Form start -->
<?php
echo $this->Form->create ( 'Cmspage', array ('enctype' => 'multipart/form-data',
		 'inputDefaults' => array(
        'class' => 'form-control',
        'div' => array('class' => 'form-group'),
        'label' => array('class' => 'control-label'),
        'error' => array('attributes' => array( 'class' => 'help-block'))
    )
		  ) );
echo '<div class="form-body">';
echo '<div class="row-fluid"><div class="span6"><h3 class="form-section">General</h3>';

echo $this->Form->input ( 'title', 
		array ("class" => "m-wrap span12",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Name','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
		 );

echo $this->Form->input ( 'seo_url',
		array ("class" => "m-wrap span12",'type' => 'text',
				'placeholder' => 'Seo URL','autocomplete' => 'off',
                                'readonly'=>true,
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Seo URL','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);
echo '</div><div class="span6"><h3 class="form-section">Meta Detail</h3>';
echo $this->Form->input ( 'meta_title',
		array ("class" => "m-wrap span12",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Title','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'meta_keyword',
		array ("class" => "m-wrap span12",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Keyword','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo $this->Form->input ( 'meta_description',
		array ("class" => "m-wrap span12 ",'type' => 'textarea',
				'placeholder' => 'Description',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Description','class' => ''
				)
		)
);
echo "</div></div><div class='row-fluid'> <div class='span12' style='margin-bottom:20px;'>";

echo $this->Form->input ( 'description',
		array ("class" => "span12 ckeditor m-wrap",'type' => 'textarea',
				'placeholder' => 'Page Content',
                                'row' => "6",
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Page Content','class' => ''
				)
		)
);



/*echo $this->Form->input('status', array('options' =>
		array(
				"1"=>"Active",
				"0"=>"Inactive",
		),
		"class"=>"form-control",
		'label'=>array('text'=>'Status'))
);*/


echo "</div></div></div>";

echo "<div class='form-actions'>";
echo $this->Form->button ( 'Submit', 
		array ('type' => 'submit','class' => 'btn blue' 
		) );
echo " ";
echo $this->Form->button ( 'Cancel', 
		array ('type' => 'button','class' => 'btn default',
				"onClick" => "window.location.href='" . $this->webroot .
						 "admin/cmspages/'","after" => "</div>" 
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
</div>
</div>