<?php
echo $lurl;
echo $this->Form->create ( 'User', array ('enctype' => 'multipart/form-data' 
) );
echo '<h3 class="form-title">Login to your account</h3>';
echo $this->Session->flash ();

echo $this->Form->input ( 'username', 
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'Username',
				'autocomplete' => 'off',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Username','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-user"></i> ',
				'after' => '</div>'
		) );

echo $this->Form->input ( 'password',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'password',
				'placeholder' => 'password',
				'autocomplete' => 'off',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'password','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-lock"></i> ',
				'after' => '</div>'
		) );


echo $this->Form->input ( 'email',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'email',
				'placeholder' => 'Email',
				'autocomplete' => 'off',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Email','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-envelope"></i> ',
				'after' => '</div>'
		) );


echo $this->Form->input ( 'first_name',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'First Name',
				'autocomplete' => 'off',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'First Name','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-font"></i> ',
				'after' => '</div>'
		) );

echo $this->Form->input ( 'last_name',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'Last Name',
				'autocomplete' => 'off',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'Last Name','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-font"></i> ',
				'after' => '</div>'
		) );

echo $this->Form->input ( 'active',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'active',
				'value' => '1',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'active','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="fa fa-check"></i> ',
				'after' => '</div>'
		) );

echo $this->Form->input ( 'email_verified',
		array ("class" => "form-control placeholder-no-fix",
				'type' => 'text',
				'placeholder' => 'Email Verified',
				'value' => '1',
				"div" => array ("class" => "form-group"),
				'label' => array ('text' => 'active','class' => 'control-label visible-ie8 visible-ie9'),
				'before' => '<div class="input-icon"><i class="Email Verified"></i> ',
				'after' => '</div>'
		) );

 
 echo $this->Form->button('Login <i class="m-icon-swapright m-icon-white"></i>', 
 		array('type' => 'submit', 'class' => 'btn green pull-right'));

echo $this->form->end ();
?>
</div>
<script type="text/javascript">
$(".form-actions .checkbox").live("click",function(){
	//alert("hi");
});
</script>

