<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					CMS Page Managment <small>CMS Menus</small>
					</h3>
					<?php echo $this->element('admin-breadcrumb',array('pageName'=>'Menu_edit'));?>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
<div class="row">
	<div class="col-md-10 ">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-reorder"></i> Edit CMS Menu
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
/* $adm = array("other"=>array("name"=>"Other Static pages","style"=>"color:#FF0000; font-weight:bold;background-color:#27A9E3;","value"=>"other"));
$pages = $pages+$adm; */


echo $this->Form->create ( 'Menu', array ('enctype' => 'multipart/form-data',
		 'inputDefaults' => array(
        'class' => 'form-control',
        'div' => array('class' => 'form-group'),
        'label' => array('class' => 'control-label'),
        'error' => array('attributes' => array( 'class' => 'help-block'))
    )
		  ) );
echo '<div class="form-body">';

echo $this->Form->input('parent_id', array('options' =>
		$parents,
		"class"=>"form-control",
		'label'=>array('text'=>'Select Perent Menu'))
);

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
		array ("class" => "form-control",'type' => 'hidden',
				'placeholder' => 'Seo URL','autocomplete' => 'off',
				//"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Seo URL','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

$cmsoptions = array('onSite' => 'WebSite CMS Page Link', 'OutSite' => 'Other Website Link','onStatic'=>"Static Page Link");

echo $this->Form->input('linkType', 
		array('options' =>  $cmsoptions, 
				'onChange'=>'cmspagestypes(this.value);', 
				"class"=>"form-control",
				'label'=>array('text'=>'Select Link Type'),
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)));

$webdivstyl=(@$this->data['Menu']['linkType']=="onSite")?"display:block":"display:none";
echo $this->Form->input ( 'web_page_url',
		array (
				'options' =>  $pages,
				"class" => "form-control",'type' => 'select',
				'onChange' => 'otherlinkopen(this.value)',
				"div" => array ("id" => "web_page_urls","class"=>"form-group",
				"style"=>$webdivstyl),
				'label' => array ('text' => 'Page URL','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

$divstyl=(@$this->data['Menu']['linkType']=="OutSite")?"display:block":"display:none";

echo $this->Form->input ( 'page_url',
		array ("class" => "form-control",'type' => 'text',
				'placeholder' => 'Page URL','autocomplete' => 'off',
				"div" => array ("id" => "page_urls","class"=>"form-group","style"=>$divstyl),
				'label' => array ('text' => 'Page URL','class' => '') ,
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		)
);

$onStatic=(@$this->data['Menu']['linkType']=="onStatic")?"display:block":"display:none";

echo $this->Form->input('staticlink',
		array(
		"options"=>array('categories' => 'Category Page','categories/catalog_request' => 'Catalog Request'),
				"class"=>"form-control",
				"id"=>"otherlink",
				'div'=>array('style'=>$onStatic, 'class'=>'form-group',"id"=>"pageotherlink"),
				'type'=>'select',
				'label'=>array('text'=>'Other Link','class'=>''),
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)
		));

$openin = array('_self' => 'On in same tab', '_blank' => 'Open in new tab');

echo $this->Form->input('openin',
		array('options' =>  $openin,
				"type"=>"select",
				"class"=>"form-control",
				'label'=>array('text'=>'Open in'),
				'error' => array(
						'attributes' => array('wrap' => 'span', 'class' => 'help-block')
				)));


echo "<div class=\"row\"> <div class=\"col-md-3\">";
echo "<label class=\"control-label\">Menu Options</label></div><div class=\"col-md-9\">";

echo $this->Form->input('header_menu',array('type'=>'checkbox','label'=>array('text'=>'Header Menu')));
echo $this->Form->input('top_left',array('type'=>'checkbox','label'=>array('text'=>'Header Top Menu')));
echo $this->Form->input('footer_menu',array('type'=>'checkbox','label'=>array('text'=>'Footer Menu')));
//echo $this->Form->input('sidebar_menu',array('type'=>'checkbox','label'=>array('text'=>'Sidebar Menu')));


echo "</div></div>";



/*if(isset($this->data['Menu']['image']))
	echo $this->Html->image("banner/".$this->data['Menu']['image'], array('width' => '100', 'border' => '0'));*/

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

echo $this->Form->input('image', 
		array(
				'type' => 'file',
				"class" => "",
				'label'=>array('text'=>'Banner Image','class'=>'')));
				
echo $this->Form->input('hiimagess',array("class"=>"pj-form-field w250",'type'=>'hidden','value'=>@$this->data['Menu']['image'],'label'=>''));


echo $this->Form->input('orderId', array('options' =>
		$sort[1],
		"class"=>"form-control",
		"value" => $sort[0],
		'label'=>array('text'=>'Sort'))
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
						 "admin/menus/'","after" => "</div>" 
		) );

echo "</div>";
echo $this->form->end ();
?>
<script type="text/javascript">
function cmspagestypes(str){
	if(str=="onSite"){
		$("#web_page_urls").show();
		$("#page_urls").hide();
		$('#pageotherlink').hide();
		
		//$("#MenuPageUrl").val('');
	}else if(str=="onStatic"){
		$("#web_page_urls").hide();
		$("#page_urls").hide();
		$('#pageotherlink').show();
	}
	else{
		$("#web_page_urls").hide();
		$("#page_urls").show();
		//$("#MenuWebPageUrl").val('');
		$('#pageotherlink').hide();
	}
}
function otherlinkopen(str){
	if(str=="other"){
		$('#pageotherlink').show();
	}
	else
		$('#pageotherlink').hide();
}
</script>
				<!-- Form End -->
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->

	</div>
</div>
