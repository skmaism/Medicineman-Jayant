<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               Manage Settings
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
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <?php echo $this->Session->flash(); ?>
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i><?php echo $heads; ?></h4>
				
			</div>
			<div class="portlet-body form">
			
		    	
		    	
				<!--  Form start -->
				
<?php
echo $this->Form->create ( 'Setting', array ('enctype' => 'multipart/form-data',
		 'inputDefaults' => array(
        'class' => '',
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'error' => array('attributes' => array( 'class' => 'help-block'))
    )
		  ) );
echo '<div class="row-fluid"><div class="form-body">';
echo '<div class="span6"><h3 class="form-section">General</h3>';


echo $this->Form->input ( 'title', 
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Title','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
		 );

echo $this->Form->input ( 'owner',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Owner','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'address',
		array ("class" => "m-wrap span12 ",'type' => 'textarea',
				'placeholder' => 'Address',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Full Address','class' => ''
				)
		)
);

echo $this->Form->input ( 'email',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Email','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'email_2',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Alternative Email','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'mobile',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Mobile','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'phone',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Phone Number','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo "<div style='display:none'>";
echo $this->Form->input ( 'default',
		array ("class" => "m-wrap span12",
				'type' => 'checkbox',
				/* 'before' => '<label class="control-label" for="SettingDefault"> Default Setting</label><br>', */
				'label' => array ('text' => 'Default Setting','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo "</div><div class='row-fluid'><div class='span6'>";


echo $this->Form->input('logo',
		array(
				'type' => 'file',
				"class" => "",
				'label'=>array('text'=>'Logo','class'=>'')));


echo "</div><div class='span6'>";

     if(isset($this->data['Setting']['logo']))
	echo $this->Html->image($this->data['Setting']['logo'], array('height' => '50', 'border' => '0'));


echo "</div></div>";

echo "<div style='display:none'>";
echo $this->Form->input('status', array('options' =>
		array(
				"1"=>"Active",
				"0"=>"Inactive",
		),
		"class"=>"m-wrap span12",
		'label'=>array('text'=>'Status'))
);
echo "</div>";

echo "</div>";
echo '<div class="span6"><h3 class="form-section">Meta Details</h3>';


echo $this->Form->input ( 'meta_title',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Title','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'meta_keyword',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Keyword','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo $this->Form->input ( 'meta_description',
		array ("class" => "m-wrap span12 ",'type' => 'textarea',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Meta Description','class' => ''
				)
		)
);

echo '<h3 class="form-section">Social Links</h3>';


echo $this->Form->input ( 'fb_link',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Facebook Link','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'twitter_link',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Twitter Link','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo $this->Form->input ( 'in_link',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'LinkedIn Link','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'gpluse_link',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Google Plus Link','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo $this->Form->input ( 'youtube_link',
		array ("class" => "m-wrap span12",'type' => 'text',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Youtube Link','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);


echo "</div></div></div>";

echo "<div class='row-fluid form-body'>";
echo '<div class="span6"><h3 class="form-section">Mail</h3>';

echo $this->Form->input('config_mail_protocol', array('options' =>
		array(
				"mail"=>"Mail",
				"smtp"=>"SMTP",
		),
		"class"=>"m-wrap span12",
		'label'=>array('text'=>'Mail Protocol'))
);

echo $this->Form->input ( 'config_smtp_host',
		array ("class" => "m-wrap span12",'type' => 'text',
				"required" => false,
				'label' => array ('text' => 'SMTP Host','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'config_smtp_username',
		array ("class" => "m-wrap span12",'type' => 'text',
				"required" => false,
				'label' => array ('text' => 'SMTP Username','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'config_smtp_password',
		array ("class" => "m-wrap span12",'type' => 'text',
				"required" => false,
				'label' => array ('text' => 'SMTP Password','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

echo $this->Form->input ( 'config_smtp_port',
		array ("class" => "m-wrap span12",'type' => 'text',
				"required" => false,
				'label' => array ('text' => 'SMTP Port','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);
echo $this->Form->input ( 'config_smtp_timeout',
		array ("class" => "m-wrap span12",'type' => 'text',
				"required" => false,
				'label' => array ('text' => 'SMTP Timeout','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);
echo "</div>";

echo "</div>";

echo $this->Form->input('hiimagess',array("class"=>"pj-form-field w250",'type'=>'hidden','value'=>@$this->data['Setting']['logo'],'label'=>''));

echo "<div class='form-actions'>";
echo $this->Form->button ( 'Submit', 
		array ('type' => 'submit','class' => 'btn blue' 
		) );
echo " ";
echo $this->Form->button ( 'Cancel', 
		array ('type' => 'button','class' => 'btn default',
				"onClick" => "window.location.href='" . $this->webroot .
						 "admin/settings/'","after" => "</div>" 
		) );

echo "</div>";
echo $this->form->end ();
?>
</div>
			
		
		</div>
				<!-- Form End -->
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->
