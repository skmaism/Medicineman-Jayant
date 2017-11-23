
<?php
//echo $lurl;
echo $this->Form->create ( 'User', array ('enctype' => 'multipart/form-data','class' => 'form-vertical login-form' ) );
echo '<h3 class="form-title">Enter your Email Id</h3>';

  
       echo $this->Session->flash ();
  

echo $this->Form->input ( 'username', 
		array ("class" => "m-wrap placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'Email Id',
				'autocomplete' => 'off',
				"div" => array ("class" => "control-group"),
				'label' => array ('text' => 'Username','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon left"><i class="icon-user"></i> ',
				'after' => '</div>'
		) );


echo '<div class="form-actions" style="padding-left:50px;"><label class="checkbox" >';
 echo  '<input type="checkbox" id="UserRemember_" name="data[User][remember]" value="1"/> Remember me';
 echo "</label>";
 echo $this->Form->button('Login <i class="m-icon-swapright m-icon-white"></i>', 
 		array('type' => 'submit', 'class' => 'btn green pull-right')); 


  
echo '</div>';
echo $this->html->link('<span>Forgot Password??</span>',array( 'action' => 'admin_forgotpassword'),array('escape' => false) ); 

?>
</div>

