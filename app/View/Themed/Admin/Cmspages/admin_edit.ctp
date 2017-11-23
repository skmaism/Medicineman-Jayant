<script>

</script>
<div class="row">
	<div class="col-md-6 ">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i> Edit Static page
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
echo $this->Form->create ( 'Cmspage', array ('enctype' => 'multipart/form-data',
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
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Name','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
		 );

echo $this->Form->input ( 'seo_url',
		array ("class" => "form-control",'type' => 'text',
				'placeholder' => 'Seo URL','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Seo URL','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'description',
		array ("class" => "form-control ",'type' => 'textarea',
				'placeholder' => 'Description',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Description','class' => ''
				)
		)
);

echo $this->Form->input ( 'meta_title',
		array ("class" => "form-control",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Title','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'meta_keyword',
		array ("class" => "form-control",'type' => 'text',
				'placeholder' => 'Name','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Keyword','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo $this->Form->input ( 'meta_description',
		array ("class" => "form-control ",'type' => 'textarea',
				'placeholder' => 'Description',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Description','class' => ''
				)
		)
);

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
