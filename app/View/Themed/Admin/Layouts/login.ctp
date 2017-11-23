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

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

<meta charset="utf-8" />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo isset($metatitle)?$metatitle:$cakeDescription; ?> : 
		<?php echo $title_for_layout; ?>
	</title>
	
	 <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="<?php echo isset($metaDescription)?$metaDescription:$cakeDescription; ?>" name="description"/>
	<meta name="keywords" content="<?php echo isset($metaKey)?$metaKey:$cakeDescription; ?>">
	
	
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>assets/css/custom.css">
	
	
<!-- END THEME STYLES -->
	
	
	<!-- END THEME STYLES -->
	<script type="text/javascript">
	var siteurl = '<?php echo $this->webroot; ?>';
	</script>
	
</head>	

<body class="page-body login-page login-form-fall login-bg">
	
	
<!-- BEGIN LOGO -->

<!-- END LOGO -->
	
<!-- BEGIN LOGIN -->
		<div class="content">
			
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		
		</div>

		
	
	<!-- BEGIN FOOTER -->

<!-- END FOOTER -->

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
 <script src="<?php echo Helper::webroot(''); ?>assets/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo Helper::webroot(''); ?>assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="<?php echo Helper::webroot(''); ?>assets/uniform/jquery.uniform.min.js"></script> 
  <script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.blockui.js"></script>
  <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="<?php echo Helper::webroot(''); ?>assets/js/app.js"></script>
  
</body>
</html>
