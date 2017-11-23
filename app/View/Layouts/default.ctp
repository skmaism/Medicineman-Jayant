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

$cakeDescription = __d('cake_dev', isset($this->request->prefix)?$this->request->prefix:'MedCert : ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?php echo isset($metaDescription) ? $metaDescription : $cakeDescription; ?>">    
    <meta name="keywords" content="<?php echo isset($metaKey) ? $metaKey : $cakeDescription; ?>">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'CollegeAvenues' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
         <script type="text/javascript">
               var baseurl = '<?php echo $this->webroot; ?>';
          </script>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                 echo $this->Html->css(array('style','jquery-ui','responsive',"fullcalendar", "colorbox"));
               echo $this->Html->script(array('browserdetect','jquery.min','nice_select','general','jquery.customInput',"moment.min","fullcalendar.min", "jquery.colorbox"));
                
                //echo $this->Html->script(array('jquery.min','general','jquery.customInput',"moment.min","fullcalendar.min", "jquery.colorbox"));
	?>
         <link href='<?php echo $this->webroot; ?>css/fullcalendar.print.css' rel='stylesheet' media='print' />
         
         <script type="text/javascript">
$(function() {
	$('#ancMenuButton').click(function() {
		
		$('#divMenu').slideToggle();
	});
});
$('document').ready(function() {
		
                $(".inline").colorbox({inline: true, width: "50%"});
	})
</script>
</head>
<body class="body_in">
	
		 <div class="container">

			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
     
     <div class="clr"></div>
    
    
		
</body>
</html>
<?php 
if(isset($this->request->prefix)){ 
    $contrl = ($this->request->prefix=="patient")?"patients":"doctors"; 
 ?>
<script>
var IDLE_TIMEOUT = 40; //seconds
var IDLE_AWAY = 70;
var _idleSecondsCounter = 0;
// Events  $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick'

document.onclick = function() {
    _idleSecondsCounter = 0;
};
document.onmousemove = function() {
    _idleSecondsCounter = 0;
};
document.onkeypress = function() {
    _idleSecondsCounter = 0;
};
document.scroll = function() {
    _idleSecondsCounter = 0;
};
document.keydown = function() {
    _idleSecondsCounter = 0;
};
document.click = function() {
    _idleSecondsCounter = 0;
};
document.dblclick = function() {
    _idleSecondsCounter = 0;
};
document.mouseenter = function() {
    _idleSecondsCounter = 0;
};
//window.setInterval(CheckIdleTime, 1000);
setInterval(CheckLoginTime, 1000);
var activeStatus = 0;
var afterIdle = 0;
var loginStatus = 0;
var flagIdle,flagAway,flagLogin;
function CheckLoginTime() {
    _idleSecondsCounter++;
    if ((_idleSecondsCounter > IDLE_TIMEOUT) && (_idleSecondsCounter < IDLE_AWAY )) {
         if(loginStatus !=2){
               loginStatus = 2;
              $.ajax({
               url: baseurl + '<?php echo $this->request->prefix; ?>/<?php echo $contrl; ?>/loginstatus/',
               type: 'post',
               data: {status: loginStatus},
//                error: function(xhr, ajaxOptions, thrownError) {
//                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//               }
           });
         }
         
    }
    if (_idleSecondsCounter > IDLE_AWAY) {
          if(loginStatus !=3){
               loginStatus = 3;
               $.ajax({
          url: baseurl + '<?php echo $this->request->prefix; ?>/<?php echo $contrl; ?>/loginstatus/',
          type: 'post',
          data: {status: loginStatus},
//           error: function(xhr, ajaxOptions, thrownError) {
//               alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//          }
     });
         }
        }
    if(_idleSecondsCounter==1){
         
          if((loginStatus ==3) || (loginStatus ==2)){
              loginStatus = 1;
              $.ajax({
          url: baseurl + '<?php echo $this->request->prefix; ?>/<?php echo $contrl; ?>/loginstatus/',
          type: 'post',
          data: {status: loginStatus},
//           error: function(xhr, ajaxOptions, thrownError) {
//               alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//          }
     });
         }
       }
       
       //console.log(_idleSecondsCounter+" "+loginStatus);
       
//  console.log(_idleSecondsCounter+" "+loginStatus);   
//   
//    if(loginStatus>0){
//    $.ajax({
//          url: baseurl + '<?php echo $this->request->prefix; ?>/<?php echo $contrl; ?>/loginstatus/',
//          type: 'post',
//          data: {status: loginStatus},
//           error: function(xhr, ajaxOptions, thrownError) {
//               alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//          }
//     });
//    }
 
	
}
</script>
<?php } ?>