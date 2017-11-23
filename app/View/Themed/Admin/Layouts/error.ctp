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

          <?php
          echo $this->Html->meta('icon');
          echo $this->fetch('meta');
          echo $this->fetch('css');
          echo $this->fetch('script');
          echo $this->html->css("colorbox");
          ?>


          <!-- BEGIN GLOBAL MANDATORY STYLES -->

          <link href="<?php echo Helper::webroot(''); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/css/metro.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/glyphicons/css/glyphicons.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/css/style.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/css/style_responsive.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
          <link rel="stylesheet" type="text/css" href="<?php echo Helper::webroot(''); ?>assets/bootstrap-datepicker/css/datepicker.css" />
          <link rel="stylesheet" type="text/css" href="<?php echo Helper::webroot(''); ?>assets/gritter/css/jquery.gritter.css" />
          <link rel="stylesheet" type="text/css" href="<?php echo Helper::webroot(''); ?>assets/uniform/css/uniform.default.css" />
          <link rel="stylesheet" type="text/css" href="<?php echo Helper::webroot(''); ?>assets/bootstrap-daterangepicker/daterangepicker.css" />
          <link href="<?php echo Helper::webroot(''); ?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
          <link href="<?php echo Helper::webroot(''); ?>assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
          <link rel="stylesheet" type="text/css" href="<?php echo Helper::webroot(''); ?>assets/chosen-bootstrap/chosen/chosen.css" />
          <!-- END THEME STYLES -->

          <link href="<?php echo Helper::webroot(''); ?>css/style.css" rel="stylesheet" type="text/css"/>
          <!-- END THEME STYLES -->
          <script type="text/javascript">
               var baseurl = '<?php echo $this->webroot; ?>';
          </script>

     </head>	

     <!-- END HEAD -->
     <!-- BEGIN BODY -->
     <body class="fixed-top">
          <?php echo $this->element("top_header"); ?>
          <div class="clearfix"></div>

          <!-- BEGIN CONTAINER -->
          <div class="page-container row-fluid">

               <?php echo $this->element("sidebar"); ?>

               <!-- BEGIN CONTENT -->
               <div class="page-content">
                    <div class="container-fluid">
                         <!-- BEGIN PAGE CONTAINER-->



                         <div class="row-fluid">
                              <div class="span12">
                                   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                                   <h3 class="page-title">
                                        Error 404 <small>Page Not Found</small>
                                   </h3>
                                   <ul class="page-breadcrumb breadcrumb">
                                        <li><a href="/medcert/admin"><i class="icon-home"></i></a> <i class="icon-angle-right"></i></li>
                                        <li>Error 404</li>
                                   </ul>

                                   <!-- END PAGE TITLE & BREADCRUMB-->
                              </div>
                         </div>

                         
                         <div class="row-fluid">
					<div class="span12">
						<div class="row-fluid page-500">
							<div class="span7 number">
								Error 404 
							</div>
							
						</div>
					</div>
				</div>


                         <!-- END PAGE CONTAINER-->    
                    </div>

               </div>
               <!-- END CONTAINER -->	


          </div>


          <!-- BEGIN FOOTER -->
          <div class="footer">

               <?php echo date('Y'); ?> &copy; <?php echo $mySetting['title']; ?>.


               <div class="span pull-right">
                    <span class="go-top"><i class="icon-angle-up"></i></span>
               </div>

          </div>
          <!-- END FOOTER -->



          <!-- END FOOTER -->
          <!-- BEGIN JAVASCRIPTS -->
          <!-- Load javascripts at bottom, this will reduce page load time -->
          <script src="<?php echo Helper::webroot(''); ?>assets/js/jquery-1.8.3.min.js"></script>	
          <!--[if lt IE 9]>
          <script src="<?php echo Helper::webroot(''); ?>assets/js/excanvas.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/js/respond.js"></script>	
          <![endif]-->	
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/ckeditor/ckeditor.js"></script>  
          <script src="<?php echo Helper::webroot(''); ?>assets/breakpoints/breakpoints.js"></script>		
          <script src="<?php echo Helper::webroot(''); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>	
          <script src="<?php echo Helper::webroot(''); ?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.blockui.js"></script>	
          <script src="<?php echo Helper::webroot(''); ?>assets/js/jquery.cookie.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/flot/jquery.flot.js"></script>
          <script src="<?php echo Helper::webroot(''); ?>assets/flot/jquery.flot.resize.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/gritter/js/jquery.gritter.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/uniform/jquery.uniform.min.js"></script>	
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/js/jquery.pulsate.min.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/bootstrap-daterangepicker/date.js"></script>
          <script type="text/javascript" src="<?php echo Helper::webroot(''); ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>	
          <script src="<?php echo Helper::webroot(''); ?>assets/js/app.js"></script>
          <?php
          echo $this->Html->script('common');
          echo $this->html->script("jquery.colorbox");
          ?>  

          <!-- END PAGE LEVEL SCRIPTS -->  


          <!-- END PAGE LEVEL SCRIPTS -->


          <script>
               $(".date-picker").datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
               });

               jQuery(document).ready(function() {
                    App.init(); // init the rest of plugins and elements

               });
          </script>

          <script>
               $(document).ready(function() {
                    //Examples of how to assign the Colorbox event to elements
                    $(".imagePopup").colorbox({rel: 'group1'});
                    $(".ajax_member").colorbox();
                    $(".iframe").colorbox({iframe: true, width: "80%", height: "80%"});
                    $(".inline").colorbox({inline: true, width: "50%"});

               });
          </script>



<?php //echo $this->element('sql_dump');  ?>
     </body>
</html>
