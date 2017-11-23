<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
		
		<meta charset="utf-8" />
		<?php echo $this->Html->charset(); ?>
		<title>
		   <?php echo isset($metatitle) ? $metatitle : $cakeDescription; ?> : 
		   <?php echo $title_for_layout; ?>
		</title>

		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta name="description" content="<?php echo isset($metaDescription) ? $metaDescription : $cakeDescription; ?>">
		<meta name="keywords" content="<?php echo isset($metaKey) ? $metaKey : $cakeDescription; ?>">
		<meta name="MobileOptimized" content="320">


		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/font-icons/entypo/css/entypo.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-core.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-theme.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-forms.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/colorbox.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/custom.css">
		
		
		



		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery-1.11.0.min.js"></script>

		<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->



          <!-- BEGIN GLOBAL MANDATORY STYLES -->
          
		  
		   <style>
				.loader {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				opacity:.9;
				background: url('<?php echo Router::url('/', true); ?>img/page-loader .gif') 50% 50% no-repeat rgb(249,249,249);
			}
			</style>
			
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyBC7HNME4PqS_9CRdjEaUv3pZo3swxmPw8"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

     </head>	

     <!-- END HEAD -->
     <!-- BEGIN BODY -->
    <body class="page-body  page-fade">
	
	<div class="loader" style="display:none;"></div>
		<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
		<?php echo $this->element("sidebar"); ?>
	
	
	
	<div class="main-content">
	
		<?php echo $this->element('top_header'); ?>
		
		
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
		
		

<!-- Footer -->

		<?php echo $this->element('footer'); ?>
	</div>



	</div>
	
	

		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/rickshaw/rickshaw.min.css">
		
		
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/select2/select2-bootstrap.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/select2/select2.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/selectboxit/jquery.selectBoxIt.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/icheck/skins/minimal/_all.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/icheck/skins/square/_all.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/icheck/skins/flat/_all.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/icheck/skins/futurico/futurico.css">
		<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/icheck/skins/polaris/polaris.css">

		<!-- Bottom Scripts -->
	
		
		

		<!-- Bottom Scripts -->
		<script src="<?php echo Helper::webroot(''); ?>assets/js/gsap/main-gsap.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/bootstrap.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/joinable.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/resizeable.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/neon-api.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/select2/select2.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/rickshaw/vendor/d3.v3.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/rickshaw/rickshaw.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/raphael-min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/morris.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/toastr.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/datatables/TableTools.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/dataTables.bootstrap.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/datatables/lodash.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/select2/select2.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/bootstrap-tagsinput.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/typeahead.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/daterangepicker/moment.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.multi-select.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/icheck/icheck.min.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.colorbox.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/custom.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/neon-chat.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/neon-custom.js"></script>
		<script src="<?php echo Helper::webroot(''); ?>assets/js/neon-demo.js"></script>
		
		
		
		<script>
		$(document).ready(function(){
			
			//Examples of how to assign the Colorbox event to elements
			
			$(".ajax_member").colorbox({closeButton:false });				
						
		});
	</script>





	

          



     </body>
</html>
