<?php
/**
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

$cakeDescription = __d('cake_dev', 'MedCert : ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
     <title><?php echo isset($metatitle) ? $metatitle : $cakeDescription." ".$this->fetch('title'); ?>:<?php echo $title_for_layout; ?></title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($metaDescription) ? $metaDescription : $cakeDescription; ?>">    
    <meta name="keywords" content="<?php echo isset($metaKey) ? $metaKey : $cakeDescription; ?>">
    
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
          echo $this->Html->css(array('style','responsive'));
          echo $this->Html->script(array('jquery-1.11.1.min'));
	?>
<script type="text/javascript">
$(function() {
	$('#ancMenuButton').click(function() {
		$('#divMenu').slideToggle();
	});
})
</script>
         
</head>
     <body>
          <div class="header">
    	<div class="logo">
             <?php echo $this->html->link($this->html->image($mySetting['logo'],
				array("class"=>"","alt"=>$mySetting['title'])),array("controller"=>"pages","action"=>"index"),
				array("escape"=>false)); ?>
          </div>
        <div class="home_content">
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
         </div>
    </div>
    <div class="clr"></div>
   <div class="home_bottom">
    	<div style="position:relative">
    		<?php echo $this->element("menus",array("class"=>"bottom_menu","class2"=>"home")) ?>
    		<div class="home_bottom_left">
           	 	<div class="menu">
                             <?php echo $this->html->link($this->html->image("menu.png"),"#",array("id"=>"ancMenuButton","escape"=>false)) ?>
                             
                        </div>
        		<div class="register_login">
                            <?php if( $this->Session->check('Auth.Doctor') !== true && $this->Session->check('Auth.Patient') !== true ) : ?>
                                <?php echo $this->html->link("Login",array("controller"=>"patients","action"=>"login","patient"=>true)); ?>
                                 | 
                                 <?php echo $this->html->link("Register",array("controller"=>"patients","action"=>"registration","patient"=>true)); ?>
                            <?php else: ?>
                                <span style="text-transform: none;">Hi <?php echo ucwords($_Me['first_name']) ?></span>&nbsp;&nbsp;&nbsp;|
                                <?php
                                    $prefix = 'patient';    $controller = 'patients';
                                    if($this->Session->check('Auth.Doctor') === true){
                                        $prefix = 'doctor';
                                        $controller = 'doctors';
                                    }
                                ?>
                                <span class="logout"> <?php echo $this->html->link("Logout", array("controller" => $controller, "action" => "logout", $prefix => true)); ?></span>
                            <?php endif; ?>
                              </div>
        	</div>
            <?php if( $this->Session->check('Auth.Doctor') === true ) : ?>
             <div class="book_appointment"><?php echo $this->html->link("Add Availability",array("controller"=>"doctors","action"=>"availablity","doctor"=>true)); ?></div>
        	
                <?php else: ?>
                <div class="book_appointment"><?php echo $this->html->link("Book an Appointment",array("controller"=>"patients","action"=>"booking","patient"=>true)); ?></div>
                <?php endif; ?>
            <div class="home_bottom_right">
                <div class="emailid_1"><a href="mailto:<?php echo $mySetting['email'];?>"><?php echo $mySetting['email'];?></a></div>
                <ul class="social">
                    <li>
                    <?php echo $this->html->link("",$mySetting['fb_link'],array("class"=>"fb_icon","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                       <li>
                    <?php echo $this->html->link("",$mySetting['twitter_link'],array("class"=>"twitter_icon","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                        <li>
                    <?php echo $this->html->link("",$mySetting['in_link'],array("class"=>"in","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                       <li>
                    <?php echo $this->html->link("",$mySetting['gpluse_link'],array("class"=>"gtalk","escape"=>false,"target"=>"_blank")); ?>
                       </li>
                   
                </ul>
            </div>
       </div>
    </div>       
          
     </body>
</html>
