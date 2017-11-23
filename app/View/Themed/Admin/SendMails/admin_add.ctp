<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
     <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title">
               E
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
		echo $this->Form->create ( 'Exclation', array ('enctype' => 'multipart/form-data',
		 'inputDefaults' => array(
        'class' => '',
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'error' => array('attributes' => array( 'class' => 'help-block'))
    )
		  ) );
		  
		  echo '<div class="row-fluid"><div class="form-body">';
		  echo '<div class="span3"><h3 class="form-section">General</h3>';
			//echo '<pre>';print_r($records);
			/*foreach($records as $option){
				echo $opt = $option['User']['name'];
				
			}
			
			 echo $this->Form->input('user_id', array(
				'type' => 'select',
				//'multiple' => 'true',
				'label' => array ('text' => 'Select User','class' => '') ,
				
					'options' => $opt,
					
			)); */
			echo $this->Form->input('Exclation.user_id',array('options'=>$records,'type'=>'select','label'=>'Select users','class'=>'distributeSelect','multiple'=> 'true'));

			// echo "<div class='form-actions' style='padding-left: 20px;'>";
                     echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn blue'
                    ));
                    echo " ";
					//echo '<pre>';print_r($links);
					//foreach ($links as $data) {
						
						//$data = array();
					
						for($i=0;!empty($i);$i++){
							$data['Exclation']['id'] = $links[$i]['Exclation']['id'];
							//echo '<pre>';print_r($data);exit;
						}
						
						echo $this->html->link("", array("controller" => "exclations", "action" => "add", $data['Exclation']['id'], "admin" => true), array("class"=>"icon-edit","escape" => false)); 
						
					
?>
</div>
			
		
		</div>
				<!-- Form End -->
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->
